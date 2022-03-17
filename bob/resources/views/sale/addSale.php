<style>
    input[type=text] {
            width: 96px;
            max-width:96px;
            pointer-events: none;
            opacity: 0.4;
    }
    th,h2
    {
        text-align: center;
    }
   td.addRow , .addCash , .chargeAdd , .addbankRow{
    text-align: center;
    font-size: larger;
    cursor: pointer;
   font-weight: 800;
}
   td.deleteRow{
    text-align: center;
    font-size: larger;
    cursor: pointer;
   font-weight: 900;
   color:red;
}
#spanMsg {
    margin-left: 15px;
    color: red;
    font-size: initial;
    font-weight: 600;
}

</style>
		<div class="inventoryListDetail">
				<div class="row">
					<div class="breadcrumbs">
						<p class="pull-left">Sale >> Daily Reconciliation</p>
						<p class="pull-right"><i class="fa fa-home"></i> / Daily Reconciliation</p>
					</div>
				</div>
				
				 
			  
				<div class="content_sec">
					<div class="margin_40"></div>

	<h2 >Daily Reconciliation</h2>
	
	<?php if(isset($errors) && count($errors) > 0) {  $message1 = json_decode($errors,true);
				?>
				<!--div class="ajax_report alert-message alert alert-danger updatecartDetail" role="alert"-->
				<?php
				foreach($message1['message'] as $val){
					echo '<br><span class="ajax_message updateController">'.$val.'</span>';
				}
				?>
				 <!--/div-->
				<?php
			  }

			  ?>
			  <div class="msg"></div>
	<div class="row">
	    	<div class="col-md-12 col-sm-12 col-xs-12 leftMainDiv">
					<div class="detail-recents clearfix pull-left" id="allRecords">
						<form action="<?php echo URL('/add-sale-save');?>" class="profileSetting" id="profileSetting" method="post" accept-charset="utf-8">
						    <div class="row">
						        <span id="spanMsg">Note - First select Date then you can fill the form </span> <br><br>
						    </div>
						    <div class="row" style="border: 1px solid lightgray;padding: 4px;">
						        <div class="col-md-2">
						            <label>Date</label>
						        </div>
						        <div class="col-md-10">
						           
						            <input type="text" class="form-control datepicker success" autocomplete="off" name="created_date" id="datepicker" style="pointer-events: unset;opacity: unset;width: 24%;max-width:24%"/>
						           </div>
						    </div><br>
						     <div class="row">
						        <div class="col-md-2">
						            <label>Select Store</label>
						        </div>
						        <div class="col-md-10">
						           <select class="form-control success" name="storeId" style="pointer-events: unset;opacity: unset;width: 24%;max-width:24%">
						               <option value="">Select</option>
						               <?php foreach($store as $val)
						               {
						               ?>
						               <option value="<?php echo $val->storeId;?>"><?php echo $val->storeName;?></option>
						               <?php }
						               ?>
						           </select>
						           
						        </div>
						    </div>
						    <!-- Form reconciliation-->
						        <div class="row">
						        <div class="col-md-4">
						            <table class="table table-bordered" id="charge">
						                
						                    <tr style="background-color:#1EC1D5">
						                       <th colspan="4">Employee Charge</th>
						                    </tr>
						                    <tr>
						                        <th></th>
						                        <th>Name</th>
						                        <th>$</th>
						                        <th></th>
						                  </tr>
						                    <tr class="tr_clone1">
						                         <td class="deleteRow" tableId="charge" fixedRow = 3>-</td>
						                        <td><input type="text" class="form-control " name="empNameCharge[]" style="width: 172px;max-width: 170px;"/></td>
						                        <td><input type="text" class="form-control  chargeAddNum txtNumeric" name="amountCharge[]"/></td>
						                       <td class="chargeAdd">+</td>
						                    </tr>
						                     
						                    </table>
						                    </div>
						                    <div class="col-md-2">
						            <table class="table table-bordered">
						               
						                     <tr style="background-color:#1EC1D5">
						                       
						                        <th colspan="3">Bank Deposit</th>
						                    </tr>
						                    <tr>
						                        <th colspan="2"></th>
						                  </tr>
						                  <!--<tr>-->
						                  <!--     <td>Regular</td>-->
						                        <!--<td><input type="text" class="form-control success" name="bank_required" style="width: 55px;max-width: 55px;"style="width: 55px;max-width: 55px;"style="width: 172px;max-width: 170px;"/></td>-->
						                  <!--  <td><a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal">View</a></td>-->
						                  <!--</tr>-->
						                  <tr>
						                       <!--<td>Total Deposit</td>-->
						                       <td>Reg Deposit</td>
						                        <td><input type="text" readonly class="form-control success" name="bank_total_deposit" style="width: 80px;max-width: 80px;"style="width: 172px;max-width: 170px;"/></td>
						                        <td><a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal">+</a></td>
						                  </tr>
						                 
						                  <tr>
						                      <td>Lotto Deposit</td>
						                      <td><input type="text" readonly class="form-control success txtNumeric" name="bank_check_deposit" style="width: 80px;max-width: 80px;"style="width: 172px;max-width: 170px;" /></td>
						                      <td><a href="javascript:void(0)" data-toggle="modal" data-target="#LottoModal">+</a></td>
						                  </tr>
						                   <tr>
						                      <td>Fuel Deposit</td>
						                      <td><input type="text" readonly class="form-control txtNumeric" name="bank_fuel_deposit"  style="width: 80px;max-width: 80px;"style="width: 172px;max-width: 170px;" /></td>
						                      <td><a href="javascript:void(0)" data-toggle="modal" data-target="#FuelModal">+</a></td>
						                  </tr>
						                  <tr>
						                      <td>Total Line</td>
						                      <td><input type="text" readonly class="form-control success txtNumeric" name="bank_total_line" style="width: 80px;max-width: 80px;"style="width: 172px;max-width: 170px;" /></td>
						                  </tr>
						                  </table>
						                    
						                    </div>
						                    <div class="col-md-6">
						            <table class="table table-bordered" id="vendor">
						                <thead>
						               <tr style="background-color:#1EC1D5">
						                   <th Colspan="7">Vendor Report</th>
						                  
						               </tr>
						               <tr >
						                   <th></th>
						                   <th>No.</th>
						                   <th>Vendor Name</th>
						                   <th>Check/Cash</th>
						                   <th>$$</th>
						                   <th>Invoices</th>
						                   <th>Action</th>
						               </tr>
						               
						                		                
						            </thead>
						            <tbody>
						                <tr class="tr_clone">
						                    <td class="deleteRow" tableId="vendor" fixedRow = 3>-</td>
						                    <td class="checknumber" id="fixnumber" rel= '1'>1</td>
						                   <td>
						                       <select  class="form-control " name="vendor_name[]">
						                       <option value="">Select Vendor</option>
						                       <?php foreach($vendor as $val){?>
						                       <option value="<?php echo $val->uniqueId;?>"><?php echo $val->name;?></option>
						                       <?php }?>
						                       </select>
						                   </td>
						                   <td>
						                       <select class="form-control  payMathod" name="vendor_check_cash[]" >
						                           <option value="">Select</option>
						                           <option value="Check">Check</option>
						                           <option value="Cash">Cash</option>
						                       </select>
						                   </td>
						                  
						                   <td><input type="text" class="form-control addvendorPrice  txtNumeric" name="vendor_price[]" /></td>
						                    <td>
						                       <select class="form-control  payMathod" name="vendor_invoices[]" >
						                           <option value="">Select</option>
						                           <option value="Retail">Retail Invoices</option>
						                           <option value="Deli">Deli Invoices</option>
						                           <option value="Non-Retail">Non Retail Invoices</option>
						                           <option value="Payroll">Payroll Expense</option>
						                       </select>
						                   </td>
						                   <td class="addRow" rel="1">+</td>
						                  
						               </tr>
						            </tbody>
						            </table>
						            
						        </div>
						                    </div>
						    <div class="row">
						        <div class="col-md-3">
						            <table class="table table-bordered">
						                <thead>
						                   <tr style="background-color:#1EC1D5">
						                        <th colspan="2">Sales Entry</th>
						                       
						                   </tr>
						                   <tr>
						                       <td>Total Sales</td>
						                       <td><input type="text" class="form-control calSal success txtNumeric" name="sales_total_sale"/></td>
						                       
						                   </tr>
						                   <tr>
						                       <td>Fuel Sales</td>
						                       <td><input type="text" class="form-control calSal success txtNumeric" name="sales_fuel_sale"/></td>
						                       
						                   </tr>
						                   <tr>
						                       <td>SCR Sales</td>
						                       <td><input type="text" class="form-control calSal success txtNumeric" name="sales_ser_sale" /></td>
						                       
						                   </tr>
						                   <tr>
						                      <td>Lotto Sales</td>
						                       <td><input type="text" class="form-control calSal success txtNumeric" name="sales_lotto_sale"/></td>
						                     
						                   </tr>
						                   <tr>
						                       <td>SCR P/O</td>
						                       <td><input type="text" class="form-control calSal success txtNumeric" name="sales_scr_cashes" /></td>
						                        
						                   </tr><tr>
						                       <td>Lotto P/O</td>
						                       <td><input type="text" class="form-control calSal success txtNumeric" name="sales_lotto_cashes"/></td>
						                       
						                   </tr>
						                   <tr>
						                       <td>Deli Sales : </td>
						                       <td><input type="text" class="form-control success" name="sales_delivery"/></td>
						                      
						                   </tr>
						                    <tr>
						                       <td>Money Order</td>
						                       <td><input type="text" class="form-control calSal success txtNumeric" name="sales_money_order" /></td>
						                       
						                   </tr>
						                   
						                    <tr>
						                       <td>Coupon & MGR</td>
						                       <td><input type="text" class="form-control success " name="sales_coupon" id="sales_coupon" readonly/></td>
						                       
						                   </tr>
						                   <tr >
						                        <td>Inside Sales</td>
						                       <td><input type="text" class="form-control success totalSale" readonly/></td>
						                       
						                   </tr>
						                  
						                </thead>
						            </table>
						        </div>
						        <div class="col-md-2" >
						            <table class="table table-bordered">
						                <thead>
						                   <tr style="background-color:#1EC1D5">
						                        <th colspan="2">Over/Short</th>
						                   </tr>
						                   <tr>
						                       <td>Total Sales</td>
						                       <td><input type="text" class="form-control success" name="OS_total_sales" readonly /></td>
						                   </tr>
						                   <tr>
						                       <td>Sales Tax </td>
						                       <td><input type="text" class="form-control success txtNumeric" name="OS_sale_tax"/></td>
						                   </tr>
						                   <tr>
						                       <td>EBT </td>
						                       <td><input type="text" class="form-control success txtNumeric" name="OS_EBT" /></td>
						                   </tr>
						                   <tr>
						                      <td>Vendor P/O </td>
						                       <td><input type="text" class="form-control  txtNumeric" name="OS_vendor_po"  readonly id="vendorPO" /></td>
						                   </tr>
						                   <tr>
						                       <td>Coupon </td>
						                       <td><input type="text" class="form-control succes txtNumerics" name="OS_coupon"  id="OS_coupon"/></td>
						                   </tr><tr>
						                       <td>Credit Card </td>
						                       <td><input type="text" class="form-control success txtNumeric" name="OS_credit_card" /></td>
						                   </tr>
						                   <tr>
						                       <td>Charge Acct </td>
						                       <td><input type="text" class="form-control success" name="OS_charge_acct" id="chargeAcct" readonly/></td>
						                   </tr>
						                    <tr>
						                       <td>Required $ </td>
						                       <td><input type="text" class="form-control success" name="OS_required"  readonly/></td>
						                   </tr>
						                   
						                    <tr>
						                       <td>Actual $ </td>
						                       <td><input type="text" class="form-control success" readonly name="OS_actual"/></td>
						                   </tr>
						                   <tr >
						                        <td>Short/Over </td>
						                       <td><input type="text" class="form-control success" name="OS_short_over" readonly /></td>
						                   </tr>
						                  
						                </thead>
						            </table>
						        </div>
						        <div class="col-md-3" style="margin-left:35px;">
						            <table class="table table-bordered">
						                <thead>
						                    <tr style="background-color:#1EC1D5">
						                       <th colspan="2">Lotto Over/Short</th>
						                      </tr>
						                    <tr>
						                       <td>Lotto Z-Tape</td>
						                       <td><input type="text" class="form-control success" name="lotto_z_tape" readonly /></td>
						                      
						                   </tr>
						                   <tr>
						                       <td>Scr Z-Tape</td>
						                       <td><input type="text" class="form-control success" name="lotto_scr_tape"/></td>
						                      
						                   </tr>
						                   <tr>
						                       <td>Z-Tape Scr/Lotto P/O</td>
						                       <td><input type="text" class="form-control success" name="lotto_scr_lotto_tape" readonly /></td>
						                      
						                   </tr>
						                   <tr>
						                       <td>Scr Report</td>
						                       <td><input type="text" class="form-control success" name="lotto_scr_report" /><a href="javascript:void(0)" class="viewscroffPopup">View</a></td>
						                     
						                   </tr>
						                   <tr>
						                       <td>Lotto Report</td>
						                       <td><input type="text" class="form-control success" name="lotto_report" /></td>
						                       
						                   </tr>
						                   
						                   <tr>
						                       <td>Lotto P/O Report</td>
						                       <td><input type="text" class="form-control success" name="lotto_pout_report" /></td>
						                       
						                   </tr>
						                   <tr>
						                       <td>Lotto Over/Short</td>
						                       <td><input type="text" class="form-control success" name="lotto_over_short" readonly/></td>
						                      
						                   </tr>
						                   <tr>
						                       <td>Scr Over/Short</td>
						                       <td><input type="text" class="form-control success" name="lotto_scr_over_short" readonly/></td>
						                      
						                   </tr>
						                   <tr >
						                       <!--<td>Per Over/Short</td>-->
						                       <td>Lotto-Scr-P/O-Over Short</td>
						                       <td><input type="text" class="form-control success" name="lotto_per_over_short" /></td>
						                      
						                   </tr>
						                </thead>
						            </table>
						        </div>
						        <div class="col-md-3">
						            <table class="table table-bordered" id="drop">
						                 <tr style="background-color:#1EC1D5">
						                      <th colspan="4">Cash Drop</th>
						                  </tr>
						                  <tr>
						                       <td></td>
						                       <td style="text-align:center">Emp Name </td>
						                       <td style="text-align:center">$</td>
						                       <td></td>
						                  </tr>
						                  <tr class="tr_clone1">
						                       <td class="deleteRow" tableId="drop" fixedRow = 3>-</td>
						                       <td><input type="text" class="form-control" style="width: 100%;max-width:100%" name="empName[]"/></td>
						                       <td><input type="text" class="form-control txtNumeric" name="amount[]" /></td>
						                       <td class="addCash">+</td>
						                  </tr>
						                </table>
						                </div>
						    </div>
						    <div class="row">
						        <div class="col-md-6">
						            <table class="table table-bordered">
						                <thead>
						                    <tr style="background-color:#1EC1D5">
						                   <th Colspan="3">Gas Report</th>
						              </tr>
						              <tr>
						                  <th>Grade</th>
						                   <th>Gallons</th>
						                   <th>$$</th>
						              </tr>
						              <tr>
						                  <td>Unlead</td>
						                   <td><input type="text" class="form-control success gallon" name="gas_unlead" /></td>
						                   <td><input type="text" class="form-control success gallonprice" name="gas_unlead_price" /></td>
						                   
						              </tr>
						              <tr>
						                  <td>Mid</td>
						                   <td><input type="text" class="form-control success gallon" name="gas_med" /></td>
						                   <td><input type="text" class="form-control success gallonprice" name="gas_med_price" /></td>
						                   
						              </tr>
						              <tr>
						                  <td>Plus</td>
						                   <td><input type="text" class="form-control success gallon" name="gas_plus" /></td>
						                   <td><input type="text" class="form-control success gallonprice" name="gas_plus_price" /></td>
						                   
						              </tr>
						              <tr>
						                  <td>Diesel</td>
						                   <td><input type="text" class="form-control success gallon" name="gas_diesel" /></td>
						                   <td><input type="text" class="form-control success gallonprice" name="gas_diesel_price" /></td>
						                   
						              </tr>
						              <tr>
						                  <td>OffRd</td>
						                   <td><input type="text" class="form-control success gallon" name="gas_offered" /></td>
						                   <td><input type="text" class="form-control success gallonprice" name="gas_offered_price" /></td>
						                   
						              </tr>
						              <tr>
						                  <td>Marine Fuel</td>
						                   <td><input type="text" class="form-control success gallon" name="gas_marmee" /></td>
						                   <td><input type="text" class="form-control success gallonprice" name="gas_marmee_price" /></td>
						                   
						              </tr>
						              <tr>
						                   <td>Total</td>
						                   <td><input type="text" class="form-control success" id="gallonTotal" readonly /></td>
						                   <td><input type="text" class="form-control success" id="gallonPriceTotal"  readonly/></td>
						                   
						              </tr>
						                    </thead>
						                    </table>
						            </div>
						            <div class="col-md-6">
						                <table class="table table-bordered">
						                <thead>
						                    <tr style="background-color:#1EC1D5">
						                        <th colspan="4">Valuable assets</th>
						                    </tr>
						                    <tr>
						                   <td>Customer Count</td>
						                   <td><input type="text" class="form-control success" name="assets_cus_acc"/></td>
						                   <th colspan="2"></th>
						                    </tr>
						                    <tr>
						                        <td>Void</td>
						                   <td><input type="text" class="form-control success" name="assets_void" /></td>
						                   <td>$$</td>
						                   <td><input type="text" class="form-control success" name="assets_void_price"/></td>
						                    </tr>
						                    <tr>
						                        <td>Refund</td>
						                   <td><input type="text" class="form-control success"  name="assets_refund" /></td>
						                   <td>$$</td>
						                   <td><input type="text" class="form-control success" name="assets_refund_price"/></td>
						                    </tr>
						                    <tr>
						                         <td>No sale</td>
						                   <td><input type="text" class="form-control success" name="assets_no_sale" /></td>
						                   <td></td>
						                   <td></td>
						                    </tr>
						                    <tr>
						                        <td>Fountain</td>
						                   <td><input type="text" class="form-control success" name="assets_fountein"/></td>
						                   <td>$$</td>
						                   <td><input type="text" class="form-control success" name="assets_fountein_price"/></td>
						                    </tr>
						                    <tr>
						                        <td>Coffee</td>
						                   <td><input type="text" class="form-control success" name="assets_coffee" /></td>
						                   <td>$$</td>
						                   <td><input type="text" class="form-control success" name="assets_coffee_price"/></td>
						                    </tr>
						                     <tr>
						                        <td>Hotdog</td>
						                   <td><input type="text" class="form-control success" name="assets_notdog" /></td>
						                   <td>$$</td>
						                   <td><input type="text" class="form-control success" name="assets_hotgog_price"/></td>
						                    </tr>
						                    <tr>
						                        <td>Tornados</td>
						                   <td><input type="text" class="form-control success" name="assets_ternados" /></td>
						                   <td>$$</td>
						                   <td><input type="text" class="form-control success" name="assets_ternados_price"/></td>
						                    </tr>
						                    <tr>
						                        <td>Pizza slice</td>
						                   <td><input type="text" class="form-control success" name="assets_pizza_slice" /></td>
						                   <td>$$</td>
						                    <td><input type="text" class="form-control success" name="assets_pizza_price"/></td>
						                    </tr>
						                    <tr>
						                        <td>Breakfast Biscuits</td>
						                   <td><input type="text" class="form-control success" name="assets_breakFast" /></td>
						                   <td>$$</td>
						                    <td><input type="text" class="form-control success" name="assets_breakfast_price"/></td>
						                    </tr>
						                    <tr>
						                        <td>Waste Log</td>
						                        <td><input type="text" class="form-control success" name="assets_waste_log" /></td>
						                        <td></td>
						                        <td></td>
						                    </tr>
						               </thead>
						               </table>
						                </div>
						                
						                 <div class="col-md-6">
						                <table class="table table-bordered">
						                <thead>
						                    <tr style="background-color:#1EC1D5">
						                        <th colspan="4">Comment</th>
						                    </tr>
						                    <tr>
						                   <td><textarea name="comment" class="form-control success" rows="6" cols="30" placeholder="Add Comment"></textarea></td>
						                    </tr>
						                    </thead>
						                    </table>
						                    </div>
						    </div>
						 
						                    <div class="row">
						                        <input type="submit" class="btn btn-primary checkForm" value="Save"/>
						                    </div>
						                    
						                    <!----------------------------------------------------------->
						                    <div id="exampleModal" class="modal fade" style="opacity: 1!important;">
  <div class="modal-dialog confirm-delete">
    <div class="modal-content" style="padding-top: 256px;">
      <div class="modal-header">
        <h5 class="modal-title">Enter Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered" id="bank">
            <tr>
                <th>$$</th>
                <th>Quantity</th>
                <!--<th>Bill</th>-->
                <th>Total</th>
            </tr>
            <tr class="tr_clone">
               
                <td><input type="text" class="form-control " value ="100" readonly name="bankAmount[]"/></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBankAmt"  name="bankQty[]" rel="100"/></td>
                 <!--<td><input type="text" placeholder="Enter Bill" class="form-control"  name="bankBill[]"/></td>-->
                 <td><input type="text" placeholder="Total" class="form-control totalVal" readonly name="bankTotal[]"/></td>
            </tr>
            <tr class="tr_clone">
               <td><input type="text" class="form-control" id="bankAmount" value ="50" readonly name="bankAmount[]" /></td>
               <td><input type="text" placeholder="Quantity" class="form-control calBankAmt"  name="bankQty[]" rel="50"/></td>
                <!--<td><input type="text" placeholder="Enter Bill" class="form-control"  name="bankBill[]"/></td>-->
                 <td><input type="text" placeholder="Total" class="form-control totalVal" readonly name="bankTotal[]"/></td>
            </tr>
            <tr class="tr_clone">
               <td><input type="text" class="form-control" value ="20" readonly name="bankAmount[]" /></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBankAmt"  name="bankQty[]" rel="20" /></td>
                <!--<td><input type="text" placeholder="Enter Bill" class="form-control"  name="bankBill[]" /></td>-->
                <td><input type="text" placeholder="Total" class="form-control totalVal" readonly name="bankTotal[]"/></td>
            </tr>
            <tr class="tr_clone">
                <td><input type="text" class="form-control" value ="10" readonly name="bankAmount[]" /></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBankAmt"  name="bankQty[]" rel="10"/></td>
                <!--<td><input type="text" placeholder="Enter Bill" class="form-control" name="bankBill[]" /></td>-->
                 <td><input type="text" placeholder="Total" class="form-control totalVal" readonly name="bankTotal[]"/></td>
            </tr>
            <tr class="tr_clone">
                <td><input type="text" class="form-control" value ="5" readonly name="bankAmount[]" /></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBankAmt"  name="bankQty[]"  rel="5"/></td>
                <!--<td><input type="text" placeholder="Enter Bill" class="form-control"  name="bankBill[]" /></td>-->
                 <td><input type="text" placeholder="Total" class="form-control totalVal" readonly name="bankTotal[]"/></td>
            </tr>
            <tr class="tr_clone">
                <td><input type="text" class="form-control" value ="1" readonly name="bankAmount[]"/></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBankAmt"  name="bankQty[]" rel="1" /></td>
                <!--<td><input type="text" placeholder="Enter Bill" class="form-control"  name="bankBill[]" /></td>-->
                 <td><input type="text" placeholder="Total" class="form-control totalVal" readonly name="bankTotal[]"/></td>
            </tr>
            
            <tr class="tr_clone">
                <td>Total</td>
                <td></td>
                 <td><input type="text" placeholder="Total" class="form-control totalamt " readonly /></td>
            </tr>
        </table>
        <table class="table table-bordered" id="bank">
              <tr>
                <th>Cent</th>
                <th>Quantity</th>
                <!--<th>Bill</th>-->
                <th>Total</th>
            </tr>
              <tr class="tr_clone">
                <td><input type="text" class="form-control" value ="0.01" readonly name="bankAmount[]"/></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBankAmt"  name="bankQty[]" rel="0.01" /></td>
                 <td><input type="text" placeholder="Total" class="form-control totalVal" readonly name="bankTotal[]"/></td>
            </tr>
            <tr class="tr_clone">
                <td><input type="text" class="form-control" value ="0.05" readonly name="bankAmount[]"/></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBankAmt"  name="bankQty[]" rel="0.05" /></td>
                 <td><input type="text" placeholder="Total" class="form-control totalVal" readonly name="bankTotal[]"/></td>
            </tr>
            <tr class="tr_clone">
                <td><input type="text" class="form-control" value ="0.10" readonly name="bankAmount[]"/></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBankAmt"  name="bankQty[]" rel="0.10" /></td>
                 <td><input type="text" placeholder="Total" class="form-control totalVal" readonly name="bankTotal[]"/></td>
            </tr>
             <tr class="tr_clone">
                <td><input type="text" class="form-control" value ="0.25" readonly name="bankAmount[]"/></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBankAmt"  name="bankQty[]" rel="0.25" /></td>
                 <td><input type="text" placeholder="Total" class="form-control totalVal" readonly name="bankTotal[]"/></td>
            </tr>
            </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary calculateBankDeposit" data-dismiss="modal">Done</button>
        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
      </div>
    </div>
  </div>
