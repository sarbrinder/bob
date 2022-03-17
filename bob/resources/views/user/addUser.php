		<div class="inventoryListDetail">
				<div class="row">
					<div class="breadcrumbs">
						<p class="pull-left">Location > Add User</p>
						<p class="pull-right"><i class="fa fa-home"></i> / Add User</p>
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
						<form action="<?php echo URL('/add-user');?>" class="profileSetting" id="profileSetting" method="post" accept-charset="utf-8">
							<div class="row">
							
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">First Name</label>
									<div class="form-group">
										<input class="form-control success" name="fName" placeholder="First Name" type="text" />
										<span class="checkEmail"></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">Last Name</label>
									<div class="form-group">
										<input class="form-control success" name="lName" placeholder="Last Name" type="text" />
										<span class="checkEmail"></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
								<div class="col-md-6">
								<div class="form-group"><label class="control-label">Phone No</label>
									<div class="form-group">
										<input class="form-control success" value="<?php if(isset($_POST['phoneNo'])) echo $_POST['phoneNo']; ?>" name="phoneNo" placeholder="(000)000-0000" type="text" />
										<span></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">Email Id</label>
									<div class="form-group">
										<input class="form-control success checkEmail" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" name="email" placeholder="abc@gmail.com" type="text" />
										<span></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">Password</label>
									<div class="form-group">
										<input class="form-control success " value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>" name="password" placeholder="Password" type="password" />
									
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">User Type</label>
									<div class="form-group">
										<select class="form-control success" name="type">
										    <option value="">Select Type</option>
										    <option value="2">Admin</option>
										    <option value="3">Manager</option>
										    <option value="4">Other</option>
										</select>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">Address</label>
									<div class="form-group">
									    <input type="text" class="form-control success" name="address" placeholder="Enter Full address"/>
										
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">City </label>
									<div class="form-group">
									    <input type="text" class="form-control success" name="city" placeholder="Enter City"/>
										
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">State</label>
									<div class="form-group">
									    <input type="text" class="form-control success" name="state" placeholder="Enter State"/>
									
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">Zip Code</label>
									<div class="form-group">
									    <input type="text" class="form-control success" name="zipCode" placeholder="Enter Zip Code"/>
										
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						<div class="col-md-4">
						<input type="submit"  class="btn btn-primary checkForm" value="SAVE" />
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
<?php echo view('commonview.mainFooter');?>