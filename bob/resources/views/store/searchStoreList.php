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
					 <td><?php echo $store->fName . ' ' .$store->lName; ?></td>		  
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