</div>

				                    <!----------------------------------------------------------->
						                    <div id="LottoModal" class="modal fade" style="opacity: 1!important;">
  <div class="modal-dialog confirm-delete">
    <div class="modal-content" style="padding-top: 256px;">
      <div class="modal-header">
        <h5 class="modal-title">Enter Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered" id="bank">
            <tr>
                <th>$$</th>
                <th>Quantity</th>
                <!--<th>Bill</th>-->
                <th>Total</th>
            </tr>
            <tr class="tr_clone">
               
                <td><input type="text" class="form-control " value ="100" readonly name="lottoAmount[]"/></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBanklotto"  name="lottoQty[]" rel="100"/></td>
                 <!--<td><input type="text" placeholder="Enter Bill" class="form-control"  name="bankBill[]"/></td>-->
                 <td><input type="text" placeholder="Total" class="form-control totalVallotto" readonly name="lottoTotal[]"/></td>
            </tr>
            <tr class="tr_clone">
               <td><input type="text" class="form-control" id="bankAmount" value ="50" readonly name="lottoAmount[]" /></td>
               <td><input type="text" placeholder="Quantity" class="form-control calBanklotto"  name="lottoQty[]" rel="50"/></td>
                <!--<td><input type="text" placeholder="Enter Bill" class="form-control"  name="bankBill[]"/></td>-->
                 <td><input type="text" placeholder="Total" class="form-control totalVallotto" readonly name="lottoTotal[]"/></td>
            </tr>
            <tr class="tr_clone">
               <td><input type="text" class="form-control" value ="20" readonly name="lottoAmount[]" /></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBanklotto"  name="lottoQty[]" rel="20" /></td>
                <!--<td><input type="text" placeholder="Enter Bill" class="form-control"  name="bankBill[]" /></td>-->
                <td><input type="text" placeholder="Total" class="form-control totalVallotto" readonly name="lottoTotal[]"/></td>
            </tr>
            <tr class="tr_clone">
                <td><input type="text" class="form-control" value ="10" readonly name="lottoAmount[]" /></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBanklotto"  name="lottoQty[]" rel="10"/></td>
                <!--<td><input type="text" placeholder="Enter Bill" class="form-control" name="bankBill[]" /></td>-->
                 <td><input type="text" placeholder="Total" class="form-control totalVallotto" readonly name="lottoTotal[]"/></td>
            </tr>
            <tr class="tr_clone">
                <td><input type="text" class="form-control" value ="5" readonly name="lottoAmount[]" /></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBanklotto"  name="lottoQty[]"  rel="5"/></td>
                <!--<td><input type="text" placeholder="Enter Bill" class="form-control"  name="bankBill[]" /></td>-->
                 <td><input type="text" placeholder="Total" class="form-control totalVallotto" readonly name="lottoTotal[]"/></td>
            </tr>
            <tr class="tr_clone">
                <td><input type="text" class="form-control" value ="1" readonly name="lottoAmount[]"/></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBanklotto"  name="lottoQty[]" rel="1" /></td>
                <!--<td><input type="text" placeholder="Enter Bill" class="form-control"  name="bankBill[]" /></td>-->
                 <td><input type="text" placeholder="Total" class="form-control totalVallotto" readonly name="lottoTotal[]"/></td>
            </tr>
            <tr class="tr_clone">
                <td>Total</td>
                <td></td>
                 <td><input type="text" placeholder="Total" class="form-control totalamtlotto " readonly /></td>
            </tr>
        </table>
         <table class="table table-bordered" id="bank">
            <tr>
                <th>Cent</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
             <tr class="tr_clone">
                <td><input type="text" class="form-control" value ="0.01" readonly name="lottoAmount[]"/></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBanklotto"  name="lottoQty[]" rel="0.01" /></td>
                 <td><input type="text" placeholder="Total" class="form-control totalVallotto" readonly name="lottoTotal[]"/></td>
            </tr>
             <tr class="tr_clone">
                <td><input type="text" class="form-control" value ="0.05" readonly name="lottoAmount[]"/></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBanklotto"  name="lottoQty[]" rel="0.05" /></td>
                 <td><input type="text" placeholder="Total" class="form-control totalVallotto" readonly name="lottoTotal[]"/></td>
            </tr>
            <tr class="tr_clone">
                <td><input type="text" class="form-control" value ="0.10" readonly name="lottoAmount[]"/></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBanklotto"  name="lottoQty[]" rel="0.10" /></td>
                 <td><input type="text" placeholder="Total" class="form-control totalVallotto" readonly name="lottoTotal[]"/></td>
            </tr>
            <tr class="tr_clone">
                <td><input type="text" class="form-control" value ="0.25" readonly name="lottoAmount[]"/></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBanklotto"  name="lottoQty[]" rel="0.25" /></td>
                <td><input type="text" placeholder="Total" class="form-control totalVallotto" readonly name="lottoTotal[]"/></td>
            </tr>
            </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary calculateLotto" data-dismiss="modal">Done</button>
        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
      </div>
    </div>
  </div>
