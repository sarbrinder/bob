      <table class="table table-bordered ">
				<thead class="thead-inverse">
				<tr>
				  <th>Action</th>
				  <th>Name</th>
				  <th>Email Id</th>
				  <th>Phone Number</th>
				  <th>Address</th>
				  <th>Type</th>
				   <th>Status</th>
				</tr>
			  </thead>
			  <tbody>
				<?php if(count($data) > 0){
				        $type= array('','Super Admin','Admin','Manager','Others');
				        $arr = array('1' => 'Active', '2' => 'Deactive');
					foreach($data as $store){
					    if($store->type != 1){
				?>
				
					<tr id="row<?php echo $store->uniqueId;?>" style="background: #fff;">
					  <td>
					  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action</button>
					  <ul class="dropdown-menu">
						<li>
						<a href="javascript:void(0)" id="<?php  echo $store->uniqueId;?>"  ordjob="<?php // echo $details->id;?>" class="edituseraction">Edit user</a>
						
						</li>
						<li>
							<a href="javascript:void(0)" id="<?php  echo $store->uniqueId;?>"  ordjob="<?php // echo $details->id;?>" class="deleteUserList">Delete</a>
							</li>
						</ul></td>
					   <td><?php echo $store->fName.' '.$store->lName;?></td>				  
					  <td><?php echo $store->email;?></td>				  
					  <td><?php echo $store->phoneNo;?></td>				  
					  <td><?php echo $store->address;?></td>
					  <td><?php echo $type[$store->type]; ?></td>
					  <td id="status<?php echo $store->uniqueId;?>"><?php echo $arr[$store->status];?></td>
					 	  
					</tr>
				<?php
					    }
					    else{
					        echo '<tr><td colspan="7">No record found.</td></tr>';
					    }
					}
				}
					else{
						echo '<tr><td colspan="7">No record found.</td></tr>';
					}
				?>
			  </tbody>
			</table>