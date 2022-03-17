<?php

namespace App\Http\Model;
use DB;
use Hash;
use Session;
use App\Helpers\AppHelper as Helper;
use Illuminate\Database\Eloquent\Model;
class Sales extends Model
{

  public static function searchSalesReport($val)
  {
      $date = explode('/',$val);
      $date1 = $date[2] . '-' . $date[0] .'-'.$date[1];
      $result = DB::table('sales')->select('id')->where('created_date',$date1)->get();
      return $result;
  }
  public static function getVendorList()
  {
      $result = DB::table('vendors')->where('status','1')->select('uniqueId','name')->get();
      return $result;
  }
  public static function getStoreList()
  {
       $result = DB::table('store')->select('storeId','storeName')->get();
      return $result;
  }
  public static function addSaleSave($detail)
  {
      $saleId = Helper::unqNum();
      $val = explode('/',$detail['created_date']);
      $date1 = $val[2] . '-' . $val[0] .'-'.$val[1];
      
      for($i=0;$i<count($detail['vendor_name']);$i++)
      {
          $data[] =array(
              'vendorId' => Helper::unqNum(),
              'salesId' => $saleId,
              'vendor_name' => $detail['vendor_name'][$i],
              'vendor_check_cash' => $detail['vendor_check_cash'][$i],
              'vendor_price' => $detail['vendor_price'][$i],
              'vendor_invoices'=> $detail['vendor_invoices'][$i],
              'created_date' => $date1,
              'addedBy' => Session::get('userId'),
              );
      }
      DB::table('sale_vendor_report')->insert($data);
      for($i=0;$i<count($detail['empName']);$i++)
      {
          $data1[] =array(
              'cashDropId' => Helper::unqNum(),
              'salesId' => $saleId,
              'empName' => $detail['empName'][$i],
              'amount' => $detail['amount'][$i],
              
              );
      }
      DB::table('sale_cash_drop')->insert($data1);
      for($i=0;$i<count($detail['empNameCharge']);$i++)
      {
          $data2[] =array(
              'emp_charge_Id' => Helper::unqNum(),
              'salesId' => $saleId,
              'empNameCharge' => $detail['empNameCharge'][$i],
              'amountCharge' => $detail['amountCharge'][$i],
              
              );
      }
      DB::table('sale_emp_charge')->insert($data2);
 
      for($i=0;$i<count($detail['bankAmount']);$i++)
      {
          $data3[] =array(
              'salesId' => $saleId,
              'bankAmount' => $detail['bankAmount'][$i],
              'bankQty' => $detail['bankQty'][$i],
              //'bankBill' => $detail['bankBill'][$i],
              'bankTotal' => $detail['bankTotal'][$i],
              'lottoAmount' => $detail['lottoAmount'][$i],
              'lottoQty' => $detail['lottoQty'][$i],
              'lottoTotal' => $detail['lottoTotal'][$i],
              'fuelAmount' => $detail['fuelAmount'][$i],
              'fuelQty' => $detail['fuelQty'][$i],
              'fuelTotal' => $detail['fuelTotal'][$i],
             );
      }
     // echo '<pre>';print_r($data3);die;
      DB::table('sale_bank_deposit')->insert($data3);
      $detail['uniqueId'] = $saleId;
      $detail['addedBy'] = Session::get('userId');
      //$val = explode('/',$detail['created_date']);
      //$date1 = $val[2] . '-' . $val[0] .'-'.$val[1];
      $detail['created_date'] = $date1 ; 
      
      unset($detail['vendor_name']);
      unset($detail['vendor_check_cash']);
      unset($detail['vendor_price']);
      unset($detail['empName']);
      unset($detail['amount']); 
      unset($detail['empNameCharge']);
      unset($detail['amountCharge']);
      unset($detail['bankAmount']); 
      unset($detail['bankQty']); 
      //unset($detail['bankBill']); 
      unset($detail['bankTotal']); 
      unset($detail['lottoAmount']);
      unset($detail['lottoQty']);
      unset($detail['lottoTotal']);
      unset($detail['fuelAmount']);
      unset($detail['fuelQty']);
      unset($detail['fuelTotal']);
      unset($detail['OS_total_sales']);
      unset($detail['vendor_invoices']);
      echo '<pre>';print_r($detail);
      
      $result = DB::table('sales')->insert($detail);
      
       /** **/
            $msg = Session::get('fName') .' '.Session::get('lName'). ' added new daily Recognition dated ( '.date('m/d/Y') .' )' ;
            Helper::addLog(Session::get('userId'),$saleId,'Sale',$msg);
            /******/
            
      return $result;
  }
  public static function getSale($arr)
  {
      $result = DB::table('sales')->select('sales.uniqueId','sales.created_date','login.fName','login.lName')
      ->join('login','login.uniqueId','=','sales.addedBy');
     
      if(!empty($arr) && isset($arr['notiId'])){
          $get = Helper::updateLog($arr['notiId']);
     
      $result = $result->orderByRaw("FIELD(sales.uniqueId,'".$arr['orderBy']."') DESC")->paginate(10);
    }else{
      $result = $result->orderBy('sales.id','desc')->paginate(10);
    }
     return $result;
    
  }
  public static function searchSaleDetail($from,$to)
  {
       $from = explode('/',$from);
      $from1 = $from[2] . '-' . $from[0] .'-'.$from[1];
      
       $to = explode('/',$to);
      $to1 = $to[2] . '-' . $to[0] .'-'.$to[1];
      
       $result = DB::table('sales')->select('sales.uniqueId','sales.created_date','login.fName','login.lName')
      ->join('login','login.uniqueId','=','sales.addedBy')->where('created_date','>=',$from1)->where('created_date','<=',$to1)->orderBy('sales.id','desc')->paginate(10);
      return $result;
  }
  public static function editsale($uniqueId)
  {
    //   $result =  DB::table('sales')->select('sales.*','sale_cash_drop.empName','sale_cash_drop.amount','sale_emp_charge.empNameCharge','sale_emp_charge.amountCharge','sale_vendor_report.vendor_name','sale_vendor_report.vendor_check_cash','sale_vendor_report.vendor_price')
    //             ->join('sale_cash_drop','sale_cash_drop.salesId','=','sales.uniqueId','left')
    //             ->join('sale_emp_charge','sale_emp_charge.salesId','=','sales.uniqueId','left')
    //             ->join('sale_vendor_report','sale_vendor_report.salesId','=','sales.uniqueId','left')
    //             ->where('sales.uniqueId',$uniqueId)
    //             ->get();
    
    $result = DB::table('sales')->where('sales.uniqueId',$uniqueId)->get();
                return $result;
  }     
  public static function editSaleSave($detail)
  {
      DB::table('sale_vendor_report')->where('salesId',$detail['salesId'])->delete();
      DB::table('sale_cash_drop')->where('salesId',$detail['salesId'])->delete();
      DB::table('sale_emp_charge')->where('salesId',$detail['salesId'])->delete();
      DB::table('sale_bank_deposit')->where('salesId',$detail['salesId'])->delete();
      
       for($i=0;$i<count($detail['vendor_name']);$i++)
      {
          $data[] =array(
              'vendorId' => Helper::unqNum(),
              'salesId' => $detail['salesId'],
              'vendor_name' => $detail['vendor_name'][$i],
              'vendor_check_cash' => $detail['vendor_check_cash'][$i],
              'vendor_price' => $detail['vendor_price'][$i],
              'vendor_invoices'=> $detail['vendor_invoices'][$i],
               //'addedBy' => Session::get('userId'),
              );
      }
      DB::table('sale_vendor_report')->insert($data);
      for($i=0;$i<count($detail['empName']);$i++)
      {
          $data1[] =array(
              'cashDropId' => Helper::unqNum(),
              'salesId' => $detail['salesId'],
              'empName' => $detail['empName'][$i],
              'amount' => $detail['amount'][$i],
              
              );
      }
      DB::table('sale_cash_drop')->insert($data1);
      for($i=0;$i<count($detail['empNameCharge']);$i++)
      {
          $data2[] =array(
              'emp_charge_Id' => Helper::unqNum(),
              'salesId' => $detail['salesId'],
              'empNameCharge' => $detail['empNameCharge'][$i],
              'amountCharge' => $detail['amountCharge'][$i],
              
              );
      }
      DB::table('sale_emp_charge')->insert($data2);
       for($i=0;$i<count($detail['bankAmount']);$i++)
      {
          $data3[] =array(
              'salesId' => $detail['salesId'],
              'bankAmount' => $detail['bankAmount'][$i],
              'bankQty' => $detail['bankQty'][$i],
             // 'bankBill' => $detail['bankBill'][$i],
              'bankTotal' => $detail['bankTotal'][$i]
             );
      }
      //echo '<pre>';print_r($data3);die;
      DB::table('sale_bank_deposit')->insert($data3);
    
      unset($detail['vendor_name']);
      unset($detail['vendor_check_cash']);
      unset($detail['vendor_price']);
      unset($detail['empName']);
      unset($detail['amount']);
      unset($detail['empNameCharge']);
      unset($detail['amountCharge']);
      $saleId = $detail['salesId'];
      unset($detail['salesId']);
       unset($detail['bankAmount']); 
      unset($detail['bankQty']); 
      //unset($detail['bankBill']); 
      unset($detail['bankTotal']); 
      unset($detail['lottoAmount']);
      unset($detail['lottoQty']);
      unset($detail['lottoTotal']);
      unset($detail['fuelAmount']);
      unset($detail['fuelQty']);
      unset($detail['fuelTotal']);
       unset($detail['OS_total_sales']);
       unset($detail['vendor_invoices']);
       
      $result = DB::table('sales')->where('uniqueId' ,$saleId)->update($detail);
      
      return $result;
  }
    public static function viewscroffPopup()
    {
    //       $result = DB::table('add_scr_off')->where('activate_scr_off.status',1)->select('add_scr_off.*','activate_scr_off.slotNo','activate_scr_off.uniqueId as activateUniqueId')
    //  ->join('activate_scr_off','activate_scr_off.activate_gameRef','=','add_scr_off.uniqueId','left')->get()->toArray();
    //   return $result;
      
       /* get last dateed record */
    $date = DB::table('activate_scr_off')->select('activate_date')->orderBy('activate_date','desc')->limit(1)->get();
    if(count($date) > 0){
     $result = DB::table('add_scr_off')->select('add_scr_off.*','activate_scr_off.slotNo','activate_scr_off.uniqueId as activateUniqueId','activate_scr_off.activate_serialRef','add_scr_off_history.starting as newStart','add_scr_off_history.ending as newEnd')
     ->join('activate_scr_off','activate_scr_off.activate_gameRef','=','add_scr_off.uniqueId','left')
     //->join('add_scr_off_history','add_scr_off_history.gameRef','=','add_scr_off.uniqueId','left')
     ->join('add_scr_off_history','add_scr_off_history.serial_no','=','activate_scr_off.activate_serialRef','left')
     ->where('activate_scr_off.status',1)
     //->orderBy('add_scr_off_history.starting','desc')
     //->orderBy('add_scr_off.createdDate','desc')
     ->where('activate_scr_off.activate_date',$date[0]->activate_date)
     ->get()->toArray();
      return array($date[0]->activate_date,$result);
    }
    }
    
}