</div>




				                    <!----------------------------------------------------------->
						                    <div id="FuelModal" class="modal fade" style="opacity: 1!important;">
  <div class="modal-dialog confirm-delete">
    <div class="modal-content" style="padding-top: 256px;">
      <div class="modal-header">
        <h5 class="modal-title">Enter Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered" id="bank">
            <tr>
                <th>$$</th>
                <th>Quantity</th>
                <!--<th>Bill</th>-->
                <th>Total</th>
            </tr>
            <tr class="tr_clone">
               
                <td><input type="text" class="form-control " value ="100" readonly name="fuelAmount[]"/></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBankfuel"  name="fuelQty[]" rel="100"/></td>
                 <!--<td><input type="text" placeholder="Enter Bill" class="form-control"  name="bankBill[]"/></td>-->
                 <td><input type="text" placeholder="Total" class="form-control totalValfuel" readonly name="fuelTotal[]"/></td>
            </tr>
            <tr class="tr_clone">
               <td><input type="text" class="form-control" id="bankAmount" value ="50" readonly name="fuelAmount[]" /></td>
               <td><input type="text" placeholder="Quantity" class="form-control calBankfuel"  name="fuelQty[]" rel="50"/></td>
                <!--<td><input type="text" placeholder="Enter Bill" class="form-control"  name="bankBill[]"/></td>-->
                 <td><input type="text" placeholder="Total" class="form-control totalValfuel" readonly name="fuelTotal[]"/></td>
            </tr>
            <tr class="tr_clone">
               <td><input type="text" class="form-control" value ="20" readonly name="fuelAmount[]" /></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBankfuel"  name="fuelQty[]" rel="20" /></td>
                <!--<td><input type="text" placeholder="Enter Bill" class="form-control"  name="bankBill[]" /></td>-->
                <td><input type="text" placeholder="Total" class="form-control totalValfuel" readonly name="fuelTotal[]"/></td>
            </tr>
            <tr class="tr_clone">
                <td><input type="text" class="form-control" value ="10" readonly name="fuelAmount[]" /></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBankfuel"  name="fuelQty[]" rel="10"/></td>
                <!--<td><input type="text" placeholder="Enter Bill" class="form-control" name="bankBill[]" /></td>-->
                 <td><input type="text" placeholder="Total" class="form-control totalValfuel" readonly name="fuelTotal[]"/></td>
            </tr>
            <tr class="tr_clone">
                <td><input type="text" class="form-control" value ="5" readonly name="fuelAmount[]" /></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBankfuel"  name="fuelQty[]"  rel="5"/></td>
                <!--<td><input type="text" placeholder="Enter Bill" class="form-control"  name="bankBill[]" /></td>-->
                 <td><input type="text" placeholder="Total" class="form-control totalValfuel" readonly name="fuelTotal[]"/></td>
            </tr>
            <tr class="tr_clone">
                <td><input type="text" class="form-control" value ="1" readonly name="fuelAmount[]"/></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBankfuel"  name="fuelQty[]" rel="1" /></td>
                <!--<td><input type="text" placeholder="Enter Bill" class="form-control"  name="bankBill[]" /></td>-->
                 <td><input type="text" placeholder="Total" class="form-control totalValfuel" readonly name="fuelTotal[]"/></td>
            </tr>
            <tr class="tr_clone">
                <td>Total</td>
                <td></td>
                 <td><input type="text" placeholder="Total" class="form-control totalamtfuel " readonly /></td>
            </tr>
        </table>
         <table class="table table-bordered" id="bank">
            <tr>
                <th>$$</th>
                <th>Quantity</th>
                <!--<th>Bill</th>-->
                <th>Total</th>
            </tr>
            <tr class="tr_clone">
                <td><input type="text" class="form-control " value ="0.01" readonly name="fuelAmount[]"/></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBankfuel"  name="fuelQty[]" rel="0.01"/></td>
                <td><input type="text" placeholder="Total" class="form-control totalValfuel" readonly name="fuelTotal[]"/></td>
            </tr>
             <tr class="tr_clone">
                <td><input type="text" class="form-control " value ="0.05" readonly name="fuelAmount[]"/></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBankfuel"  name="fuelQty[]" rel="0.05"/></td>
                <td><input type="text" placeholder="Total" class="form-control totalValfuel" readonly name="fuelTotal[]"/></td>
            </tr>
             <tr class="tr_clone">
                <td><input type="text" class="form-control " value ="0.10" readonly name="fuelAmount[]"/></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBankfuel"  name="fuelQty[]" rel="0.10"/></td>
                <td><input type="text" placeholder="Total" class="form-control totalValfuel" readonly name="fuelTotal[]"/></td>
            </tr>
             <tr class="tr_clone">
                <td><input type="text" class="form-control " value ="0.25" readonly name="fuelAmount[]"/></td>
                <td><input type="text" placeholder="Quantity" class="form-control calBankfuel"  name="fuelQty[]" rel="0.25"/></td>
                <td><input type="text" placeholder="Total" class="form-control totalValfuel" readonly name="fuelTotal[]"/></td>
            </tr>
            </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary calculatefuel" data-dismiss="modal">Done</button>
        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
      </div>
    </div>
  </div>
