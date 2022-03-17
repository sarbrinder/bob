		<div class="inventoryListDetail">
				<div class="row">
					<div class="breadcrumbs">
						<p class="pull-left">Location >> Store List </p>
						<p class="pull-right"><i class="fa fa-home"></i> / Store List</p>
					</div>
					<div id="storeMsg"></div>
				</div>
				<div class="content_sec">
					<div class="margin_40"></div>
						<input type="text" name="searchBox" class="form-control searchStore" placeholder="Search" style="width: 207px;"/>
						<div class="row">
	    	                <div class="col-md-12 col-sm-12 col-xs-12 leftMainDiv">
					            <div class="detail-recents clearfix pull-left placeTable" id="allRecords">
					                <table class="table table-bordered ">
				<thead class="thead-inverse">
				<tr>
				  <th>Action</th>
				  <th>Store Name</th>
				  <th>Email Id</th>
				  <th>Phone Number</th>
				  <th>Address</th>
				  <th>Assigned Manager</th>
				</tr>
			  </thead>
			  <tbody>
				<?php if(count($data) > 0){
				
					foreach($data as $store){
				?>
					<tr id="row<?php   echo $store->storeId;?>">
					  <td>
					      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action</button>
					  <ul class="dropdown-menu">
						<li>
						<a href="javascript:void(0)" id="<?php   echo $store->storeId;?>"  ordjob="<?php // echo $details->id;?>" class="editstoreaction">Edit Store</a>
						
						</li>
						<li>
							<a href="javascript:void(0)" id="<?php  echo $store->storeId;?>"  ordjob="<?php // echo $details->id;?>" class="deletestoreList">Delete</a>
							</li>
						</ul></td>
					  <td><?php echo $store->storeName;?></td>				  
					  <td><?php echo $store->email;?></td>				  
					  <td><?php echo $store->phoneNo;?></td>				  
					  <td><?php echo $store->address;?></td>				  
					 <td><a href="javascript:void(0)" id="<?php echo $store->storeId; ?>" managerId="<?php echo $store->mangerId;?>" class="viewManagerList" style="text-align: center;">View</a></td>		  
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
				 <div class="col-md-12 ">
					<div class="col-md-6 storeAjaxPagination">					  
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
		  <input type="hidden" id="deleteRstore"/>
		  <input type="hidden" id="pageName" />
		<h2>Confirm Delete Store?</h2><br>
		<p>Are you sure you want to delete this Store in database?<br/>
		</p>
		<p></p>
		<p></p>
		<p>
			<a href="javascript:void(0)" id="keepstore">No Keep this Store</a> &nbsp;
			<button type="button" class="btn btn-primary upload-img"  id="deletestoredetail">Yes, delete this Store</button>
		</p>
      </div>
      <!-- dialog buttons -->
     
    </div>
  </div>
</div>


	<div id="managerModal" class="modal fade" style="opacity: 1!important;margin-top: 131px;" role = "dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- dialog body -->
      <div class="modal-body">
 <h3></h3><br><br><br>
 <span class="msg"></span>
 <input type="hidden" id="selectStoreId"/>
 <div class="col-sm-6">
		 <select class="form-control" id="getMultipleManager">
	    <option value="">Select Manager</option>
	     <?php if(count($data) > 0){
		 foreach($user as $user){
		   ?>
		<option value="<?php echo $user->uniqueId; ?>"><?php  echo $user->fName .' ' .$user->lName; ?></option>
		 <?php 
	         }
		 }
		  ?>
	</select>
		 </div>
		 <div class="col-sm-12">
		     <table id="tableAppend" class="table table-bordered" >
		         <thead>
		              <tr>
	        <th>Action</th>
	        <th>First Name</th>
	        <th>Last Name</th>
	        <th>Email</th>
	    </tr>
		         </thead>
	   
	</table>
		 </div>
		 <div class="col-sm-12">
		     <a href="javascript:void(0)" id="keepstore">No Keep this Manager List</a> &nbsp;
			<button type="button" class="btn btn-primary upload-img"  id="updateManagerList">Save</button>
		 
		 </div>
		 
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