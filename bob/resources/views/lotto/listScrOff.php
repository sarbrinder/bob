		<div class="inventoryListDetail">
				<div class="row">
					<div class="breadcrumbs">
						<p class="pull-left">Lotto Scr.Off >> List of Scr .Off </p>
						<p class="pull-right"><i class="fa fa-home"></i> / Scr .Off</p>
					</div>
				</div>
				<div id="showMsg"></div>
				<div class="content_sec">
					<div class="margin_40"></div>
					<div class="row">
					    <div class="col-md-4 float-left">
					      <input type="text" name="searchBox" class="form-control searchSCRList" placeholder="Search by Date" style="width: 207px;"/>
			           </div>
			            <div class="col-md-4 float-left">
					      <input type="text" name="" class="form-control " placeholder="Search by Date" style="width: 207px;" readonly value="<?php $date=date_create($lastDate); echo date_format($date,"m/d/Y");?>"/>
			           </div>
					    <div class="col-md-2 float-right">
					        <a href="<?php echo URL('/add-scr-off');?>" class="btn btn-primary">Add Scr. off</a>
					 </div>
					</div>
						<div class="row">
	    	                <div class="col-md-12 col-sm-12 col-xs-12 leftMainDiv">
					            <div class="detail-recents clearfix pull-left placeTable" id="allRecords">
					                <table class="table table-bordered ">
				<thead class="thead-inverse">
				<tr>
				  <!--<th>Action</th>-->
				  <th>Slot No</th>
				  <th>Game Id</th>
				  <th>Game Name</th>
				  <th>Scr off Ticket</th>
				  <th>Game Value</th>
				  <th>Game Value $$</th>
				  <th>Starting</th>
				  <th>Ending</th>
				  <th>Ticket</th>
				  <!--<th>Date</th>-->
				</tr>
			  </thead>
			  <tbody>
				<?php if(isset($data) > 0){
				        $gamevalue = 0 ; $gameValuePrice = 0; $ticketSum = 0;
					//foreach($data as $list){
					    for($i=1;$i<=56;$i++){
					         $findOrder = array_search($i,array_column($data,'slotNo')); 
					         if(isset($data[$findOrder]->slotNo) &&  $data[$findOrder]->slotNo == $i){  //die('if');
					             if($data[$findOrder]->slotNo == $i){
					                 $gamevalue = (float)$gamevalue + (float)$data[$findOrder]->gameValue ;
					                 $gameValuePrice = (float)$gameValuePrice + (float)$data[$findOrder]->gameValuePrice;
				?>
					<tr id="row<?php echo $data[$findOrder]->uniqueId;?>" activateId = "<?php echo $data[$findOrder]->activateUniqueId;?>">
					 <!-- <td>-->
					 <!-- <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action</button>-->
					 <!-- <ul class="dropdown-menu">-->
						<!--<li>-->
						<!--<a href="javascript:void(0)" id="<?php  //echo $list->uniqueId;?>" class="editSCR">Edit</a>-->
						
						<!--</li>-->
					
						<!--</ul></td>-->
					<td id="slot<?php echo $data[$findOrder]->uniqueId;?>"><?php echo $data[$findOrder]->slotNo;?></td>	
					  <td id="gameId<?php echo $data[$findOrder]->uniqueId;?>"><?php echo $data[$findOrder]->gameId;?></td>				  
					  <td id="gameName<?php echo $data[$findOrder]->uniqueId;?>"><?php echo $data[$findOrder]->gameName;?></td>				  
					  <td id="scrTicket<?php echo $data[$findOrder]->uniqueId;?>"><?php echo $data[$findOrder]->scr_off_ticket;?></td>				  
					  <td id="gameValue<?php echo $data[$findOrder]->uniqueId;?>"><?php echo $data[$findOrder]->gameValue;?></td>
					  <td id="gameValuePrice<?php echo $data[$findOrder]->uniqueId;?>"><?php echo $data[$findOrder]->gameValuePrice; ?></td>
					  <td id="starting<?php echo $data[$findOrder]->uniqueId;?>"><?php if($data[$findOrder]->newStart == '') { echo $data[$findOrder]->starting;}else { echo $data[$findOrder]->newStart; }?></td>
					  <td id="ending<?php echo $data[$findOrder]->uniqueId;?>" vall =<?php if($data[$findOrder]->newEnd == '') { echo $data[$findOrder]->ending;}else { echo $data[$findOrder]->newEnd; }?> ><?php //echo $data[$findOrder]->ending;?>  <span class="showEndingModal" style="float: center;color:#FFC810" scroffId="<?php echo $data[$findOrder]->uniqueId;?>" serialNo="<?php echo $data[$findOrder]->activate_serialRef?>" ><i class="fa fa-plus" aria-hidden="true"></i></span></td>
					  <?php 
					    if($data[$findOrder]->newStart == '') { $starting = $data[$findOrder]->starting; } else { $starting = $data[$findOrder]->newStart; }
					    if($data[$findOrder]->newEnd == '') { $ending =  $data[$findOrder]->ending; }else { $ending =  $data[$findOrder]->newEnd; }
					    $ticket = (int)$ending - (int)$starting;
					    $ticket = $ticket * (float)$data[$findOrder]->gameValuePrice;
					    $ticketSum = $ticketSum + $ticket;
					  ?>
					  <td id="tickets<?php echo $data[$findOrder]->uniqueId;?>">$ <?php echo $ticket;//echo $data[$findOrder]->tickets;?></td>
					  <!--td id="date<?php //echo $data[$findOrder]->uniqueId;?>"><?php //$date=date_create($data[$findOrder]->createdDate); echo date_format($date,"m/d/Y");?></td-->
					 	  
					</tr>
				<?php
					         }
					             
					         }else{//die('else');
					         ?>
					         <tr>
					             <td><?php echo $i; ?></td>
					             <td></td>
					             <td></td>
					             <td></td>
					             <td></td>
					             <td></td>
					             <td></td>
					             <td></td>
					             <td></td>
					             <!--<td></td>-->
					         </tr>
					         <?php
					         }
					}
					}
					else{
						echo '<tr><td colspan="14">No record found.</td></tr>';
					}
				?>
				<?php if(isset($data) > 0 ) { ?>
				<tr>
				    <td colspan="4"></td>
				    
				    <td><?php echo number_format($gamevalue,2) ;?></td>
				    <td><?php echo number_format($gameValuePrice,2) ;?></td>
				    <td></td>
				    <td></td>
				    <td>$ <?php echo number_format($ticketSum,2);?></td>
				    
				</tr>
				<?php }?>
			  </tbody>
			</table>
				 <div class="col-md-12">
					<div class="col-md-6 scrAjaxPagination">					  
						<?php //echo $data->links(); ?>
					</div>					
					</div>
					            </div>
					        </div>
					   </div>
                </div>
		
		</div>
		<div id="editStore"></div>
		<div id="myCommModal" class="modal fade" style="opacity: 1!important;">
  <div class="modal-dialog confirm-delete">
    <div class="modal-content">
      <!-- dialog body -->
      <div class="modal-body">
		  <input type="hidden" id="deleteRef"/>
		  <input type="hidden" id="pageName" />
		<h2>Confirm Delete User?</h2>
		<p>Are you sure you want to delete this user in database?<br/>
		</p>
		<p></p>
		<p></p>
		<p>
			<a href="javascript:void(0)" id="keepData">No Keep this data</a> &nbsp;
			<button type="button" class="btn btn-primary upload-img"  id="deleteuserdetail">Yes, delete this information</button>
		</p>
      </div>
      <!-- dialog buttons -->
     
    </div>
  </div>
