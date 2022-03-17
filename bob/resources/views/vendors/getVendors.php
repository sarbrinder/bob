		<div class="inventoryListDetail">
				<div class="row">
					<div class="breadcrumbs">
						<p class="pull-left">Location >> Vendors List </p>
						<p class="pull-right"><i class="fa fa-home"></i> / Vendors List</p>
					</div>
				</div>
				<div id="showMsg"></div>
				<div class="content_sec">
					<div class="margin_40"></div>
					<input type="text" name="searchBox" class="form-control searchVendor" placeholder="Search" style="width: 207px;"/>
			
						<div class="row">
	    	                <div class="col-md-12 col-sm-12 col-xs-12 leftMainDiv">
					            <div class="detail-recents clearfix pull-left placeTable" id="allRecords">
					                <table class="table table-bordered ">
				<thead class="thead-inverse">
				<tr>
				  <th>Action</th>
				  <th>Name</th>
				  <th>Phone Number</th>
				  <th>Address</th>
				  <th>Type</th>
				  <th>Status</th>
				</tr>
			  </thead>
			  <tbody>
				<?php if(count($data) > 0){
				        $type= array('','Retail','Non-Retail');
				        $arr = array('1' => 'Active', '2' => 'Deactive');
				        $color = array('1' => 'darkgreen' , '2' => 'Red');
					foreach($data as $store){
				?>
					<tr id="row<?php echo $store->uniqueId;?>">
					  <td>
					  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action</button>
					  <ul class="dropdown-menu">
						<li>
						<a href="javascript:void(0)" id="<?php  echo $store->uniqueId;?>"  ordjob="<?php // echo $details->id;?>" class="editvendoraction">Edit</a>
						
						</li>
						<li>
							<a href="javascript:void(0)" id="<?php  echo $store->uniqueId;?>"  ordjob="<?php // echo $details->id;?>" class="deletevendorList">Delete</a>
							</li>
						</ul></td>
					  <td><?php echo $store->name?></td>				  
					  <td><?php echo $store->phoneNo;?></td>				  
					  <td><?php echo $store->address;?></td>
					  <td><?php echo $type[$store->type]; ?></td>
					  <td id="status<?php echo $store->uniqueId;?>" style="color:<?php echo $color[$store->status]?>"><?php echo $arr[$store->status];?></td>
					 	  
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
					<div class="col-md-6 vendorAjaxPagination">					  
						<?php echo $data->links(); ?>
					</div>					
					</div>
					            </div>
					        </div>
					   </div>
                </div>
		
		</div>
		<div id="editForm"></div>
		<div id="myCommModal" class="modal fade" style="opacity: 1!important;">
  <div class="modal-dialog confirm-delete">
    <div class="modal-content">
      <!-- dialog body -->
      <div class="modal-body">
		  <input type="hidden" id="deleteRef"/>
		  <input type="hidden" id="pageName" />
		<h2>Confirm Delete User?</h2>
		<p>Are you sure you want to delete this vendors in database?<br/>
		</p>
		<p></p>
		<p></p>
		<p>
			<a href="javascript:void(0)" id="keepData">No Keep this data</a> &nbsp;
			<button type="button" class="btn btn-primary upload-img"  id="deletevendorsdetail">Yes, delete this vendor</button>
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