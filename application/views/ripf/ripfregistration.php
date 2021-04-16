<? front_header(); 
$cdate = date("Y-m-d");

?>
  
<style>
.note {
    text-align: center;
    height: 69px;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;
    font-weight: bold;
    line-height: 80px;
}
.form-content {
    padding: 2%;
    border: 1px solid #ced4da;
    margin-bottom: 2%;
}
.form-control {
    border-radius: 1.5rem;
}
.btnSubmit {
    border: none;
    border-radius: 30px;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: #0062cc;
    color: #fff;
}
	
	.btnSubmit:hover {
   
    background: #00225c;
    color: #fff;
}
.form-control {
    display: block !important;
    width: 100% !important;
    padding: .375rem .75rem !important;
    font-size: 14px !important;
    line-height: 1.5 !important;
    color: #495057 !important;
    background-color: #fff !important;
    background-clip: padding-box !important;
    border: 1px solid #ced4da !important;
    border-radius: 2px !important;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out !important;
}
.fbox {
    background: #fff;
    padding: 15px 0px 0px 0px;
    text-align: center;
    -webkit-box-shadow: 0 0 35px rgba(2, 6, 32, 0.15);
    -moz-box-shadow: 0 0 35px rgba(2, 6, 32, 0.15);
    -ms-box-shadow: 0 0 35px rgba(2, 6, 32, 0.15);
    -o-box-shadow: 0 0 35px rgba(2, 6, 32, 0.15);
    box-shadow: 0 0 35px rgba(2, 6, 32, 0.15);
    margin-bottom: 15px;
}
</style>  
  
  <!-- [/MAIN-HEADING]
 ============================================================================================================================-->
  <section class="main-heading" id="home">
    <div class="baner"> <img src="<? echo base_url('assets/') ?>images/inbanner.jpg" class="img-responsive" /> </div>
  </section>
  
  <section class="white-background black" id="inpage">
    <div class="container">
      <div class="row">
        <div class="col-md-12  black">
          <h3 class="title"> </h3>
          <div class="container register-form">
            <div class="form">

            <? if(($cdate < $edata->registration_end_date) && ($edata->status == "Active")){ ?>		

              <div class="note">
                <h1 style="padding-top: 15px;"> Online Registration </h1>
              </div>
              
              <!--<marquee behavior="slide">
<p style="color: red; font-weight: bold;text-align: center"> Last date for registration has been extended till - 15-Jan-2021 </p>
</marquee>-->
              
<!--              <form method="post" action="<? echo base_url('home/insertData') ?>" id="formdata">-->
              <form id="formdata">
              
              <div class="form-content">
              <small style="color: red; font-weight: bold;text-align: center">Note : OTP will be sent to your Email ID & Mobile Number.</small> <br><br>


               <? echo $this->session->flashdata("emsg") ?>
               
               <div id="error"></div>
               
                <div class="row">
                 	
                 	<? if($cdata->id == Institution){ ?>
					  <div class="col-md-4">
						<div class="form-group">
						  <input type="text" class="form-control" placeholder="Name of the Institution" value="<? echo ($form_data['institutionName'] != "") ? $form_data['institutionName'] : '' ?>" name="institutionName" required>
						</div>
					  </div>
					<? } ?>
				  
				    <? if($cdata->id == Institution){ ?>
					  <div class="col-md-4">
						<div class="form-group">
						  <input type="text" class="form-control" name="orgemail" placeholder="Institution Email ID" value="<? echo ($form_data['orgemail'] != "") ? $form_data['orgemail'] : '' ?>"/>
						</div>
					  </div>	
					<? } ?>
				    <? if($cdata->id == Institution){ ?>
					  <div class="col-md-4">
						<div class="form-group">
						  <input type="text" class="form-control" name="institution_phone_number" placeholder="Institution Phone Number" value="<? echo ($form_data['orgemail'] != "") ? $form_data['orgemail'] : '' ?>"/>
						</div>
					  </div>	
					<? } ?>
				    <? if($cdata->id == Institution){ ?>
					  <div class="col-md-4">
						<div class="form-group">
						  <input type="text" class="form-control" name="website" placeholder="Website" value="<? echo ($form_data['website'] != "") ? $form_data['website'] : '' ?>"/>
						</div>
					  </div>	
					<? } ?>	
				    <? if($cdata->id == Institution){ ?>
					  <div class="col-md-12">
						<div class="form-group">
						  <textarea rows="4" cols="50" class="form-control" id="" name="address" placeholder="Address for Correspondence" autocomplete="off" required><? echo ($form_data['address'] != "") ? $form_data['address'] : '' ?></textarea>
						</div>
					  </div>
                  	<? } ?>
                  	
				  
				  <div class="row" style="padding: 17px;">	
				  
				  	  <? if($cdata->id == Institution){ ?>
				  	  	<div class="col-md-12">	
							<label for="full_name" class="col-form-label">Participant Details : </label>
						</div>	
					  <? } ?>
					  <? if($cdata->id == Institution){ ?>	
						  <div class="col-md-4">
							<div class="form-group">
							  <input type="text" class="form-control" placeholder="Name of the Contact Person" value="<? echo ($form_data['cpname'] != "") ? $form_data['cpname'] : '' ?>" name="cpname" required>
							</div>
						  </div>
					  <? } ?>	  
					  <? if($cdata->id == Institution){ ?>	  
						   <div class="col-md-4">
							<div class="form-group">
							  <input type="text" class="form-control" placeholder="Contact Person Mobile No." value="<? echo ($form_data['mobile'] != "") ? $form_data['mobile'] : '' ?>" name="mobile" maxlength="10" autocomplete="off" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" required>
							</div>
						  </div>
					  <? } ?>	  
					  <? if($cdata->id == Institution){ ?>
						  <div class="col-md-4">
							<div class="form-group">
							  <input type="email" class="form-control" name="email" placeholder="Contact Person Email ID" value="<? echo ($form_data['email'] != "") ? $form_data['email'] : '' ?>" required>
							</div>
						  </div>
					  <? } ?>	  
					  <? if($cdata->id == Institution){ ?>	  
						  <div class="col-md-4">
							<div class="form-group">
							  <input type="text" class="form-control" name="contact_person_designation" placeholder="Contact Person Designation" value="<? echo ($form_data['contact_person_designation'] != "") ? $form_data['contact_person_designation'] : '' ?>" required>
							</div>
						  </div>
					  <? } ?>	  
					  <? if($cdata->id == Institution){ ?>	  
						  <div class="col-md-4">
							<div class="form-group">
							  <input type="text" class="form-control" name="contact_person_department" placeholder="Contact Person Department" value="<? echo ($form_data['contact_person_department'] != "") ? $form_data['contact_person_department'] : '' ?>" required>
							</div>
						  </div>
					   <? } ?>	
					   <? if($cdata->id == Institution){ ?>	  
						  <div class="col-md-4">
							<div class="form-group">
							  	<select class="form-control" name="contact_person_stream" required>
							  		<option value="">Select Stream</option>
							  		<? 
									$streams = $this->db->get_where("tbl_categories")->result();
									foreach($streams as $s){
										if(in_array($edata->id,json_decode($s->events))){
											echo '<option value="'.$s->category.'">'.$s->category.'</option>';
										}
									}	
									?>
								</select>
							</div>
						  </div>
					   <? } ?>	  	
				  </div>	
				
                  <div class="col-md-12">
                  	<div class="row">
                  		<div class="col-md-4">
							<div class="form-group checkbox-group required">
							  <label for="full_name" class="col-form-label "> Type of Institution</label>
							  <div class="form-group row">
								<div class="col-md-12">
									<select name="institution_type" id="institution_type" class="form-control" required>
										<option value="">Select Institution Type</option>
										<? $types = $this->db->get_where("tbl_institution_types",["status"=>"Active"])->result(); 
										   foreach($types as $t){
											   echo '<option value="'.$t->type.'">'.$t->type.'</option>';
										   }
										?>
									</select>
								</div>
								<!--<div class="col-md-4">
									<select name="institution_subtype" id="institution_subtype" class="form-control" required>
										<option value="">Select Sub Institution Type</option>

									</select>
								</div>-->
							  </div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group checkbox-group required">
							  <label for="full_name" class="col-form-label">Caste</label>
							  <div class="form-group row">
								<div class="col-md-12">
									<select name="caste" id="caste" class="form-control getPrice_1" required>
										<option value="">Select Caste</option>
										<option value="General">General</option>
										<option value="BC">BC</option>
										<option value="EBC">EBC</option>
										<option value="SC">SC</option>
										<option value="ST">ST</option>
										<option value="Others">Others</option>
									</select>
								</div>
								<!--<div class="col-md-4">
									<select name="institution_subtype" id="institution_subtype" class="form-control" required>
										<option value="">Select Sub Institution Type</option>

									</select>
								</div>-->
							  </div>
							</div>
							<strong><small style="color: red">Note : 50% Discount is available for SC/ST/PH/EBC Students and Individual Faculty.</small></strong>
						</div>
						<div class="col-md-4">
							<div class="form-group checkbox-group required">
							  <label for="full_name" class="col-form-label ">Are you physically challenged</label>
							  <div class="checkbox">
							  	<label>
								  <input type="radio" name="physically_challenged" class="physically_challenged getPrice_1" value="No" checked required>
								  No </label>
								<label>
								  <input type="radio" name="physically_challenged" class="physically_challenged getPrice_1" value="Yes" required>
								  Yes </label>
								
								
							  </div>
							</div>
						  </div>
						  
					</div>
                  </div>	
                  
                  <div class="col-md-12">
                    <div class="form-group checkbox-group required">
                      <label for="full_name" class="col-form-label "> Management Details</label>
                      <? $mdetails = json_decode($form_data['managementdetails'],true); ?>
                      <div class="checkbox managementdetails">
                        <label>
                          <input type="radio" name="managementdetails[]" value="Government"  <? if(in_array("Government",$mdetails)){ echo 'checked'; } ?> required>
                          Government </label>
                        <label>
                          <input type="radio" name="managementdetails[]" value="Aided" <? if(in_array("Aided",$mdetails)){ echo 'checked'; } ?> required>
                          Aided </label>
                        <label>
                          <input type="radio" name="managementdetails[]" value="Private" <? if(in_array("Private",$mdetails)){ echo 'checked'; } ?> required>
                          Private </label>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group checkbox-group required">
                      <label for="full_name" class="col-form-label "> Topics</label>
                      <? $mdetails = json_decode($form_data['topic'],true); ?>
                      <div class="checkbox">
                      	<? $topics = $this->db->order_by("id","asc")->get_where("tbl_ripf_topics",["deleted"=>0,"ripf_category"=>$cdata->id])->result();
							$tamount = 0;																
						   foreach($topics as $t){
							   $tamount += $t->amount;
							   
						 ?>	
							<label>
							  <input type="checkbox" class="topic getPrice" name="topic[]" value="<? echo $t->topic_name ?>" <? if(in_array("$t->topic_name",$mdetails)){ echo 'checked'; } ?> required><? echo $t->topic_name." - <i class='fa fa-rupee'></i> ".$t->amount ?></label><br>
                    	 <? } ?>
                    	 <label>
							  <input type="checkbox" class="getPrice" id="select_all" name="topic[]" value="all" <? if(in_array("all",$mdetails)){ echo 'checked'; } ?> required>All  - <i class='fa fa-rupee'></i> <? echo $cdata->overall_discount_amount ?></label>		 
                      </div>
                      <strong><small style="color: red">Note : If you select all topics you'll get discount of <i class='fa fa-rupee'></i><? echo ($tamount-$cdata->overall_discount_amount) ?>.</small></strong>
                    </div>
                    
                  </div>
                   
                  
              <? if($cdata->members_count > 1){ ?>    
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="full_name" class="col-form-label "> Number of Participants</label><br>
<!--                      <strong><small style="color: red">Note : Maximum Limit is <? echo $this->admin->get_option("participants_count") ?>.</small></strong>-->
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <input type="number" class="form-control" name="participants" id="students" placeholder="" value="<? echo $cdata->members_count ?>" readonly required>
                    </div>
                  </div>
              <? } ?>    
                  
                </div>
                
                
                <input type="hidden" name="totalPrice" id="total" value="<? echo $package->package_amount ?>">
                
                <div class="row">
                	<div class="col-md-6">
						<h2 class="pull-left" id="totalPrice"> <strong>Participation Fee for Institution - <i class="fa fa-rupee"></i> <? echo $package->package_amount ?></strong></h2>  
						<h2 class="pull-left" id="discountPrice" style="display: none"> <strong>Discount Price - <i class="fa fa-rupee"></i> <? echo $package->package_amount ?></strong></h2>  
					</div>
					
					<div class="col-md-6">
						<button type="submit" class="btnSubmit pull-right">Next</button>
              		</div>
               </div>
                
                <div class="form-group">
					<input type="checkbox" name="check" required> I agree to all the <a href="#" target="_blank">Terms &amp; Conditions</a>
				</div>
               
                
                <div class="clearfix"></div>
              </div>
              
              
              
              </form>
              
            <? }else{ ?>

            	<p style="text-align: center;font-weight: 600;font-size: 28px;color: red;padding: 8%">Registrations Are Closed</p>	
              
            <? } ?>  

            </div>
          </div>
          <br/>
        </div>
      </div>
	  <!--<div class="row">
	      <div class="col-md-4"></div>
	      <div class="col-md-4">
			<a href="<? echo base_url('assets/') ?>workshop_Registration_Form.pdf" target="_blank" download><div class="rbox">
			Offline Registration
			</div></a>
			</div>
	      <div class="col-md-4"></div>
	  </div>-->
      <div class="gap"> </div>
      
      <!-- /row --> 
      
    </div>
  </section>
  
  <!-- [CONTACT]
 ============================================================================================================================--> 
