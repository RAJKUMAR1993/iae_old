<?php $this->load->view("admin/back_common/header");
$getyear = $this->input->get("year");

?>

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<?php 		$online = $this->db->order_by("id","desc")->get_where("tbl_registrations",["participants >"=>0,"type"=>"online"])->row();
 ?>
			<h5 class="txt-dark">List of <?php // echo $online->type;?> RIPF </h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>

				<li class="active"><span>Ripf Registered Users</span></li>
			</ol>
		</div>
					<!-- /Breadcrumb -->
	</div>

			<!-- Row -->
				<div class="row">

              		<div class="row">
             			<form  id="" action="">
						 <div class="form-group col-md-3">
								<select class="form-control " name="category">
									<option value="">Select Category</option>
									<? $cat_name = $this->db->order_by("id","asc")->group_by("category_name")->get("tbl_ripf_categories")->result();
									 $ctgry = $this->input->get("category");
										foreach($cat_name as $categoery){ ?>
											  <option <?php if($ctgry==$categoery->category_name){ echo 'selected';}?> value="<?php echo $categoery->category_name;?>"><?php echo $categoery->category_name;?></option>

										<? } ?>
								</select>
							</div>
							 <div class="form-group col-md-6">
								<select class="form-control " name="id">
									<option value="">Select Event</option>
									<? $evnt_name = $this->db->order_by("id","desc")->group_by("event_name")->get(" tbl_schedule_dates")->result();
									 $name_event = $this->input->get("id");
										foreach($evnt_name as $event){ ?>
											  <option <?php if($name_event==$event->id){ echo 'selected';}?> value="<?php echo $event->id;?>"><?php echo $event->event_name;?></option>

										<? } ?>
								</select>
							</div>



            				<div class="col-md-3">

                                        <button type="submit" class="btn btn-primary mb-2">Submit</button>

            				</div>
