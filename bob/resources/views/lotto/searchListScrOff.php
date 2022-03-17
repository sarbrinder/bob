			                <table class="table table-bordered ">
				<thead class="thead-inverse">
				<tr>
				  <!--<th>Action</th>-->
				  <th>Slot No</th>
				  <th>Game Id</th>
				  <th>Game Name</th>
				  <th>Scr off Ticket</th>
				  <th>Game Value</th>
				  <th>Game Value $$</th>
				  <th>Starting</th>
				  <th>Ending</th>
				  <th>Ticket</th>
				  <!--<th>Date</th>-->
				</tr>
			  </thead>
		<tbody>
				<?php if(count($data) > 0){
				        $gamevalue = 0 ; $gameValuePrice = 0; $ticketSum = 0;
					//foreach($data as $list){
					    for($i=1;$i<=56;$i++){
					         $findOrder = array_search($i,array_column($data,'slotNo')); 
					         if(isset($data[$findOrder]->slotNo) &&  $data[$findOrder]->slotNo == $i){  //die('if');
					             if($data[$findOrder]->slotNo == $i){
					                 $gamevalue = (float)$gamevalue + (float)$data[$findOrder]->gameValue ;
					                 $gameValuePrice = (float)$gameValuePrice + (float)$data[$findOrder]->gameValuePrice;
				?>
					<tr id="row<?php echo $data[$findOrder]->uniqueId;?>" activateId = "<?php echo $data[$findOrder]->activateUniqueId;?>">
					 <!-- <td>-->
					 <!-- <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action</button>-->
					 <!-- <ul class="dropdown-menu">-->
						<!--<li>-->
						<!--<a href="javascript:void(0)" id="<?php  //echo $list->uniqueId;?>" class="editSCR">Edit</a>-->
						
						<!--</li>-->
					
						<!--</ul></td>-->
					<td id="slot<?php echo $data[$findOrder]->uniqueId;?>"><?php echo $data[$findOrder]->slotNo;?></td>	
					  <td id="gameId<?php echo $data[$findOrder]->uniqueId;?>"><?php echo $data[$findOrder]->gameId;?></td>				  
					  <td id="gameName<?php echo $data[$findOrder]->uniqueId;?>"><?php echo $data[$findOrder]->gameName;?></td>				  
					  <td id="scrTicket<?php echo $data[$findOrder]->uniqueId;?>"><?php echo $data[$findOrder]->scr_off_ticket;?></td>				  
					  <td id="gameValue<?php echo $data[$findOrder]->uniqueId;?>"><?php echo $data[$findOrder]->gameValue;?></td>
					  <td id="gameValuePrice<?php echo $data[$findOrder]->uniqueId;?>"><?php echo $data[$findOrder]->gameValuePrice; ?></td>
					  <td id="starting<?php echo $data[$findOrder]->uniqueId;?>"><?php if($data[$findOrder]->newStart == '') { echo $data[$findOrder]->starting;}else { echo $data[$findOrder]->newStart; }?></td>
					  <td id="ending<?php echo $data[$findOrder]->uniqueId;?>" vall =<?php if($data[$findOrder]->newEnd == '') { echo $data[$findOrder]->ending;}else { echo $data[$findOrder]->newEnd; }?> ><?php //echo $data[$findOrder]->ending;?>  <span class="showEndingModal" style="float: center;color:#FFC810" scroffId="<?php echo $data[$findOrder]->uniqueId;?>" serialNo="<?php echo $data[$findOrder]->activate_serialRef?>" ><i class="fa fa-plus" aria-hidden="true"></i></span></td>
					   <?php 
					    if($data[$findOrder]->newStart == '') { $starting = $data[$findOrder]->starting; } else { $starting = $data[$findOrder]->newStart; }
					    if($data[$findOrder]->newEnd == '') { $ending =  $data[$findOrder]->ending; }else { $ending =  $data[$findOrder]->newEnd; }
					    $ticket = (int)$ending - (int)$starting;
					    $ticket = $ticket * (float)$data[$findOrder]->gameValuePrice;
					     $ticketSum = $ticketSum + $ticket;
					  ?>
					  <td id="tickets<?php echo $data[$findOrder]->uniqueId;?>">$ <?php echo $ticket;//echo $data[$findOrder]->tickets;?></td>
					  <!--td id="date<?php //echo $data[$findOrder]->uniqueId;?>"><?php //$date=date_create($data[$findOrder]->createdDate); echo date_format($date,"m/d/Y");?></td-->
					 	  
					</tr>
				<?php
					         }
					             
					         }else{//die('else');
					         ?>
					         <tr>
					             <td><?php echo $i; ?></td>
					             <td></td>
					             <td></td>
					             <td></td>
					             <td></td>
					             <td></td>
					             <td></td>
					             <td></td>
					             <td></td>
					             <td></td>
					         </tr>
					         <?php
					         }
					}
					}
					else{
						echo '<tr><td colspan="14">No record found.</td></tr>';
					}
				?>
				<?php if(count($data) > 0 ) { ?>
				<tr>
				    <td colspan="4"></td>
				    
				    <td><?php echo number_format($gamevalue,2) ;?></td>
				    <td><?php echo number_format($gameValuePrice,2) ;?></td>
				    <td></td>
				    <td></td>
				    <td>$ <?php echo number_format($ticketSum,2);?></td>
				    
				</tr>
				<?php }?>
			  </tbody>
			</table>
				 <div class="col-md-12">
					<div class="col-md-6 scrAjaxPagination">					  
						<?php //echo $data->links(); ?>
					</div>					
					</div>