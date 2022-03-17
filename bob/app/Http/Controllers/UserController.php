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
use App\Http\Model\User as user;

class UserController extends Controller
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
     public function addUser(Request $request){
         $output = array();
         if($_POST){
              $output = array();
			  $validator = \Validator::make($request->all(), [
          'fName' => 'required',
           'lName' => 'required',
          'phoneNo' => 'required',
          'email' => 'required' ,
          'address' => 'required',
          'password' => 'required',
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
            $resultVal = User::emailCheck($arr['email']);
            if(count($resultVal) > 0) {
             $output['success']      = false;
             $output['message']  = '<div class="ajax_report alert-message alert alert-danger updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">This Email is already exist.</span></div>';
             }else{
            $resultVal = User::addUserSave($request->all());
			 $output['success']      = true;
             $output['message']  = '<div class="ajax_report alert-message alert alert-success updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">User added successfully.</span></div>';
            $_POST = '';
            unset($_POST);
          }
        
         }
         }
         $title = 'Add User';
         Helper::MainHeader($title);
         //return redirect('/add-user')->withErrors($output)->withInput();
        return view('user.addUser',$output);
    
}
        public function userList(Request $request)
  {
      $arr = $request->all();
      $result['data'] = User::getUserList($arr);
       if(isset($_GET['ajax']))
      {
      return view('user/searchStoreList',$result);
      }
      else
      {
      $title = "User-list";
      Helper::MainHeader($title);
      return view('user.getUser',$result);
	    }
  }
  public function edituser(Request $request){
      $arr = $request->all();
      //print_r($arr['id']);die;
      $id = $arr['id'];
      
      $result['data'] =  User::editUserDetail($id);
     // print_r($result['data']);die;
      return view('user.edituser',$result);
  }
    public function editusersave(Request $request){
       $arr = $request->all();
   //echo "<pre>";print_r($arr);die;
			$resultVal[] = User::editUserSave($request->all());
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
     public function deleteuser(Request $request){
         $arr = $request->all();
         $id = $arr['currentVal'];
        //echo "<pre>";print_r($id);die;
         $result = User::deleteUser($id);
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
           	$val = $arr['value']; 
		$result['data'] = User::searchUserVal($val);
		//echo '<pre>';print_r($result['data']);die;
		return view('user.searchUserlist',$result);
       }
}