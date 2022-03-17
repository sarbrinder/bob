		
			<style>
 
   td.deleteActRow{
    text-align: center;
    font-size: larger;
    cursor: pointer;
   font-weight: 900;
   color:red;
}


</style>
		<div class="inventoryListDetail">
				<div class="row">
					<div class="breadcrumbs">
						<p class="pull-left">Lotto Scr.off > Activate Scr.off</p>
						<p class="pull-right"><i class="fa fa-home"></i> / Activate Scr.off</p>
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
						<form action="<?php echo URL('/activate-scr-off');?>" class="profileSetting" id="profileSetting" method="post" accept-charset="utf-8">
							
				<div class="row">
					<div class="col-md-12">
					     <!------------------------------------------->
					     	      <table class="table table-bordered" id="order">
					     	          <thead class="thead-inverse">
			          <tr>
			              <th></th>
			              <th>Date</th>
			              <th>Game</th>
			              <th>Serial</th>
			              <th>Slot No</th>
			              <th>Action</th>
			              
			          </tr>
			          </thead>
			          <tr class="tr_clone">
			              <td class="deleteActRow" tableId="order" fixedRow="2">-</td>
			              <td><input class="form-control success textFieldDatepicker" name="activate_date[]" placeholder="MM/DD/YY" type="text" autocomplete="off" /></td>
			              <td>	<select class="form-control success getSerialDetail" name="activate_gameRef[]" >
										    <option value="">Select</option>
										    <?php 
										    if(count($gameId) > 0) {
										    foreach($gameId as $gameId){
										    ?>
										    <option value="<?php echo $gameId->uniqueId;?>"><?php echo $gameId->gameId;?></option>
										    <?php } }?>
										</select>
							</td>
			              <td><select class="form-control success activate_serial" name="activate_serialRef[]" >
										    <option value="">Select Serial</option>
										    
										    </select></td>
			              <td>
			                  <!--<input class="form-control success"  name="slotNo" placeholder="Slot No" type="text"/>-->
			              <select class="form-control success slotNo" name="slotNo[]" >
										    <option value="">Select Slot</option>
										    <?php 
										    if(count($slot) > 0) {
										    foreach($slot as $slot){
										    ?>
										    <option value="<?php echo $slot->slot_no;?>"><?php echo $slot->slot_no;?></option>
										    <?php } }?>
										</select>
			              </td>
			              <td><input type="button" class="btn btn-primary addActivateRow" value="Clone"/></td>
			             
			          </tr>
			      </table>
					     <!------------------------------------------->

			
				<div class="col-md-12">
				   
				    <div class="col-md-2">
				        <input type="submit"  class="btn btn-primary checkForm" value="SAVE" />
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