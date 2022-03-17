

	<div class="row">
				<div class="breadcrumbs">
				
		    		<p class="pull-left" style="padding-top: 7px;"> >> Dashboard</p>
					<p class="pull-right"> <i class="fa fa-home"></i> / Dashboard</p>
				</div>
			</div>
			
<link href="<?php echo URL('/public/css/material-dashboard.css?v=1.2.0');?>" rel="stylesheet" />
<link href="<?php echo URL('/public/css/demo.css');?>" rel="stylesheet" />
<style>
.main_content{margin-left:224px;}
.main_content .uploadDocumentClient {
    margin-top: 6px !important;
    margin-left:1px;
}
.main_content .search_box {
    margin-left: 1px;
}
.main_content span.search_box {
    margin-top: 6px !important;
}
.shortcut_icon{margin-top:7px !important;}
a.btn.btn-primary.upperAtag.search_box{ margin-top:-13px;}
.main_content .profile_sec1 {margin-top:5px !important;}
.main_content .option_log {padding-right: 29px !important;}
.breadcrumbs {padding: 4.5px 60px 4px 20px;}
.breadcrumbs marquee {margin-top: 11px;}
.main-panel.ps-container.ps-theme-default { width: auto;}
</style>
<div class="wrapper">

	<div class="main-panel" style="width: 100%;">

		<div class="content" style="width: 100%;"> <!-- style="overflow-x:hidden"-->
		    
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="card card-stats">
							<div class="card-header" data-background-color="orange">
								<i class="fa fa-plus-square"></i>
							</div>
							<div class="card-content">
								<p class="category">Store</p>
								<h3 class="title">0.00
								</h3>
							</div>

						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="card card-stats">
							<div class="card-header" data-background-color="green">
								<i class="fa fa-minus-square"></i>
							</div>
							<div class="card-content">
								<p class="category">User</p>
								<h3 class="title">0.00</h3>
							</div>

						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="card card-stats">
							<div class="card-header" data-background-color="red">
								<i class="fa fa-exchange"></i>
							</div>
							<div class="card-content">
								<p class="category">Report</p>
								<h3 class="title">0.00</h3>
							</div>

						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="card card-stats">
							<div class="card-header" data-background-color="blue">
								<i class="fa fa-users"></i>
							</div>
							<div class="card-content">
								<p class="category">Commission</p>
								<h3 class="title">$0.00</h3>
							</div>

						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="card card-stats">
							<div class="card-header" data-background-color="orange">
								<i class="fa fa-usd"></i>
							</div>
							<div class="card-content">
								<p class="category">Investment</p>
									<div class="mainDiv"><div class="text">Sliver</div><div class="title"> $0.00								</div></div>
								<div class="mainDiv"><div class="text">Gold</div><div class="title">$0.00								</div></div>
							
								<div class="mainDiv"><div class="text">Platinum</div><div class="title"> $0.00								</div></div>
																<div class="mainDiv1"><div class="text1">Total</div><div class="title1"> $0.00								</div></div>
							</div>

						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="card card-stats">
							<div class="card-content" style="text-align:center">
								<h3>Time Left To Recieve Your Profit</h3>
								<h1 id="demo" style="margin-top: -20px;"></h1>
							</div>
														<script>
							// Set the date we're counting down to
							var countDownDate = new Date('2020-09-30 12:00:00 AM').getTime();

							// Update the count down every 1 second
							var x = setInterval(function() {

								// Get todays date and time
								var now = new Date().getTime();

								// Find the distance between now an the count down date
								var distance = countDownDate - now;

								// Time calculations for days, hours, minutes and seconds
								var days = Math.floor(distance / (1000 * 60 * 60 * 24));
								var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
								var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
								var seconds = Math.floor((distance % (1000 * 60)) / 1000);

								// Output the result in an element with id="demo"
								document.getElementById("demo").innerHTML =  hours + "h "
								+ minutes + "m " + seconds + "s ";

								// If the count down is over, write some text
								if (distance < 0) {
									clearInterval(x);
									document.getElementById("demo").innerHTML = "EXPIRED";
								}
							}, 1000);
							</script>

							<div class="card-content" style="text-align:center;    margin-top: -47px;">
								<h3>You Have Received Last Profit</h3>
								<h4 id="demo" class="profitRecieved">$10.00</h4>
							</div>

						</div>
						<!-- <div class="card card-stats">
							<div class="card-content" style="text-align:center">
								<h3>You Have Received Last Profit</h3>
								<h4 id="demo">$10.00</h4>
							</div>
						</div> -->
					</div>

					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="card card-stats">
							<div class="card-header" data-background-color="blue">
								<i class="fa fa-bar-chart"></i>
							</div>
							<div class="card-content">
								<p class="category">Profit</p>
								<div class="mainDiv"><div class="text">Sliver</div><div class="title">  $0.00								</div></div>
								<div class="mainDiv"><div class="text">Gold</div><div class="title"> $0.00								</div></div>
								
								<div class="mainDiv"><div class="text">Platinum</div><div class="title">  $0.00								</div></div>
																<div class="mainDiv1"><div class="text1">Total</div><div class="title1"> $0.00								</div></div
							</div>

						</div>
					</div>
				</div>

				<div class="row">

					<div class="col-lg-6 col-md-6">
						<div class="card dashboarTrans">
							<div class="card-header" data-background-color="orange">
								<h4 class="title">Last 5 Transactions</h4>
								<!-- <p class="category">New employees on 15th September, 2016</p> -->
							</div>
							<div class="card-content table-responsive addHeight">
								<table class="table table-hover">
									<thead class="text-warning">
										<th>Sr No.</th>
										<th>Transaction Type</th>
										<th>Created Date</th>
										<th>Amount</th>
									</thead>
									<tbody>
																			</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="col-lg-12 col-md-12">
							<div class="card">
								<div class="card-header" data-background-color="orange">
									<h4 class="title">Your Refer Code</h4>
									<!-- <p class="category">New employees on 15th September, 2016</p> -->
								</div>
								<div class="card-content table-responsive customCardContent">
									<table class="table table-hover">

										<tbody>
											<tr>
												<td ><h3 id="link"></h3></td>
												<td><td><a href="javascript:void(0)" class="btn btn-blue">Copy</a></td></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="col-lg-12 col-md-12">
							<div class="card">
								<div class="card-header" data-background-color="orange">
									<h4 class="title">Refund Request/List</h4>
								</div>
								<div class="card-content table-responsive customCardContent">
									<table class="table table-hover">

										<tbody>
											<tr>
												<td >	<a href="javascript:void(0)"  class="btn btn-primary" >Refund Request</a></td>
												<!-- <td><td><a href="javascript:void(0)" onclick="copyToClipboard('#link')" class="btn btn-blue">Copy</a></td></td> -->
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
</div>
<?php echo view('commonview.mainFooter');?>