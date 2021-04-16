<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once(APPPATH.'libraries/fpdf/fpdf.php');
require_once(APPPATH.'libraries/mpdf/mpdf.php');
class Webinar extends CI_Controller {

	public function index(){
		
		$year = $this->session->userdata("reg_year");
		
		if($year){
		
			redirect("webinar/joinevent");
			
		}else{
			
			$this->load->view("webinars/participant_login");
		
		}
	}
	
	public function checkParticipant(){
		
		$email = $this->input->post("email");
		$mobile = $this->input->post("mobile");
		
		$chkParticipants = $this->db->order_by("id","desc")->get_where("tbl_participants",["pmobile"=>$mobile,"pemail"=>$email]);
		$chkRegistration = $this->db->order_by("id","desc")->get_where("tbl_registrations",["mobile"=>$mobile,"email"=>$email]);
		
		if($chkParticipants->num_rows() > 0){
			
			$pdata = $chkParticipants->row();
			$idata = $this->db->get_where("tbl_registrations",["id"=>$pdata->inst_id])->row();
			
			$category = "";
			
			if($pdata->category_name != ""){
				
				$category = explode(",",$pdata->category_name);
				
			}else{
				
				$category = json_decode($idata->categories);
				
			}
			
			if($pdata->collage_name){
				
				$college = $pdata->collage_name;
				
			}else{
				
				$college = $idata->institutionName;
				
			}
			
			$this->session->set_userdata(["participant_email"=>$pdata->pemail,"participant_mobile"=>$pdata->pmobile,"participant_type"=>"participant","id"=>$pdata->id,"name"=>$pdata->pname,"reg_year"=>$idata->register_year,"category"=>$category,"college_name"=>$college,"department"=>$pdata->designation]);
			redirect("webinar/events");
			
		}
		
		if($chkRegistration->num_rows() > 0){
			
			$pdata = $chkRegistration->row();
			$this->session->set_userdata(["participant_email"=>$pdata->email,"participant_mobile"=>$pdata->mobile,"participant_type"=>"institute","id"=>$pdata->id,"name"=>$pdata->cpname,"reg_year"=>$pdata->register_year,"category"=>json_decode($pdata->categories),"college_name"=>$pdata->institutionName,"department"=>$pdata->contact_person_designation.", ".$pdata->contact_person_department]);
			redirect("webinar/events");
			
		}
		
		$this->session->set_flashdata("emsg",'<div class="alert alert-danger">User Not Registered With Us.</div>');
		redirect("webinar");
		
	}
	
	public function events(){
		
		$participant_type = $this->session->userdata("participant_type");
		$participant_email = $this->session->userdata("participant_email");
		$participant_mobile = $this->session->userdata("participant_mobile");
		
		if($participant_type == "institute"){
			
			$rdata = $this->db->get_where("tbl_registrations",["email"=>$participant_email,"mobile"=>$participant_mobile])->result();
			$events = [];
			foreach($rdata as $r){
				$events[] = $r->event_name;
			}
			$data["events"] = $this->db->where_in("id",$events)->get("tbl_schedule_dates")->result();
			
		}else{
			
			$pdata = $this->db->get_where("tbl_participants",["pemail"=>$participant_email,"pmobile"=>$participant_mobile])->result();
			
			$insts = [];
			$events = [];
			foreach($pdata as $p){
				$insts[] = $p->inst_id;
			}
			
			$rdata = $this->db->where_in("id",$insts)->get_where("tbl_registrations")->result();
			foreach($rdata as $r){
				$events[] = $r->event_name;
			}
			
			$data["events"] = $this->db->where_in("id",$events)->get("tbl_schedule_dates")->result();
			
		}
		/*echo '<pre>';
		print_r($data["events"]);
		print_r($this->session->userdata());
		exit();*/
		
		$this->load->view("webinars/events",$data);
		
	}
	
