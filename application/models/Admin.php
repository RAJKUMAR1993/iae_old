<?php

defined("BASEPATH") OR exit("No direct script access allow");


class Admin extends CI_Model{
	
	public function __construct(){
		
		parent::__construct();

	}
	
	function moneyFormatIndia($num){

		$explrestunits = "" ;
		$num = preg_replace('/,+/', '', $num);
		$words = explode(".", $num);
		$des = "00";
		if(count($words)<=2){
			$num=$words[0];
			if(count($words)>=2){$des=$words[1];}
			if(strlen($des)<2){$des="$des";}else{$des=substr($des,0,2);}
		}
		if(strlen($num)>3){
			$lastthree = substr($num, strlen($num)-3, strlen($num));
			$restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
			$restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
			$expunit = str_split($restunits, 2);
			for($i=0; $i<sizeof($expunit); $i++){
				// creates each of the 2's group and adds a comma to the end
				if($i==0)
				{
					$explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
				}else{
					$explrestunits .= $expunit[$i].",";
				}
			}
			$thecash = $explrestunits.$lastthree;
		} else {
			$thecash = $num;
		}
		return "$thecash"; // writes the final format where $currency is the currency symbol.

	}

	public function insertoption($option_name,$option_value){
		
		$on=$this->db->get_where("tbl_options",array('option_name'=>$option_name));
		$os=$on->num_rows();
		
		if($os=='0'){
			
			$data=array("option_name"=>$option_name,
					   "option_value"=>$option_value);
			
			$oss=$this->db->insert("tbl_options",$data);
			
			if($oss){
				return true;
			}else{
				return false;
			}
			
		}
		
		if($os='1'){
			
			$data=array("option_name"=>$option_name,
					   "option_value"=>$option_value);
			
			$this->db->set($data);
			$this->db->where("option_name",$option_name);
			$oss=$this->db->update("tbl_options");
			
			if($oss){
				return true;
			}else{
				return false;
			}
		}		
		
	}
	
	
	public function get_option($option_name){
		
		$option=$this->db->get_where("tbl_options",array("option_name"=>$option_name));
		$o=$option->row();
		if($o){
		
		return $o->option_value;	
		}else{
			$oo='0';
		return $oo;
		}
	}
	
	public function getGeo($ip){
		$country = '';
		$city = '';
		$geoloc = '';
		if($ip!=''){
			$geolocation = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=".$ip));//http://api.ipstack.com/".$ip."?access_key=63f243020216c5c0187bb70c88d085c3
			$country = $geolocation['geoplugin_city'];
			$city = $geolocation['geoplugin_region'];
			if($country!=''){$geoloc = $country;}
			if($city!=''){$geoloc = $geoloc.', '.$city;}
		}
		return $geoloc;
	}
	
	public function generateSerialnumber($year=""){
		$icount = $this->db->get_where("tbl_registrations")->num_rows(); 
		$pcount = $this->db->get_where("tbl_participants")->num_rows(); 
		$tcount = ($icount+$pcount+1);
		$uyear = ($year != "") ? $year : date("Y");
		return str_pad($tcount, 4, "0", STR_PAD_LEFT)."/".$uyear;
		
	}

}