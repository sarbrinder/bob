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