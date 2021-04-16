<?php $this->load->view("admin/back_common/header"); ?>

	<!-- Row -->
<div class="row">

	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-default card-view pa-0 bg-gradient">
			<div class="panel-wrapper collapse in">
				<a href="<? echo base_url('admin/users') ?>"><div class="panel-body pa-0">
					<div class="sm-data-box">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
									<span class="weight-500 uppercase-font block font-13 txt-light">USERS</span><br>
									<span class="weight-600 uppercase-font block font-13 txt-light"><? echo $this->db->get_where("tbl_registrations")->num_rows(); ?></span>									
								</div>
								<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
									<i class="icon-people  data-right-rep-icon txt-light"></i>
								</div>
							</div>
						</div>
					</div>
				</div></a>
			</div>
		</div>
	</div>
	
	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-default card-view pa-0 bg-gradient3">
			<div class="panel-wrapper collapse in">
				<a href="<? echo base_url('admin/users/payments') ?>"><div class="panel-body pa-0">
					<div class="sm-data-box">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
									<span class="weight-500 uppercase-font block font-13 txt-light">PAYMENTS</span><br>
									<span class="weight-600 uppercase-font block font-13 txt-light"><? echo $this->db->get_where("tbl_orders",array("payment_status"=>"Success"))->num_rows(); ?></span>									
								</div>
								<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
									<i class="icon-wallet  data-right-rep-icon txt-light"></i>
								</div>
							</div>
						</div>
					</div>
				</div></a>
			</div>
		</div>
	</div>
	
	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-default card-view pa-0 bg-gradient1">
			<div class="panel-wrapper collapse in">
				<a href="<? echo base_url('admin/users/register') ?>"><div class="panel-body pa-0">
					<div class="sm-data-box">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
									<span class="weight-500 uppercase-font block font-11 txt-light">OFFLINE REGISTRATION</span><br>
<!--									<span class="weight-600 uppercase-font block font-12 txt-light"><? //echo $this->db->get_where("tbl_orders",array("payment_status"=>"Success"))->num_rows(); ?></span>									-->
								</div>
								<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
									<i class="fa fa-wpforms data-right-rep-icon txt-light"></i>
								</div>
							</div>
						</div>
					</div>
				</div></a>
			</div>
		</div>
	</div>
	
	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-default card-view pa-0 bg-gradient2">
			<div class="panel-wrapper collapse in">
				<a href="<? echo base_url('admin/speakers') ?>"><div class="panel-body pa-0">
					<div class="sm-data-box">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
									<span class="weight-500 uppercase-font block font-13 txt-light">SPEAKERS</span><br>
									<span class="weight-600 uppercase-font block font-13 txt-light"><? echo $this->db->get_where("tbl_speakers")->num_rows(); ?></span>									
								</div>
								<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
									<i class="fa fa-list  data-right-rep-icon txt-light"></i>
								</div>
							</div>
						</div>
					</div>
				</div></a>
			</div>
		</div>
	</div>

</div>


<style>
	#header-content {
		position: absolute;
		bottom: 0;
		left: 0;
		padding-bottom: 35px;
		width: 100%
	}
	
	.marquee:hover {
		animation-play-state: paused
	}
</style>


	<!-- /Row -->
<? $this->load->view( "admin/back_common/footer" ); ?>