jQuery(document).ready(function(){
	var urlCurrent	= window.location.href;
	var dobSplite = urlCurrent.split('/');
	var lastVal =dobSplite[dobSplite.length-1];
	var secondVal =dobSplite[dobSplite.length-2];
		if(lastVal == 'list-notification' || secondVal == 'list-notification'){
		jQuery('.side_menu').children('li').removeClass('active');
		jQuery('.side_menu').children('li').children('a').removeClass('active');
		jQuery('#notification').addClass('active');

	}
	if(lastVal == 'refer-users' || secondVal == 'refer-users'){
		jQuery('.side_menu').children('li').removeClass('active');
		jQuery('.side_menu').children('li').children('a').removeClass('active');
		jQuery('#referUser').addClass('active');

	}
	if(lastVal == 'refund-invest' || secondVal == 'refund-invest'){
		jQuery('.side_menu').children('li').removeClass('active');
		jQuery('.side_menu').children('li').children('a').removeClass('active');
		jQuery('#refund').addClass('active');

	}
	if(lastVal == 'deposit-list' || secondVal == 'deposit-list'){
		jQuery('#history').addClass('collapse in');
		jQuery('.side_menu').children('li').removeClass('active');
		jQuery('.side_menu').children('li').children('a').removeClass('active');
		jQuery('#depositList').addClass('active');
		jQuery('#depositList').parent('li').parent('ul').parent('li').find('a.customer-icon').addClass('active1');
		jQuery('#history').attr('aria-expanded',true);
	}
		if(lastVal == 'add-ticket' || secondVal == 'add-ticket'){
			jQuery('#ticket').addClass('collapse in');
			jQuery('.side_menu').children('li').removeClass('active');
			jQuery('.side_menu').children('li').children('a').removeClass('active');
			jQuery('#addticket').addClass('active');
			jQuery('#addticket').parent('li').parent('ul').parent('li').find('a.customer-icon').addClass('active1');
			jQuery('#ticket').attr('aria-expanded',true);
		}
		if(lastVal == 'list-tickets' || secondVal == 'list-tickets'){
			jQuery('#ticket').addClass('collapse in');
			jQuery('.side_menu').children('li').removeClass('active');
			jQuery('.side_menu').children('li').children('a').removeClass('active');
			jQuery('#listticket').addClass('active');
			jQuery('#listticket').parent('li').parent('ul').parent('li').find('a.customer-icon').addClass('active1');
			jQuery('#ticket').attr('aria-expanded',true);
		}

	if(lastVal == 'list-withdraw' || secondVal == 'list-withdraw'){
		jQuery('#history').addClass('collapse in');
		jQuery('.side_menu').children('li').removeClass('active');
		jQuery('.side_menu').children('li').children('a').removeClass('active');
		jQuery('#withdrawList').addClass('active');
		jQuery('#withdrawList').parent('li').parent('ul').parent('li').find('a.customer-icon').addClass('active1');
		jQuery('#history').attr('aria-expanded',true);
	}
	if(lastVal == 'transfers' || secondVal == 'transfers'){
		jQuery('#history').addClass('collapse in');
		jQuery('.side_menu').children('li').removeClass('active');
		jQuery('.side_menu').children('li').children('a').removeClass('active');
		jQuery('#transferList').addClass('active');
		jQuery('#transferList').parent('li').parent('ul').parent('li').find('a.customer-icon').addClass('active1');
		jQuery('#history').attr('aria-expanded',true);
	}
	if(lastVal == 'add-deposit' || secondVal == 'add-deposit'){
		jQuery('#vend').addClass('collapse in');
		jQuery('.side_menu').children('li').removeClass('active');
		jQuery('.side_menu').children('li').children('a').removeClass('active');
		jQuery('#addDeposit').addClass('active');
		jQuery('#addDeposit').parent('li').parent('ul').parent('li').find('a.customer-icon').addClass('active1');
		jQuery('#vend').attr('aria-expanded',true);
	}
	if(lastVal == 'add-withdraw' || secondVal == 'add-withdraw'){
		jQuery('#vend').addClass('collapse in');
		jQuery('.side_menu').children('li').removeClass('active');
		jQuery('.side_menu').children('li').children('a').removeClass('active');
		jQuery('#addWithdraw').addClass('active');
		jQuery('#addWithdraw').parent('li').parent('ul').parent('li').find('a.customer-icon').addClass('active1');
		jQuery('#vend').attr('aria-expanded',true);
	}
	if(lastVal == 'add-transfer' || secondVal == 'add-transfer'){
		jQuery('#vend').addClass('collapse in');
		jQuery('.side_menu').children('li').removeClass('active');
		jQuery('.side_menu').children('li').children('a').removeClass('active');
		jQuery('#addTransfer').addClass('active');
		jQuery('#addTransfer').parent('li').parent('ul').parent('li').find('a.customer-icon').addClass('active1');
		jQuery('#vend').attr('aria-expanded',true);
	}
	if(lastVal == 'investment-plan' || secondVal == 'investment-plan'){
		jQuery('#invest').addClass('collapse in');
		jQuery('.side_menu').children('li').removeClass('active');
		jQuery('.side_menu').children('li').children('a').removeClass('active');
		jQuery('#buyplan').addClass('active');
		jQuery('#buyplan').parent('li').parent('ul').parent('li').find('a.customer-icon').addClass('active1');

		jQuery('#invest').attr('aria-expanded',true);
	}
	if(lastVal == 'plans' || secondVal == 'plans'){
		jQuery('#invest').addClass('collapse in');
		jQuery('.side_menu').children('li').removeClass('active');
		jQuery('.side_menu').children('li').children('a').removeClass('active');
		jQuery('#planlist').addClass('active');
		jQuery('#planlist').parent('li').parent('ul').parent('li').find('a.customer-icon').addClass('active1');
		jQuery('#invest').attr('aria-expanded',true);
	}
	if(lastVal == 'profile-settings' || secondVal == 'profile-settings'){
		jQuery('#setting').addClass('collapse in');
		jQuery('.side_menu').children('li').removeClass('active');
		jQuery('.side_menu').children('li').children('a').removeClass('active');
		jQuery('#profileSetting').addClass('active');
		jQuery('#profileSetting').parent('li').parent('ul').parent('li').find('a.customer-icon').addClass('active1');
		jQuery('#setting').attr('aria-expanded',true);
	}
	if(lastVal == 'change-password' || secondVal == 'change-password'){
		jQuery('#setting').addClass('collapse in');
		jQuery('.side_menu').children('li').removeClass('active');
		jQuery('.side_menu').children('li').children('a').removeClass('active');
		jQuery('#changePassword').addClass('active');
		jQuery('#changePassword').parent('li').parent('ul').parent('li').find('a.customer-icon').addClass('active1');
		jQuery('#setting').attr('aria-expanded',true);
	}

	if(lastVal == 'addCar' || secondVal == 'addCar'){
		jQuery('#cust').addClass('collapse in');
		jQuery('.mainSidebar').children('li').removeClass('active');
		jQuery('#addCar').parent('li').addClass('active');
		jQuery('#addCar').parent('li').parent('ul').parent('li').addClass('active');
		jQuery('#cust').attr('aria-expanded',true);
	}
	if(lastVal == 'category' || secondVal == 'category'){
		jQuery('#product').addClass('collapse in');
		jQuery('.mainSidebar').children('li').removeClass('active');
		jQuery('#catInfo').parent('li').addClass('active');
		jQuery('#catInfo').parent('li').parent('ul').parent('li').addClass('active');
		jQuery('#product').attr('aria-expanded',true);
	}
	if(lastVal == 'addproduct' || secondVal == 'addproduct'){
		jQuery('#product').addClass('collapse in');
		jQuery('.mainSidebar').children('li').removeClass('active');
		jQuery('#productAdd').parent('li').addClass('active');
		jQuery('#productAdd').parent('li').parent('ul').parent('li').addClass('active');
		jQuery('#product').attr('aria-expanded',true);
	}
	if(lastVal == 'product' || secondVal == 'product'){
		jQuery('#product').addClass('collapse in');
		jQuery('.mainSidebar').children('li').removeClass('active');
		jQuery('#productList').parent('li').addClass('active');
		jQuery('#productList').parent('li').parent('ul').parent('li').addClass('active');
		jQuery('#product').attr('aria-expanded',true);
	}
	if(lastVal == 'addservice' || secondVal == 'addservice'){
		jQuery('#service').addClass('collapse in');
		jQuery('.mainSidebar').children('li').removeClass('active');
		jQuery('#serviceAdd').parent('li').addClass('active');
		jQuery('#serviceAdd').parent('li').parent('ul').parent('li').addClass('active');
		jQuery('#service').attr('aria-expanded',true);
	}
	if(lastVal == 'service' || secondVal == 'service'){
		jQuery('#service').addClass('collapse in');
		jQuery('.mainSidebar').children('li').removeClass('active');
		jQuery('#serviceList').parent('li').addClass('active');
		jQuery('#serviceList').parent('li').parent('ul').parent('li').addClass('active');
		jQuery('#service').attr('aria-expanded',true);
	}
	if(lastVal == 'servicecategory' || secondVal == 'servicecategory'){
		jQuery('#service').addClass('collapse in');
		jQuery('.mainSidebar').children('li').removeClass('active');
		jQuery('#serviceCatInfo').parent('li').addClass('active');
		jQuery('#serviceCatInfo').parent('li').parent('ul').parent('li').addClass('active');
		jQuery('#service').attr('aria-expanded',true);
	}
	jQuery('#customerMenu').click(function(){
		jQuery('.mainSidebar').children('li').removeClass('active');
		jQuery(this).parent('li').addClass('active');
	});
	jQuery('#productMenu').click(function(){
		jQuery('.mainSidebar').children('li').removeClass('active');
		jQuery(this).parent('li').addClass('active');
	});
	jQuery('#serviceMenu').click(function(){
		jQuery('.mainSidebar').children('li').removeClass('active');
		jQuery(this).parent('li').addClass('active');
	});
	if(lastVal == 'purchaseorder' || secondVal == 'purchaseorder' ){
		jQuery('#order').addClass('collapse in');
		jQuery('.mainSidebar').children('li').removeClass('active');
		jQuery('#purchaseorder').parent('li').addClass('active');
		jQuery('#purchaseorder').parent('li').parent('ul').parent('li').addClass('active');
		jQuery('#order').attr('aria-expanded',true);
	}
	if(lastVal == 'addpurchaseorder' || secondVal == 'addpurchaseorder' ){
		jQuery('#order').addClass('collapse in');
		jQuery('.mainSidebar').children('li').removeClass('active');
		jQuery('#addpurchaseorder').parent('li').addClass('active');
		jQuery('#addpurchaseorder').parent('li').parent('ul').parent('li').addClass('active');
		jQuery('#order').attr('aria-expanded',true);
	}
	if(lastVal == 'invoices' || secondVal == 'invoices'){
		jQuery('#invoice').addClass('collapse in');
		jQuery('.mainSidebar').children('li').removeClass('active');
		jQuery('#invoices').parent('li').addClass('active');
		jQuery('#invoices').parent('li').parent('ul').parent('li').addClass('active');
		jQuery('#invoice').attr('aria-expanded',true);
	}
	if( lastVal == 'addinvoice' || secondVal == 'addinvoice' ){
		jQuery('#invoice').addClass('collapse in');
		jQuery('.mainSidebar').children('li').removeClass('active');
		jQuery('#addinvoice').parent('li').addClass('active');
		jQuery('#addinvoice').parent('li').parent('ul').parent('li').addClass('active');
		jQuery('#invoice').attr('aria-expanded',true);
	}
	if(lastVal == 'quotations' || secondVal == 'quotations' ){
		jQuery('#invoice').addClass('collapse in');
		jQuery('.mainSidebar').children('li').removeClass('active');
		jQuery('#addquotation').parent('li').addClass('active');
		jQuery('#addquotation').parent('li').parent('ul').parent('li').addClass('active');
		jQuery('#invoice').attr('aria-expanded',true);
	}
	if( lastVal == 'addquotation' || secondVal == 'addquotation' ){
		jQuery('#invoice').addClass('collapse in');
		jQuery('.mainSidebar').children('li').removeClass('active');
		jQuery('#addquotation').parent('li').addClass('active');
		jQuery('#addquotation').parent('li').parent('ul').parent('li').addClass('active');
		jQuery('#invoice').attr('aria-expanded',true);
	}
	if(lastVal == 'saleorder' || secondVal == 'saleorder' ){
		jQuery('#order').addClass('collapse in');
		jQuery('.mainSidebar').children('li').removeClass('active');
		jQuery('#saleorder').parent('li').addClass('active');
		jQuery('#saleorder').parent('li').parent('ul').parent('li').addClass('active');
		jQuery('#order').attr('aria-expanded',true);
	}
	if(lastVal == 'addsaleorder' || secondVal == 'addsaleorder' ){
		jQuery('#order').addClass('collapse in');
		jQuery('.mainSidebar').children('li').removeClass('active');
		jQuery('#addsaleorder').parent('li').addClass('active');
		jQuery('#addsaleorder').parent('li').parent('ul').parent('li').addClass('active');
		jQuery('#order').attr('aria-expanded',true);
	}
	if(lastVal == 'coupons' || secondVal == 'coupons' ){
		jQuery('#order').addClass('collapse in');
		jQuery('.mainSidebar').children('li').removeClass('active');
		jQuery('#coupons').parent('li').addClass('active');
		jQuery('#coupons').parent('li').parent('ul').parent('li').addClass('active');
		jQuery('#order').attr('aria-expanded',true);
	}
});