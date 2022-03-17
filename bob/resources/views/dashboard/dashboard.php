

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
					<!--<div class="col-lg-3 col-md-6 col-sm-6">-->
					<!--	<div class="card card-stats">-->
					<!--		<div class="card-header" data-background-color="blue">-->
					<!--			<i class="fa fa-users"></i>-->
					<!--		</div>-->
					<!--		<div class="card-content">-->
					<!--			<p class="category">Commission</p>-->
					<!--			<h3 class="title">$0.00</h3>-->
					<!--		</div>-->

					<!--	</div>-->
					<!--</div>-->
				</div>

		</div>

	</div>
</div>
</div>
<?php echo view('commonview.mainFooter');?>