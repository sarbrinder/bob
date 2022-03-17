<h3 style="margin-top: 16px;text-align: center;"> Weekly Report</h3> <br>
	<div class="col-md-6 form-group " style="margin-top: 20px;">
	<table class="table table-bordered"  >
    <tr>
        <td>Start Date</td>
        <td><?php echo $fromDate;?></td>
    </tr>
    <tr>
        <td>End Date</td>
        <td><?php echo $toDate;?></td>
    </tr>
</table>
<table class="table table-bordered"  >
    <tr>
        <td>Manager</td>
        <td><?php echo $mangerName;?></td>
    </tr>
   
</table>
<table class="table table-bordered"  >
    <tr>
        <td>Retail Sales</td>
        <td>$<?php echo $retailsales;?>.00</td>
    </tr>
    <tr>
        <td>Deli Sales</td>
        <td>$<?php echo $TotaldeliSales;?>.00</td>
    </tr>
    <tr>
        <td>Total Sales</td>
        <td>$<?php echo number_format($TotaldeliSales + $retailsales); ?>.00</td>
    </tr>
    </table>
    <table class="table table-bordered"  >
        <?php if(count($vdata) > 0){ ?>
    <tr>
        <td>Retail Invoices</td>
        <td>$<?php echo $vdata[3]->total;?>.00</td>
    </tr>
    <tr>
        <td>Deli Invoices</td>
        <td>$<?php echo $vdata[0]->total;?>.00</td>
    </tr>
    <tr>
        <td>Non Retail Invoices</td>
        <td>$<?php echo $vdata[1]->total;?>.00</td>
    </tr>
    <tr>
        <td>Payroll Expense</td>
        <td>$<?php echo $vdata[2]->total;?>.00</td>
    </tr>
    <tr>
        <td>Total Expenses</td>
        <td>$<?php echo number_format($vdata[3]->total + $vdata[0]->total + $vdata[1]->total  + $vdata[2]->total); ?>.00</td>
    </tr>
<?php  }else{ ?>

<tr>
        <td>Retail Invoices</td>
        <td>$0.00</td>
    </tr>
    <tr>
        <td>Deli Invoices</td>
        <td>$0.00</td>
    </tr>
    <tr>
        <td>Non Retail Invoices</td>
        <td>$0.00</td>
    </tr>
    <tr>
        <td>Payroll Expense</td>
        <td>$0.00</td>
    </tr>
    <tr>
        <td>Total Expenses</td>
        <td>$0.00</td>
    </tr>

<?php }?>
    </table>
    <table class="table table-bordered"  >
    <tr>
        <td>Difference</td>
        <td></td>
    </tr> 
    </table>
    
	 </div>
	 	<div class="col-md-6 form-group " style="margin-top: 20px;">
	 	    <table class="table table-bordered"  >
    <tr>
        <td>Fuel Gallons</td>
        <td><?php echo $gallons;?></td>
    </tr>
    <tr>
        <td>Fuel Dollars</td>
        <td>$<?php echo $gallonsprice;?>.00</td>
    </tr>
   
    
    </table>
		<table class="table table-bordered" >
		    <tr>
        <td>Payroll Expense</td>
        <td>$<?php if(count($vdata) > 0){ echo $vdata[2]->total;}else{
        echo '0';}?>.00</td>
    </tr>
    <tr>
        <td>% of Payroll/Sales</td>
        <td><?php if(count($vdata) > 0){echo (int)($vdata[2]->total / ($TotaldeliSales + $retailsales) * 100);}else{
        echo '0';}?>%</td>
    </tr>
   </table>
   <table class="table table-bordered"  >
  <!--  <tr>
        <td>Retail Sales</td>
        <td></td>
    </tr>
    <tr>
        <td>Retail Purchases</td>
        <td></td>
    </tr>-->
   </table>
   <table class="table table-bordered"  >
 <!--   <tr>
        <td>Deli Sales</td>
        <td></td>
    </tr>
    <tr>
        <td>Deli Purchases</td>
        <td></td>
    </tr>-->
    <tr>
        <td>Deli Wastes</td>
        <td></td>
    </tr>
   </table>
   <table class="table table-bordered"  >
    <tr>
        <td>Weekly Lotto Over/Short</td>
        <td>$<?php echo $lottoversht;?>.00</td>
    </tr>
    <tr>
        <td>Weekly Scratch off Over/Short</td>
        <td>$<?php echo $lottosrcshot;?>.00</td>
    </tr>
    <tr>
        <td>Weekly Lotto Pays Over/Short</td>
        <td>$<?php echo $lottoprepot;?>.00</td>
    </tr>
    <tr>
        <td>Weekly Cash Over/Short</td>
        <td>$<?php echo $lottoposhot;?>.00</td>
    </tr>
</table>						    	    
		 </div>

    