<?php
error_reporting(0);

ob_clean();

$category = $this->uri->segment(5);  
date_default_timezone_set('Asia/Kolkata');

	$categories = json_decode($ripf_data->categories);
	$mds = json_decode($ripf_data->managementdetails);
	if(count($part) > 0){
		$participants = $this->db->get_where("tbl_ripf_participants",array("inst_id"=>$ripf_data->id))->result();

	}else{
		$participants = json_decode($ripf_data->participantsData);
	}
 
	$mpdf = new \mPDF('UTF-8', 'A4',30, 'dejavuserif');

	$html = '<!DOCTYPE html>
<html>
<head>
<style>
tr,td{

	font-size:16px;
	padding:5px;

}
table,td,th{
	border-collapse:collapse !important;
	border : 1px solid black;

}
</style>
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>';


	$html.= '<p style="text-align:center;font-size:22px"><strong>Organization Details</strong></p>
            <table class="table table-bordered">';
              if ($category == "Institution") { 
                $html.= '<tr>';
                $html.= '<td style="font-weight: bold;">Institution Name</td>';
                $html.= '<td>'.$ripf_data->institutionName.'</td>';
                $html.= '<td style="font-weight: bold;">Organization Mobile Number</td>';
                $html.= '<td>'.$ripf_data->institution_phone_number.'</td>';
                $html.= '<td style="font-weight: bold;">Organization Email Id</td>';
                $html.= '<td>'.$ripf_data->orgemail.'</td>';
                $html.= '</tr>';
              }
              if($category == "Students" || $category == "IndividualFaculty" || $category == "RetiredProfessional" ) { 
                 $html.= '<tr>';
                $html.='<td style="font-weight: bold;">Full Name</td>';
                $html.='<td>'.$ripf_data->ifsrp_fullName.'</td>';
                $html.='<td style="font-weight: bold;">Email Id</td>';
                $html.='<td> '.$ripf_data->ifsrp_emailId.'</td>';
                $html.='<td style="font-weight: bold;">Mobile Number</td>';
                $html.='<td>'.$ripf_data->ifsrp_mobileNumber.'</td>';
                 $html.= '</tr>';
              }
              if($category == "Industry") {
                 $html.= '<tr>';
                $html.='<td style="font-weight: bold;">Name Of The Company</td>';
                $html.='<td>'.$ripf_data->name_of_the_industry.'</td>';
                $html.='<td style="font-weight: bold;">Company Emai Id</td>';
                $html.='<td>'.$ripf_data->industry_email_id.'</td>';
                $html.='<td style="font-weight: bold;">Company mobile Number</td>';
                $html.='<td>'.$ripf_data->industry_phone_number.'</td>';
                 $html.= '</tr>';
              }
              if($category == "R&DLabs") { 
                $html.= '<tr>';
                $html.='<td style="font-weight: bold;">Name Of The Organization</td>';
                $html.='<td>'.$ripf_data->rd_name_of_the_organization.'</td>';
                $html.='<td style="font-weight: bold;">Organization Email Id</td>';
                $html.='<td>'.$ripf_data->rd_organization_email.'</td>';
                $html.='<td style="font-weight: bold;"> Organization Mobile Number</td>';
                $html.='<td>'.$ripf_data->rd_organization_phoneNumber.'</td>';
              }
              if($category == "Institution" || $category == "IndividualFaculty" || $category == "Students" || $category == "Industry" || $category == "RetiredProfessional" || $category == "R&DLabs") {
               $html.= '<tr>';
               $html.= '<td style="font-weight: bold;">Contact Person Name</td>';
               $html.= '<td>'.$ripf_data->cpname.'</td>';
               $html.= '<td style="font-weight: bold;">Contact Person Email</td>';
               $html.= '<td>'.$ripf_data->email.'</td>';
               $html.= '<td style="font-weight: bold;">Contact Person Designation</td>';
               $html.= '<td>'.$ripf_data->contact_person_designation.'</td>';
               $html.= '</tr>';
               $html.= '<tr>';
               $html.= '<td style="font-weight: bold;">Contact Person Department</td>';
               $html.= '<td>'.$ripf_data->contact_person_department.'</td>';
               $html.= '<td style="font-weight: bold;">Contact Person Mobile </td>';
               $html.= '<td>'.$ripf_data->mobile.'</td>';
              }
              if($category == "Institution" || $category == "IndividualFaculty" || $category == "Students" || $category == "Industry" || $category == "RetiredProfessional" || $category == "R&DLabs") {
               $html.='<td style="font-weight: bold;">Serial Number</td>';
               $html.='<td>'.$ripf_data->serial_number.'</td>';
               $html.='</tr>';
              }
           
              if($category == "Institution" || $category == "Students" || $category == "Industry" || $category == "RetiredProfessional" || $category == "R&DLabs" || $category == "IndividualFaculty" ) {
              $html.='<tr>';
              $html.='<td style="font-weight: bold;">Reservation category</td>';
              $html.='<td>'.$ripf_data->caste_type.'</td>';
             }

             if($category == "Institution" || $category == "IndividualFaculty" || $category == "Students" || $category == "R&DLabs"  || $category == "Industry" ){
              $html.='<td style="font-weight: bold;">Type Of Institution</td>';
             
              $html.='<td></td>';
              }
              if ($category == "Students") {
              $html.='<td style="font-weight: bold;">Course Specialization</td>';
              $html.='<td> '.$ripf_data->student_course_specialization.'</td>';
              }
              if($category == "IndividualFaculty") {
              $html.='<td style="font-weight: bold;">Name Of the Institution(Working) </td>';
              $html.='<td colspan="3"> '.nl2br($ripf_data->if_nameoftheInstitution_working).'</td>';
              $html.='</tr>';
               }
              if($category == "Institution" || $category == "IndividualFaculty" || $category == "Students" || $category == "R&DLabs"  || $category == "Industry" ){
              $html.= '<tr>';
              $html.= '<td style="font-weight: bold;">Website</td>';
              $html.= '<td>'.$ripf_data->website.'</td>';
              } 
              if($category == "Institution" || $category == "IndividualFaculty" || $category == "Students" || $category == "Industry" || $category == "RetiredProfessional" || $category == "R&DLabs") {
              $html.='<td style="font-weight: bold;">Stream</td>';
              $html.='<td>'.$ripf_data->contact_person_stream.'</td>';
              }
              if($category == "Institution" || $category == "IndividualFaculty" || $category == "Students" || $category == "Industry" || $category == "R&DLabs"  ||  $category == "RetiredProfessional"  ){
              $html.='<td style="font-weight: bold;">Address</td>';
              $html.='<td colspan="3">'.nl2br($ripf_data->address).'</td>';
              $html.='</tr>';
              }
                 if($category == "RetiredProfessional") {
              $html.='<tr>
                      <td style="font-weight: bold;">Organization Time Retirement </td>';
              $html.='<td colspan="3">'.nl2br($ripf_data->rp_name_organization_retirement).'</td>';
              $html.='<td style="font-weight: bold;">Designation Time Retirement </td>';
              $html.='<td colspan="3">'.nl2br($ripf_data->rp_designation_Retirement).'</td>';
              $html.='</tr>';
              }
              if($category == "Institution") {
              $html.='<tr>';
              $categories = $ripf_data->categories;
              $html.='<td style="font-weight: bold;">Categories</td>';
              $html.='<td>'.$categories.'</td>';
              $html.='</td>';
                       $mds = $ripf_data->managementdetails;
              $html.='<td style="font-weight: bold;">Management Details</td>';
              $html.= '<td>'.$mds.'</td>';
               $html.='<td style="font-weight: bold;"></td>';
              $html.='<td></td>';
              $html.= '</tr>';
              }
              $part = $this->db->get_where("tbl_ripf_participants",array("program"=>$ripf_data->topic))->result(); //echo $this->db->last_query(); 
              if(count($part) > 0){
              $participants = $this->db->get_where("tbl_ripf_participants",array("program"=>$ripf_data->topic))->result(); 
              }else{
                $participants = json_decode($ripf_data->participantsData);
              }

               $html.='<tr>';
              $html.='<td style="font-weight: bold;">Participants</td>';
              $html.='<td colspan="6">';
                $html.='<table class="table table-bordered">';
                  $html.='<thead>';
                    $html.='<tr>';
                      $html.='<td>S no</td>';
                      $html.='<td>Name</td>';
                      $html.='<td>Email</td>';
                      $html.='<td>Mobile</td>';
                      $html.='<td>Designation</td>';
                      $html.='<td>Department</td>';
                       $html.='<td>Topic</td>';
                    $html.='</tr>';
                  $html.='</thead>';
                  $html.='<tbody>';
                   $i = 1;
                    foreach($participants as $p){
                        $html.='<tr>';
                        $html.='<td> '.$i.'</td>';
                        $html.='<td> '.$p->pname.' </td>';
                        $html.='<td> '.$p->pemail.' </td>';
                        $html.='<td> '.$p->pmobile.' </td>';
                        $html.='<td> '.$p->designation.' </td>';
                        $html.='<td> '.$p->department.' </td>';
                          $html.='<td> '.$p->program.' </td>';
                        $html.='</tr>';
                   $i++;
                    }
              $html.='</tbody>
                </table>
              </td>
            </tr>
          <tr>';
         $odata = $this->db->get_where("tbl_ripf_orders",array("order_id"=>$ripf_data->order_id))->row();
           $html.='<td style="font-weight: bold;">Payment Details</td>';
         $html.='<td colspan="6">';
           $html.='<table class="table table-bordered">';
             $html.='<thead>';
               $html.='<tr>';
                 $html.='<td>Order ID</td>';
                 $html.='<td>Amount</td>';
                 $html.='<td>Txn ID</td>';
                 $html.='<td>Payment Status</td>';
                 $html.='<td>Payment Mode</td>';
                 if(count($part) > 0){
                    $html.='<td>Payment Date</td>';
                 }
                 $html.=' </tr>';
                  $html.=' </thead>';
                      $html.=' <tbody>';
                      $html.=' <tr>';
                        $html.=' <td> '.$odata->order_id.' </td>';
                        $html.=' <td><i class="fa fa-rupee"></i>  '.$odata->total_amount.' </td>';
                        $html.=' <td>   '.$odata->txn_id.' </td>';
                        $html.=' <td> ' .$odata->payment_status.' </td>';
                        $html.=' <td>  '.$odata->payment_mode.' </td>';
                       if(count($part) > 0){
                      $html.='<td> '.$odata->payment_date.' </td>';
                      }
                     $html.='</tr>';
                    $html.='</tbody>';
                  $html.='</table>';
                $html.='</td>';
              $html.='</tr>';
            $html.='</tbody>';
          $html.='</table>';
        $html.='</body>';
      $html.='</html>';


 //echo $html;
// exit();
//echo $category;

	  $mpdf->WriteHTML($html);
	  $mpdf->Output($category.".pdf","I");

?>
