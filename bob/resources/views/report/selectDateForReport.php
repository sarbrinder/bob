
		<div class="inventoryListDetail">
				<div class="row">
					<div class="breadcrumbs">
						<p class="pull-left">Sale >> Weekly Totals</p>
						<p class="pull-right"><i class="fa fa-home"></i> / Weekly Totals</p>
					</div>
				</div>
				
				 
			  
				<div class="content_sec">
					<div class="margin_40"></div>

	<h2 >Quick Stop Weekly Totals</h2>
	
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
						<form  method="post" accept-charset="utf-8">
				        	<div class="row">
                            <div class="col-md-12">
						<div class="form-group">
						    	<div class="col-md-3">
								<div class="form-group"><label class="control-label">Select Store</label>
									<div class="form-group">
										<select class="form-control getMangerList" id="storeName">
										    <?php foreach($store as $val) {?>
										    <option value="<?php echo $val->storeId;?>"><?php echo $val->storeName;?></option>
										    <?php }?>
										</select>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group"><label class="control-label">From Date</label>
									<div class="form-group">
										<input class="form-control success" name="fromDate" placeholder="DD/MM/YYYY" type="text" id="fromDate" />
										<span class="checkEmail"></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group"><label class="control-label">To Date</label>
									<div class="form-group">
										<input class="form-control success" name="toDate" placeholder="DD/MM/YYYY" type="text"  id="toDate"/>
										<span class="checkEmail"></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
								<div class="col-md-3">
								<div class="form-group"><label class="control-label">Manager</label>
									<div class="form-group">
											<select class="form-control" id="managerDrop">
										    
										</select>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<div class="form-group">
											<input type="button"  class="btn btn-primary checkForm showWeeklyReport" value="SHOW" style="margin-top: 20px;"/>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
								<div class="col-md-12 mainDiv importReport" style="background-color: lightgray;display:none;" >
								    
								    </div>
							
							
						
							
	</div>
					</div>
	</div>
			</form>	
						  </form>
						   	</div>


	</div>
	</div>
	


</div>
</div>
<?php echo view('commonview.mainFooter');?>