jQuery(document).ready(function(){
    
    jQuery('body').on('click','.edituseraction',function(){
			var id=jQuery(this).attr('id');
			jQuery.ajax({
	     	method:"GET",
			url: "edit-user?id="+id,
			type:"html",
			success:function(response) {
			jQuery('.inventoryListDetail').css('display','none');
			jQuery('#editForm').css('display','block');
			jQuery('#editForm').html(response);
		}	
			});
		});
		jQuery('body').on('click','.editusersave',function(){
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
                    return false;
                  }else{
                      var id=jQuery(this).attr('id');
                      var form_data = jQuery(".usereditform").serialize();
                      jQuery.ajax({
			method:"GET",
			url: "edit-user-save?form_data=1&"+form_data+"&id="+id,
			type:"json",
			success:function(response){
			       if(response.error == true){
                            var msg = "data updated succesfully";
                       jQuery('#signupmsg').show().html('<div class="alert alert-success" >'+msg+'</div>').fadeOut(10000);
                       setTimeout(function(){  location.href="/bob/user-list" ; }, 3000);
                    }
                    else{
                             var msg = "test";
                       jQuery('#signupmsg').show().html('<div class="alert alert-danger" >'+msg+'</div>').fadeOut(10000);
                        
                    }
			}
                      });
                  }
		});
		jQuery('body').on('click','.deleteUserList',function(){
		    var userRef = jQuery(this).attr('id');
        jQuery('#deleteRef').val(userRef);
		     jQuery("#myCommModal").modal('show');// wire up the actual modal functionality and show the dialog
           
		});
		jQuery('body').on('click','#keepData',function(){
		jQuery("#myCommModal").modal('hide');
		jQuery("#myCommModalDel").modal('hide');
		jQuery("#myactiveModal").modal('hide');
	});
		jQuery('body').on('click','#deleteuserdetail',function(){
		    var currentVal = jQuery('#deleteRef').val();
		      jQuery.ajax({
			method:"GET",
			url: "delete-user?currentVal="+currentVal,
			type:"json",
			success:function(response){
			    	jQuery('#status'+currentVal).text('Deactive');
				jQuery("#myCommModal").modal('hide');
			if(response.error == false){
                            var msg = "user detail delete succesfully";
                       jQuery('#showMsg').show().html('<div class="alert alert-success" >'+msg+'</div>').fadeOut(10000);
			}
			else{
			    //
			}
				jQuery("html, body").animate({scrollTop: 0}, "slow");
			}
		});
		});
		  jQuery('body').on('click','.editstoreaction',function(){
			var id=jQuery(this).attr('id');
			jQuery.ajax({
	     	method:"GET",
			url: "edit-store?id="+id,
			type:"html",
			success:function(response) {
			jQuery('.inventoryListDetail').css('display','none');
			jQuery('#editStore').css('display','block');
			jQuery('#editStore').html(response);
		}	
			});
		});
		jQuery('body').on('click','.editstoresave',function(){
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
                    return false;
                  }else{
                      var id=jQuery(this).attr('id');
                      var form_data = jQuery(".Editstore").serialize();
                      jQuery.ajax({
			method:"GET",
			url: "edit-store-save?form_data=1&"+form_data+"&id="+id,
			type:"json",
			success:function(response){
			       if(response.error == true){
                            var msg = "Store updated succesfully";
                       jQuery('#storepmsg').show().html('<div class="alert alert-success" >'+msg+'</div>').fadeOut(10000);
                       setTimeout(function(){  location.href="/bob/store-list" ; }, 3000);
                    }
                    else{
                             var msg = "error";
                       jQuery('#storepmsg').show().html('<div class="alert alert-danger" >'+msg+'</div>').fadeOut(10000);
                        
                    }
			}
                      });
                  }
		});
		jQuery('body').on('click','.deletestoreList',function(){
		    var userRef = jQuery(this).attr('id');
        jQuery('#deleteRstore').val(userRef);
		     jQuery("#myCommModal").modal('show');// wire up the actual modal functionality and show the dialog
           
		});
		jQuery('body').on('click','#keepstore',function(){
		jQuery("#myCommModal").modal('hide');
		jQuery("#myCommModalDel").modal('hide');
		jQuery("#myactiveModal").modal('hide');
	});
		jQuery('body').on('click','#deletestoredetail',function(){
		    var currentVal = jQuery('#deleteRstore').val();
		      jQuery.ajax({
			method:"GET",
			url: "delete-store?currentVal="+currentVal,
			type:"json",
			success:function(response){
			    	jQuery('#row'+currentVal).remove();
				jQuery("#myCommModal").modal('hide');
			if(response.error == false){
                            var msg = "Store delete succesfully";
                       jQuery('#storeMsg').show().html('<div class="alert alert-success" >'+msg+'</div>').fadeOut(10000);
			}
			else{
			    //
			}
				jQuery("html, body").animate({scrollTop: 0}, "slow");
			}
		});
		});
		jQuery('.searchUser').donetyping(function(){
		var val = jQuery(this).val();
		var stringUrl = site_url+'/search-user-detail?value='+val;
		var type = 'html';
		var returnAMt = ajaxHitWithoutLoader(stringUrl,type);
			returnAMt.success(function(response) {
				jQuery('.leftMainDiv').html(response);
		});
	});
		jQuery('.searchStore').donetyping(function(){
		var val = jQuery(this).val();
		var stringUrl = site_url+'/search-store-detail?search='+val;
		var type = 'html';
		var returnAMt = ajaxHitWithoutLoader(stringUrl,type);
			returnAMt.success(function(response) {
				jQuery('.placeTable').html(response);
		});
	});
	
		jQuery('.searchScr').donetyping(function(){
		var val = jQuery(this).val();
		var stringUrl = site_url+'/search-scr?search='+val;
		var type = 'html';
		var returnAMt = ajaxHitWithoutLoader(stringUrl,type);
			returnAMt.success(function(response) {
				jQuery('.placeTable').html(response);
		});
	});
	
	
	jQuery('.searchOrder').donetyping(function(){
		var val = jQuery(this).val();
		var stringUrl = site_url+'/search-order?search='+val;
		var type = 'html';
		var returnAMt = ajaxHitWithoutLoader(stringUrl,type);
			returnAMt.success(function(response) {
				jQuery('.placeTable').html(response);
		});
	});
	
	jQuery('body').on('change','#getMultipleManager',function(){
	    var managerId = jQuery(this).val();
	    if(jQuery('tr#'+managerId).attr('find') == 'yes'){
	        jQuery('.msg').show().html('<div class="alert alert-danger" >This Manager already selected</div>').fadeOut(10000);
	    }else{
	         var stringUrl = site_url+'/getMultipleManager?managerId='+managerId;
		var type = 'html';
		var returnAMt = ajaxHit(stringUrl,type);
			returnAMt.success(function(response) {
			    jQuery('#divShow').css('display','block');
				jQuery('#tableAppend').append(response);
		});
	    }
	   
	});
	jQuery('body').on('click','.removeManger',function(){
	    jQuery(this).closest('tr').remove();
	    jQuery('#getMultipleManager').val('');
	});
	jQuery('body').on('click','.assignMangerToHidden',function(){
	    var arr = [];
	    jQuery('.addmangerToList').each(function(){
	        arr.push(jQuery(this).attr('id'));
	    });
	    jQuery('#managerList').val(arr);
	});

	jQuery('body').on('click','.backButton',function(){
	    jQuery('.inventoryListDetail').css('display','block');
	    jQuery('#editStore').css('display','none');
		
	});
	jQuery('body').on('click','.viewManagerList',function(){
	    var storeId = jQuery(this).attr('id');
	    var managerId = jQuery(this).attr('managerId');
	     var stringUrl = site_url+'/viewManagerList?storeId='+storeId+'&managerId='+managerId;
		var type = 'html';
		var returnAMt = ajaxHit(stringUrl,type);
			returnAMt.success(function(response) {
			 jQuery('#managerModal').modal('show');
			 jQuery('#selectStoreId').val(storeId);
			 jQuery('#tableAppend').empty();
			 jQuery('#tableAppend').append(response);
		});
	});
		jQuery('body').on('click','#updateManagerList',function(){
	    var arr = [];
	    jQuery('.addmangerToList').each(function(){
	        arr.push(jQuery(this).attr('id'));
	    });
	    if(arr.length >0){
	        var storeId = jQuery('#selectStoreId').val();
	         var stringUrl = site_url+'/updateManagerList?storeId='+storeId+'&managerId='+arr;
		var type = 'json';
		var returnAMt = ajaxHit(stringUrl,type);
			returnAMt.success(function(response) {
			    jQuery('#storeMsg').show().html('<div class="alert alert-success" >Data updated successfully</div>').fadeOut(5000);
	             jQuery('#managerModal').modal('hide');
			    jQuery('a#'+storeId).attr('managerId',arr);
		}); 
	    }else{
	        jQuery('.msg').show().html('<div class="alert alert-danger" >Select Manger</div>').fadeOut(5000);
	             
	    }
	  
	});
	jQuery('body').on('click','#keepstore',function(){
	    jQuery('#managerModal').modal('hide');
	});
	
	 jQuery('body').on('click','.editvendoraction',function(){
			var id=jQuery(this).attr('id');
			jQuery.ajax({
	     	method:"GET",
			url: "edit-vendor?id="+id,
			type:"html",
			success:function(response) {
			jQuery('.inventoryListDetail').css('display','none');
			jQuery('#editForm').css('display','block');
			jQuery('#editForm').html(response);
		}	
			});
		});
		
		jQuery('body').on('click','.updatevendors',function(){
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
                    return false;
                  }else{
                      var id=jQuery(this).attr('id');
                      var form_data = jQuery(".vendoreditform").serialize();
                      jQuery.ajax({
			method:"GET",
			url: "edit-vendor-save?form_data=1&"+form_data+"&id="+id,
			type:"json",
			success:function(response){
			       if(response.error == true){
                            var msg = "data updated succesfully";
                       jQuery('#signupmsg').show().html('<div class="alert alert-success" >'+msg+'</div>').fadeOut(10000);
                      setTimeout(function(){  location.href="/bob/vendors-list" ; }, 3000);
                    }
                    else{
                             var msg = "test";
                       jQuery('#signupmsg').show().html('<div class="alert alert-danger" >'+msg+'</div>').fadeOut(10000);
                        
                    }
			}
                      });
                  }
		});
	
	jQuery('body').on('click','.deletevendorList',function(){
		    var userRef = jQuery(this).attr('id');
        jQuery('#deleteRef').val(userRef);
		     jQuery("#myCommModal").modal('show');// wire up the actual modal functionality and show the dialog
           
		});
		
		jQuery('body').on('click','#deletevendorsdetail',function(){
		    var currentVal = jQuery('#deleteRef').val();
		      jQuery.ajax({
			method:"GET",
			url: "delete-vendor?currentVal="+currentVal,
			type:"json",
			success:function(response){
			    jQuery("html, body").animate({scrollTop: 0}, "slow");
			    	jQuery('#status'+currentVal).text('Deactive').css('color','red');
				jQuery("#myCommModal").modal('hide');
		        var msg = "Vendor Deactive succesfully";
                jQuery('#showMsg').show().html('<div class="alert alert-success" >'+msg+'</div>').fadeOut(10000);
		
				
			}
		});
		});
	jQuery('.searchVendor').donetyping(function(){
		var val = jQuery(this).val();
		var stringUrl = site_url+'/search-Vendor-detail?search='+val;
		var type = 'html';
		var returnAMt = ajaxHitWithoutLoader(stringUrl,type);
			returnAMt.success(function(response) {
				jQuery('.placeTable').html(response);
		});
	});
	
	var count = 1;
	jQuery('body').on('click','.addRow',function(){ 
	    count++;
	    var $tr    = jQuery(this).closest('.tr_clone');
	    jQuery(this).closest('.tr_clone').removeClass('.tr_clone');
        var $clone = $tr.clone();
        var rel = $clone.find(".addRow").attr('rel');
        var sno = parseFloat(rel) + parseFloat(1);
        console.log(sno);
         $clone.find("#fixnumber").removeAttr('class').addClass('checknumber'+sno);
         $clone.find('.checknumber'+sno).text(sno);
         $clone.find('.addRow').removeAttr('rel');   
         $clone.find('.addRow').attr( "rel", sno );   
        $clone.find(':text').val('');   
        $clone.find('input[type=select]').val('');
         //console.log($td);
        $clone.find("input.textFieldDatepicker").removeAttr('id')
        
    .removeClass('hasDatepicker')
    .removeData('datepicker').val('')
    .datepicker({
         dateFormat: 'mm/dd/yy' ,
	     changeMonth: true,
         changeYear: true,
        showButtonPanel: false,
        beforeShow: function() {
            setTimeout(function() {
                $('.ui-datepicker').css('z-index', 99999999999999);

            }, 0);
        } ,
        onSelect: function (dateText) {
            //jQuery(this).removeAttr('id');
                jQuery(this).css('border','1px solid lightgrey');
               
        }
        
    });
     $tr.after($clone);
	}); 
	
	
		jQuery('body').on('click','.addActivateRow',function(){ 
		    
// 		var arr = [];
// 		    jQuery('.slotNo').each(function(){
// 		        arr.push(jQuery(this).val());
// 		    });
	    var $tr    = jQuery(this).closest('.tr_clone');
	    jQuery(this).closest('.tr_clone').removeClass('.tr_clone');
        var $clone = $tr.clone();
        $clone.find(':text').val('');   
        $clone.find('.activate_serial').empty();
        $clone.find('.activate_serial').append('<option value="">Select Slot</option>');
        
    //   jQuery. each(arr, function(i, val) {
    //         $clone.find(".slotNo option[value='"+val+"']").remove();

    //     });
        $clone.find("input.textFieldDatepicker").removeAttr('id')
    .removeClass('hasDatepicker')
    .removeData('datepicker').val('')
    .datepicker({
         dateFormat: 'mm/dd/yy' ,
	     changeMonth: true,
         changeYear: true,
        showButtonPanel: false,
        beforeShow: function() {
            setTimeout(function() {
                $('.ui-datepicker').css('z-index', 99999999999999);

            }, 0);
        } ,
        onSelect: function (dateText) {
            jQuery(this).removeAttr('id');
                jQuery(this).css('border','1px solid lightgrey');
               
        }
        
    });
     $tr.after($clone);
        
	});
	
	jQuery('body').on('click','.addbankRow',function(){
	    var $tr    = jQuery(this).closest('.tr_clone');
        var $clone = $tr.clone();
        //$clone.find(':text').val('');   
        //$clone.find('input[type=select]').val('');
        $tr.after($clone);
        $clone.find('.deleteRow').text('-');
	});
	jQuery('body').on('blur','.calSal',function(){
	    var re = calculateTotalSale();
	    
	});
	jQuery('body').on('click','.addCash,.chargeAdd',function(){ console.log('hello');
	     var $tr    = jQuery(this).closest('.tr_clone1'); console.log($tr);
        var $clone = $tr.clone();
        $clone.find(':text').val('');   //$clone.find('input[type=select]').val('');
        $tr.after($clone);
	});
	jQuery('body').on('click','.editsale',function(){
	   var uniqueId = jQuery(this).attr('id');
	   var stringUrl = site_url+'/editsale?uniqueId='+uniqueId;
		var type = 'html';
		var returnAMt = ajaxHit(stringUrl,type);
			returnAMt.success(function(response) {
			    jQuery('.saleList').css('display','none');
			    jQuery('#editSale').css('display','block');
				jQuery('#editSale').html(response);
		});
	});
	jQuery('body').on('click','.deleteRow',function(){
	    var tableId = jQuery(this).attr('tableId');
	    var fixedRow = jQuery(this).attr('fixedRow');
	    var rowCount = $('#'+tableId+' tr').length; 
	   // console.log(rowCount);
	    if(rowCount == fixedRow){
	       jQuery("html, body").animate({scrollTop: 0}, "slow");
		    var msg = "Can't delete single row";
            jQuery('.msg').show().html('<div class="alert alert-danger" >'+msg+'</div>').fadeOut(10000);
		
	    }else{
	        jQuery(this).closest('tr').remove();
	          var sum = 0;
	    jQuery('.addvendorPrice').each(function(){
	        if(jQuery(this).val() != ''){
	            if(jQuery(this).closest('tr').find('.payMathod').val() == 'Cash') {
	            sum  = parseFloat(sum) + parseFloat(jQuery(this).val()); 
	            }
	        }
	       
	    });
	    jQuery('#vendorPO').val(sum.toFixed(2));
	    jQuery('#vendorPO').css('border','1px solid lightgrey');
	    var re = calculateRequired();
	    }
	    
	});
	
	jQuery('body').on('click','.deleteActRow',function(e){
	    
	    var tableId = jQuery(this).attr('tableId');
	    var fixedRow = jQuery(this).attr('fixedRow');
	    var rowCount = $('#'+tableId+' tr').length; 
	    if(rowCount == fixedRow){
	       jQuery("html, body").animate({scrollTop: 0}, "slow");
		    var msg = "Can't delete single row";
            jQuery('.msg').show().html('<div class="alert alert-danger" >'+msg+'</div>').fadeOut(10000);
		
	    }else{
	        var item  = jQuery(this).closest('.tr_clone').find('.slotNo').val(); alert(item);
	        jQuery('.slotNo').each(function(){
	           jQuery(this).append('<option value="'+item+'">'+item+'</option>') ;
	          
	        });
	        
	        jQuery(this).closest('tr').remove();
	    }
	    
	   //  /******** sort list*******************/
	   //      $(".slotNo").html($('.slotNo option').sort(function(x, y) {
    //         return $(x).val() < $(y).val() ? -1 : 1;
    //     }))
    //     $(".slotNo").get(0).selectedIndex = 0;
    //     e.preventDefault();
	   //     /***************************/
	    
	});
	jQuery('body').on('blur change','.addvendorPrice ,.payMathod',function(){ 
	    var sum = 0;
	    jQuery('.addvendorPrice').each(function(){
	        if(jQuery(this).val() != ''){
	            if(jQuery(this).closest('tr').find('.payMathod').val() == 'Cash') {
	            sum  = parseFloat(sum) + parseFloat(jQuery(this).val()); 
	            }
	        }
	       
	    });
	    jQuery('#vendorPO').val(sum.toFixed(2));
	    jQuery('#vendorPO').css('border','1px solid lightgrey');
	    var re = calculateRequired();
	});
    jQuery('body').on('click','.editSaleSave',function(){
        var type 	  =	'json';
    var formClass =	jQuery(this).closest('form').attr('id');
    var returnAMt = ajaxFormHit1(type,formClass,'editSaleSave');
    });
    jQuery('body').on('blur','#OS_coupon',function(){
        jQuery('#sales_coupon').val(jQuery(this).val());
        jQuery('#sales_coupon').css('border','1px solid lightgrey');
        // add ino total sales...
        var re = calculateTotalSale();
    });
    
    
    jQuery('body').on('blur','.chargeAddNum, #chargeAcct',function(){ 
	    var sum = 0;
	    jQuery('.chargeAddNum').each(function(){
	        if(jQuery(this).val() != ''){
	            sum  = parseFloat(sum) + parseFloat(jQuery(this).val()); 
	        }
	        else{sum  = parseFloat(sum) + parseFloat(0); }
	       
	    });
	    jQuery('#chargeAcct').val(sum.toFixed(2));
	    jQuery('#chargeAcct').css('border','1px solid lightgrey');
	    var result = calculateRequired();
	});
	jQuery('body').on('click','.backButton',function(){
	    jQuery('#editSale').css('display','none');
	    jQuery('.saleList').css('display','block');
			  
	});
	jQuery('body').on('blur','input[name="OS_sale_tax"] , input[name="OS_EBT"] , input[name="OS_vendor_po"], input[name="OS_coupon"],input[name="OS_credit_card"] , input[name="OS_charge_acct"]',function(){
	    var sum = 0 ;
	    var result = calculateRequired();
	    
	    });
	    
	    	jQuery('body').on('focus','input[name="lotto_per_over_short"]',function(){
		     if(jQuery('input[name="lotto_scr_lotto_tape"]').val() != '' && jQuery('input[name="lotto_pout_report"]').val() != '') { 
		          var sum = parseFloat(jQuery('input[name="lotto_pout_report"]').val()) - (parseFloat(jQuery('input[name="lotto_scr_lotto_tape"]').val())); 
		         jQuery('input[name="lotto_per_over_short"]').val(sum.toFixed(2));
		     }
		     
		});
		
		
	    jQuery('body').on('blur','.calBankAmt',function(){
	        var sum = 0;
	    jQuery('.calBankAmt').each(function(){ 
	        if(jQuery(this).val() != ''){
	            var mul = parseFloat(jQuery(this).val()) *  parseFloat(jQuery(this).attr('rel')) ; console.log(mul);
	            sum = parseFloat(sum) +  parseFloat(mul)  ; 
	            jQuery(this).closest('.tr_clone').find('.totalVal').val(mul.toFixed(2));
	            jQuery('input[name=bank_total_deposit]').val(sum.toFixed(2));
	            jQuery('.totalamt').val(sum.toFixed(2));
	        }
	       
	    });
	    calculateActual();
	   
	    });
	    
	     jQuery('body').on('blur','.calBanklotto',function(){
	        var sum = 0;
	    jQuery('.calBanklotto').each(function(){ 
	        if(jQuery(this).val() != ''){
	            var mul = parseFloat(jQuery(this).val()) *  parseFloat(jQuery(this).attr('rel')) ; console.log(mul);
	            sum = parseFloat(sum) +  parseFloat(mul)  ; 
	            jQuery(this).closest('.tr_clone').find('.totalVallotto').val(mul.toFixed(2));
	            jQuery('input[name=bank_check_deposit]').val(sum.toFixed(2));
	            jQuery('.totalamtlotto').val(sum.toFixed(2));
	        }
	       
	    });
	    calculateActual();
	   
	    });
	    
	    
	      jQuery('body').on('blur','.calBankfuel',function(){
	        var sum = 0;
	    jQuery('.calBankfuel').each(function(){ 
	        if(jQuery(this).val() != ''){
	            var mul = parseFloat(jQuery(this).val()) *  parseFloat(jQuery(this).attr('rel')) ; console.log(mul);
	            sum = parseFloat(sum) +  parseFloat(mul)  ; 
	            jQuery(this).closest('.tr_clone').find('.totalValfuel').val(mul.toFixed(2));
	            jQuery('input[name=bank_fuel_deposit]').val(sum.toFixed(2));
	            jQuery('.totalamtfuel').val(sum.toFixed(2));
	        }
	       
	    });
	    calculateActual();
	   
	    });
	    
	    
	    
	    jQuery('body').on('blur','.gallon',function(){
	         var total = 0;
	          jQuery('.gallon').each(function(){
	        if(jQuery(this).val() != ''){
	            total = parseFloat(total) +  parseFloat(jQuery(this).val());
	            jQuery('#gallonTotal').val(total.toFixed(2));
	        }
	       
	    });
	    });
	    
	        jQuery('body').on('blur','.gallonprice',function(){
	             var total = 0;
	          jQuery('.gallonprice').each(function(){
	        if(jQuery(this).val() != ''){
	            total = parseFloat(total) +  parseFloat(jQuery(this).val());
	            jQuery('#gallonPriceTotal').val(total.toFixed(2));
	        }
	       
	    });
	    });
	    
	    jQuery('body').on('click','.calculateBankDeposit',function(){
	        var sum = 0;
	    jQuery('.totalVal').each(function(){ 
	        if(jQuery(this).val() != ''){
	           sum = parseFloat(sum) + parseFloat(jQuery(this).val());
	        }
	       
	    });
	    jQuery('input[name=bank_total_deposit]').val(sum.toFixed(2));
	    calculateActual();
	    });
	    
	     jQuery('body').on('click','.calculateLotto',function(){
	        var sum = 0;
	    jQuery('.totalVallotto').each(function(){ 
	        if(jQuery(this).val() != ''){
	           sum = parseFloat(sum) + parseFloat(jQuery(this).val());
	        }
	       
	    });
	    jQuery('input[name=bank_check_deposit]').val(sum.toFixed(2));
	    calculateActual();
	    });
	    
	      jQuery('body').on('click','.calculatefuel',function(){
	        var sum = 0;
	    jQuery('.totalValfuel').each(function(){ 
	        if(jQuery(this).val() != ''){
	           sum = parseFloat(sum) + parseFloat(jQuery(this).val());
	        }
	       
	    });
	    jQuery('input[name=bank_fuel_deposit]').val(sum.toFixed(2));
	    calculateActual();
	    });
	    
	    jQuery('body').on('blur','input[name=bank_check_deposit]',function(){
	        calculateActual();
	    });
	    
	    jQuery('body').on('blur','input[name=sales_lotto_sale]',function(){
	        jQuery('input[name=lotto_z_tape').val(jQuery(this).val());
	    });
	    
	    jQuery('body').on('blur','input[name=sales_ser_sale]',function(){
	        jQuery('input[name=lotto_scr_tape').val(jQuery(this).val());
	    });
	    
	    jQuery('body').on('blur','input[name=sales_scr_cashes] , input[name=sales_lotto_cashes]',function(){
	        if(jQuery('input[name=sales_scr_cashes]').val() == '')
	        {
	            var scrPo = 0;
	        }else{
	            var scrPo = jQuery('input[name=sales_scr_cashes]').val() ;
	        }
	        if(jQuery('input[name=sales_lotto_cashes]').val() == '')
	        {
	            var lottoPo = 0;
	        }else{
	            var lottoPo = jQuery('input[name=sales_lotto_cashes]').val() ;
	        }
	        var total = parseFloat(scrPo) + parseFloat(lottoPo);
	        jQuery('input[name=lotto_scr_lotto_tape]').val(total.toFixed(2));
	    });
	    jQuery('body').on('change','.getGameDetail',function(){
	        var gameId = jQuery(this).val();
	         var stringUrl = site_url+'/getGameDetail?gameId='+gameId;
		    var type = 'json';
		    var thiss = jQuery(this);
		    var returnAMt = ajaxHit(stringUrl,type);
			returnAMt.success(function(response) {
			 //   jQuery('input[name=gameName]').val(response.gameName);
			 //   jQuery('input[name=total]').val(response.total);
			 jQuery(thiss).closest('.tr_clone').find('.gameName').val(response.gameName);
			 jQuery(thiss).closest('.tr_clone').find('.total').val(response.total);
			 calculateRecOrderTotal();
		});
	    });
	    
	      jQuery('body').on('change','.getSerialDetail',function(){
	        var gameId = jQuery(this).val();
	         var stringUrl = site_url+'/getSerialDetail?gameId='+gameId;
		    var type = 'html';
		    var thiss = jQuery(this);
		    var returnAMt = ajaxHit(stringUrl,type);
			returnAMt.success(function(res) { 
			     jQuery(thiss).closest('.tr_clone').find('.activate_serial').empty();
			     jQuery(thiss).closest('.tr_clone').find('.activate_serial').append(res);
		});
	    });
	    jQuery('body').on('blur','.checkSerialNumber',function(){
	        var serialNum = jQuery(this).val();
	         jQuery('.checkSerialNumber').not(this).each(function(){
	            // alert(jQuery(this).val());
	             if(jQuery(this).val() == serialNum )
	             { 
	                 jQuery('.msg').show().html('<div class="ajax_report alert-message alert alert-danger updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">Serial Number cannot be same.</span></div>');
			         jQuery('.checkForm').prop('disable',true);
                        return false;
	             }else{
	                 jQuery('.msg').html('');
	                 jQuery('.checkForm').prop('disable',false);
	             }
	         });
	         
	        var uniqueId = jQuery('input[name=orderId]').val();
	        var stringUrl = site_url+'/checkSerialNumber?serialNum='+serialNum+'&uniqueId='+uniqueId;
		    var type = 'json';
		    var returnAMt = ajaxHit(stringUrl,type);
		    var thiss = jQuery(this);
			returnAMt.success(function(res) { 
			     if(res >  0) {
			         // found.....
			         //jQuery(thiss).css('border', '1.4px solid red');
			         jQuery('.msg1').show().html('<div class="ajax_report alert-message alert alert-danger updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">This Serial Number already exist.</span></div>');
			         jQuery('.checkForm').prop('disabled',true);
			     }else{
			         //jQuery(thiss).css('border', '1.4px solid lightgrey');
			         jQuery('.msg1').show().html('');
			         jQuery('.checkForm').prop('disabled',false);
			     }
		});
	    });
	       jQuery('body').on('click','.editSCR',function(){
			var id=jQuery(this).attr('id');
			jQuery.ajax({
	     	method:"GET",
			url: site_url + "/edit-SCR?id="+id,
			  beforeSend: function() { jQuery('#loader').show()},
          complete: function() { jQuery('#loader').hide() },
			type:"html",
			success:function(response) {
			jQuery('.inventoryListDetail').css('display','none');
			jQuery('#editStore').css('display','block');
			jQuery('#editStore').html(response);
		}	
			});
		});
		
		
		   jQuery('body').on('click','.editOrder',function(){
			var id=jQuery(this).attr('id');
			jQuery.ajax({
	     	method:"GET",
			url: site_url + "/edit-Order?id="+id,
			  beforeSend: function() { jQuery('#loader').show()},
          complete: function() { jQuery('#loader').hide() },
			type:"html",
			success:function(response) {
			jQuery('.inventoryListDetail').css('display','none');
			jQuery('#editStore').css('display','block');
			jQuery('#editStore').html(response);
		}	
			});
		});
		
		jQuery('body').on('click','.editSCRSave',function(){
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
      jQuery(this).prop('disabled',true);
    return false;
  }else{
    jQuery(this).prop('disabled',false);
    var type 	  =	'json';
    var formClass =	jQuery(this).closest('form').attr('id');
    var returnAMt = ajaxFormHit1(type,formClass,'editSCRSave');
  }
		    
		});
		
			jQuery('body').on('click','.editOrderSave',function(){
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
      jQuery(this).prop('disabled',true);
    return false;
  }else{
    jQuery(this).prop('disabled',false);
    var type 	  =	'json';
    var formClass =	jQuery(this).closest('form').attr('id');
    var returnAMt = ajaxFormHit1(type,formClass,'editOrderSave');
  }
		    
		});
		jQuery('body').on('focus','input[name=OS_total_sales]',function(){
		    if(jQuery('input[name=sales_total_sale]').val() != ''){
		        if(jQuery('input[name=sales_fuel_sale]').val() != ''){
		        jQuery('input[name=OS_total_sales]').val(parseFloat(jQuery('input[name=sales_total_sale]').val()) + parseFloat(jQuery('input[name=sales_fuel_sale]').val()));
		    
		        }
		        }
		        else{
		            jQuery('input[name=OS_total_sales]').val('0');
		        }
		});
			jQuery('body').on('focus','input[name=bank_total_line]',function(){
			     //if(jQuery('input[name=bank_total_deposit]').val() != '' && jQuery('input[name=bank_check_deposit]').val() != '' && jQuery('input[name=bank_fuel_deposit]').val() != ''){
		    if(jQuery('input[name=bank_total_deposit]').val() != '' && jQuery('input[name=bank_check_deposit]').val() != ''){
		        if(jQuery('input[name=bank_fuel_deposit]').val() != ''){
		            var fuelDeposit = jQuery('input[name=bank_fuel_deposit]').val();
		        }
		        else{
		              var fuelDeposit = 0;
		        }
		        jQuery('input[name=bank_total_line]').val((parseFloat(jQuery('input[name=bank_total_deposit]').val()) + parseFloat(jQuery('input[name=bank_check_deposit]').val()) + parseFloat(fuelDeposit)).toFixed(2));
		        }
		        else{
		            jQuery('input[name=bank_total_line]').val('0');
		        }
		});
		
		jQuery('body').on('blur','input[name=starting],input[name=ending]',function(){
		   if(jQuery('input[name=ending]').val() != '' &&  jQuery('input[name=starting]').val() != ''){
		       if(parseFloat(jQuery('input[name=ending]').val()) < parseFloat(jQuery('input[name=starting]').val()))
		       { 
		          
		          jQuery('.msg').show().html('<div class="ajax_report alert-message alert alert-danger updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">Starting number cannot be large than ending number.</span></div>');
			      jQuery('input[name=ending]').css('border', '1px solid #F00');
			      jQuery('.checkForm').prop('disable',true);
		       }else{
		           jQuery('.msg').show().html('');
		           jQuery('input[name=ending]').css('border', '1px solid lightgrey');
		           jQuery('.checkForm').prop('disable',false);
		       }
		   } else{
		       jQuery('.msg').show().html('');
		       jQuery('input[name=ending]').css('border', '1px solid lightgrey');
		       jQuery('.checkForm').prop('disable',false);
		   }
		});
		jQuery('body').on('blur','input[name=gameValuePrice] ,input[name=tickets]',function(){
		     if(jQuery('input[name=gameValuePrice]').val() != '' && jQuery('input[name=tickets]').val() != '') { 
		         // var sum = parseFloat(jQuery('input[name=gameValuePrice]').val()) * (parseFloat(jQuery('input[name=tickets]').val()) + parseInt(1)) ; 
		          var sum = parseFloat(jQuery('input[name=gameValuePrice]').val()) * parseFloat(jQuery('input[name=tickets]').val()) ; 
		         jQuery('input[name=gameValue]').val(sum.toFixed(2));
		     }
		     
		});
		jQuery('body').on('blur','input[name=lotto_report]',function(){
		    if(jQuery(this).val() != '' && jQuery('input[name=lotto_scr_lotto_tape]').val() != '')
		    {
		        var sum = parseFloat(jQuery(this).val()) - parseFloat(jQuery('input[name=lotto_z_tape]').val());
		        jQuery('input[name=lotto_over_short]').val(sum.toFixed(2));
		    }
		});
		
		jQuery('body').on('blur','input[name=lotto_scr_tape] ,input[name=lotto_scr_report]',function(){
		    if(jQuery('input[name=lotto_scr_tape]').val() != '' && jQuery('input[name=lotto_scr_report]').val() != '')
		    {
		        var sum = parseFloat(jQuery('input[name=lotto_scr_report]').val()) - parseFloat(jQuery('input[name=lotto_scr_tape]').val());
		        jQuery('input[name=lotto_scr_over_short]').val(sum.toFixed(2));
		    }
		});
		
		jQuery('body').on('change','.slotNo',function(){
		    var slotNo = jQuery(this).val();
		   jQuery('.slotNo').not(this).each(function(){
	             if(jQuery(this).val() == slotNo)
	             { 
	                 jQuery('.msg').show().html('<div class="ajax_report alert-message alert alert-danger updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">This slot is already selected.</span></div>');
			         jQuery('.checkForm').prop('disable',true);
                        return false;
	             }else{
	                 jQuery('.msg').html('');
	                 jQuery('.checkForm').prop('disable',false);
	             }
	         }); 
		});
		jQuery('body').on('click','.showEndingModal',function(){
		   var scroffId = jQuery(this).attr('scroffId');
		   var ending = jQuery(this).closest('#row'+scroffId).find('#ending'+scroffId).attr('vall');
		   var starting = jQuery(this).closest('#row'+scroffId).find('#starting'+scroffId).text();
		   var slot = jQuery(this).closest('#row'+scroffId).find('#slot'+scroffId).text();
		   var activateId = jQuery(this).closest('#row'+scroffId).attr('activateId');
		   var serialNo = jQuery(this).attr('serialNo');
		   var id = jQuery(this).attr('rel');
		   jQuery('#scroffId').val(scroffId);
		   jQuery('#endingNum').val(ending);
		   jQuery('#startingNum').val(starting);
		   jQuery('#slot').val(slot);
		   jQuery('#uniId').val(scroffId);
		   jQuery('#activateId').val(activateId);
		   jQuery('#serialNo').val(serialNo);
		   jQuery('#endingModal').modal('show');
		   jQuery('#modalMsg').css('display','none');
		   jQuery('#endingNumber').val('');
		});
		jQuery('body').on('click','.cancelModal',function(){
		    jQuery('.number').val('');
		    jQuery('#scrOffModal').modal('hide');
		});
		jQuery('body').on('click','.saveEntry',function(){
		    
		    var number = jQuery('.number').val();
		    var scroffId = jQuery('#scroffId').val();
		    var endingNum = jQuery('#endingNum').val();
		    var startingNum = jQuery('#startingNum').val();
		    var slot = jQuery('#slot').val();
		    var activateId = jQuery('#activateId').val();
		    var serialNo = jQuery('#serialNo').val();
		    var id = jQuery('#uniId').val();
		    var urlCurrent = window.location.href;
      var dobSplite = urlCurrent.split('/');
      var lastVal = dobSplite[dobSplite.length-1];
      var secondVal = dobSplite[dobSplite.length-2];
      console.log(lastVal);
		    
		  //  if((parseFloat(number) > parseFloat(endingNum)) && parseFloat(number) < parseFloat(startingNum))
		  //var addEnding = parseFloat(endingNum) + parseInt(1);
		  var addEnding = parseFloat(endingNum);
		  if((parseFloat(number) < parseFloat(startingNum)) || parseFloat(number) > (parseFloat(addEnding)))
		    {
		        jQuery('#modalMsg').show().html('<div class="ajax_report alert-message alert alert-danger updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">Number cannot be greater than '+addEnding+' and cannot be less than '+startingNum+' </span></div>');
		    }else{
		        var thiss = jQuery(this);
		    jQuery.ajax({
	     	method:"GET",
			url: site_url + "/saveEntry?number="+number+'&scroffId='+scroffId+'&endingNum='+endingNum+'&slot='+slot+'&startingNum='+startingNum+'&activateId='+activateId+'&serialNo='+serialNo,
			beforeSend: function() { jQuery('#loader').show()},
            complete: function() { jQuery('#loader').hide() },
			type:"json",
			success:function(response) {
            jQuery('#modalMsg').show().html('<div class="ajax_report alert-message alert alert-success updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">Data save successfully.</span></div>');
	        	if(lastVal == 'add-sale'){
	        	    jQuery('#endingModal').modal('hide');
	        	  //  jQuery('.scrEnterVal').val(endingNum);
	        	    jQuery('#row'+id).find('.scrEnterVal').val(endingNum);
	        	}
	        		else if(lastVal == 'get-sale'){
	        		    jQuery('#endingModal').modal('hide');
			           }
			else{
	        	setTimeout(function(){  
	        	    window.location.reload();
            //     jQuery('#endingModal').modal('hide');
            //      var re = parseInt(number) + parseInt(startingNum);
            //   var re = parseInt(number) ;
            //     jQuery('#starting'+scroffId).text(re);
                  /** now calculate ticket column **/
                //   var gameval = jQuery('#gameValuePrice'+scroffId).text();
                //   var ticket = (parseInt(endingNum) - parseInt(startingNum)) * parseInt(gameval); 
                //   //alert(ticket);
                //   jQuery('#tickets'+scroffId).text('$ '+ticket);
                //  if(parseInt(re) == parseInt(endingNum))
                //  {
                //      jQuery('#gameId'+scroffId).text('');jQuery('#gameName'+scroffId).text('');jQuery('#scrTicket'+scroffId).text('');
                //      jQuery('#gameValue'+scroffId).text('');jQuery('#gameValuePrice'+scroffId).text('');jQuery('#starting'+scroffId).text('');
                //      jQuery('#ending'+scroffId).text('');jQuery('#tickets'+scroffId).text('');jQuery('#date'+scroffId).text('');
                //  }
			  }, 2000);
			}
			    
			}	
		    	});
		    }
		});
    jQuery('body').on('click','.cancelModal',function(){
        jQuery('.number').val('');
        jQuery('#endingModal').modal('hide');
        
    });
    jQuery('body').on('click','.showWeeklyReport',function(){
        var fromDate = jQuery('#fromDate').val();
        var toDate = jQuery('#toDate').val();
        var store = jQuery('#storeName').val();
        var mangerId = jQuery('#managerDrop').val();
        var mangerName = jQuery( "#managerDrop option:selected" ).text();
        if(fromDate == '' || toDate == '' || store == '' || mangerId == '' ) {
            jQuery('.msg').show().html('<div class="ajax_report alert-message alert alert-danger updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">Fill Form Properly.</span></div>').fadeOut(3000);
        }else{
              jQuery.ajax({
	     	method:"GET",
			url: site_url + "/showWeeklyReport?fromDate="+fromDate+'&toDate='+toDate+'&store='+store+'&mangerId='+mangerId+'&mangerName='+mangerName,
			beforeSend: function() { jQuery('#loader').show()},
            complete: function() { jQuery('#loader').hide() },
			type:"html",
			success:function(response) {
			    jQuery('.mainDiv').css('display','block');
            	jQuery('.importReport').html(response);
			}	
		    	});
        }
      
        
    })
    jQuery('body').on('change','.getMangerList',function(){
       var value = jQuery(this).val();
        jQuery.ajax({
	     	method:"GET",
			url: site_url + "/getMangerList?value="+value,
			beforeSend: function() { jQuery('#loader').show()},
            complete: function() { jQuery('#loader').hide() },
			type:"html",
			success:function(response) {
            	jQuery('#managerDrop').empty();
            	jQuery('#managerDrop').append(response);
			}	
		    	});
    });
    
    $('.searchSCRList').datepicker({
      dateFormat: 'mm/dd/yy' ,
	changeMonth: true,
      changeYear: true,
		onSelect: function () { 
	var currentval = jQuery('.searchSCRList').val();
    var stringUrl = site_url+'/search-scr-list?currentval='+currentval;
		var type = 'html';
		var returnAMt = ajaxHit(stringUrl,type);
			returnAMt.success(function(response) {
				jQuery('.placeTable').html(response);
		});
        }
});
jQuery('body').on('click','.viewscroffPopup',function(){
        var stringUrl = site_url+'/viewscroffPopup';
    	var type = 'html';
		var returnAMt = ajaxHit(stringUrl,type);
			returnAMt.success(function(response) {
				jQuery('#modalBody').html(response);
				jQuery('#scrOffModal').modal('show');
		});
});
});
function calculateActual()
{
     var checkDeposit = jQuery('input[name=bank_check_deposit').val();
     var totalDeposit = jQuery('input[name=bank_total_deposit').val();
     if(totalDeposit == '') { totalDeposit = 0;}
	 if(checkDeposit == '') {  checkDeposit = 0;}
	 var total = parseFloat(totalDeposit) + parseFloat(checkDeposit) ;
	 jQuery('input[name=OS_actual').val(total.toFixed(2));
	 calculateOverShort();
	    
}
function calculateRequired()
{
    if(jQuery('.totalSale').val() == '') { var sale = 0; } else { var sale = jQuery('input[name="OS_total_sales').val();  }
    if(jQuery('input[name="OS_sale_tax').val() == '') { var tax = 0; } else { var tax = jQuery('input[name="OS_sale_tax').val(); }
    if(jQuery('input[name="OS_EBT"]').val() == '') { var ebt = 0; } else { var ebt = jQuery('input[name="OS_EBT"]').val(); }
    if(jQuery('input[name="OS_vendor_po"]').val() == '') { var vendorPo = 0; } else { var vendorPo = jQuery('input[name="OS_vendor_po"]').val(); }
    if(jQuery('input[name="OS_coupon"]').val() == '') { var coupon = 0; } else { var coupon = jQuery('input[name="OS_coupon"]').val(); }
    if(jQuery('input[name="OS_credit_card"]').val() == '') { var creditcard = 0; } else { var creditcard = jQuery('input[name="OS_credit_card"]').val(); }
    if(jQuery('input[name="OS_charge_acct"]').val() == '') { var charge = 0; } else { var charge = jQuery('input[name="OS_charge_acct"]').val(); }
    
    var result = parseFloat(sale) + 
	                 parseFloat(tax) - 
	                 parseFloat(ebt) -
	                 parseFloat(vendorPo) -
	                 parseFloat(coupon) -
	                 parseFloat(creditcard) -
	                 parseFloat(charge) 
	                 ; 
	 jQuery('input[name="OS_required"]').val(result.toFixed(2));
	 calculateOverShort();
	 return;
}
function calculateTotalSale()
{
    var sum = 0;
    
    if(jQuery('input[name=sales_total_sale').val() == '') { var sale = 0; } else { var sale = jQuery('input[name=OS_total_sales').val(); }
    if(jQuery('input[name="sales_fuel_sale').val() == '') { var fuel = 0; } else { var fuel = jQuery('input[name="sales_fuel_sale').val(); }
    if(jQuery('input[name="sales_ser_sale"]').val() == '') { var scr = 0; } else { var scr = jQuery('input[name="sales_ser_sale"]').val(); }
    if(jQuery('input[name="sales_lotto_sale"]').val() == '') { var lotto = 0; } else { var lotto = jQuery('input[name="sales_lotto_sale"]').val(); }
    if(jQuery('input[name="sales_scr_cashes"]').val() == '') { var scrPO = 0; } else { var scrPO = jQuery('input[name="sales_scr_cashes"]').val(); }
    if(jQuery('input[name="sales_lotto_cashes"]').val() == '') { var lottoPO = 0; } else { var lottoPO = jQuery('input[name="sales_lotto_cashes"]').val(); }
    if(jQuery('input[name="sales_money_order"]').val() == '') { var mo = 0; } else { var mo = jQuery('input[name="sales_money_order"]').val(); }
    
	   
	            sum  =  parseFloat(sale) -
                        parseFloat(fuel) -
                        parseFloat(scr) - 
                        parseFloat(lotto) + 
                        parseFloat(scrPO) ;
                        // parseFloat(lottoPO) -
                        // parseFloat(mo) ;
          
	    jQuery('.totalSale').val(sum.toFixed(2));
	    jQuery('.totalSale').css('border','1px solid lightgrey');
	    var re = calculateRequired();
	    return ;
}
function calculateOverShort()
{
    var required = jQuery('input[name=OS_required]').val();
    var actual = jQuery('input[name=OS_actual]').val();
    if(required == '') { required = 0; }
    if(actual == '') { actual = 0; }
    var short  = parseFloat(actual) - parseFloat(required) ;
    jQuery('input[name=OS_short_over]').val(short.toFixed(2));
    jQuery('input[name=OS_short_over]').css('font-weight','800');
    if(short < 0){
        jQuery('input[name=OS_short_over]').css('color','red');
    }else{
         jQuery('input[name=OS_short_over]').css('color','black');
    }
    
}
function calculateRecOrderTotal()
{
    var sum = 0 ;
    jQuery('.total').each(function(){
        if(jQuery(this).val() != ''){
           sum = parseFloat(sum) + parseFloat(jQuery(this).val()); 
        }
    });
    jQuery('.subTotal').val(sum.toFixed(2));
}