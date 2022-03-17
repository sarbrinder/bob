<?php

namespace App\Http\Model;
use DB;
use Hash;
use Session;
use App\Helpers\AppHelper as Helper;
use Illuminate\Database\Eloquent\Model;
class Store extends Model
{
  public static function addStoreSave($data)
  {
      $storeId = Helper::unqNum();
        $detail = array(
            'storeId' => $storeId,
            'storeName' =>$data['storeName'],
            'phoneNo' => $data['phoneNo'],
            'email' =>$data['email'],
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zipCode' => $data['zipCode'],
            'createdDate' => date('Y-m-d'),
            'mangerId' => $data['managerList'],
            'addedBy' =>Session::get('userId'),
            );
            $result = DB::table('store')->insert($detail);
            
            /** **/
            $msg = Session::get('fName') .' '.Session::get('lName'). ' added new Store named ( '.$data['storeName'] .' )' ;
            Helper::addLog(Session::get('userId'),$storeId,'Store',$msg);
            /******/
            return $result;

  }
  public static function emailCheck($email)
  {
      $result = DB::table('store')->select('email')->where('email',$email)->get();
      return $result;
  }

    public static function getStoreList($arr){
        
         DB::enableQueryLog();
        $result = DB::table('store')->select('store.*');
        
         if(!empty($arr) && isset($arr['notiId'])){
          $get = Helper::updateLog($arr['notiId']);
     
      $result = $result->orderByRaw("FIELD(store.storeId,'".$arr['orderBy']."') DESC")->paginate(10);
    }else{
      $result = $result->orderBy('store.id','desc')->paginate(10);
    }
    
        
        $query = DB::getQueryLog();
	  //  echo '<pre>';print_r($query );die;
        return $result;
    } 
    public static function getUserList(){
        DB::enableQueryLog();
        $result = DB::table('login')->select('fName','lName','uniqueId')->where('type','3')->where('status',1)->get();
        $query = DB::getQueryLog();
	  //  echo '<pre>';print_r($query );die;
        return $result;
    }
    public static function editStoreDetail($id){
        DB::enableQueryLog();
        $result = DB::table('store')->select('store.*','login.fName','login.lName')
        ->join('login','login.uniqueId','=','store.mangerId','left')
        ->where('storeId',$id)->get();
        $query = DB::getQueryLog();
	   // echo '<pre>';print_r($result );die;
        return $result;
    }

 public static function editStoreSave($data)
  {
        $detail = array(
            'storeName' =>$data['storeName'],
            'phoneNo' => $data['phoneNo'],
            //'mangerId' => $data['mangerId'],
            'email' =>$data['email'],
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zipCode' => $data['zipCode'],
            );
            $result = DB::table('store')->where('storeId', $data['id'])->update($detail);
            return $result;

  }
   public static function deleteStore($id){
       	$deletedRows = DB::table('store')->where('storeId',$id)->delete();
             	return $deletedRows;
   }
   public static function searchUserVal($val){
       
       	// $result = DB::table('store')->select('store.*','login.fName','login.lName')
        // ->join('login','login.uniqueId','=','store.mangerId','left')
        
    DB::enableQueryLog();
	$result = DB::table('store')->select('store.*')
       ->where('store.storeName', 'like', '%' . $val . '%')
         ->orWhere('store.email', 'like', '%' . $val . '%') 
         ->orWhere('store.address', 'like', '%' . $val . '%')
         ->orWhere('store.phoneNo', 'like', '%' . $val . '%')
         ->paginate(10);
         return $result;
}
public static function getMultipleManager($mangerId)
{
    $result = DB::table('login')->select('uniqueId','fName','lName','email')->where('uniqueId',$mangerId)->get();
    return $result;
}
public static function viewManagerList($storeId,$mangerId)
{
    $managerIdList = explode(',',$mangerId);
    //echo '<pre>';print_r($managerIdList);die;
    $arr = [];
    for($i=0;$i<count($managerIdList);$i++)
    {
        $result[] = DB::table('login')->select('uniqueId','fName','lName','email')->where('uniqueId',$managerIdList[$i])->get();
    }
    array_push($arr,$result);
    //echo '<pre>';print_r($arr);die;
    return $arr;
}
public static function updateManagerList($storeId,$mangerId)
{
    $data = array(
        'mangerId' => $mangerId,
        );
        $result = DB::table('store')->where('storeId',$storeId)->update($data);
        return $result;
}
}
