<?php $this->load->view("admin/back_common/header"); ?>

<!-- Title -->
<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Reports</h5>
    </div>
                <!-- Breadcrumb -->
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
            <li class="active"><span>RIPF Reports</span></li>
        </ol>
    </div>
                <!-- /Breadcrumb -->
</div>  
 <div class="row">
 	<div class="col-lg-12 col-xs-12" >
        <div class="panel panel-default card-view pa-0">
            <div class="panel-wrapper collapse in">
                <div class="row">
                    <div class="col-md-10">
                        </div>
                     		<div class="col-md-2">
                   			    </div>
               				        </div> 
                                         <div  class="table-responsive" style="padding:20px;">
                                          <table class="table table-hover  pb-30" id="myTable">
                                            <thead>
		                                        <tr>
		                                            <th  valign="top"></th>
		                                            <th colspan="" align="center"></th>
		                                              <th colspan="2" align="center" style="font-size: 15px;">Research Methodology</th>
		                                              <th colspan="2" align="center"></th>
		                                            
		                                        </tr> 
		                                        <tr>
		                                            <th>Type of Registration</th>
		                                            <?php foreach($streams as  $s){  ?>
		                                            <td><? echo $s->category ?></td>
		                                        <?php } ?>
		                                            <th rowspan="2" valign="top">Total</th>
		                                        </tr> 
                                            
                                            </thead>
                                            <tbody>	
                                            	
                                            	 <?php foreach($ripf_category as  $ripf_cat){ ?>
                                            	<tr>
                                            	    <td><?php echo  $ripf_cat->category_name;  ?></td>
                                            	    <td><?php echo  "test-1";  ?></td>
                                            	    <td><?php echo  "test-2" ;  ?></td>
                                            	    <td><?php echo  "test-3";  ?></td>
                                            	    <td><?php echo  "test-4";  ?></td>
                                            	    <td><?php echo  "test-5";  ?></td>
                                            	    <td><?php echo  "Total 5" ;  ?></td>
                                            	</tr>

                                            	 <?php } ?>
                                            </tbody>
                                       
                                    </table>
                                </div>
                        </div>
                    </div>
                        
                </div>
            </div>




            <!-- IPR -->

<div class="row">
 	<div class="col-lg-12 col-xs-12" >
        <div class="panel panel-default card-view pa-0">
            <div class="panel-wrapper collapse in">
                <div class="row">
                    <div class="col-md-10">
                        </div>
                     		<div class="col-md-2">
                   			    </div>
               				        </div> 
                                         <div  class="table-responsive" style="padding:20px;">
                                          <table class="table table-hover  pb-30" id="myTable">
                                            <thead>
		                                        <tr>
		                                            <th  valign="top"></th>
		                                            <th colspan="" align="center"></th>
		                                              <th colspan="2" align="center" style="font-size: 15px;">Intellectual Property Rights</th>
		                                              <th colspan="2" align="center"></th>
		                                            
		                                        </tr> 
		                                        <tr>
		                                            <th>Type of Registration</th>
		                                            <?php foreach($streams as  $s){  ?>
		                                            <td><? echo $s->category ?></td>
		                                        <?php } ?>
		                                            <th rowspan="2" valign="top">Total</th>
		                                        </tr> 
                                            
                                            </thead>
                                            <tbody>	
                                            	
                                            	 <?php foreach($ripf_category as  $ripf_cat){ ?>
                                            	<tr>
                                            	    <td><?php echo  $ripf_cat->category_name;  ?></td>
                                            	    <td><?php echo  "test-1";  ?></td>
                                            	    <td><?php echo  "test-2" ;  ?></td>
                                            	    <td><?php echo  "test-3";  ?></td>
                                            	    <td><?php echo  "test-4";  ?></td>
                                            	    <td><?php echo  "test-5";  ?></td>
                                            	    <td><?php echo  "Total 5" ;  ?></td>
                                            	</tr>

                                            	 <?php } ?>
                                            </tbody>
                                       
                                    </table>
                                </div>
                        </div>
                    </div>
                        
                </div>
            </div>


<!-- Paper Publications -->

