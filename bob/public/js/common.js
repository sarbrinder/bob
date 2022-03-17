jQuery(document).ready(function(){

  (function($){
    $.fn.extend({
        donetyping: function(callback,timeout){
            timeout = timeout || 1e3; // 1 second default timeout
            var timeoutReference,
                doneTyping = function(el){
                    if (!timeoutReference) return;
                    timeoutReference = null;
                    callback.call(el);
                };
            return this.each(function(i,el){
                var $el = $(el);
                // Chrome Fix (Use keyup over keypress to detect backspace)
                // thank you @palerdot
                $el.is(':input') && $el.on('keyup keypress paste',function(e){
                    // This catches the backspace button in chrome, but also prevents
                    // the event from triggering too preemptively. Without this line,
                    // using tab/shift+tab will make the focused element fire the callback.
                    if (e.type=='keyup' && e.keyCode!=8) return;

                    // Check if timeout has been set. If it has, "reset" the clock and
                    // start over again.
                    if (timeoutReference) clearTimeout(timeoutReference);
                    timeoutReference = setTimeout(function(){
                        // if we made it here, our timeout has elapsed. Fire the
                        // callback
                        doneTyping(el);
                    }, timeout);
                }).on('blur',function(){
                    // If we can, fire the event since we're leaving the field
                    doneTyping(el);
                });
            });
        }
    });
})(jQuery);


jQuery("html, body").animate({scrollTop: 0}, "slow");
jQuery('.updateController').fadeOut(10000);
jQuery('.updatecartDetail').fadeOut(10000);
jQuery('.updatecartDetailReport').fadeOut(10000);
$( "#datepicker" ).datepicker({
    dateFormat: 'mm/dd/yy' ,
	changeMonth: true,
      changeYear: true,
		onSelect: function () {
		    var thiss = jQuery(this); //alert('hello');
        var val = jQuery(this).val();
		var stringUrl = site_url+'/search-sales-report?search='+val;
		var type = 'json';
		var returnAMt = ajaxHit1(stringUrl,type);
			returnAMt.success(function(response) {
				if(response == 0){
				    jQuery(thiss).css('border','1px solid lightgrey');
				    jQuery('input[type=text]').css('pointer-events','unset');
		            jQuery('input[type=text]').css('opacity','unset');
				}else{
				    var msg = "Record is already added";
                    jQuery('.msg').show().html('<div class="alert alert-danger" >'+msg+'</div>').fadeOut(10000);
		            jQuery('input[type=text]').css('pointer-events','none');
		            jQuery('input[type=text]').css('opacity','0.4');
		            jQuery('input[type=text]').val();
		            jQuery('#datepicker').css('pointer-events','unset');
		            jQuery('#datepicker').css('opacity','unset');
				}
		});
        }
});
$("input[name=order_date]  , .textFieldDatepicker , #fromDate,#toDate" ).datepicker({ // same class used  in received order and activate form
    dateFormat: 'mm/dd/yy' ,
	changeMonth: true,
      changeYear: true,
		onSelect: function (dateText) {
		    //jQuery(this).addClass('currentPicker');
        jQuery(this).css('border','1px solid lightgrey');
         //alert(dateText);
        //jQuery('.currentPicker').val(dateText);
        }
});

$('#saledatepickerFrom,#saledatepickerTo').datepicker({
      dateFormat: 'mm/dd/yy' ,
	changeMonth: true,
      changeYear: true,
		onSelect: function () { 
	var from = jQuery('#saledatepickerFrom').val();
	var to  =  jQuery('#saledatepickerTo').val();
		var stringUrl = site_url+'/search-sale-detail?from='+from+'&to='+to;
		var type = 'html';
		var returnAMt = ajaxHitWithoutLoader(stringUrl,type);
			returnAMt.success(function(response) {
				jQuery('.placeTable').html(response);
		});
        }
});


// jQuery('body').on('click','.commonSideBar',function(){
//   jQuery('.active').removeClass('active');
//   jQuery(this).addClass('active');
// });
 $('[data-toggle="tooltip"]').tooltip();
  jQuery('body').on('keyup blur','.success,.success1,.success2',function(){
    var text = jQuery(this).val();
    text = text.replace(/^\s+|\s+$/g, '');
    text = text.trim();
    if (text != '') {
      	jQuery(this).css('border','1px solid lightgrey');
    }
    else{
        jQuery(this).css('border', '1.4px solid #F00');
    }
  });
  
  jQuery('body').on('keyup blur', 'input[type = "textbox"],input[type = "text"],input[type = "email"],input[type = "password"]', function (eve) {
    if ((eve.which != 37) && (eve.which != 38) && (eve.which != 39) && (eve.which != 40)) {
        var text = jQuery(this).val();
        text = text.trim();
        if (text == '') {
            jQuery(this).val('');
        }
        var string = jQuery(this).val();
        if (string != "") {
            string = string.replace(/\s+/g, " ");
            jQuery(this).val(string);
        }
    }
});
$(document).on('keypress', '.txtOnly', function(e) {
                   var key = e.keyCode;
                   if (key >= 48 && key <= 57) {
                       e.preventDefault();
                   }
               });
  jQuery('body').on('blur', '.emailId', function () {
	var emailcrt = jQuery(this);
	var emailVal = jQuery(this).val();
	var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	var valid = emailReg.test(emailVal);
	if(emailVal != ''){
	if(!valid) {
		jQuery(this).addClass('has-error');
		jQuery(this).removeClass('success');
		jQuery(this).css('border-bottom', '1.4px solid #F00');
		jQuery('#validMsg').show().html(emailHtmlForm).css('color', '#FFF').fadeOut(5000);
		jQuery('.checkForm').prop('disabled',true);
	}
	else{
		jQuery(this).css('border-bottom', '1px solid #3c763d');
		jQuery('#validMsg').hide();
		jQuery('.checkForm').prop('disabled',false);

	}
	}
});

  jQuery('body').on('blur', '.checkEmail', function () {
	var emailcrt = jQuery(this);
	var emailVal = jQuery(this).val();
	var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	var valid = emailReg.test(emailVal);
	if(emailVal != ''){
	if(!valid) {
		jQuery(this).css('border', '1.4px solid #F00');
		jQuery('.msg').css('display','block').html('<div class="ajax_report alert-message alert alert-danger updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">Incorrect email format.</span></div>').fadeOut(5000);
		jQuery('.checkForm').prop('disabled',true);
	}
	else{
		var url = 'emailCheck';
	   var stringUrl = site_url+'/'+url+'?currentVal='+emailVal;
		var type = 'json';
    jQuery.ajax({
      type : "get" ,
      url  : stringUrl ,
      beforeSend: function() { jQuery('#loader').show()},
      complete: function() { jQuery('#loader').hide() },
      dataType : type ,
      success:function(response){
        if(response.success == false){
          jQuery(emailcrt).css('border', '1px solid lightgrey');
          jQuery('.checkForm').prop('disabled',false);
          }else{
					jQuery(emailcrt).css('border', '1px solid #F00');
          jQuery('.checkForm').prop('disabled',true);
					jQuery('.msg').show().html(response.message).fadeOut(5000);
				}
      }
    });
		
	}
	}
});
jQuery('body').on('blur', '.checkUpdateEmail', function () {
	var emailcrt = jQuery(this);
	var emailVal = jQuery(this).val();
  var customerId = jQuery('#customerId').val();
	var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	var valid = emailReg.test(emailVal);
	if(emailVal != ''){
	if(!valid) {
    jQuery(this).css('border', '1.4px solid #F00');
    jQuery('.customerEditMsg').css('display','block').html('<div class="ajax_report alert-message alert alert-danger updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">Incorrect email format.</span></div>').fadeOut(5000);
    jQuery('.continueShipping').prop('disabled',true);
	}
	else{
    var url = 'checkUpdateEmail';
   var stringUrl = site_url+'/'+url+'?currentVal='+emailVal+'&customerId='+customerId;
    var type = 'json';
    var returnAMt = ajaxHit1(stringUrl,type);
      returnAMt.success(function(response) {
        if(response == 'false'){
          jQuery(emailcrt).css('border', '1px solid lightgrey');
          jQuery('.continueShipping').prop('disabled',false);
          }else{
          jQuery(emailcrt).css('border', '1px solid #F00');
          jQuery('.continueShipping').prop('disabled',true);
          jQuery('.customerEditMsg').show().html(response).fadeOut(5000);
        }
    });


	}
	}
});

jQuery('body').on('click','.checkForm',function(){
  var count = 0;
  jQuery(this).closest('form').find('.success').each(function(){
    var text = jQuery(this).val();
    text = text.replace(/^\s+|\s+$/g, '');
    text = text.trim();
    if (text != '') {
      	jQuery(this).css('border','1px solid lightgrey');
    }
    else{
        count = parseInt(count) + parseInt(1);
        jQuery(this).css('border', '1px solid #F00');
    }
  });

  if(count > 0){
    return false;
  }else{
  //  jQuery(this).prop('disabled','true');
  }
  });
  jQuery('.dropdown-submenu a.test').on("click", function(e){
      jQuery(this).next('ul').toggle();
      e.stopPropagation();
      e.preventDefault();
    });
  jQuery('body').on('click','.checkForm1',function(){
  var count = 0;
  jQuery(this).closest('form').find('.success').each(function(){
    var text = jQuery(this).val();
    text = text.replace(/^\s+|\s+$/g, '');
    text = text.trim();
    if (text != '') {
      	jQuery(this).css('border','1px solid #3c763d');
    }
    else{
        count = parseInt(count) + parseInt(1);
        jQuery(this).css('border', '1px solid #F00');
    }
  });

  if(count > 0){
	  jQuery('.updatecartDetailLogin').show().html('All fields are required.').fadeOut(5000);
    return false;
  }
  });

  jQuery('body').on('click','.cancelBtn',function(){
    jQuery('.orderListDiv').show();
    jQuery('#rowDetail').hide();
  });
  jQuery('body').on('blur','#pass1,#pass2',function(){
  var pass1 = jQuery('#pass1').val();
  var pass2 = jQuery('#pass2').val();
  if((pass1 != '') && (pass2 != '')){
    if(pass1 != pass2){
		jQuery('#mainMsg').show().html('<div class="ajax_report alert-message alert alert-danger updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">Password does not matched .</span></div>');
     //jQuery('#passError').show().text('Enter same password').css('color','red').fadeOut(4000);
      jQuery('.customerRegister').prop('disabled',true);
      return false;
    }else{
		jQuery('#mainMsg').hide();
      jQuery('.customerRegister').prop('disabled',false);
      return true;
    }
  }
});
jQuery('body').on('click','.customerRegister',function(){
  var count = 0;
  jQuery('.success1').each(function(){
    if(jQuery(this).val() == '')
    {
      jQuery(this).css('border','1px solid red');
      count++;
    }
  });
  if(count > 0)
  {
    return false;
  }else {

    jQuery(this).prop('disabled',true);
    var type 	  =	'json';
    var formClass =	jQuery(this).closest('form').attr('id');
    var returnAMt = ajaxFormHit1(type,formClass,'customerRegister');
  }

});
jQuery('body').on('click','.saveGuestOrder',function(){
  //jQuery(this).prop('disabled',true);
  var type 	  =	'json';
  var formClass =	jQuery(this).closest('form').attr('id');
  var returnAMt = ajaxFormHit1(type,formClass,'saveGuestOrder');
});
jQuery('body').on('blur','.checkoldPassword',function(){
	if(jQuery(this).val() != ''){
		var formId = jQuery(this).closest('form').attr('id');
	var currentVal = jQuery(this).val();
	var src = jQuery(this).attr('src');
	var stringUrl = site_url+'/'+src+'?currentVal='+currentVal;
		var type = 'json';
		var returnAMt = ajaxHit1(stringUrl,type);
			returnAMt.success(function(response) {
				if(response == 2){
					alert(formId);
					jQuery('#validPasswordMsg').show().html('Password does not match.Please try again').css('color','#F00').fadeOut(7000);
					jQuery('#'+formId).find('button.checkform').prop('disabled',true);
				}else{
					jQuery('#validPasswordMsg').show().html('Password matched.').css('color','#3c763d').fadeOut(7000);
					jQuery('#'
          +formId).find('button.checkform').prop('disabled',false);
				}
		});
	}
});
jQuery('body').on('keydown','.txtNumeric',function(e){
          // Allow: backspace, delete, tab, escape, enter and .
      //  if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
             // Allow: Ctrl+A, Command+A
        //    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right, down, up
          //  (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
            //     return;
       // }
        // Ensure that it is a number and stop the keypress
        //if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        //    e.preventDefault();
        //}
    });
    jQuery('body').on('click','.ajaxPagination a',function(){
        	  var url = jQuery(this).attr("href");
    	    var stringUrl = url+'&'+'ajax=1';
    	     jQuery('#loader').show();
           var type = 'html';
           var returnAMt = ajaxHit(stringUrl,type);
           returnAMt.success(function(response) {
             jQuery(".placeTable").html(response);
             jQuery('#loader').hide();
     			});
           return false;
      });
      jQuery('body').on('click','.storeAjaxPagination a',function(){
          var url = jQuery(this).attr("href");
    	    var stringUrl = url+'&'+'ajax=1&search='+jQuery('.searchStore').val();
    	     jQuery('#loader').show();
           var type = 'html';
           var returnAMt = ajaxHit(stringUrl,type);
           returnAMt.success(function(response) {
             jQuery(".placeTable").html(response);
             jQuery('#loader').hide();
     			});
           return false;
      });
       jQuery('body').on('click','.vendorAjaxPagination a',function(){
          var url = jQuery(this).attr("href");
    	    var stringUrl = url+'&'+'ajax=1&search='+jQuery('.searchVendor').val();
    	     jQuery('#loader').show();
           var type = 'html';
           var returnAMt = ajaxHit(stringUrl,type);
           returnAMt.success(function(response) {
             jQuery(".placeTable").html(response);
             jQuery('#loader').hide();
     			});
           return false;
      });
      jQuery('body').on('click','.saleAjaxPagination a',function(){
          var url = jQuery(this).attr("href");
    	    var stringUrl = url+'&'+'ajax=1&from='+jQuery('#saledatepickerFrom').val() + '&to='+jQuery('#saledatepickerTo').val();
    	     jQuery('#loader').show();
           var type = 'html';
           var returnAMt = ajaxHit(stringUrl,type);
           returnAMt.success(function(response) {
             jQuery(".placeTable").html(response);
             jQuery('#loader').hide();
     			});
           return false;
      });
      
      jQuery('body').on('click','.scrAjaxPagination a',function(){
          var url = jQuery(this).attr("href");
    	    var stringUrl = url+'&'+'ajax=1&search='+jQuery('.searchScr').val() ;
    	     jQuery('#loader').show();
           var type = 'html';
           var returnAMt = ajaxHit(stringUrl,type);
           returnAMt.success(function(response) {
             jQuery("#allRecords").html(response);
             jQuery('#loader').hide();
     			});
           return false;
      });
      
         jQuery('body').on('click','.orderAjaxPagination a',function(){
          var url = jQuery(this).attr("href");
    	    var stringUrl = url+'&'+'ajax=1&search='+jQuery('.searchOrder').val() ;
    	     jQuery('#loader').show();
           var type = 'html';
           var returnAMt = ajaxHit(stringUrl,type);
           returnAMt.success(function(response) {
             jQuery("#allRecords").html(response);
             jQuery('#loader').hide();
     			});
           return false;
      });
      jQuery('body').on('click','.loadDispatchOrder',function(){
        var arr = [];
        jQuery('.selfUniqueId').each(function(){
          arr.push(jQuery(this).val());
        });
        jQuery.ajax({
          type : "post" ,
          url :  site_url + '/loadDispatchOrder'  ,
          data :  {arr:arr} ,
          dataType : "html" ,
          beforeSend: function() { jQuery('#loader').show()},
          complete: function() { jQuery('#loader').hide() },
          success : function(response){
            if(response == 'false'){
              jQuery('#errorMsg').show().html('No More Record Found').fadeOut(5000);
              jQuery('.loadDispatchOrder').css('display','none');
            }else{
              jQuery(".placeTable").append(response);
            }

          }
            });
          return false;

      });
      jQuery('body').on('click','.backButton',function(){
        jQuery('.mainDiv').css('display','block');
        jQuery('#editDiv').css('display','none');
      });
      jQuery('.fillCityList').donetyping(function() {
    //  jQuery('body').on('keyup','.fillCityList',function(){
 var thiss = jQuery(this);
              var lowerCase = jQuery(this).val().toLowerCase();
              var upperCase = jQuery(this).val().toUpperCase();
              if(upperCase != ''){
              jQuery(this).closest('div').find('#clientList').show();
              jQuery(this).closest('div').find('#clientUl').html('Searching..');
              }
              else{
                   jQuery('#clientList').hide();
              }
              if (lowerCase != '') {
                  jQuery.ajax({
                      type: "post",
                      url: site_url + "/gettingcity",
                      cache: false,
                      data: {lowerCase: lowerCase, upperCase: upperCase},
                      dataType: "html",
                      success: function (data) {
                        jQuery(thiss).closest('div.srch-div').find('#clientList').css('display','block');
                              //jQuery('#clientList').css('display','block');
                              jQuery(thiss).closest('div.srch-div').find('#clientUl').html('');
                              jQuery(thiss).closest('div.srch-div').find('#clientUl').append(data);
                    },

                  });
              } else {
                  jQuery(thiss).closest('div.srch-div').find('#clientList').hide();
              }

          });
jQuery('body').on('click','.placeCityToText',function(){
  jQuery(this).closest('div.srch-div').find('.fillCityList').val(jQuery(this).attr('rel'));
    jQuery(this).closest('div.srch-div').find('#clientList').hide();
});

      var urlCurrent = window.location.href;
      var dobSplite = urlCurrent.split('/');
      var lastVal = dobSplite[dobSplite.length-1];
      var secondVal = dobSplite[dobSplite.length-2];
      console.log(lastVal);
      if(lastVal != ''){
      jQuery('.commonSideBar').removeClass('active');
      jQuery('.'+lastVal).addClass('active');
    }
});
function ajaxHitPost(string,type,data,data1){
  return jQuery.ajax({
          type: "POST",
          url: string,
          beforeSend: function() { jQuery('#loader').show()},
          complete: function() { jQuery('#loader').hide() },
          data: {detail:data,promo:promo},
          dataType: type
      });
}
function ajaxHitPostWithoutLoader(string,type,data2,data1){
  return jQuery.ajax({
          type: "POST",
          url: string,
          data: {detail:data2,promo:data1},
          dataType: type
      });
}
function ajaxHit(string,type){
  return jQuery.ajax({
          type: "GET",
          url: string,
          beforeSend: function() { jQuery('#loader').show()},
          complete: function() { jQuery('#loader').hide() },
          data: {},
          dataType: type,
		  async:-1,
      });
}
function ajaxHitWithoutLoader(string,type){
  return jQuery.ajax({
          type: "GET",
          url: string,
          data: {},
          dataType: type,
		  async:-1,
      });
}
function ajaxHitSub(string,type){
  return jQuery.ajax({
          type: "GET",
          url: string,
          beforeSend: function() { jQuery('#loader').show()},
          complete: function() {  },
          data: {},
          dataType: type,
		  async:-1,
      });
}
function ajaxHitSub1(string,type){
  return jQuery.ajax({
          type: "GET",
          url: string,
          beforeSend: function() { },
          complete: function() { jQuery('#loader').hide() },
          data: {},
          dataType: type,
		  async:-1,
      });
}
function ajaxHitWithoutLoader(string,type){
  return jQuery.ajax({
          type: "GET",
          url: string,
          // no loader..................
          data: {},
          dataType: type,
		  async:-1,
      });
}
function ajaxHit1(string,type){
  return jQuery.ajax({
          type: "GET",
          url: string,
          beforeSend: function() {$('#loader').show();},
          complete: function() { $('#loader').hide(); },
          data: {},
          dataType: type
      });
}
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
function ajaxFormHit1(type,className,typeFor){
   //alert(className);
  var result="";
   jQuery('#'+className).ajaxForm({
          beforeSend: function() { $('#loader').show(); },
          complete: function() { $('#loader').hide() },
          data: {},
          dataType: type,
          async: -1,
          success: function (data) {
            try {
			jQuery("html, body").animate({scrollTop: 0}, "slow");
            if(typeFor == 'editSaleSave'){
              jQuery('.msg').show().html(data.message).fadeOut(3000);
              setTimeout(function(){  
                  jQuery('.saleList').css('display','block');
			  jQuery('#editSale').css('display','none');
			  }, 3000);
              
            }
            if(typeFor == 'editSCRSave')
            {
                 jQuery('.msg').show().html(data.message).fadeOut(3000);
                 setTimeout(function(){  
                    jQuery('.inventoryListDetail').css('display','block');
                    jQuery('#gameId'+data.uniqueId).text(data.gameId);
                    jQuery('#gameName'+data.uniqueId).text(data.gameName);
                    jQuery('#scrTicket'+data.uniqueId).text(data.scr_off_ticket);
                    jQuery('#gameValue'+data.uniqueId).text(data.gameValue);
                    jQuery('#gameValuePrice'+data.uniqueId).text(data.gameValuePrice);
                    jQuery('#starting'+data.uniqueId).text(data.starting);
                    jQuery('#ending'+data.uniqueId).text(data.ending);
                    jQuery('#tickets'+data.uniqueId).text(data.tickets);
                    
	                jQuery('#editStore').css('display','none');
			  }, 3000);
                 
            }
            it(typeFor == 'editOrderSave')
            { 
                jQuery('.msg').show().html(data.message).fadeOut(3000);
                setTimeout(function(){  
                    jQuery('.inventoryListDetail').css('display','block');
                    jQuery('#gameId'+data.uniqueId).text(data.gameId);
                    jQuery('#gameName'+data.uniqueId).text(data.gameName);
                    jQuery('#gameValue'+data.uniqueId).text(data.gameValue);
                    jQuery('#serial'+data.uniqueId).text(data.serial);
                   
	                jQuery('#editStore').css('display','none');
			  }, 3000);
            }
        

              } catch (e) {
                  jQuery('.msg').show().html(data.message).fadeOut(3000);
                setTimeout(function(){  
                    jQuery('.inventoryListDetail').css('display','block');
                    jQuery('#gameId'+data.uniqueId).text(data.gameId);
                    jQuery('#gameName'+data.uniqueId).text(data.gameName);
                    jQuery('#gameValue'+data.uniqueId).text(data.gameValue);
                    jQuery('#serial'+data.uniqueId).text(data.serial);
                   
	                jQuery('#editStore').css('display','none');
			  }, 3000);
              }
          },
          error: function () {
              alert('Error while request..');
          }
      }).submit();
      return false;
}

