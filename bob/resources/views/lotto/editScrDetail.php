		<div class="inventoryListDetail">
				<div class="row">
					<div class="breadcrumbs">
						<p class="pull-left">Lotto Scr.off > Edit Scr.off </p>
						<p class="pull-right"><i class="fa fa-home"></i> / Edit Scr.off</p>
					</div>
				</div>
				
				 
			  
				<div class="content_sec">
					<div class="margin_40"></div>
						<div class="row">
					    <div class="col-md-10 float-left">
					      <h2 class="formHeadingStyle1">Edit Basic Details</h2>
					    </div>
					    <div class="col-md-2 float-right">
					        <a href="javascript:void(0)" class="btn btn-primary backButton">Back</a>
					
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
						<form action="<?php echo URL('/edit-scr-off-save');?>" class="profileSetting" id="scrForm" method="post" accept-charset="utf-8">
							<div class="row">
							
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="col-md-4">
								<div class="form-group"><label class="control-label">Game #</label>
									<div class="form-group">
									    <input type="hidden" name="uniqueId" value="<?php echo $data[0]->uniqueId;?>" />
										<input class="form-control success" name="gameId" placeholder="" type="text" value="<?php echo $data[0]->gameId;?>" />
									
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group"><label class="control-label">Game Name</label>
									<div class="form-group">
									<input class="form-control success" name="gameName" placeholder="" type="text"  value="<?php echo $data[0]->gameName;?>"/>
								</div>
									<div class="clearfix"></div>
								</div>
							</div>
								<div class="col-md-4">
								<div class="form-group"><label class="control-label">Scr. Off Ticket</label>
									<div class="form-group">
									<input class="form-control success" name="scr_off_ticket" placeholder="" type="text" value="<?php echo $data[0]->scr_off_ticket;?>" />
								</div>
									<div class="clearfix"></div>
								</div>
							</div>
								<div class="col-md-4">
								<div class="form-group"><label class="control-label">Game Value</label>
									<div class="form-group">
										<input class="form-control success" type="text" name="gameValue" value="<?php echo $data[0]->gameValue;?>" /> 
									
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group"><label class="control-label">$$</label>
									<div class="form-group">
										<input type="text" class="form-control success" name="gameValuePrice" value="<?php echo $data[0]->gameValuePrice;?>"/> 
									
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group"><label class="control-label">Starting #</label>
									<div class="form-group">
										<input class="form-control success" name="starting" placeholder="" type="text" value="<?php echo $data[0]->starting;?>"/>
									
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
								<div class="col-md-4">
								<div class="form-group"><label class="control-label">Ending #</label>
									<div class="form-group">
										<input class="form-control success" name="ending" placeholder="" type="text" value="<?php echo $data[0]->ending;?>"/>
									
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
								<div class="col-md-4">
								<div class="form-group"><label class="control-label">Tickets per pack #</label>
									<div class="form-group">
										<input class="form-control success" name="tickets" placeholder="" type="text" value="<?php echo $data[0]->tickets;?>" />
									
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
				
						<div class="col-md-12">
						<input type="button"  class="btn btn-primary editSCRSave" value="SAVE" />
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
