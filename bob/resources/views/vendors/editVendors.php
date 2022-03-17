		<div class="Editform">
				<div class="row">
					<div class="breadcrumbs">
						<p class="pull-left">Location > Edit Vendor</p>
						<p class="pull-right"><i class="fa fa-home"></i> / Edit Vendor</p>
					</div>
				</div>
				
				 
			  
				<div class="content_sec">
					<div class="margin_40"></div>

	<h2 class="formHeadingStyle1">Basic Details</h2>
	
	<?php if(isset($errors) && count($errors) > 0) {  $message1 = json_decode($errors,true);
				?>
				<!--div class="ajax_report alert-message alert alert-danger updatecartDetail" role="alert"-->
				<?php
				foreach($message1['message'] as $val){
					echo '<br><span class="ajax_message updateController">'.$val.'</span>';
				}
				?>
				 <!--/div-->
				<?php
			  }
            if(isset($message)){
                echo $message;
            }
			  ?>
			  <div class="msg"></div>
	<div class="row">
	    	<div class="col-md-12 col-sm-12 col-xs-12 leftMainDiv">
					<div class="detail-recents clearfix pull-left" id="allRecords">
						<form  class="vendoreditform" id="vendoreditform" method="post" accept-charset="utf-8">
							<div class="row">
							
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">Name</label>
									<div class="form-group">
										<input class="form-control success" value="<?php echo $data[0]->name; ?>" name="Name" placeholder="Name" type="text" />
										<span class="checkEmail"></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
								<div class="col-md-6">
								<div class="form-group"><label class="control-label">Phone No</label>
									<div class="form-group">
										<input class="form-control success" value="<?php echo $data[0]->phoneNo; ?>" name="phoneNo" placeholder="(000)000-0000" type="text" />
										<span></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">Type</label>
									<div class="form-group">
										<select class="form-control success" name="type">
										    <option value="">Select Type</option>
										    <option value="1" <?php if($data[0]->type == 1) echo 'Selected';?>>Retail</option>
										    <option value="2" <?php if($data[0]->type == 2) echo 'Selected';?>>Non-Retail</option>
										</select>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">Address</label>
									<div class="form-group">
									    <input type="text" class="form-control success" value="<?php echo $data[0]->address; ?>" name="address" placeholder="Enter Full address"/>
										
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">City </label>
									<div class="form-group">
									    <input type="text" class="form-control success" value="<?php echo $data[0]->city; ?>" name="city" placeholder="Enter City"/>
										
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">State</label>
									<div class="form-group">
									    <input type="text" class="form-control success" value="<?php echo $data[0]->state;?>" name="state" placeholder="Enter State"/>
									
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
								<div class="col-md-6">
								<div class="form-group"><label class="control-label">Zip code</label>
									<div class="form-group">
									    <input type="text" class="form-control success" value="<?php echo $data[0]->zipCode;?>" name="zipCode" placeholder="Enter Zip Code"/>
									
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						<div class="col-md-12">
						<button type="button"  class="btn btn-primary updatevendors" id="<?php echo $data[0]->uniqueId; ?>" value="Update" >Update</button>
					</div>

							
	</div>
					</div>

				</div>
			
			
			</div>
			</form>	
			</div>


	</div>
	</div>

</div>
</div>
