		<div class="inventoryListDetail">
				<div class="row">
					<div class="breadcrumbs">
						<p class="pull-left">Lotto Scr.Off >> Received Order List </p>
						<p class="pull-right"><i class="fa fa-home"></i> / Received Order List</p>
					</div>
				</div>
				<div id="showMsg"></div>
				<div class="content_sec">
					<div class="margin_40"></div>
					<div class="row">
					    <div class="col-md-10 float-left">
					      <input type="text" name="searchBox" class="form-control searchOrder" placeholder="Search by Serial" style="width: 207px;"/>
			          
					    </div>
					    <div class="col-md-2 float-right">
					        <a href="<?php echo URL('/receive-order');?>" class="btn btn-primary">Add Received Order</a>
					
					    </div>
					</div>
						<div class="row">
	    	                <div class="col-md-12 col-sm-12 col-xs-12 leftMainDiv">
					            <div class="detail-recents clearfix pull-left placeTable" id="allRecords">
					                <table class="table table-bordered ">
				<thead class="thead-inverse">
				<tr>
				  <th>Action</th>
				  <th>Game Id</th>
				  <th>Game Name</th>
				  <th>Game Value</th>
				  <th>serial</th>
				  <th>Order Date</th>
				  <th>Status</th>
				</tr>
			  </thead>
			  <tbody>
				<?php if(count($data) > 0){
				    $arr = array('1' => 'Active' ,'2' => 'Selected' ,'3' => 'Deactive');
				    $arr1 = array('1' => 'green' ,'2' => 'orange' ,'3' => 'red');
				        
					foreach($data as $list){
				?>
					<tr id="row<?php echo $list->uniqueId;?>">
					  <td>
					      <?php if($list->status == 1 || $list->status == 2) {?>
					  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action</button>
					  <ul class="dropdown-menu">
						<li>
						<a href="javascript:void(0)" id="<?php  echo $list->uniqueId;?>" class="editOrder">Edit</a>
						
						</li>
					
						</ul>
						<?php }?>
						</td>
					  <td id="gameId<?php echo $list->uniqueId;?>"><?php echo $list->gameId;?></td>				  
					  <td id="gameName<?php echo $list->uniqueId;?>"><?php echo $list->gameName;?></td>				  
					  <td id="gameValue<?php echo $list->uniqueId;?>"><?php echo $list->gameValue;?></td>				  
					  <td id="serial<?php echo $list->uniqueId;?>"><?php echo $list->serial;?></td>
					  <td ><?php $date=date_create($list->order_date); echo date_format($date,"m/d/Y");?></td>
					  <td style="font-weight: 800;color:<?php echo $arr1[$list->status];?>"><?php echo $arr[$list->status] ;?></td> 
					</tr>
				<?php
					}
					}
					else{
						echo '<tr><td colspan="7">No record found.</td></tr>';
					}
				?>
			  </tbody>
			</table>
				 <div class="col-md-12">
					<div class="col-md-6 orderAjaxPagination">					  
						<?php echo $data->links(); ?>
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