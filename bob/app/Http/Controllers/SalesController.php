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
use App\Http\Model\Sales as Sales;

class SalesController extends Controller
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
     public function addSale(){ 
         //echo Session::get('userId');die;
         $result['vendor'] = Sales::getVendorList();
         $result['store'] = Sales::getStoreList();
         $title = 'Add Sale Record';
         Helper::MainHeader($title);
        return view('sale.addSale',$result);
    }
    public function searchSalesReport(Request $request)
    {
        $result = Sales::searchSalesReport($_GET['search']);
        echo json_encode(count($result));exit;
    }
    public function addSaleSave(Request $request)
    {
         $output = array();
			  $validator = \Validator::make($request->all(), [
          'sales_total_sale' => 'required',
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
          //echo '<pre>';print_r($arr);die;
            $resultVal = Sales::searchSalesReport($arr['created_date']);
            if(count($resultVal) > 0) {
             $output['success']      = false;
             $output['message']  = '<div class="ajax_report alert-message alert alert-danger updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">This sale report is already exist.</span></div>';
             }else{
             $resultVal = Sales::addSaleSave($request->all());
			 $output['success']      = true;
             $output['message']  = '<div class="ajax_report alert-message alert alert-success updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">Record added successfully.</span></div>';
          }
			 return redirect('/add-sale')->withErrors($output)->withInput();
    	}
    }
    public function getSale(Request $request)
    {
        $arr = $request->all();
        
         $result['data'] = Sales::getSale($arr);
    
       if(isset($_GET['ajax']))
      {
      return view('sale/searchSaleList',$result);
      }
      else
      {
        $title = "Sales-list";
        Helper::MainHeader($title);
        return view('sale.getSaleList',$result);
	  }
    }
    public function searchSaleDetail(Request $request)
    {
        $result['data'] = Sales::searchSaleDetail($_GET['from'],$_GET['to']);
         return view('sale/searchSaleList',$result);
    }
    public function editsale()
    {
        $result['vendor'] = Sales::getVendorList();
        $result['store'] = Sales::getStoreList();
        $result['data'] = Sales::editsale($_GET['uniqueId']);
        $sum = $result['data'][0]->sales_total_sale -
               $result['data'][0]->sales_fuel_sale -
                $result['data'][0]->sales_ser_sale - 
                $result['data'][0]->sales_lotto_sale + 
                $result['data'][0]->sales_scr_cashes + 
                $result['data'][0]->sales_lotto_cashes -
                $result['data'][0]->sales_money_order ;
        $result['sum'] = Helper::numberFormat($sum);
        $result['salesId'] = $_GET['uniqueId'];
        //echo '<pre>';print_r($result['data']);exit;
        return view('sale/editsale',$result);
    }
    public function editSaleSave(Request $request)
    {
        $all = $request->all();
        //echo '<pre>';print_r($all);die;
        $result = Sales::editSaleSave($all);
        $output['message']  = '<div class="ajax_report alert-message alert alert-success updatecartDetail" role="alert"><span class="ajax_message updateclientmessage">Record updated successfully.</span></div>';
        echo json_encode($output);exit;
    }
    public function viewscroffPopup()
    {
         $get = Sales::viewscroffPopup();
       //echo '<pre>';print_r($get);die();
        $result['lastDate'] = $get[0];
        $result['data'] = $get[1];
        // echo '<pre>';print_r($result);die();
        return view('sale/viewscroffPopup',$result);
    }

}
