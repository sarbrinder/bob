<div class="col-md-12">
	<div class="row">
	<div class="navigation_side">
		<div class="logo_sec">
			<a href="<?php echo URL('/dashboard');?>"><img src="<?php echo URL('/public/images/logo.png');?>"></a>
		</div>
		<div class="wallet">Welcome <?php echo Session::get('fName').' '.Session::get('lName') ;?></div>
		<ul class="side_menu mainSidebar">
			<li><a class="active commonSideBar dashboard" href="<?php echo URL('/dashboard');?>"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
			<li>
				<a class="Location-icon commonSideBar store-list add-store" href="javascript:void(0)" id="vendorMenu" data-toggle="collapse" aria-expanded="false" data-target="#store"><i class="fa fa-building"></i> Location<b class="caret"></b></a>
				<ul id="store" class="collapse">
					<li><a id="buyplan" href="<?php echo URL('/store-list');?>"><span class="icon_box" id="buyplan"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>Store List</a></li>
					<li><a id="planlist" href="<?php echo URL('/add-store');?>"><span class="icon_box" id="planlist"><i class="fa fa-list-ul" aria-hidden="true"></i></span>Add Store</a></li>
				</ul>
			</li>
			<li>
				<a class="User-icon commonSideBar user-list add-user" href="javascript:void(0)" id="vendorMenu" data-toggle="collapse" data-target="#user"><i class="fa fa-building"></i> User<b class="caret"></b></a>
				<ul id="user" class="collapse">
					<li><a id="buyplan" href="<?php echo URL('/user-list');?>"><span class="icon_box" id="buyplan"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>User List</a></li>
					<li><a id="planlist" href="<?php echo URL('/add-user');?>"><span class="icon_box" id="planlist"><i class="fa fa-list-ul" aria-hidden="true"></i></span>Add User</a></li>
				</ul>
			</li>
			<li>
				<a class="report-icon commonSideBar add-sale get-sale" href="javascript:void(0)" id="vendorMenu" data-toggle="collapse" data-target="#sale"><i class="fa fa-building"></i> Sales<b class="caret"></b></a>
				<ul id="sale" class="collapse">
					<li><a id="buyplan" href="<?php echo URL('/get-sale');?>"><span class="icon_box" id="buyplan"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>Sales List</a></li>
					<li><a id="planlist" href="<?php echo URL('/add-sale');?>"><span class="icon_box" id="planlist"><i class="fa fa-list-ul" aria-hidden="true"></i></span>Add Sales</a></li>
				</ul>
			</li>
			
				<li>
				<a class="User-icon commonSideBar vendors-list add-vendor" href="javascript:void(0)" id="vendorMenu" data-toggle="collapse" data-target="#vendor"><i class="fa fa-building"></i>Vendor<b class="caret"></b></a>
				<ul id="vendor" class="collapse">
					<li><a id="planlist" href="<?php echo URL('/add-vendor');?>"><span class="icon_box" id="planlist"><i class="fa fa-list-ul" aria-hidden="true"></i></span>Add Vendor</a></li>
					<li><a id="buyplan" href="<?php echo URL('/vendors-list');?>"><span class="icon_box" id="buyplan"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>Vendor List</a></li>
				</ul>
			</li>

			
			<!--<li>-->
			<!--	<a class="Setting-icon commonSideBar" href="javascript:void(0)" id="settingMain" data-toggle="collapse" data-target="#setting"><i class="fa fa-cog"></i> Settings<b class="caret"></b></a>-->
			<!--	<ul id="setting" class="collapse">-->
			<!--		<li><a id="profileSetting" href="javascript:void(0)"><span class="icon_box"><i class="fa fa-user" aria-hidden="true"></i></span> Profile Setting</a></li>-->
			<!--		<li><a id="changePassword" href="javascript:void(0)"><span class="icon_box"><i class="fa fa-user" aria-hidden="true"></i></span>Change Password</a></li>-->

			<!--	</ul>-->
			<!--</li>-->
				<li>
				<a class="Setting-icon commonSideBar receive-order add-scr-off activate-scr-off list-scr-off receive-order-list" href="javascript:void(0)" id="lottoMain" data-toggle="collapse" data-target="#lotto"><i class="fa fa-cog"></i> Lotto Scr. off<b class="caret"></b></a>
				<ul id="lotto" class="collapse">
				    <?php if(Session::get('type') == 1 ) {?>
				    <li><a id="profileSetting" href="<?php echo URL('/add-scr-off');?>"><span class="icon_box"><i class="fa fa-user" aria-hidden="true"></i></span>Add Scr.off</a></li>
				    <li><a id="profileSetting" href="<?php echo URL('/list-scr-off');?>"><span class="icon_box"><i class="fa fa-user" aria-hidden="true"></i></span>Scr.off List</a></li>
					<?php }?>
					<li><a id="profileSetting" href="<?php echo URL('/receive-order-list');?>"><span class="icon_box"><i class="fa fa-user" aria-hidden="true"></i></span> Receive Order List</a></li>
					<li><a id="profileSetting" href="<?php echo URL('/activate-scr-off');?>"><span class="icon_box"><i class="fa fa-user" aria-hidden="true"></i></span> Activate Scr.off</a></li>
						
				</ul>
			</li>
			
			<?php if(Session::get('type') == 1 ) {?>
			<li><a id="log" class="commonSideBar log-list" href="<?php echo URL('/log-list');?>"><span class="icon_box"><i class="fa fa-money"></i></span>Log</a></li>
			<?php }?>
			<li><a id="report" class="commonSideBar report" href="<?php echo URL('/report');?>"><span class="icon_box"><i class="fa fa-users"></i></span>Report</a></li>
			<!--<li><a id="referUser" href="http://yourhelpgroup.com/forex/list-notification"><span class="icon_box"><i class="fa fa-bell"></i></span>Notifications</a></li>-->
		</ul>
	</div>
</div>
<div class="main_content" style="">
	<div class="row" style="position:relative;">
				<div class="header_sec main_section">
					<!--<div class="search_box pull-left">-->
					<!--	<i class="fa fa-search" aria-hidden="true"></i> <input type="text" value="" placeholder="Search">-->
					<!--</div>-->
	<div class="pull-right option_log">
		<!--									<div class="shortcut_icon">-->
						    
		<!--					     <li class="dropdown navbar-inverse" style="background-color: black;">-->
		<!--					     <a class="dropdown-toggle" data-toggle="dropdown" href="#">-->
		<!--					    <i class="fa fa-bell-o" aria-hidden="true" style="margin-right: 10px;"></i><b></b>-->
		<!--					    </a>-->
							   
		<!--					<ul class="dropdown-menu dropdown-alerts notification" style="margin-left: -399px;">-->
  <!--      <li>No notification found.</li>       -->
  <!--</ul>-->
  <!--</li>-->
		<!--				</div>-->
						<div class="profile_sec profile_sec1" style="margin-top:5px;">
						
							<label></label>
						</div>
						<div class="profile_sec">
						
							<label><a href="<?php echo URL('/logout');?>" class="upperAtag">Logout </a></label>
							<i class="fa fa-sign-out" aria-hidden="true" style="color:#FFF;margin-top:-2px"></i>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>