</div>
						                    <!----------------------------------------------------------->
						                    </form>
						    <!---------------->
			
		
			</div>


	</div>
	</div>
	


</div>
</div>

<!-----------------scr off modal--------------------->

<div id="scrOffModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="opacity: 1!important;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- dialog body -->
      <div class="modal-header">
          	<h3>List of Scr off</h3>
      </div>
     
      <div class="modal-body" id="modalBody" style="margin-top: 612px;">
     
	
      </div>
      <div class="modal-footer">
          <input type="button" value="Cancel" class="btn btn-primary cancelModal"/>
           <!--<input type="button" value="Save" class="btn btn-primary saveEntry"/>-->
      </div>
      <!-- dialog buttons -->
    </div>
  </div>
</div>
<!---------------------------------------------------->
<!--------- enter ending modal--------------------->
		<div id="endingModal" class="modal fade" style="opacity: 1!important;">
  <div class="modal-dialog confirm-delete">
    <div class="modal-content" style='margin-top: 260px;'>
      <!-- dialog body -->
      <div class="modal-header">
          	<h3>Enter the Number</h3>
      </div>
     
      <div class="modal-body">
          <span id="modalMsg"></span>
          <br>
		  <input type="hidden" id="scroffId"/>
		  <input type="hidden" id="endingNum" />
		  <input type="hidden" id="startingNum" />
		  <input type="hidden" id="slot" />
		  <input type="hidden" id="activateId" />
		  <input type="hidden" id="serialNo" />
		  <input type="hidden" id="uniId" />
		  
		  
		  <input type="text" class="form-control" value="<?php echo date('m/d/Y');?>" readonly style="width: 200px;max-width: 200px;"/> <br>
		  <input type="text" class="form-control number" id="endingNumber" placeholder="Enter number" style="width: 200px;max-width: 200px;pointer-events:unset;opacity:unset"/>
		 <!--<div class="row">-->
		 <!--    <div class="col-sm-12">-->
		 <!--        <input type="text" class="form-control" value="<?php echo date('m/d/Y');?>" readonly style="width: 200px;max-width: 200px;"/>-->
		 <!--    </div>-->
		 <!--    <div class="col-sm-12">-->
		 <!--        <input type="text" class="form-control number" placeholder="Enter number" style="width: 200px;max-width: 200px;"/>-->
		 <!--    </div>-->
		 <!--</div>-->
	
      </div>
      <div class="modal-footer">
          <input type="button" value="Cancel" class="btn btn-primary cancelModal"/>
           <input type="button" value="Save" class="btn btn-primary saveEntry"/>
      </div>
      <!-- dialog buttons -->
     
    </div>
  </div>
</div>
<!-------------------------------------------------->
<?php echo view('commonview.mainFooter');?>