	public function joinevent($id){
		
		/*if($year){*/
			
			$data["ydata"] = $this->db->get_where("tbl_schedule_dates",["id"=>$id])->row();
			$data["data1"] = $this->db->order_by("schedule_start_time","asc")->get_where("tbl_schedule",["event_id"=>$id,"schedule_date"=>$data["ydata"]->event_start_date,"status"=>"Active"])->result();
			$data["data2"] = $this->db->order_by("schedule_start_time","asc")->get_where("tbl_schedule",["event_id"=>$id,"schedule_date"=>$data["ydata"]->event_end_date,"status"=>"Active"])->result();
		
			$this->load->view("webinars/webinar_view",$data);
		
		/*}else{
			
			redirect("webinar");
			
		}*/
	}
	
	public function storeJoindata(){
		
		$schedule_id = $this->input->post("schedule_id");
		$participant_data = json_encode($this->session->userdata());
		$schedule_data = $this->db->get_where("tbl_schedule",["id"=>$schedule_id])->row();
		$data = ["schedule_id"=>$schedule_id,"participant_data"=>$participant_data,"created_date"=>date("Y-m-d H:i:s"),"schedule_data"=>json_encode($schedule_data)];
		
		$this->db->insert("tbl_schedule_joindata",$data);
		
	}
	
	public function downloadCertificate(){
		
		$participant_type = $this->session->userdata("participant_type");
		if($participant_type == "institute"){
			
			$data["pdata"] = $this->db->get_where("tbl_registrations",["id"=>$this->session->userdata("id")])->row();
			
		}else{
			
			$pd = $this->db->get_where("tbl_participants",["id"=>$this->session->userdata("id")])->row_array();
			$rd = $this->db->get_where("tbl_registrations",["id"=>$pd['inst_id']])->row_array();
			$data["pdata"] = (object)array_merge($pd,$rd);
			
		}
		$this->load->view("webinars/downloadCertificate",$data);
		
	}
	
	public function download(){
		
		$participant_type = $this->session->userdata("participant_type");
		if($participant_type == "institute"){
			
			$data["pdata"] = $this->db->get_where("tbl_registrations",["id"=>$this->session->userdata("id")])->row();
			
		}else{
			
			$pd = $this->db->get_where("tbl_participants",["id"=>$this->session->userdata("id")])->row_array();
			$rd = $this->db->get_where("tbl_registrations",["id"=>$pd['inst_id']])->row_array();
			$data["pdata"] = (object)array_merge($pd,$rd);
			
		}
		$this->load->view('webinars/downloadPdf',$data);
		
	}
	
	public function logout(){
		
		$this->session->sess_destroy();
		redirect("webinar");
		
	}

	public function nirf_new(){
		
		$guests = $this->db->order_by("id","desc")->get_where("tbl_guests")->result(); 
		$year = 2021;
		$gdata = [];
		$spdata = [];
	    foreach($guests as $g){

		   if(in_array($year,json_decode($g->year))){

			   $gdata[] = $g;

		   }

	    }
		
		$speakers = $this->db->get_where("tbl_speakers_reorder")->row(); 
			
		foreach(json_decode($speakers->speakers_order) as $s){

			$sp = $this->db->get_where("tbl_speakers",array("id"=>$s))->row();	
			if(in_array($year,json_decode($sp->year))){
				
				$spdata[] = $sp;
				
			}
			
		}
		
		$data["guests"] = $gdata;
		$data["speakers"] = $spdata;
		$data["ydata"] = $this->db->get_where("tbl_schedule_dates",["year"=>$year])->row();
		$data["data1"] = $this->db->order_by("schedule_start_time","asc")->get_where("tbl_schedule",["schedule_year"=>$year,"schedule_date"=>$data["ydata"]->event_start_date,"status"=>"Active"])->result();
		$data["data2"] = $this->db->order_by("schedule_start_time","asc")->get_where("tbl_schedule",["schedule_year"=>$year,"schedule_date"=>$data["ydata"]->event_end_date,"status"=>"Active"])->result();

		$this->load->view('index_new',$data);
		
	}
	
	
}
