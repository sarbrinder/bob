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
use App\Http\Model\Login as Login;

class LoginController extends Controller
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
     public function index(){
         $title = 'Login';
        Helper::loginHeader($title);
        return view('loginForm');
    }
    public function loginForm(Request $request)
    { 
        	 $output = array();
			  $validator = \Validator::make($request->all(), [
          'email' => 'required',
          'password' => 'required',
        ]);
		if ($validator->fails())
      { 
        $errors             = $validator->errors();
        $res['success']     = false;
        $res['formErrors']  = true;
        $res['errors']      = $errors;
      }else { 
			 $resultVal = Login::userLogin($request->all());
			//print_r($resultVal);die;
			if(count($resultVal) < 1)
            {
                $output['success']      = false;
                $output['message']  = '<div class="ajax_report alert-message alert alert-danger updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">Email & Password does not match.</span></div>';
                return redirect('/')->withErrors($output)->withInput();
            }
			else{
		Session::put('userId',$resultVal[0]->uniqueId);
        Session::put('type',$resultVal[0]->type);
        Session::put('fName',$resultVal[0]->fName);
        Session::put('lName',$resultVal[0]->lName);
        return redirect('dashboard');
       	}

			
		}
  }
	public function logout(){
		Session::flush();
		Session::regenerate();
		return redirect('/');
	}



}
