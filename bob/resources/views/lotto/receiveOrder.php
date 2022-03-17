		
		<style>
 
   td.deleteRow{
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
						<p class="pull-left">Lotto Scr.off > Receive Order</p>
						<p class="pull-right"><i class="fa fa-home"></i> / Receive Order</p>
					</div>
				</div>
				
				 
			  
				<div class="content_sec">
					<div class="margin_40"></div>
						<div class="row">
					    <div class="col-md-10 float-left">
					      <h2 class="formHeadingStyle1">Add Basic Details</h2>
					    </div>
					    <div class="col-md-2 float-right">
					        <a href="<?php echo URL('/receive-order-list');?>" class="btn btn-primary">Received Order list</a>
					
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
			 <div class="msg1"></div>
	<div class="row">
	    	<div class="col-md-12 col-sm-12 col-xs-12 leftMainDiv">
					<div class="detail-recents clearfix pull-left" id="allRecords">
						<form action="<?php echo URL('/receive-order');?>" class="profileSetting" id="profileSetting" method="post" accept-charset="utf-8">
							
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
			              <th>Game Name</th>
			              <th>Total</th>
			              <th>Action</th>
			          </tr>
			          </thead>
			          <tr class="tr_clone">
			              <td class="deleteRow" tableId="order" fixedRow="2">-</td>
			              <td><input class="form-control success textFieldDatepicker" name="order_date[]" placeholder="MM/DD/YY" type="text" autocomplete="off" /></td>
			              <td>	<select class="form-control success getGameDetail" name="gameRef[]" >
										    <option value="">Select</option>
										    <?php 
										    if(count($gameId) > 0) {
										    foreach($gameId as $gameId){
										    ?>
										    <option value="<?php echo $gameId->uniqueId;?>"><?php echo $gameId->gameId;?></option>
										    <?php } }?>
										</select>
							</td>
			              <td><input class="form-control success checkSerialNumber" name="serial[]" type="text" /></td>
			              <td><input class="form-control success gameName"  name="gameName[]" placeholder="Game Name" type="text" readonly/></td>
			              <td><input class="form-control success total" name="total[]" placeholder="Total" type="text" readonly/></td>
			              <td><input type="button" class="btn btn-primary addRow" value="Clone"/></td>
			          </tr>
			      </table>
					     <!------------------------------------------->

			
				<div class="col-md-12">
				    <div class="col-md-2">
				       <input type="text" class="form-control subTotal" readonly placeholder="Sub Total"/>
				    </div>
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