<? front_header() ?>
  

<style>.part-log{background:#fff; padding:20px 0px; box-shadow: -1px 7px 21px 0px rgba(0,0,0,0.33);
-webkit-box-shadow: -1px 7px 21px 0px rgba(0,0,0,0.33);
-moz-box-shadow: -1px 7px 21px 0px rgba(0,0,0,0.33);
}    </style>

  <!-- [/MAIN-HEADING]
 ============================================================================================================================-->
  <section class="main-heading" id="home">
 	<div class="baner"> <!--<img src="<? echo base_url('assets/') ?>images/inbanner.jpg" class="img-responsive">--></div> 
  </section>
  
  <!-- [/MAIN-HEADING]
 ============================================================================================================================--> 
  
  <!-- [ABOUT US]
 ============================================================================================================================-->
  <section class="white-background black" id="inpage" style="margin-top: 80px;background-image: url('<? echo base_url() ?>assets/images/bglogin_banner.jpg');">
    <div class="container" style="">
      <div class="row">
        <div class="col-md-6 col-md-offset-3   black">

<div class="part-log">



<!--          <h3 class="text-center">Awareness Workshop<br><strong style="font-size: 24px">NIRF INDIA RANKINGS - 2021</strong><br>For Higher Educational Institutions</h3><br>-->

          <h6 class="title" align="center" style="font-size: 22px">Login</h6>
<!--          <h6 class="title" align="center" style="font-size: 22px">Join Webinar</h6>-->
         	
         	<div style="padding-left: 10%;padding-right: 10%;padding-bottom: 8%; padding-top:10px;">
         		<? echo $this->session->flashdata("emsg") ?>
         		
         		<form method="post" action="<? echo base_url('webinar/checkParticipant') ?>">
         			<div class="form-group">
         				<label>Registered Email Id (Participant/Contact Person)</label>
         				<input type="email" name="email" class="form-control" required>
         			</div>
         			<div class="form-group">
         				<label>Registered Mobile (Participant/Contact Person) </label>
         				<input type="text" name="mobile" class="form-control" required>
         			</div>
         			<div class="form-group">
         				<button type="submit" class="btn btn-primary">Login</button>
         			</div>
         		</form>
         		
         	</div>
         	
        </div></div>
      </div>
      
      <!-- /row --> 
      
    </div>
  </section>
  <br>

 <? front_footer() ?>