<!-- 							<input type="hidden" name="category" value="<?php echo $this->input->get('category'); ?>" />
 -->             			</form>
             		</div>

              		<div class="row">

						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="panel panel-default card-view pa-0 bg-gradient">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pa-0">
										<div class="sm-data-box">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="weight-500 uppercase-font block font-13 txt-light">No'of Institutions Registered</span><br>
														<span class="weight-600 uppercase-font block font-18 txt-light"><?
															// if($getyear){
															// 	echo $this->db->get_where("tbl_registrations",["YEAR(created_date)"=>$getyear])->num_rows();
															// }else{
															// 	echo $this->db->get_where("tbl_registrations")->num_rows();
															// }
															echo count($ripf_registrations);
															?></span>
													</div>
													<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
														<i class="fa fa-university  data-right-rep-icon txt-light"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="panel panel-default card-view pa-0 bg-gradient1">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pa-0">
										<div class="sm-data-box">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="weight-500 uppercase-font block font-13 txt-light">Number of Participants</span><br>
														<span class="weight-600 uppercase-font block font-18 txt-light"><?

															//$pcheckYear = ($getyear != "") ? "where YEAR(r.created_date)=$getyear" : '';
														//	echo ($this->db->query("SELECT * FROM tbl_participants p JOIN tbl_registrations r ON r.id=p.inst_id $pcheckYear ORDER BY p.inst_id DESC")->num_rows())+count($alist);
														//echo array_sum($tamount);
												echo $participants_count->participants+count($ripf_registrations);
														?></span>

													</div>
													<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
														<i class="icon-people  data-right-rep-icon txt-light"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="panel panel-default card-view pa-0 bg-gradient3">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pa-0">
										<div class="sm-data-box">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="weight-500 uppercase-font block font-13 txt-light">Total Amount Received</span><br>
														<span class="weight-600 uppercase-font block font-18 txt-light"><i class="fa fa-rupee"></i> <?

												echo $this->admin->moneyFormatIndia($total_amount->totalPrice);
															// $checkYear = ($getyear != "") ? "where YEAR(created_date)=$getyear" : '';
															//echo number_format($this->db->query("SELECT SUM(totalPrice) as total FROM tbl_registrations $checkYear")->row()->total,2); ?></span>
													</div>
													<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
														<i class="icon-people  data-right-rep-icon txt-light"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

             		<?php $category_name = $this->input->get("category") ?>

               		<div class="col-lg-12 col-xs-12" >
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div  class="table-responsive" style="padding:20px;">
										<table class="table table-hover display  pb-30" id="myTable">
											<thead>
											<?php if($category_name == "Institution" || $category_name == "Individual Faculty"  || $category_name == "Students" || $category_name == "Industry" || $category_name == "R&D Labs"  ||  $category_name == "Retired Professional"  ){ ?>
													<th>S.no</th>
												<?php } ?>
													<?php if($category_name == "Institution" || $category_name == "Individual Faculty"  || $category_name == "Students" || $category_name == "Industry" || $category_name == "R&D Labs"  ||  $category_name == "Retired Professional"  ){ ?>
													<th>Action</th>
												<?php } ?>
													<?php if($category_name == "Institution" || $category_name == "Individual Faculty"  || $category_name == "Students" || $category_name == "Industry" || $category_name == "R&D Labs"  ||  $category_name == "Retired Professional"  ){ ?>
													<th>Serial Number</th>
												<?php } ?>
												<?php if($category_name == "Institution"){ ?>
												<th>Name of the Institution</th>
												<th>Organization Mobile Number</th>
												<th>Organization Email ID</th>
										     	<?php } ?>
										     	<?php if($category_name == "Retired Professional") { ?>
												   <th>Name</th>
											     <?php } ?>
												<?php if($category_name == "Retired Professional") { ?>
												   <th>Email</th>
												<?php } ?>
												<?php if($category_name == "R&D Labs") { ?>
													<th>Name of the Organization</th>
												<?php } ?>
												 <?php if($category_name == "R&D Labs") { ?>
													<th>Organization Email ID </th>
												<?php } ?>
												 <?php if($category_name == "R&D Labs") { ?>
													<th>Organization Phone Number</th>
												<?php } ?>
											    <?php if($category_name == "Individual Faculty"  || $category_name == "Students") {  ?>
												    <th>Full Name</th>
											    <?php } ?>
											    <?php if($category_name == "Individual Faculty"  || $category_name == "Students"){  ?>
												    <th>Email Id</th>
											    <?php } ?>
											    <?php if($category_name == "Individual Faculty" ||$category_name == "Students" ||$category_name == "Retired Professional") {?>
												    <th>Mobile Number</th>
											    <?php } ?>
											    <?php  if($category_name == "Industry") { ?>
												    <th>Name of the Company </th>
												<?php } ?>
												<?php if($category_name == "Industry") { ?>
												   <th>Email ID of Company </th>
											    <?php } ?>
											    <?php if($category_name == "Industry") { ?>
												   <th>Company & Industry Phone Number</th>
											    <?php } ?>
										     	<?php if($category_name == "Institution" || $category_name == "Students"  || $category_name == "Industry" || $category_name == "R&D Labs"){ ?>
												    <th>Website</th>
											    <?php } ?>
												<?php if($category_name == "Institution" || $category_name == "Individual Faculty"  || $category_name == "Students" || $category_name == "Industry" || $category_name == "R&D Labs"  ||  $category_name == "Retired Professional"  ){ ?>
												    <th>Address</th>
											    <?php } ?>
											    	<?php if($category_name == "Institution" || $category_name == "Individual Faculty"  || $category_name == "Students" || $category_name == "Industry" || $category_name == "R&D Labs"  ||  $category_name == "Retired Professional"  ){ ?>
													<th>Number of Participants</th>
												<?php }  ?>
												<?php if($category_name == "Institution" || $category_name == "Individual Faculty"  || $category_name == "Students" || $category_name == "Industry" || $category_name == "R&D Labs"  ||  $category_name == "Retired Professional"  ){ ?>
													<th>Serial Number</th>
												<?php }  ?>
												<?php if($category_name == "Institution" || $category_name == "Students"  || $category_name == "Individual Faculty"  || $category_name == "Industry" || $category_name == "R&D Labs" ||  $category_name == "Retired Professional") { ?>
													<th>Name of the Contact Person</th>
													<th>Contact Person Mobile No.</th>
													<th>Contact Person Email ID</th>
													<th>Contact Person Designation</th>
													<th>Contact Person Department</th>
												<?php } ?>
												<?php if($category_name == "Institution" || $category_name == "Individual Faculty"  || $category_name == "Students" || $category_name == "Industry" || $category_name == "R&D Labs"  || $category_name == "	Retired Professional" ){ ?>
												    <th>Stream</th>
											    <?php } ?>
											  	<?php if($category_name == "Institution" || $category_name == "Industry" || $category_name == "R&D Labs"){  ?>
												    <th>Management Details</th>
											    <?php } ?>
												<?php if($category_name == "Institution"){  ?>
												   <th>Type of Institution</th>
											    <?php } ?>
											    <?php if($category_name == "Individual Faculty") { ?>
												   <th>Designation</th>
											    <?php } ?>
											       <?php if($category_name == "Individual Faculty"){  ?>
												   <th>Department</th>
											    <?php } ?>
											     <?php if($category_name == "Individual Faculty") { ?>
												    <th>Name of the Institution (If Working)</th>
											     <?php } ?>
											    <?php if($category_name == "Students"){  ?>
												    <th>Course & Specialization </th>
											    <?php } ?>
												<?php if($category_name == "Retired Professional") { ?>
												    <th>Designation at the time Retirement</th>
												<?php } ?>
												<?php if($category_name == "Retired Professional"){  ?>
												   <th>Name of the Organization at the time Retirement</th>
												<?php } ?>

												<?php if($category_name == "Institution" || $category_name == "Individual Faculty"  || $category_name == "Students" || $category_name == "Industry" || $category_name == "R&D Labs"  ||  $category_name == "Retired Professional"  ){ ?>
													<th>Reservation Category</th>
												<?php }  ?>
												<?php if($category_name == "Institution" || $category_name == "Individual Faculty"  || $category_name == "Students" || $category_name == "Industry" || $category_name == "R&D Labs"  ||  $category_name == "Retired Professional"  ){ ?>
													<th>Physically Challenged</th>
												<?php }  ?>
												<?php if($category_name == "Institution" || $category_name == "Individual Faculty"  || $category_name == "Students" || $category_name == "Industry" || $category_name == "R&D Labs"  ||  $category_name == "Retired Professional"  ){ ?>
								      				<th>Amount Paid</th>
								      			<?php }  ?>
								      			<?php if($category_name == "Institution" || $category_name == "Individual Faculty"  || $category_name == "Students" || $category_name == "Industry" || $category_name == "R&D Labs"  ||  $category_name == "Retired Professional"  ){ ?>
													<th>Discount Amount</th>
												<?php }  ?>
												<?php if($category_name == "Institution" || $category_name == "Individual Faculty"  || $category_name == "Students" || $category_name == "Industry" || $category_name == "R&D Labs"  ||  $category_name == "Retired Professional"  ){ ?>
													<th>Date of Transaction</th>
												<?php }  ?>
												<?php if($category_name == "Institution" || $category_name == "Individual Faculty"  || $category_name == "Students" || $category_name == "Industry" || $category_name == "R&D Labs"  ||  $category_name == "Retired Professional"  ){ ?>
													<th>Transaction ID</th>
												<?php }  ?>
											    <?php if($category_name == "Institution" || $category_name == "Individual Faculty"  || $category_name == "Students" || $category_name == "Industry" || $category_name == "R&D Labs"  ||  $category_name == "Retired Professional"  ){ ?>
													<th>Payment Reference ID</th>
												<?php }  ?>
											</thead>
											<tbody>
											<?php
												$key = 1;

					   							$tamount = array();
					   							$tpar = array();
					                         
												foreach ($offline_registrations as $row) {

	                                             $sdata = json_decode($row->event_data);

													$odata = $this->db->get_where("tbl_ripf_orders",array("order_id"=>$row->order_id))->row();
													if($odata->payment_type == "offline"){
														$pchk = [];

										     	?>
										     	<tr>
												 <?php if($category_name == "Institution" || $category_name == "Individual Faculty"  || $category_name == "Students" || $category_name == "Industry" || $category_name == "R&D Labs"  || $category_name == "	Retired Professional" ){ ?>

										     		<td><? echo (count($pchk) == 0) ? $key : "";?></td>
													<td><? if(count($pchk) == 0){ ?>
										 <?php //echo base_url('ripf/register/').str_replace(" ","-",$e->category_name)."/".$event
									 $str = preg_replace('@((https?://)?([-\w]+\.[-\w\.]+)+\w(:\d+)?(/([-\w/_\.~]*(\?\S+)?)?)*)@');?>
																	  
													<a href="<? echo base_url("admin/ripf/ripfview/").$row->id.'/' .str_replace(" ", $str,$row->event_category) ;?>"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
													<? } ?>
													    <td><? echo (count($pchk) == 0) ? $row->serial_number : "";?></td>
														<?php } ?>
													<? if($category_name == "Institution"){ ?>
														<td><? echo (count($pchk) == 0) ? $row->institutionName : "";?></td>
														<td><? echo (count($pchk) == 0) ? $row->institution_phone_number : "";?></td>
														<td><? echo (count($pchk) == 0) ? $row->orgemail : "";?></td>
													<?php } ?>
													<? if($category_name == "Individual Faculty" ||$category_name == "Students" ||$category_name == "Retired Professional") {?>
													<td><? echo (count($pchk) == 0) ? $row->ifsrp_fullName : "";?></td>
													<td><? echo (count($pchk) == 0) ? $row->ifsrp_emailId : "";?></td>
													<td><? echo (count($pchk) == 0) ? $row->ifsrp_mobileNumber : "";?></td>
												<?php } ?>
												<? if($category_name == "Industry") {?>
												<td><? echo (count($pchk) == 0) ? $row->name_of_the_industry : "";?></td>
												<td><? echo (count($pchk) == 0) ? $row->industry_email_id : "";?></td>
												<td><? echo (count($pchk) == 0) ? $row->industry_phone_number : "";?></td>
											<?php } ?>
											<? if($category_name == "R&D Labs") { ?>
												<td><? echo (count($pchk) == 0) ? $row->rd_name_of_the_organization : "";?></td>
												<td><? echo (count($pchk) == 0) ? $row->rd_organization_email : "";?></td>
												<td><? echo (count($pchk) == 0) ? $row->rd_organization_phoneNumber : "";?></td>
											<?php } ?>
											<? if($category_name == "Institution" || $category_name == "Students"  || $category_name == "Industry" ||  $category_name == "R&D Labs" ){ ?>
												<td>
													<? echo (count($pchk) == 0) ? nl2br($row->website) : "";?>
												</td>
											<?php } ?>
											<? if($category_name == "Institution" || $category_name == "Individual Faculty"  || $category_name == "Students" || $category_name == "Industry" || $category_name == "R&D Labs"  ||  $category_name == "Retired Professional"  ){ ?>
												<td><? echo (count($pchk) == 0) ? nl2br($row->address) : "";?></td>
											 <?php } ?>
											 <?php if($category_name == "Institution" || $category_name == "Individual Faculty"  || $category_name == "Students" || $category_name == "Industry" || $category_name == "R&D Labs"  || $category_name == "	Retired Professional" ){ ?>
											 <td><? echo (count($pchk) == 0) ? $row->participants : "";?></td>
                                            <?php } ?>
											<? if($category_name == "Institution" || $category_name == "Students"  || $category_name == "Individual Faculty"  || $category_name == "Industry" || $category_name == "R&D Labs" ||  $category_name == "Retired Professional"  ) { ?>
                                                   <td><? //echo (count($pchk) == 0) ? $row->serial_number : "";?></td>
												<td><? //echo (count($pchk) == 0) ? $row->cpname : "";?></td>
												<td><?// echo (count($pchk) == 0) ? $row->mobile : "";?></td>
												<td><? //echo (count($pchk) == 0) ? $row->email : "";?></td>
												<td>
											     <? //echo (count($pchk) == 0) ? $row->contact_person_designation : "";?></td>
												<td>
												  <? //echo (count($pchk) == 0) ? $row->contact_person_department : "";?></td>

											<?php } ?>

													<? if($category_name == "Institution" || $category_name == "Individual Faculty"  || $category_name == "Students" || $category_name == "Industry" || $category_name == "R&D Labs"  || $category_name == "	Retired Professional" ){ ?>
																 <td><? echo (count($pchk) == 0) ? $row->contact_person_stream : "";?></td>
													<?php } ?>
													<? if($category_name == "Students" ){ ?>
																 <td><? echo (count($pchk) == 0) ? $row->student_course_specialization : "";?></td>
													<?php } ?>
													<? if($category_name == "Individual Faculty") { ?>
														<td><? echo (count($pchk) == 0) ? $row->contact_person_designation : "";?></td>
														<td><? echo (count($pchk) == 0) ? $row->contact_person_department : "";?>
														<td><? echo (count($pchk) == 0) ? $row->if_nameoftheInstitution_working : "";?></td>
													 <?php } ?>
													<? if($category_name == "Institution" || $category_name == "Industry" || $category_name == "R&D Labs"){  ?>
														 <td><? echo (count($pchk) == 0) ? $row->managementdetails : "";?></td>
													<?php } ?>
													<? if($category_name == "Institution"){  ?>
														<td><? echo (count($pchk) == 0) ? $row->institution_type : "";?></td>
													<?php }?>
													<?php if($category_name == "Institution" || $category_name == "Individual Faculty"  || $category_name == "Students" || $category_name == "Industry" || $category_name == "R&D Labs"  || $category_name == "	Retired Professional" ){ ?>
														<td><? echo (count($pchk) == 0) ? $row->caste_type : "";?></td>
														<?php } ?>
														<? if($category_name == "Retired Professional"  ){ ?>
															<td><? echo (count($pchk) == 0) ? nl2br($row->rp_designation_Retirement) : "";?></td>
														 <?php } ?>
														 <? if($category_name == "Retired Professional"  ){ ?>
															 <td><? echo (count($pchk) == 0) ? nl2br($row->rp_name_organization_retirement) : "";?></td>
															<?php } ?>
															<?php if($category_name == "Institution" || $category_name == "Individual Faculty"  || $category_name == "Students" || $category_name == "Industry" || $category_name == "R&D Labs"  || $category_name == "	Retired Professional" ){ ?>
														<td><? echo (count($pchk) == 0) ? $row->physically_challenged : "";?></td>
 	                                                   <td><? echo (count($pchk) == 0) ? '<i class="fa fa-rupee"></i> '.$odata->total_amount : "";?></td>
 	                                                   <td><? echo (count($pchk) == 0) ? '<i class="fa fa-rupee"></i> '.$discount_amount : "";?></td>
													  <td><? echo (count($pchk) == 0) ? date("d-M-Y",strtotime($odata->payment_date)) : "";?></td>
													  <td><? echo (count($pchk) == 0) ? $odata->order_id : "";?></td>
													  <td><? echo (count($pchk) == 0) ? $odata->txn_id : "";?></td>
                                                    <?php } ?>
                                                    <?php
                                                      $part = $this->db->get_where("tbl_ripf_participants",array("inst_id"=>$row->id))->result();
													//	echo "<pre/>";print_r($part);
														$tamount[] = $odata->total_amount;
														$tpar[] = $row->participants;
													     foreach($part as $pc => $p){
											        ?>
											        <tr>

												         <td></td>
												         <td></td>
												         <td></td>
												         <td></td>
												         <td></td>
												         <td></td>
												         <td></td>
																 <td></td>

												        <td>Participant <? echo $pc+1; ?>:</td>
																<td><? echo $p->serial_number ?></td>
																<td><? echo $p->pname ?></td>
																<td><? echo $p->pmobile ?></td>
																<td><? echo $p->pemail ?></td>
																<td><? echo $p->designation ?></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
												</tr>
											    <?
													$pchk[] = $p->pname;

													} $key++;
												  }
												}
											
												?>


											</tbody>

											<tfoot>
												<tr>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th style="font-size: 14px" class="totalUsers"><strong><? echo array_sum($tpar); ?></strong></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th style="font-size: 14px" colspan="2"><strong><i class="fa fa-rupee"></i> <? echo $this->admin->moneyFormatIndia(array_sum($tamount)); ?></strong></th>
													<th></th>
													<th></th>
													<th></th>
												</tr>
											</tfoot>
										</table>



								</div>
							</div>
						</div>

					</div>
				</div>

				<!-- /Row -->
<? $this->load->view( "admin/back_common/footer" ); ?>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>


<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable({
			dom: 'Bfrtip',
			buttons: [
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
	//            'pdfHtml5'
			],
			"order": false,
			"pageLength" : 100
		});
	});
</script>


<script type="text/javascript">

	$(".changeYear").change(function(){

		$("#changeYear").submit();

	})

</script>
