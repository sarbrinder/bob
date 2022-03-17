		<div class="saleList">
				<div class="row">
					<div class="breadcrumbs">
						<p class="pull-left">Location >> Sale List </p>
						<p class="pull-right"><i class="fa fa-home"></i> / Sale List</p>
					</div>
					<div id="storeMsg"></div>
				</div>
				<div class="content_sec">
					<div class="margin_40"></div>
					<div class="row">
					    <div class="col-md-3">
					        <input type="text" name="searchBox" id="saledatepickerFrom" class="form-control " placeholder="Search From date" style="width: 207px;" autocomplete="off"/>
					    </div>
					    <div class="col-md-3">
					        <input type="text" name="searchBox" id="saledatepickerTo" class="form-control " placeholder="Search To date" style="width: 207px;" autocomplete="off"/>
					    </div>
					</div>
						<div class="row">
	    	                <div class="col-md-12 col-sm-12 col-xs-12 leftMainDiv">
					            <div class="detail-recents clearfix pull-left placeTable" id="allRecords">
					                <table class="table table-bordered ">
				<thead class="thead-inverse">
				<tr>
				  <th>Action</th>
				  <th>Date</th>
				  <th>Added By</th>
				  
				</tr>
			  </thead>
			  <tbody>
				<?php if(count($data) > 0){
				
					foreach($data as $sale){
				?>
					<tr id="row<?php   echo $sale->uniqueId;?>">
					  <td>
					      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action</button>
					  <ul class="dropdown-menu">
						<li>
						<a href="javascript:void(0)" id="<?php   echo $sale->uniqueId;?>"   class="editsale">Edit</a>
						
						</li>
						<!--<li>-->
						<!--	<a href="javascript:void(0)" id="<?php  //echo $sale->uniqueId;?>"  class="deletestoreList">Delete</a>-->
						<!--</li>-->
						</ul></td>
					  <td><?php $date=date_create($sale->created_date); echo date_format($date,"m/d/Y");?></td>				  
					  <td><?php echo $sale->fName . ' ' . $sale->lName;?></td>				  
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
					<div class="col-md-6 saleAjaxPagination">					  
						<?php echo $data->links(); ?>
					</div>					
					</div>
					            </div>
					        </div>
					   </div>
                </div>
		
		</div>
		<div id="editSale"></div>
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