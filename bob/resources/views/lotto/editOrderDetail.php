		<div class="inventoryListDetail">
				<div class="row">
					<div class="breadcrumbs">
						<p class="pull-left">Lotto Scr.off > Edit Receive Order</p>
						<p class="pull-right"><i class="fa fa-home"></i> / Edit Receive Order</p>
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
						<form action="<?php echo URL('/edit-receive-order-save');?>" class="profileSetting" id="editOrderSave" method="post" accept-charset="utf-8">
							<div class="row">
							
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">Date</label>
									<div class="form-group">
									    <input type="hidden" name="orderId" value="<?php echo $data[0]->uniqueId;?>" />
										<input class="form-control success" name="order_date" placeholder="MM/DD/YY" type="text" autocomplete="off" value="<?php $date=date_create($data[0]->order_date); echo date_format($date,"m/d/Y");?>"/>
									
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">Game</label>
									<div class="form-group">
										<select class="form-control success getGameDetail" name="gameRef" >
										    <option value="">Select</option>
										    <?php 
										    if(count($gameId) > 0) {
										    foreach($gameId as $gameId){
										    ?>
										    <option value="<?php echo $gameId->uniqueId;?>" <?php if($data[0]->gameRef == $gameId->uniqueId) {  echo 'Selected'; } ?>><?php echo $gameId->gameId;?></option>
										    <?php } }?>
										</select>
										
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
								<div class="col-md-6">
								<div class="form-group"><label class="control-label">Serial</label>
									<div class="form-group">
										<input class="form-control success checkSerialNumber" name="serial" type="text"  value="<?php echo $data[0]->serial;?>"/>
									
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">Game Name</label>
									<div class="form-group">
										<input class="form-control success"  name="gameName" placeholder="Game Name" type="text" value="<?php echo $data[0]->gameName;?>" readonly/>
										<span></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label class="control-label">Total</label>
									<div class="form-group">
										<input class="form-control success" name="total" placeholder="Total" type="text" value="<?php echo $data[0]->gameValue;?>" readonly/>
									
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
				
						<div class="col-md-12">
						<input type="button"  class="btn btn-primary editOrderSave" value="SAVE" />
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
