<?php

namespace App\Http\Model;
use DB;
use Hash;
use Session;
use App\Helpers\AppHelper as Helper;
use Illuminate\Database\Eloquent\Model;
class Setting extends Model
{
    public static function getLogList()
    {
        $result = DB::table('log')->select('log.*','login.fName','login.lName')->join('login','login.uniqueId','=','log.addedBy')->orderBy('log.id','desc')->paginate(15);
        return $result;
    }
    

   
}
