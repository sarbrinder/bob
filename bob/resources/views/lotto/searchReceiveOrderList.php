				                <table class="table table-bordered ">
				<thead class="thead-inverse">
				<tr>
				  <th>Action</th>
				  <th>Game Id</th>
				  <th>Game Name</th>
				  <th>Game Value</th>
				  <th>serial</th>
				  <th>Order Date</th>
				 
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