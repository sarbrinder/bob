<?php

namespace App\Http\Model;
use DB;
use Hash;
use Session;
use App\Helpers\AppHelper as Helper;
use Illuminate\Database\Eloquent\Model;
class Vendor extends Model
{
 public static function addVendorSave($data)
  {
      $userId = Helper::unqNum();
        $detail = array(
            'uniqueId' => $userId,
            'name' =>$data['Name'],
            'phoneNo' => $data['phoneNo'],
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zipCode' => $data['zipCode'],
            'type' => $data['type'],
            'createdDate' => date('Y-m-d h:i:s'),
            'status' =>1,
            );
            $result = DB::table('vendors')->insert($detail);
            
            /** **/
            $msg = Session::get('fName') .' '.Session::get('lName'). ' added new vendor named ( '.$data['Name'] .' )' ;
            Helper::addLog(Session::get('userId'),$userId,'Vendor',$msg);
            /******/
            
            return $result;
  }
   public static function getVendorList($arr){
         DB::enableQueryLog();
        $result = DB::table('vendors')->select('*');
         if(!empty($arr) && isset($arr['notiId'])){
          $get = Helper::updateLog($arr['notiId']);
     
      $result = $result->orderByRaw("FIELD(uniqueId,'".$arr['orderBy']."') DESC")->paginate(10);
    }else{
      $result = $result->orderBy('id','desc')->paginate(10);
    }
        
        $query = DB::getQueryLog();
	  //  echo '<pre>';print_r($query );die;
        return $result;
   }
     public static function editvendorDetail($id){
        DB::enableQueryLog();
        $result = DB::table('vendors')->select('*')->where('uniqueId',$id)->get();
        $query = DB::getQueryLog();
	  // echo '<pre>';print_r($result );die;
        return $result;
    }
    
     public static function editvendorSave($data){
        $detail = array(
            'name' =>$data['Name'],
            'phoneNo' => $data['phoneNo'],
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zipCode' => $data['zipCode'],
            'type' => $data['type']
            );
	   $result = DB::table('vendors')->where('uniqueId', $data['id'])->update($detail);
	      return $result;
        }
        public static function deleteVendor($id){
            $data = array(
                'status' => 2,
                );
        $deletedRows =  DB::table('vendors')->where('uniqueId', $id)->update($data);
             	return $deletedRows;
         }
       public static function searchVendorVal($val){
    DB::enableQueryLog();
		$result = DB::table('vendors')->select('*')->where('name', 'like', '%' . $val . '%') 
		->orWhere('address', 'like', '%' . $val . '%')
		->orWhere('phoneNo', 'like', '%' . $val . '%')->paginate(10);
         return $result;
}
}