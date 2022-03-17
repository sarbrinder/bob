		<div class="inventoryListDetail">
				<div class="row">
					<div class="breadcrumbs">
						<p class="pull-left">Location > Add Store</p>
						<p class="pull-right"><i class="fa fa-home"></i> / Add Store</p>
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

			  ?>
			  <div class="msg"></div>
	<div class="row">
	    	<div class="col-md-12 col-sm-12 col-xs-12 leftMainDiv">
					<div class="detail-recents clearfix pull-left" id="allRecords">
						<form action="<?php echo URL('/add-store-save');?>" class="profileSetting" id="profileSetting" method="post" accept-charset="utf-8">
							<div class="row">
							
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">Store Name</label>
									<div class="form-group">
										<input class="form-control success" value="" name="storeName" placeholder="Store Name" type="text" />
										<span class="checkEmail"></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
								<div class="col-md-6">
								<div class="form-group"><label class="control-label">Phone No</label>
									<div class="form-group">
										<input class="form-control success" value=""name="phoneNo" placeholder="(000)000-0000" type="text" />
										<span></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">Email Id</label>
									<div class="form-group">
										<input class="form-control success checkEmail" value="" name="email" placeholder="abc@gmail.com" type="text" />
										<span></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">Address</label>
									<div class="form-group">
										<input  type="text" class="form-control success" value=""name="address" placeholder="Enter Full address"  >
										<span></span>
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
								<div class="col-md-6">
								<div class="form-group"><label class="control-label">Assign Manager</label>
									<div class="form-group">
										<select class="form-control success" id="getMultipleManager" >
										    <option value="" disabled selected>Select User</option>
										    <?php if(count($data) > 0){
										        foreach($data as $user){
										    ?>
										        <option value="<?php echo $user->uniqueId; ?>"><?php  echo $user->fName .' ' .$user->lName; ?></option>
										    <?php 
										    }
										    }
										    ?>
										</select>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<input type="hidden" name="managerList" id="managerList"/>
							<div class="col-md-12" style="display:none;" id="divShow">
							    <h4>List of Manager</h4><br>
							    <table id="tableAppend" class="table table-bordered ">
							        
							    </table>
							</div>
						<div class="col-md-4">
						<input type="submit"  class="btn btn-primary checkForm assignMangerToHidden" value="SAVE" />
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