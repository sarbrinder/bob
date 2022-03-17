		<div class="editstore">
				<div class="row">
					<div class="breadcrumbs">
						<p class="pull-left">Location > Update Store
						<p class="pull-right"><i class="fa fa-home"></i> / Update Store </p>
					</div>
				</div><br>
				<div class="col-md-12">
				    <button class="btn btn-primary" class="backButton">Back</button>
				</div><br>
				 			  
				<div class="content_sec">
					<div class="margin_40"></div>

	<h2 class="formHeadingStyle1">Basic Details</h2>
	<div id="storepmsg"></div>
	
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
						<form  class="Editstore" id="storeedit" method="post" accept-charset="utf-8">
							<div class="row">
							
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">Store Name</label>
									<div class="form-group">
										<input class="form-control success" value="<?php echo $data[0]->storeName; ?>" name="storeName" placeholder="Store Name" type="text" />
										<span class="checkEmail"></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
								<div class="col-md-6">
								<div class="form-group"><label class="control-label">Phone No</label>
									<div class="form-group">
										<input class="form-control success" value="<?php echo $data[0]->phoneNo; ?>"name="phoneNo" placeholder="(000)000-0000" type="text" />
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
								<div class="form-group"><label class="control-label">Address</label>
									<div class="form-group">
										<input  class="form-control success" value="<?php echo $data[0]->address; ?>" name="address" placeholder="Enter Full address" type="text" >										<span></span>
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
							<!--	<div class="col-md-6">-->
							<!--	<div class="form-group"><label class="control-label">Assign Manager</label>-->
							<!--		<div class="form-group">-->
							<!--		    	<select class="form-control success" name="mangerId">-->
							<!--			    <option value=" ">Select User</option>-->
									    <?php //if(count($data) > 0){
										        //foreach($user as $user){
										    ?>
							<!--			        <option value="<?php //echo $user->uniqueId; ?>" <?php //if($user->uniqueId == $data[0]->mangerId) { echo 'Selected';} ?>><?php  //echo $user->fName . ' ' .$user->lName ; ?></option>-->
										    <?php 
									    //}
										    //}
										    ?>
							<!--			</select>-->
									
							<!--		</div>-->
							<!--		<div class="clearfix"></div>-->
							<!--	</div>-->
							<!--</div>-->
						<div class="col-md-12">
						<input type="button" id="<?php echo $data[0]->storeId; ?>"  class="btn btn-primary editstoresave" value="Update store" />
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