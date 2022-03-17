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
						<a href="javascript:void(0)" id="<?php   echo $sale->uniqueId;?>"  ordjob="<?php // echo $details->id;?>" class="editstoreaction">Edit</a>
						
						</li>
						<li>
							<a href="javascript:void(0)" id="<?php  echo $sale->uniqueId;?>"  ordjob="<?php // echo $details->id;?>" class="deletestoreList">Delete</a>
							</li>
						</ul></td>
					  <td><?php echo $sale->created_date;?></td>				  
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