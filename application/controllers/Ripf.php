<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Ripf extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function register($cid,$event){
		
		define("Institution",1);
		define("Individual_Faculty",2);
		define("Students",3);
		define("Industry",4);
		define("RD_Labs",5);
		define("Retired_Professional",6);
		
		$event_id = explode("~",$event)[1];
		$event_name = str_replace("-"," ",explode("~",$event)[0]);
		$data["edata"] = $this->db->get_where("tbl_schedule_dates",["id"=>$event_id])->row();
		$category = str_replace("-"," ",$cid);
		$data["cdata"] = $this->db->get_where("tbl_ripf_categories",["category_name"=>$category])->row();
		
		$this->load->view('ripf/ripfregistration',$data);
		
	}
	
	public function getPrice(){
		
		$topics = $this->input->post("topics");
		$category = $this->input->post("category");
		$caste = $this->input->post("caste");
		$physically_challenged = $this->input->post("physically_challenged");
		
		$discount = false;
		if(($caste == "SC") || ($caste == "ST") || ($caste == "EBC")){
			$discount = true;
		}
		if($physically_challenged == "Yes"){
			$discount = true;
		}
		
		$amount = 0;
		foreach($topics as $t){
			if($t == "all"){
				$amount = $this->db->get_where("tbl_ripf_categories",["id"=>$category])->row()->overall_discount_amount;
			}else{
				$amount += $this->db->get_where("tbl_ripf_topics",["topic_name"=>$t,"ripf_category"=>$category])->row()->amount;
			}
		}
		
		if($discount){
			$discount_amount = ($amount/100)*50;
			$total_amount = ($amount - $discount_amount);
		}else{
			$total_amount = $amount;
			$discount_amount = 0;
		}
		
		echo json_encode(["total"=>$total_amount,"discount"=>$discount_amount]);
		
	}
	
}