</div>

<!--------- enter ending modal--------------------->
		<div id="endingModal" class="modal fade" style="opacity: 1!important;">
  <div class="modal-dialog confirm-delete">
    <div class="modal-content">
      <!-- dialog body -->
      <div class="modal-header">
          	<h3>Enter the Number</h3>
      </div>
      <div class="modal-body">
          <span id="modalMsg"></span>
          <br>
		  <input type="hidden" id="scroffId"/>
		  <input type="hidden" id="endingNum" />
		  <input type="hidden" id="startingNum" />
		  <input type="hidden" id="slot" />
		  <input type="hidden" id="activateId" />
		  <input type="hidden" id="serialNo" />
		<br><br>
		 <div class="row">
		     <div class="col-sm-12">
		         <input type="text" class="form-control" value="<?php echo date('m/d/Y');?>" readonly/>
		     </div>
		     <div class="col-sm-12">
		         <input type="text" class="form-control number" placeholder="Enter number"/>
		     </div>
		 </div>
	<br><br>
		
	
      </div>
      <div class="modal-footer">
          <input type="button" value="Cancel" class="btn btn-primary cancelModal"/>
           <input type="button" value="Save" class="btn btn-primary saveEntry"/>
      </div>
      <!-- dialog buttons -->
     
    </div>
  </div>
</div>
<!-------------------------------------------------->

<style>
.modal-dialog.confirm-delete{
    position: relative;
    top: 171px;
    width: 387px;
    padding: 24px 15px;
}
div#myCommModal {
    background-color: rgba(0,0,0,0.4);
}
</style>
		<?php echo view('commonview.mainFooter');?>