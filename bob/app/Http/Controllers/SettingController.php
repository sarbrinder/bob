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
use App\Http\Model\Setting as Setting;

class SettingController extends Controller
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

   public function logList()
   {
       $result['data'] = Setting::getLogList();
        if(isset($_GET['ajax']))
      {
      return view('setting/searchLogList',$result);
      }
      else
      {
      $title = "Log-list";
      Helper::MainHeader($title);
      return view('setting.getLogList',$result);
	    }
   }

}
