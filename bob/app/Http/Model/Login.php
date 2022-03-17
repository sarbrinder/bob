<?php

namespace App\Http\Model;
use DB;
use Hash;
use App\Helpers\GlobalFunction as Helper;
use Illuminate\Database\Eloquent\Model;
class Login extends Model
{
  public static function userLogin($data)
  {
	//DB::enableQueryLog();
    $result =  DB::table('login')->select('login.*')
    ->where('login.email',$data['email'])
    ->where('login.password',md5($data['password']))
    ->where('login.status',1)
    ->get();
    //$query = DB::getQueryLog();
	//echo '<pre>';print_r($query );die;
    return $result;
  }


}
