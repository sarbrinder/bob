<?php

namespace App\Http\Model;
use DB;
use Hash;
use Session;
use App\Helpers\AppHelper as Helper;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  public static function addUserSave($data)
  {
      $userId = Helper::unqNum();
        $detail = array(
            'uniqueId' => $userId,
            'fName' =>$data['fName'],
            'lName' =>$data['lName'],
            'phoneNo' => $data['phoneNo'],
            'email' =>$data['email'],
            'password' => md5($data['password']),
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zipCode' => $data['zipCode'],
            'type' => $data['type'],
            'createdDate' => date('Y-m-d h:i:s'),
            'status' =>1,
            );
            $result = DB::table('login')->insert($detail);
            
            /** **/
            $arr = array('1'=>'Super Admin','2' => 'Admin','3'=>'Manger','4'=>'Others');
            $msg = Session::get('fName') .' '.Session::get('lName'). ' added new '.$arr[$data['type']].' named ( '.$data['fName'].' '.$data['lName'] .' )' ;
            Helper::addLog(Session::get('userId'),$userId,'User',$msg);
            /******/
            
            return $result;

  }
  public static function emailCheck($email)
  {
      $result = DB::table('login')->select('email')->where('email',$email)->get();
      return $result;
  }

    public static function getUserList($arr){
        DB::enableQueryLog();
        $result = DB::table('login')->select('*')->where('type','!=',1);
        
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
     public static function editUserDetail($id){
        DB::enableQueryLog();
        $result = DB::table('login')->select('*')->where('uniqueId',$id)->get();
        $query = DB::getQueryLog();
	  // echo '<pre>';print_r($result );die;
        return $result;
    }
    public static function editUserSave($data){

    if($data['password'] == ''){
        $pass = $data['oldPassword'];
    }else{
        $pass = md5($data['password']);
    }
        $detail = array(
            'fName' =>$data['fName'],
            'lName' =>$data['lName'],
            'phoneNo' => $data['phoneNo'],
            'email' =>$data['email'],
            'password' => $pass,
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zipCode' => $data['zipCode'],
            'type' => $data['type']
            );
	   $result = DB::table('login')->where('uniqueId', $data['id'])->update($detail);
	      return $result;
        }
         public static function deleteUser($id){
             $data = array(
                 'status' => 2,
                 );
             	$deletedRows = DB::table('login')->where('uniqueId',$id)->update($data);
             	return $deletedRows;
         }
public static function searchUserVal($val){
    DB::enableQueryLog();
		$result = DB::table('login')->select('*')->where('fName', 'like', '%' . $val . '%')->orWhere('lName', 'like', '%' . $val . '%')
         ->orWhere('email', 'like', '%' . $val . '%') ->orWhere('address', 'like', '%' . $val . '%')->orWhere('phoneNo', 'like', '%' . $val . '%')->get();
         return $result;
}
}