<div class="row">
 	<div class="col-lg-12 col-xs-12" >
        <div class="panel panel-default card-view pa-0">
            <div class="panel-wrapper collapse in">
                <div class="row">
                    <div class="col-md-10">
                        </div>
                     		<div class="col-md-2">
                   			    </div>
               				        </div> 
                                         <div  class="table-responsive" style="padding:20px;">
                                          <table class="table table-hover  pb-30" id="myTable">
                                            <thead>
		                                        <tr>
		                                            <th  valign="top"></th>
		                                            <th colspan="" align="center"></th>
		                                              <th colspan="2" align="center" style="font-size: 15px;">Paper Publications</th>
		                                              <th colspan="2" align="center"></th>
		                                            
		                                        </tr> 
		                                        <tr>
		                                            <th>Type of Registration</th>
		                                            <?php foreach($streams as  $s){  ?>
		                                            <td><? echo $s->category ?></td>
		                                        <?php } ?>
		                                            <th rowspan="2" valign="top">Total</th>
		                                        </tr> 
                                            
                                            </thead>
                                            <tbody>	
                                            	
                                            	 <?php foreach($ripf_category as  $ripf_cat){ ?>
                                            	<tr>
                                            	    <td><?php echo  $ripf_cat->category_name;  ?></td>
                                            	    <td><?php echo  "test-1";  ?></td>
                                            	    <td><?php echo  "test-2" ;  ?></td>
                                            	    <td><?php echo  "test-3";  ?></td>
                                            	    <td><?php echo  "test-4";  ?></td>
                                            	    <td><?php echo  "test-5";  ?></td>
                                            	    <td><?php echo  "Total 5" ;  ?></td>
                                            	</tr>

                                            	 <?php } ?>
                                            </tbody>
                                       
                                    </table>
                                </div>
                        </div>
                    </div>
                        
                </div>
            </div>
<!-- Fund Raising  -->

<div class="row">
 	<div class="col-lg-12 col-xs-12" >
        <div class="panel panel-default card-view pa-0">
            <div class="panel-wrapper collapse in">
                <div class="row">
                    <div class="col-md-10">
                        </div>
                     		<div class="col-md-2">
                   			    </div>
               				        </div> 
                                         <div  class="table-responsive" style="padding:20px;">
                                          <table class="table table-hover  pb-30" id="myTable">
                                            <thead>
		                                        <tr>
		                                            <th  valign="top"></th>
		                                            <th colspan="" align="center"></th>
		                                              <th colspan="2" align="center" style="font-size: 15px;"> Fund Raising</th>
		                                              <th colspan="2" align="center"></th>
		                                            
		                                        </tr> 
		                                        <tr>
		                                            <th>Type of Registration</th>
		                                            <?php foreach($streams as  $s){  ?>
		                                            <td><? echo $s->category ?></td>
		                                        <?php } ?>
		                                            <th rowspan="2" valign="top">Total</th>
		                                        </tr> 
                                            
                                            </thead>
                                            <tbody>	
                                            	
                                            	 <?php foreach($ripf_category as  $ripf_cat){ ?>
                                            	<tr>
                                            	    <td><?php echo  $ripf_cat->category_name;  ?></td>
                                            	    <td><?php echo  "test-1";  ?></td>
                                            	    <td><?php echo  "test-2" ;  ?></td>
                                            	    <td><?php echo  "test-3";  ?></td>
                                            	    <td><?php echo  "test-4";  ?></td>
                                            	    <td><?php echo  "test-5";  ?></td>
                                            	    <td><?php echo  "Total 5" ;  ?></td>
                                            	</tr>

                                            	 <?php } ?>
                                            </tbody>
                                       
                                    </table>
                                </div>
                        </div>
                    </div>
                        
                </div>
            </div>


<!-- Number of Registrations: -->
<div class="row">
 	<div class="col-lg-12 col-xs-12" >
        <div class="panel panel-default card-view pa-0">
            <div class="panel-wrapper collapse in">
                <div class="row">
                    <div class="col-md-10">
                        </div>
                     		<div class="col-md-2">
                   			    </div>
               				        </div> 
                                         <div  class="table-responsive" style="padding:20px;">
                                          <table class="table table-hover  pb-30" id="myTable">
                                            <thead>
		                                        <tr>
		                                            <th  valign="top"></th>
		                                            <th colspan="" align="center"></th>
		                                              <th colspan="2" align="center" style="font-size: 15px;">Number of Registrations</th>
		                                              <th colspan="2" align="center"></th>
		                                            
		                                        </tr> 
		                                        <tr>
		                                            <th  style="font-size: 13px;">Type of Registration</th>
		                                            <?php foreach($topic as  $t){  ?>
		                                            <td ><? echo $t->topic_name ?></td>
		                                        <?php } ?>
		                                            <th rowspan="2" valign="top">All</th>
		                                            <th rowspan="2" valign="top">Total</th>
		                                        </tr> 
                                            
                                            </thead>
                                            <tbody>	
                                            	
                                            	 <?php foreach($ripf_category as  $ripf_cat){ ?>
                                            	<tr>
                                            	    <td><?php echo  $ripf_cat->category_name;  ?></td>
                                            	    <td><?php echo  "test-1";  ?></td>
                                            	    <td><?php echo  "test-2" ;  ?></td>
                                            	    <td><?php echo  "test-3";  ?></td>
                                            	    <td><?php echo  "test-4";  ?></td>
                                            	    <td><?php echo  "All";  ?></td>
                                            	    <td><?php echo  "Total 5" ;  ?></td>
                                            	</tr>

                                            	 <?php } ?>
                                            </tbody>
                                       
                                    </table>
                                </div>
                        </div>
                    </div>
                        
                </div>
            </div>




<?php $this->load->view("admin/back_common/footer"); ?>