<? front_footer() ?>

<script type="text/javascript">
	
	
	$(document).ready(function(){
		$('#select_all').on('click',function(){
			if(this.checked){
				$('.topic').each(function(){
					this.checked = true;
				});
			}else{
				 $('.topic').each(function(){
					this.checked = false;
				});
			}
		});

		$('.topic').on('click',function(){
			if($('.topic:checked').length == $('.topic').length){
				$('#select_all').prop('checked',true);
			}else{
				$('#select_all').prop('checked',false);
			}
		});
		
		$(".getPrice").click(function(){
			
			var topics = [];
			$('.getPrice:checkbox:checked').each(function(){
				topics.push($(this).val())
			});
			
			var caste = $("#caste").val();
			var physically_challenged = $('.physically_challenged:radio:checked').val();
			
			$.ajax({
				type : "post",
				url : "<? echo base_url('ripf/getPrice') ?>",
				dataType : "json",
				data : {topics:topics,category:<? echo $cdata->id ?>,caste:caste,physically_challenged:physically_challenged},
				success : function(data){
					$("#total").val(data.total);
					if(data.discount > 0){
						$("#discountPrice").show();
						$("#discountPrice").html('<strong>Discount Price - <i class="fa fa-rupee"></i> '+data.discount+' </strong>');
					}else{
						$("#discountPrice").hide();
					}
										
					$("#totalPrice").html('<strong>Participation Fee for Institution - <i class="fa fa-rupee"></i> '+data.total+' </strong>');

					console.log(data);
				},
				error : function(data){
					console.log(data);
				}		
			})
		})
		
		$(".getPrice_1").change(function(){
			
			var topics = [];
			$('.getPrice:checkbox:checked').each(function(){
				topics.push($(this).val())
			});
			
			var caste = $("#caste").val();
			var physically_challenged = $('.physically_challenged:radio:checked').val();
			
			$.ajax({
				type : "post",
				url : "<? echo base_url('ripf/getPrice') ?>",
				dataType : "json",
				data : {topics:topics,category:<? echo $cdata->id ?>,caste:caste,physically_challenged:physically_challenged},
				success : function(data){
					$("#total").val(data.total);
					
					if(data.discount > 0){
						$("#discountPrice").show();
						$("#discountPrice").html('<strong>Discount Price - <i class="fa fa-rupee"></i> '+data.discount+' </strong>');
					}else{
						$("#discountPrice").hide();
					}
					$("#totalPrice").html('<strong>Participation Fee for Institution - <i class="fa fa-rupee"></i> '+data.total+' </strong>');
					console.log(data);
				},
				error : function(data){
					console.log(data);
				}		
			})
		})
		
	});
	
	
	
	
	$("#formdata").on("submit",function(e){
		
		e.preventDefault();
		
		var students = $("#students").val();
		if(students == 0){
			
			swal(
				'Error!',
				'Please Enter the Number of Participant/s.',
				'warning'
			) 
			return false;
			
		}
		
		var data = $("#formdata").serialize();
		
		$.ajax({
			
			"type" : "post",
			data : data,
			url : "<? echo base_url('home/insertData') ?>",
			success : function(data){
				
				console.log(data);
				
				if(data == "success"){
					
					window.location.href = '<? echo base_url('home/verifyOtp') ?>';
					
				}else{
					
					$("#error").html(data);
					
				}
				
				
			},
			error : function(data){
				
				console.log(data);
				
			}
			
		});
		
	});
	
	
	$(function(){
		var requiredCheckboxes = $('.category :checkbox[required]');
		requiredCheckboxes.change(function(){
			if(requiredCheckboxes.is(':checked')) {
				requiredCheckboxes.removeAttr('required');
			} else {
				requiredCheckboxes.attr('required', 'required');
			}
		});
	});
	
	$(function(){
		var requiredCheckboxes = $('.managementdetails :checkbox[required]');
		requiredCheckboxes.change(function(){
			if(requiredCheckboxes.is(':checked')) {
				requiredCheckboxes.removeAttr('required');
			} else {
				requiredCheckboxes.attr('required', 'required');
			}
		});
	});
	
	function addFields(){
		
		$(".detais").html("");
		var number = document.getElementById("students").value;
		
		if(number > <? echo $this->admin->get_option("participants_count") ?>){
			
			swal(
				'Error!',
				'maximum participants count <? echo $this->admin->get_option("participants_count") ?>.',
				'warning'
			) 
			
			$("#students").val(<? echo $this->admin->get_option("participants_count") ?>);
			return false;
			
		}
		
//		var total = number*5000;
		var total = 5000;
		
		$("#total").val(total);
		$("#totalPrice").html('<strong>Participation Fee for Institution - <i class="fa fa-rupee"></i> '+total+' </strong>');
		
		var container = document.getElementById("detais");
		while (container.hasChildNodes()) {
			container.removeChild(container.lastChild);
		}
		
		var html = '';
		
		for (i=0;i<number;i++){
//			container.appendChild(document.createTextNode("Member " + (i+1)));
//			var input = document.createElement("input");
//			input.type = "text";
//			container.appendChild(input);
//			container.appendChild(document.createElement("br"));
			
			html += '<div class="col-md-12" id="detais"><div class="fbox"><div class="col-md-6"><div class="form-group"><input type="text" class="form-control" name="pname[]" placeholder="Name" value="" required></div></div><div class="col-md-6"><div class="form-group"><input type="text" class="form-control" name="designation[]" placeholder="Designation & Department" value="" required></div></div><div class="col-md-6"><div class="form-group"><input type="text" class="form-control" placeholder="Mobile" maxlength="10" autocomplete="off" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" name="pmobile[]" value="" required></div></div><div class="col-md-6"><div class="form-group"><input type="email" class="form-control" name="pemail[]" placeholder="Email" value="" required></div></div><div class="clearfix"></div></div></div>'
			
		}
		
		$("#detais").append(html);
	}

</script>



