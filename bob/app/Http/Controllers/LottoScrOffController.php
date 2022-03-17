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
use App\Http\Model\Lotto as Lotto;

class LottoScrOffController extends Controller
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
    public function receiveOrder(Request $request)
    {
        $all = $request->all();
        if(count($all) > 0)
        {
           // echo '<pre>';print_r($all);die;
            
           $output = array();
			  $validator = \Validator::make($request->all(), [
          'order_date' => 'required',
          'gameRef' => 'required',
          'serial' => 'required' ,
          ]);
        	if ($validator->fails())
      { 
        $errors             = $validator->errors();
        $res['success']     = false;
        $res['formErrors']  = true;
        $res['errors']      = $errors;
      }else { 
              $resultVal = Lotto::addReceiveOrder($request->all());
			 $output['success']      = true;
             $output['message']  = '<div class="ajax_report alert-message alert alert-success updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">Data added successfully.</span></div>';
          
			 return redirect('/receive-order')->withErrors($output)->withInput();
    	}
        }else{
        $result['gameId'] = Lotto::getGameId();
        $title = 'Receive Order';
         Helper::MainHeader($title);
        return view('lotto.receiveOrder',$result);
        }
    }
    public function addScrOff(Request $request)
    {
        $all = $request->all();
        if(count($all) > 0)
        {
           $output = array();
			  $validator = \Validator::make($request->all(), [
          'gameId' => 'required',
          'gameName' => 'required',
          'gameValue' => 'required' ,
          'starting' => 'required',
          'ending' => 'required',
        ]);
        	if ($validator->fails())
      { 
        $errors             = $validator->errors();
        $res['success']     = false;
        $res['formErrors']  = true;
        $res['errors']      = $errors;
      }else { 
              $resultVal = Lotto::addScrOff($request->all());
			 $output['success']      = true;
             $output['message']  = '<div class="ajax_report alert-message alert alert-success updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">Data added successfully.</span></div>';
          
			 return redirect('/add-scr-off')->withErrors($output)->withInput();
    	}
        }
        else
        {
            $title = 'Add Scr.off';
            Helper::MainHeader($title);
            return view('lotto.addScrOff');
        }
    }
    public function getGameDetail(Request $request)
    {
        $result = Lotto::getGameDetail($_GET['gameId']);
        $data['gameName'] = $result[0]->gameName;
        //$data['total'] = $result[0]->tickets;
        $data['total'] = $result[0]->gameValue;
        echo json_encode($data);exit;
    }
    public function ativateScrOff(Request $request)
    {
        $all = $request->all();
        if(count($all) > 0)
        {
            //echo '<pre>';print_r($all);die;
           $output = array();
			  $validator = \Validator::make($request->all(), [
          'activate_date' => 'required',
          'activate_gameRef' => 'required',
          'activate_serialRef' => 'required' ,
          'slotNo' => 'required',
          
        ]);
        	if ($validator->fails())
      { 
        $errors             = $validator->errors();
        $res['success']     = false;
        $res['formErrors']  = true;
        $res['errors']      = $errors;
      }else { 
              $resultVal = Lotto::ativateScrOff($request->all());
			 $output['success']      = true;
             $output['message']  = '<div class="ajax_report alert-message alert alert-success updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">Data added successfully.</span></div>';
          
			 return redirect('/activate-scr-off')->withErrors($output)->withInput();
    	}
        }
        else
        {
            $result['slot'] = Lotto::getSlotDetail();
            $result['gameId'] = Lotto::getGameId();
            $title = 'Activate Scr.off';
            Helper::MainHeader($title);
            return view('lotto.activateScrOff',$result);
        }
    }
    public function getSerialDetail()
    {
        $result['list'] = Lotto::getSerialDetail($_GET['gameId']);
        return view('lotto.serialDropdown',$result);
    }
    public function checkSerialNumber()
    {
        $resultVal = Lotto::checkSerialNumber($_GET['serialNum'],$_GET['uniqueId']);
        echo json_encode(count($resultVal));exit;
    }
    public function listScrOff(Request $request)
    {
      $arr = $request->all();
      $get = Lotto::getScrOff();
      $result['lastDate'] = $get[0];
      $result['data'] = $get[1];
      if(isset($_GET['ajax']))
      {
      return view('lotto/searchListScrOff',$result);
      }
      else
      {
      $title = "Scr.Off-list";
      Helper::MainHeader($title);
      //echo '<pre>';print_r($result['data']);die;
      return view('lotto.listScrOff',$result);
	    }
	  
    }
    public function searchSCRList()
    {
         $result['data'] = Lotto::searchSCRList($_GET['currentval']);
         return view('lotto/searchListScrOff',$result);
    }
    public function searchScr()
    {
         $result['data'] = Lotto::searchScr($_GET['search']);
          return view('lotto/searchListScrOff',$result);
    }
    public function editScrDetail()
    {
        $result['data'] = Lotto::editScrDetail($_GET['id']);
        return view('lotto/editScrDetail',$result);
    }
    public function editScrOffSave(Request $request)
    {
         $resultVal = Lotto::editScrOffSave($request->all());
         $all = $request->all();
         $output['uniqueId'] = $all['uniqueId'];
         $output['gameId'] = $all['gameId'];
         $output['gameName'] = $all['gameName'];
         $output['scr_off_ticket'] = $all['scr_off_ticket'];
         $output['gameValue'] = $all['gameValue'];
         $output['gameValuePrice'] = $all['gameValuePrice'];
         $output['starting'] = $all['starting'];
         $output['ending'] = $all['ending'];
         $output['tickets'] = $all['tickets'];
         
		 $output['message']  = '<div class="ajax_report alert-message alert alert-success updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">Data updated successfully.</span></div>';
         echo json_encode($output);exit;
    }
    public function receiveOrderList(Request $request)
    {
        $arr = $request->all();
      $result['data'] = Lotto::receiveOrderList();
       if(isset($_GET['ajax']))
      {
      return view('lotto/searchReceiveOrderList',$result);
      }
      else
      {
      $title = "Received Order list";
      Helper::MainHeader($title);
      return view('lotto.receiveOrderList',$result);
	    }
    }
    public function searchOrder()
    {
         $result['data'] = Lotto::searchOrder($_GET['search']);
          return view('lotto/searchReceiveOrderList',$result);
    }
    public function editOrderDetail()
    {
        $result['gameId'] = Lotto::getGameId();
        $result['data'] = Lotto::editOrderDetail($_GET['id']);
        return view('lotto/editOrderDetail',$result);
    }
    public function editOrderSave(Request $request)
    {
         $resultVal = Lotto::editOrderSave($request->all());
         $all = $request->all();
         $output['uniqueId'] = $all['orderId'];
         $output['gameId'] = $resultVal[0]->gameId;
         $output['gameName'] = $resultVal[0]->gameName;
         $output['gameValue'] = $resultVal[0]->gameValue;
         $output['serial'] = $all['serial'];
        
		 $output['message']  = '<div class="ajax_report alert-message alert alert-success updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">Data updated successfully.</span></div>';
         echo json_encode($output);exit;
    }
    public function saveEntry()
    {
        $result = Lotto::saveEntry($_GET['number'],$_GET['scroffId'],$_GET['endingNum'],$_GET['slot'],$_GET['startingNum'],$_GET['activateId'],$_GET['serialNo']);
        echo json_encode(true);exit;
    }

}
