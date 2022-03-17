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
use App\Http\Model\Store as Store;

class StoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function addStore(){
         $result['data'] = Store::getUserList();
         $title = 'Add Store';
         Helper::MainHeader($title);
        return view('store.addStore',$result);
    }
    public function addStoreSave(Request $request)
    { 
        //  $arr = $request->all();
        //  echo '<pre>';print_r($arr);die;
        	 $output = array();
			  $validator = \Validator::make($request->all(), [
          'storeName' => 'required',
          'phoneNo' => 'required',
          'email' => 'required' ,
          'address' => 'required',
          'managerList' => 'required',
        ]);
        
		if ($validator->fails())
      { 
        $errors             = $validator->errors();
        $res['success']     = false;
        $res['formErrors']  = true;
        $res['errors']      = $errors;
      }else { 
            /* check Email */
            $arr = $request->all();
            $resultVal = Store::emailCheck($arr['email']);
            if(count($resultVal) > 0) {
             $output['success']      = false;
             $output['message']  = '<div class="ajax_report alert-message alert alert-danger updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">This Email is already exist.</span></div>';
             }else{
            $resultVal = Store::addStoreSave($request->all());
			 $output['success']      = true;
             $output['message']  = '<div class="ajax_report alert-message alert alert-success updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">Store added successfully.</span></div>';
          }
			 return redirect('/add-store')->withErrors($output)->withInput();
    	}
  }
  public function emailCheck(Request $request)
  {
      $email = $_GET['currentVal'];
      $resultVal = Store::emailCheck($email);
      if(count($resultVal) > 0) {
          $data['success'] = true;
          $data['message']  = '<div class="ajax_report alert-message alert alert-danger updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">This Email is already exist.</span></div>';
             
      }else{
          $data['success'] = false;
          $data['message']  = '';
           
      }
      echo json_encode($data);exit;
  }
  public function getStoreList(Request $request)
  {
      $arr = $request->all();
      $result['user'] = Store::getUserList();
      $result['data'] = Store::getStoreList($arr);
    
       if(isset($_GET['ajax']))
      {
      return view('store/searchStoreList',$result);
      }
      else
      {
      $title = "Store-list";
      Helper::MainHeader($title);
      return view('store.getStoreList',$result);
	    }
  }

public function editstore(Request $request){
     $arr = $request->all();
      //print_r($arr['id']);die;
      $id = $arr['id'];
       $result['user'] = Store::getUserList();
      $result['data'] =  Store::editStoreDetail($id);
     // print_r($result['data']);die;
      return view('store.editstore',$result);
}
public function editstoresave(Request $request){
    $arr = $request->all();
  // echo "<pre>";print_r($arr);die;
			$resultVal[] = Store::editStoreSave($request->all());
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
public function deletestore(Request $request){
         $arr = $request->all();
         $id = $arr['currentVal'];
        //echo "<pre>";print_r($id);die;
         $result = Store::deleteStore($id);
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
	public function search(Request $request){  
           	$arr = $request->all();
           	$val = $arr['search']; 
		$result['data'] = Store::searchUserVal($val);
		//echo '<pre>';print_r($result['data']);die;
	 return view('store/searchStoreList',$result);
       }
       public function getMultipleManager()
       {
           $result['data'] = Store::getMultipleManager($_GET['managerId']);
           return view('store.getMultipleManager',$result);
       }
       public function viewManagerList()
       {
           $result['data'] = Store::viewManagerList($_GET['storeId'],$_GET['managerId']);
           return view('store.viewManagerList',$result);
       }
       public function updateManagerList()
       {
           $result['data'] = Store::updateManagerList($_GET['storeId'],$_GET['managerId']);
           echo json_encode(true);exit;
       }

}
