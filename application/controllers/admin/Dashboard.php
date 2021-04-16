<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		if(!$this->session->userdata['adminid'])
            {
                redirect('admin');
            }
	}
	
	public function index()
	{
		
		$this->load->view("admin/dashboard");
	}
	
	public function changePassword(){
		
		$this->load->view("admin/change_password");
		
	}
	
	public function updatePassword(){
		
		$aid = $this->session->userdata("adminid");
		
 		$opass=$this->input->post("old_pass",true);
 		$npass=$this->input->post("new_pass",true);
 		$rpass=$this->input->post("re_pass",true);
		
		$achk = $this->db->get_where("admins",array("UserId"=>$aid))->row();
		
		if($opass == $this->login_model->app_password_crypt($achk->User_Password,'d')){
			
			if($npass == $rpass){
				
				$data = array("User_Password"=>$this->login_model->app_password_crypt($npass,'e'));
				
				$this->db->set($data);
				$this->db->where("UserId",$aid);
				$u = $this->db->update("admins");
				
				if($u){
					
					$this->secure->pnotify("success","password updated successfully","success");
					redirect("admin/dashboard/changePassword");
				}else{
					$this->secure->pnotify("error","Error occured please try again","error");
					redirect("admin/dashboard/changePassword");
					
				}
				
			}else{
				
				$this->secure->pnotify("error","passwords not matched","error");
				redirect("admin/dashboard/changePassword");
				
			}
			
		}else{
			
			$this->secure->pnotify("error","Old password is incorrect","error");
			redirect("admin/dashboard/changePassword");
		}
		
	}
}
