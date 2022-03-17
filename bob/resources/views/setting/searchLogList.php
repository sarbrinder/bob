			                <table class="table table-bordered ">
				<thead class="thead-inverse">
				<tr>
				  <th>Type</th>
				  <th>Message</th>
				  <th>Date</th>
				  <th>Added By</th>
				  <th>Status</th>
				</tr>
			  </thead>
			  <tbody>
			<?php if(count($data) > 0){
				
					foreach($data as $log){
					    $arr = array('1' => 'red', '2' => 'green');
					 $arr1 = array('Store' => 'store-list' ,'User' => 'user-list' ,'Sale' => 'get-sale' ,'Vendor' => 'vendors-list' , 'Receive-order' => 'receive-order-list' ,'Scr-off' => 'list-scr-off','new-number' => '' ,'Activate-scr' => '')
				?>
					<tr id="row<?php   echo $log->logId;?>" >
					  <td><?php echo $log->type;?></td>				  
					  <td><?php echo $log->message;?></td>				  
					  <td><?php $date=date_create($log->createdDate); echo date_format($date,"d/m/Y"); ?></td>				  
					  <td><?php echo $log->fName . ' ' . $log->lName;?></td>		
					  <td><a style="color:<?php echo $arr[$log->status];?>" href="<?php echo URL('/'.$arr1[$log->type].'?orderBy='.$log->referenceId.'&notiId='.$log->logId);?>" >View</a></td>
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
					<div class="col-md-6 ajaxPagination">					  
						<?php echo $data->links(); ?>
					</div>					
					</div>