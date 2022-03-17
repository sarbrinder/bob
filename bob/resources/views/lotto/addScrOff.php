		<div class="inventoryListDetail">
				<div class="row">
					<div class="breadcrumbs">
						<p class="pull-left">Lotto Scr.off > Add Scr.off </p>
						<p class="pull-right"><i class="fa fa-home"></i> / Add Scr.off</p>
					</div>
				</div>
				
				 
			  
				<div class="content_sec">
					<div class="margin_40"></div>
						<div class="row">
					    <div class="col-md-10 float-left">
					      <h2 class="formHeadingStyle1">Basic Details</h2>
					    </div>
					    <div class="col-md-2 float-right">
					        <a href="<?php echo URL('/list-scr-off');?>" class="btn btn-primary">List Scr. off</a>
					
					    </div>
					</div>

	
	
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
						<form action="<?php echo URL('/add-scr-off');?>" class="profileSetting" id="profileSetting" method="post" accept-charset="utf-8">
							<div class="row">
							
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="col-md-4">
								<div class="form-group"><label class="control-label">Game #</label>
									<div class="form-group">
										<input class="form-control success" name="gameId" placeholder="" type="text" />
									
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group"><label class="control-label">Game Name</label>
									<div class="form-group">
									<input class="form-control success" name="gameName" placeholder="" type="text" />
								</div>
									<div class="clearfix"></div>
								</div>
							</div>
								<div class="col-md-4">
								<div class="form-group"><label class="control-label">Scr. Off Ticket</label>
									<div class="form-group">
									<input class="form-control success" name="scr_off_ticket" placeholder="" type="text" />
								</div>
									<div class="clearfix"></div>
								</div>
							</div>
							
							
							
							<div class="col-md-4">
								<div class="form-group"><label class="control-label">Starting #</label>
									<div class="form-group">
										<input class="form-control success" name="starting" placeholder="" type="text" autocomplete="off" readonly value="0"/>
									
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
								<div class="col-md-4">
								<div class="form-group"><label class="control-label">Ending #</label>
									<div class="form-group">
										<input class="form-control success" name="ending" placeholder="" type="text" autocomplete="off"/>
									
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group"><label class="control-label">$$</label>
									<div class="form-group">
										<input type="text" class="form-control success" name="gameValuePrice" /> 
									
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
								<div class="col-md-4">
								<div class="form-group"><label class="control-label">Tickets per pack #</label>
									<div class="form-group">
										<input class="form-control success" name="tickets" placeholder="" type="text" />
									
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
					<div class="col-md-4">
								<div class="form-group"><label class="control-label">Game Value</label>
									<div class="form-group">
										<input class="form-control success" type="text" name="gameValue" readonly /> 
									
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						<div class="col-md-12">
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