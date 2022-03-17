<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use DB;
use Mail;
use App\Helpers\AppHelper as Helper;
use Redirect;
use App\Http\Requests;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Model\Vendor as Vendor;

class VendorController extends Controller
{
  public function addVendor(Request $request){
      $output = array();
         if($_POST){
              $output = array();
			  $validator = \Validator::make($request->all(), [
          'Name' => 'required',
          'phoneNo' => 'required',
          'address' => 'required',
          'type' => 'required',
        ]);
        
        	if ($validator->fails())
      { 
        $errors             = $validator->errors();
        $output['success']     = false;
        $output['formErrors']  = true;
        $output['errors']      = $errors;
      }else { 
            /* check Email */
            $arr = $request->all();
            //echo '<pre>';print_r($arr);die;
            $resultVal = Vendor::addVendorSave($request->all());
			 $output['success']      = true;
             $output['message']  = '<div class="ajax_report alert-message alert alert-success updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">Vendor added successfully.</span></div>';
            //$_POST = '';
            //unset($_POST);
            return redirect('/add-vendor')->withErrors($output)->withInput();
          }
        
         }else{
              $title = 'Add Sale Vendors';
         Helper::MainHeader($title);
        return view('vendors.addVendors');
         }
      
  }
    public function getVendorList(Request $request){
        
        $arr = $request->all();
         $result['data'] = Vendor::getVendorList($arr);
          if(isset($_GET['ajax']))
      {
      return view('vendors/searchVendor',$result);
      }else{
      $title = "Vendor-list";
      Helper::MainHeader($title);
      return view('vendors.getVendors',$result);
      }
    }
     public function editVendor(Request $request){
      $arr = $request->all();
      //print_r($arr['id']);die;
      $id = $arr['id'];
      
      $result['data'] =  Vendor::editvendorDetail($id);
     // print_r($result['data']);die;
      return view('vendors.editVendors',$result);
  }
    public function editVendorsave(Request $request){
       $arr = $request->all();
   //echo "<pre>";print_r($arr);die;
			$resultVal[] = Vendor::editvendorSave($request->all());
			if(count($resultVal) < 1)
            {
                $error     = false;
             }
             else{
               $error     = true;   
             }
    
             return response()->json([
            'error' => $error,
           
        ]);
    }
    public function deleteVendor(Request $request){
         $arr = $request->all();
         $id = $arr['currentVal'];
       // echo "<pre>";print_r($id);die;
         $result = Vendor::deleteVendor($id);
         if($result > 0)
		{
		    $error     = false;
		}
		else{
			$error     = true; 
		}
		 return response()->json([
            'error' => $error,
           
        ]);
	}
	public function searchvendor(Request $request){  
           	$arr = $request->all();
           	$val = $arr['search']; 
		$result['data'] = Vendor::searchVendorVal($val);
		//echo '<pre>';print_r($result['data']);die;
		return view('vendors.searchVendor',$result);
       }
}