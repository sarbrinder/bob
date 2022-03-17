<?php

namespace App\Http\Model;
use DB;
use Hash;
use Session;
use App\Helpers\AppHelper as Helper;
use Illuminate\Database\Eloquent\Model;
class Report extends Model
{ 
    public static function showWeeklyReport($fromDate,$toDate,$store,$mangerId)
    {
         $date = explode('/',$fromDate);
         $fromDate = $date[2] . '-' . $date[0] .'-'.$date[1];
      
       $date1 = explode('/',$toDate);
       $toDate = $date1[2] . '-' . $date1[0] .'-'.$date1[1];
        $result = DB::table('sales')->select('*')
        ->where('created_date','>=',$fromDate)
        ->where('created_date','<=',$toDate)
        ->where('addedBy',$mangerId)
        ->get();
        return $result;
    }
      public static function showvendorsReport($fromDate,$toDate,$store,$mangerId)
    {
         $date = explode('/',$fromDate);
         $fromDate = $date[2] . '-' . $date[0] .'-'.$date[1];
      
       $date1 = explode('/',$toDate);
       $toDate = $date1[2] . '-' . $date1[0] .'-'.$date1[1];
        $result = DB::table('sale_vendor_report')->select('vendor_invoices', DB::raw('sum(vendor_price) as total'))->groupBy('vendor_invoices')->where('created_date','>=',$fromDate)->where('created_date','<=',$toDate)
        ->where('addedBy',$mangerId)
        ->get();
        return $result;
    }
    public static function getStoreList()
    {
        $result = DB::table('store')->select('storeName','storeId')->get();
        return $result;
    }
    public static function getMangerList($val)
    {
        $result = DB::table('store')->select('mangerId')->where('storeId',$val)->get();
        $data = explode(',',$result[0]->mangerId);
        for($i=0;$i<count($data);$i++)
        {
            $result1 = DB::table('login')->select('uniqueId','fName','lName')->where('uniqueId',$data[$i])->get();
            $id[] = $result1[0]->uniqueId;
            $fName[] = $result1[0]->fName;
            $lName[] = $result1[0]->lName;
        } 
        //echo '<pre>';print_r($result1);die;
        return array($id,$fName,$lName);
    }
}
?>