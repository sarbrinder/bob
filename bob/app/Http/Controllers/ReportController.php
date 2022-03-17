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
use App\Http\Model\Report as Report;

class ReportController extends Controller
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
    
    public function selectDateForReport()
    {
        $result['store'] = Report::getStoreList();
         $title = 'Weekly Totals';
         Helper::MainHeader($title);
        return view('report.selectDateForReport',$result);
    }
    public function showWeeklyReport()
    {
        $result['data'] = Report::showWeeklyReport($_GET['fromDate'],$_GET['toDate'],$_GET['store'],$_GET['mangerId']);
        $result['mangerName'] = $_GET['mangerName'];
        $result['fromDate'] = $_GET['fromDate'];
        $result['toDate'] = $_GET['toDate'];
        $deliSales = 0;
        $retailsales = 0;
        $lottoprepot = 0;
        $lottoversht = 0;
        $lottosrcshot = 0;
        $lottoposhot = 0;
        $gasunlead = 0;
        $gasmed = 0;
        $gasplus = 0;
        $gasdiesel = 0;
        $gasoffrd = 0;
        $gasMarine  = 0;
        $gallons = 0;
        $gallonsprice = 0;
        
      // echo "<pre>"; print_r($result['data']);die();
        foreach($result['data'] as $val){
            // calculate deli sales...
            $deliSales = (float)$deliSales + (float)$val->sales_delivery;
            $retailsales = (float)$retailsales + (float)$val->sales_total_sale;
            $lottoprepot = (float)$lottoprepot + (float)$val->lotto_pout_report;
            $lottoversht = (float)$lottoversht + (float)$val->lotto_over_short;
            $lottosrcshot = (float)$lottosrcshot + (float)$val->lotto_scr_over_short;
            $lottoposhot = (float)$lottoposhot + (float)$val->lotto_per_over_short;
            $gasunlead = (float)$gasunlead + (float)$val->gas_unlead;
            $gasmed = (float)$gasmed + (float)$val->gas_med;
            $gasplus = (float)$gasplus + (float)$val->gas_plus;
            $gasdiesel = (float)$gasdiesel + (float)$val->gas_diesel;
            $gasoffrd = (float)$gasoffrd + (float)$val->gas_offered;
            $gasMarine = (float)$gasMarine + (float)$val->gas_marmee;
            $gallons =   (float)$gallons + (float)$val->gas_marmee + (float)$val->gas_unlead + (float)$val->gas_med + (float)$val->gas_plus + (float)$val->gas_diesel + (float)$val->gas_offered;
            $gallonsprice = (float)$gallonsprice  + (float)$val->gas_unlead_price + (float)$val->gas_med_price + (float)$val->gas_plus_price + (float)$val->gas_diesel_price + (float)$val->gas_marmee_price + (float)$val->gas_offered_price;
        }
        $vendordata['vdata'] = Report::showvendorsReport($_GET['fromDate'],$_GET['toDate'],$_GET['store'],$_GET['mangerId']);
     //  echo "<pre>"; print_r($vendordata);die();
      // echo $gallonsprice;die();
        $result['TotaldeliSales'] = $deliSales;
        $result['retailsales'] = $retailsales;
        $result['lottoprepot'] = $lottoprepot;
        $result['lottoversht'] = $lottoversht;
        $result['lottosrcshot'] = $lottosrcshot;
        $result['lottoposhot'] = $lottoposhot;
     $result['gallons'] = $gallons;
      $result['gallonsprice'] = $gallonsprice;
    //  echo "<pre>"; print_r($vendordata);die();
        return view('report.showWeeklyReport',$result,$vendordata);
    }
    public function getMangerList()
    {
        $result = Report::getMangerList($_GET['value']);
        $data['id'] = $result[0];
        $data['fName'] = $result[1];
        $data['lName'] = $result[2];
        return view('report.getMangerList',$data);
    }

}
