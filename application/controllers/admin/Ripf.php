<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'libraries/mpdf/mpdf.php');

class Ripf extends CI_Controller {

		public function __construct(){

		parent::__construct();

		if(!$this->session->userdata['adminid'])
            {
                redirect('admin');
            }
	}


	public function index()
	{
		$data["rcategories"] = $this->db->order_by("id","desc")->get_where("tbl_ripf_categories",["deleted"=>0])->result();
		$data["rtopics"] = $this->db->order_by("id","desc")->get_where("tbl_ripf_topics",["deleted"=>0])->result();
		$this->load->view("admin/ripf/ripf",$data);
	}

	public function insertCategory(){

		$category_name = $this->input->post("category_name");
		$overall_discount_amount = $this->input->post("overall_discount_amount");
		$members_count = $this->input->post("members_count");
		$sid = $this->input->post("id");

		if($sid){
			$mochk = $this->db->get_where("tbl_ripf_categories",array("category_name"=>$category_name,"id !="=>$sid))->num_rows();
		}else{
			$mochk = $this->db->get_where("tbl_ripf_categories",array("category_name"=>$category_name))->num_rows();
		}

		if($mochk >= 1){
			$this->secure->pnotify("error","Already exists.","error");
			redirect("admin/ripf");
		}

		$idata = array(
			"category_name" => $category_name,
			"overall_discount_amount" => $overall_discount_amount,
			"members_count" => $members_count
		);

		if($sid){
			$id = $this->db->where("id",$sid)->update("tbl_ripf_categories",$idata);
		}else{
			$id = $this->db->insert("tbl_ripf_categories",$idata);
		}

		if($id){
			$status = ($sid) ? "Updated" : "Added";
			$this->secure->pnotify("success","Successfully $status.","Success");
			redirect("admin/ripf");
		}else{
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/ripf");
		}

	}

	public function delCategory($id){

		$d = $this->db->where(array("id"=>$id))->update("tbl_ripf_categories",array("deleted"=>1));

		if($d){

			$this->secure->pnotify("success","Successfully deleted.","Success");
			redirect("admin/ripf");

		}else{

			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/ripf");

		}

	}

	public function insertTopic(){

		$ripf_category = $this->input->post("ripf_category");
		$topic_name = $this->input->post("topic_name");
		$amount = $this->input->post("amount");
		$sid = $this->input->post("id");

		$idata = array(
			"ripf_category" => $ripf_category,
			"topic_name" => $topic_name,
			"amount" => $amount
		);

		if($sid){
			$id = $this->db->where("id",$sid)->update("tbl_ripf_topics",$idata);
		}else{
			$id = $this->db->insert("tbl_ripf_topics",$idata);
		}

		if($id){
			$status = ($sid) ? "Updated" : "Added";
			$this->secure->pnotify("success","Successfully $status.","Success");
			redirect("admin/ripf");
		}else{
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/ripf");
		}

	}

	public function delTopic($id){

		$d = $this->db->where(array("id"=>$id))->update("tbl_ripf_categories",array("deleted"=>1));

		if($d){

			$this->secure->pnotify("success","Successfully deleted.","Success");
			redirect("admin/ripf");

		}else{

			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/ripf");

		}

	}

	public function registration(){
		$category = $this->input->get('category');
		$event = $this->input->get('id');
		$type = $this->input->get('type');
			if($category){
				$this->db->where("event_category",$category);
			}
		   if($event){
		 	  $this->db->like("event_data",$event);
			 }
			 	if($type != "total"){
			$this->db->where("type","online");
		}
		$data["ripf_registrations"] = $this->db->order_by("id","desc")->get_where(" tbl_ripf_registrations",["participants >"=>0, "type"=>"online","registration_status"=>"active"])->result();
     //echo $this->db->last_query();die();
      	// participants count
	        if($category){
				$this->db->where("event_category",$category);
			}
		   if($event){
		 	  $this->db->like("event_data",$event);
			 }
			 	if($type != "total"){
			$this->db->where("type","online");
		}
		$data['participants_count'] = $this->db->select_sum("participants")->from('tbl_ripf_registrations')->get()->row();
// Total price
		if($category){
				$this->db->where("event_category",$category);
			}
		   if($event){
		 	  $this->db->like("event_data",$event);
			 }
			 	if($type != "total"){
			$this->db->where("type","online");
		}
	$data['total_amount'] = $this->db->select_sum("totalPrice")->from('tbl_ripf_registrations')->get()->row();
		$this->load->view("admin/ripf/ripfregistration", $data);
	}


	//offline ripfregistration//


	public function offline_registration(){
		$category = $this->input->get('category');
		$event = $this->input->get('id');
		$type = $this->input->get('type');
			if($category){
				$this->db->where("event_category",$category);
			}
		   if($event){
		 	  $this->db->like("event_data",$event);
			 }
			 	if($type != "total"){
			$this->db->where("type","offline");
		}
      $data["offline_registrations"] = $this->db->order_by("id","desc")->get_where(" tbl_ripf_registrations",["participants >"=>0, "type"=>"offline","registration_status"=>"active"])->result();
      		// participants count
	        if($category){
				$this->db->where("event_category",$category);
			}
		   if($event){
		 	  $this->db->like("event_data",$event);
			 }
			 	if($type != "total"){
			$this->db->where("type","offline");
		}
		$data['participants_count'] = $this->db->select_sum("participants")->from('tbl_ripf_registrations')->get()->row();
// Total price

		if($category){
				$this->db->where("event_category",$category);
			}
		   if($event){
		 	  $this->db->like("event_data",$event);
			 }
			 	if($type != "total"){
			$this->db->where("type","offline");
		}
	   $data['total_amount'] = $this->db->select_sum("totalPrice")->from('tbl_ripf_registrations')->get()->row();

        $this->load->view("admin/ripf/offline_ripfregistration", $data);

	}


	public function ripfview($id="",$event_category=""){
	
		$data["ripf_ata"] = $this->db->get_where("tbl_ripf_registrations",array("id" => $id ))->row();
        $this->load->view("admin/ripf/ripf_view",$data);
	}



	public function downloadpdf($id, $category){

		$drdata = $this->db->get_where("tbl_ripf_registrations",array("id"=>$id))->row();
	
		if($drdata){
			$data["ripf_data"] = $this->db->get_where("tbl_ripf_registrations",array("id"=>$id))->row();
		}else{
			$data["ripf_data"] = $this->db->get_where("tbl_temp_registrations",array("order_id"=>$id))->row();
		}
	$data["part"] = $this->db->get_where("tbl_ripf_participants",array("inst_id"=>$data["ripf_data"]->id))->result();
	$data["odata"] = $this->db->get_where("tbl_ripf_orders",array("order_id"=>$data["ripf_data"]->order_id))->row();

	    $this->load->helper('download');
	  //  $name = $category. '.pdf';
	   // force_download($name, $data);
	$this->load->view('admin/ripf_application',$data);
	}


	public function ripf_report(){
	$data["streams"] = $this->db->order_by("id","asc")->get_where("tbl_streams")->result();
	$data["ripf_category"] = $this->db->order_by("id","asc")->get_where("tbl_ripf_categories")->result();
	$data["topic"]= $this->db->order_by("id","asc")->group_by("topic_name")->get("tbl_ripf_topics")->result();


	$this->load->view('admin/ripf/ripf_report',$data);	
	}






}




