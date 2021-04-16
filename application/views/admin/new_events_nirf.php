	<?php $this->load->view("admin/back_common/header"); ?>

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark text-bold">List of NIRF</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li class="active"><span>Nirf </span></li>
			</ol>
		</div>
					<!-- /Breadcrumb -->
	</div>	
			
			<!-- Row -->
				<div class="row">
               		<div class="col-lg-12 col-xs-12" >
						<div class="panel panel-default card-view pa-0">
						
							<div class="panel-wrapper collapse in">
						       <div class="row">
								   <div class="col-md-10">
								   </div>
								   <div class="col-md-2 md-5">
								      <a href="<? echo base_url('admin/schedule/add_edit_nirf') ?>" class="btn btn-info ">Add Nirf</a>
								   </div>
								</div> 
						         
						         
							
								<div class="table-responsive" style="padding:20px;">
									
										<table class="table table-hover display  pb-30" id="myTable">
											<thead>
												<th>S.No</th>
												<th>Event Name</th>
												<th>Action</th>
											</thead>
											<tbody>
											<?
												$key = 1;
					   
												foreach ($events_nirf as $row) { 
													$events = $this->db->get_where("tbl_schedule_dates", array("id"=>$row->event_id))->row()->event_name; 
											?>
												<tr>
													<td><? echo $key;?></td>
													<td><? echo $events ?></td>
													 <td><a href="<? echo base_url("admin/schedule/add_edit_event/").$row->id?>"><i class="fa fa-edit"></i>
													<a href="<?php echo base_url("admin/schedule/del_new_nirf/").$row->id ?>" data-toggle="tooltip" data-original-title="Delete" onClick="return confirm('Are you sure want to delete')"><i class="fa fa-trash" aria-hidden="true"></a></td>
												</tr>
											<? $key++;}?>
											</tbody>
										</table>
									
									
								</div>
							</div>
						</div>
							
					</div>
				</div>
	



  <!-- /Row -->
<? $this->load->view( "admin/back_common/footer" ); ?>

<script>
	$("#myTable").dataTable();
</script>











