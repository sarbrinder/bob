<?php
namespace App\Helpers;
use Session;
use DB;
use Mail;
class AppHelper {

public static function loginHeader($title)
{  
    $detail['title'] = $title;
 echo view('commonview.loginheader',$detail);
}
public static function MainHeader($title)
{
     $detail['title'] = $title;
    echo view('commonview.mainHeader',$detail);
}
public static function unqNum()
{
    	$length = 6;
		$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
		$randomString1 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
		$randomString = $randomString.$randomString1;
		return $randomString;
}
public static function addLog($addedBy,$referenceId,$type,$msg)
{
    $data = array(
       
        'logId' => Self::unqNum(),
        'addedBy' => $addedBy,
        'referenceId' => $referenceId,
        'createdDate' => date('Y-m-d h:i:s'),
        'type' => $type,
        'message' => $msg,
        );
    $result = DB::table('log')->insert($data);
            
}
public static function getSalesData($saleId,$table)
{
    $result = DB::table($table)->select('*')->where('salesId',$saleId)->get();
    return $result;
}
public static function numberFormat($price)
	{
	    return number_format($price,2,".","");
	}
	public static function updateLog($logId)
	{
	     $data = array(
        'status' => 2 // read notification
      );
      DB::table('log')->where('logId',$logId)->update($data);
      return;
	}
}
?>