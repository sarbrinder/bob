		<div class="editform">
				<div class="row">
					<div class="breadcrumbs">
						<p class="pull-left">Location > Update user</p>
						<p class="pull-right"><i class="fa fa-home"></i> / Update user</p>
					</div>
				</div>
				
				 
			  
				<div class="content_sec">
					<div class="margin_40"></div>

	<h2 class="formHeadingStyle1">Basic Details</h2>
	<div id="signupmsg"></div>
	
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
						<form  class="usereditform" id="userformedit" method="post" accept-charset="utf-8">
						    
							<div class="row">
							
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">First Name</label>
									<div class="form-group">
										<input class="form-control success" value="<?php echo $data[0]->fName; ?>" name="fName" placeholder="First Name" type="text" />
										<span class="checkEmail"></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
								<div class="col-md-6">
								<div class="form-group"><label class="control-label">Last Name</label>
									<div class="form-group">
										<input class="form-control success" value="<?php echo $data[0]->lName; ?>" name="lName" placeholder="Last Name" type="text" />
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
								<div class="form-group"><label class="control-label">Email Id</label>
									<div class="form-group">
										<input class="form-control success checkEmail" value="<?php echo $data[0]->email; ?>" name="email" placeholder="abc@gmail.com" type="text" />
										<span></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">Password</label>
									<div class="form-group">
										<input class="form-control "  name="password" placeholder="Password" type="password" />
									    <input type="hidden" name="oldPassword" value="<?php echo $data[0]->password; ?>" />
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">User Type</label>
									<div class="form-group">
										<select class="form-control success" name="type">
										    <option value="">Select Type</option>
										    <option value="2" <?php if($data[0]->type == 2) echo 'Selected';?>>Admin</option>
										    <option value="3" <?php if($data[0]->type == 3) echo 'Selected';?>>Manager</option>
										    <option value="4" <?php if($data[0]->type == 4) echo 'Selected';?>>Other</option>
										</select>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">Address</label>
									<div class="form-group">
										<input type="text" class="form-control success" value="<?php echo $data[0]->address;  ?>" name="address" >
										<span></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">City </label>
									<div class="form-group">
									    <input type="text" class="form-control success" name="city" value="<?php echo $data[0]->city;  ?>" />
										
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">State</label>
									<div class="form-group">
									    <input type="text" class="form-control success" name="state" value="<?php echo $data[0]->state;  ?>"/>
									
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">Zip Code</label>
									<div class="form-group">
									    <input type="text" class="form-control success" name="zipCode" value="<?php echo $data[0]->zipCode;  ?>"/>
										
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						<div class="col-md-4">
						<input type="button" id="<?php echo $data[0]->uniqueId; ?>" class="btn btn-primary editusersave" value="Update user" />
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