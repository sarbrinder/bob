<?php
namespace App\Http\Model;
use DB;
use Hash;
use Session;
use App\Helpers\AppHelper as Helper;
use Illuminate\Database\Eloquent\Model;
class Lotto extends Model
{
  public static function addScrOff($detail)
  {
      $uniqueId = Helper::unqNum();
      $detail['uniqueId'] = $uniqueId ;
      $detail['createdDate'] = date('Y-m-d');
      $detail['addedBy'] = Session::get('userId');
      $result = DB::table('add_scr_off')->insert($detail);
      /** **/
      $msg = Session::get('fName') .' '.Session::get('lName'). ' added new Scr.off named ( '.$detail['gameName'] .' )' ;
      Helper::addLog(Session::get('userId'),$uniqueId,'Scr-off',$msg);
      /******/
      return $result;
  }
  public static function getGameId()
  {
      $result = DB::table('add_scr_off')->select('gameId','uniqueId')->get();
      return $result;
  }
  public static function getGameDetail($gameId)
  {
      $result = DB::table('add_scr_off')->select('gameName','tickets','gameValue')->where('uniqueId',$gameId)->get();
      return $result;
  }
  public static function addReceiveOrder($data)
  {
     for($i=0;$i<count($data['order_date']);$i++)
      {
          $uniqueId = Helper::unqNum();
          $date = explode('/',$data['order_date'][$i]);
          $date = $date[2] . '-' .$date[0] .'-' .$date[1];
          $msg = Session::get('fName') .' '.Session::get('lName'). ' added new order dated ( '.date('m/d/Y') .' )' ;
      
          $detail[] = array(
                 'uniqueId' => $uniqueId ,
                 'order_date' => $date,
                'gameRef' => $data['gameRef'][$i],
                'serial' => $data['serial'][$i] ,
                'addedBy' => Session::get('userId'),
                'createdDate' => date('Y-m-d'),
              );
          $log[] = array(
                  'logId' => Helper::unqNum(),
                  'addedBy' => Session::get('userId') ,
                  'referenceId' => $uniqueId ,
                  'createdDate' => date('Y-m-d h:i:s') ,
                  'type' => 'Receive-order' ,
                  'message' => $msg,
                  );
      }
     $result = DB::table('receive_order')->insert($detail);
         /** **/
    //   $msg = Session::get('fName') .' '.Session::get('lName'). ' added new order dated ( '.date('m/d/Y') .' )' ;
    //   Helper::addLog(Session::get('userId'),$uniqueId,'Receive-order',$msg);
     $result1 = DB::table('log')->insert($log);
      /******/
      return $result;
        
  }
  public static function getSerialDetail($gameId)
  {
      /*** get serial no list but only free serial no.***/
      $result = DB::table('receive_order')->select('serial','uniqueId')->where('gameRef',$gameId)->where('status',1)->get();
    
      return $result;
  }
  public static function ativateScrOff($data)
  {
      $msg = Session::get('fName') .' '.Session::get('lName'). ' activate new Scr dated ( '.date('m/d/Y') .' )' ;
      $status = array(
          'status' => '2',
          );
      for($i=0;$i<count($data['activate_date']);$i++)
      {
       $uniqueId = Helper::unqNum();
       $date = explode('/',$data['activate_date'][$i]);
       $date = $date[2] . '-' .$date[0] .'-' .$date[1];
       $detail[] = array(
          'uniqueId' => $uniqueId ,
          'activate_date' => $date,
          'activate_gameRef' => $data['activate_gameRef'][$i],
          'activate_serialRef' => $data['activate_serialRef'][$i] ,
          'slotNo' =>$data['slotNo'][$i],
          'addedBy' => Session::get('userId'),
          );
           $log[] = array(
                  'logId' => Helper::unqNum(),
                  'addedBy' => Session::get('userId') ,
                  'referenceId' => $uniqueId ,
                  'createdDate' => date('Y-m-d h:i:s') ,
                  'type' => 'Activate-scr' ,
                  'message' => $msg,
                  );
        $result2 = DB::table('slot_detail')->where('slot_no',$data['slotNo'][$i])->update($status);
        $result3 = DB::table('receive_order')->where('uniqueId',$data['activate_serialRef'][$i])->update(array('status' => 2)); // update serial no status availabe to assigned.
      }
        $result = DB::table('activate_scr_off')->insert($detail);
        $result1 = DB::table('log')->insert($log);
          
      return $result;
  }
  public static function checkSerialNumber($serialNum,$uniqueId)
  {
      if($uniqueId != ''){
           $result = DB::table('receive_order')->select('serial')->where('serial',$serialNum)->where('uniqueId','<>',$uniqueId)->get();
      }else{
      $result = DB::table('receive_order')->select('serial')->where('serial',$serialNum)->get();
      }
      return $result;
  }
  public static function getScrOff()
  {
    //   $result = DB::table('add_scr_off')->select('*')->paginate(20);
    //  $result = DB::table('add_scr_off')->where('activate_scr_off.status',1)->select('add_scr_off.*','activate_scr_off.slotNo','activate_scr_off.uniqueId as activateUniqueId','activate_scr_off.activate_serialRef')
    //  ->join('activate_scr_off','activate_scr_off.activate_gameRef','=','add_scr_off.uniqueId','left')->get()->toArray();
    /*********delete today ending date data. **/
    $get = DB::table('activate_scr_off')->select('activate_serialRef')->where('endingDate',date('Y-m-d'))->get();
    if(count($get) > 0){
        DB::table('activate_scr_off')->where('endingDate',date('Y-m-d'))->delete();
        DB::table('add_scr_off_history')->where('serial_no',$get[0]->activate_serialRef)->delete();
    }
    /* get last dateed record */
    $date = DB::table('activate_scr_off')->select('activate_date')->orderBy('activate_date','desc')->limit(1)->get();
     if(count($date) > 0){
     $result = DB::table('add_scr_off')->select('add_scr_off.*','activate_scr_off.slotNo','activate_scr_off.uniqueId as activateUniqueId','activate_scr_off.activate_serialRef','add_scr_off_history.starting as newStart','add_scr_off_history.ending as newEnd')
     ->join('activate_scr_off','activate_scr_off.activate_gameRef','=','add_scr_off.uniqueId','left')
     ->join('add_scr_off_history','add_scr_off_history.gameRef','=','add_scr_off.uniqueId','left')
     ->where('activate_scr_off.status',1)
     //->orderBy('add_scr_off_history.starting','desc')
     //->orderBy('add_scr_off.createdDate','desc')
     ->where('activate_scr_off.activate_date',$date[0]->activate_date)
     ->get()->toArray();
      return array($date[0]->activate_date,$result);
     }
  }
  public static function searchScr($search)
  {
      DB::enableQueryLog();
	 $result = DB::table('add_scr_off')->select('*')
       ->where('gameId', 'like', '%' . $search . '%')
        ->paginate(20);
         return $result;
  }
  public static function editScrDetail($id)
  {
      $result = DB::table('add_scr_off')->select('*')->where('uniqueId',$id)->get();
      return $result;
  }
  public static function editScrOffSave($detail)
  {
      $uniqueId = $detail['uniqueId'];
      unset($detail['uniqueId']);
      $result = DB::table('add_scr_off')->where('uniqueId',$uniqueId)->update($detail);
      return $result;
  }
  public static function receiveOrderList()
  {
      $result = DB::table('receive_order')->select('receive_order.*','add_scr_off.gameId','add_scr_off.gameName','add_scr_off.gameValue')
      ->join('add_scr_off','add_scr_off.uniqueId','=','receive_order.gameRef','left')
      ->paginate(20);
      return $result;
  }
  public static function searchOrder($search)
  {
      DB::enableQueryLog();
	 $result = DB::table('receive_order')->select('receive_order.*','add_scr_off.gameId','add_scr_off.gameName','add_scr_off.gameValue')
      ->join('add_scr_off','add_scr_off.uniqueId','=','receive_order.gameRef','left')
       ->where('receive_order.serial', 'like', '%' . $search . '%')
        ->paginate(20);
         return $result;
  }
  public static function editOrderDetail($uniqueId)
  {
       $result = DB::table('receive_order')->select('receive_order.*','add_scr_off.gameId','add_scr_off.gameName','add_scr_off.gameValue')
      ->join('add_scr_off','add_scr_off.uniqueId','=','receive_order.gameRef','left')
      ->where('receive_order.uniqueId',$uniqueId)->get();
      return $result;
  }
  public static function editOrderSave($detail)
  {
      $uniqueId = $detail['orderId'];
      $date = explode('/',$detail['order_date']);
      $date = $date[2] . '-' .$date[0] .'-' .$date[1];
      $data = array(
          'order_date' => $date,
          'gameRef' => $detail['gameRef'],
          'serial' => $detail['serial'] ,
         );
      $result = DB::table('receive_order')->where('uniqueId',$uniqueId)->update($data);
      $data1 = DB::table('add_scr_off')->select('gameId','gameName','gameValue')->where('uniqueId',$detail['gameRef'])->get();
      return $data1;
  }
  public static function getSlotDetail()
  {
      $result = DB::table('slot_detail')->where('status',1)->select('*')->get();
      return $result;
  }
 /*   public static function saveEntry($number,$scroffId,$endingNum,$slot,$startingNum,$activateId)
    {
        $data = array(
            'uniqueId' => Helper::unqNum(),
            'gameRef' => $scroffId,
            'ending' => $number ,
           );
           DB::table('add_scr_off_history')->insert($data);
           $add = (int)$number + (int)$startingNum;
        if($add == $endingNum ) // slot free
        {
            $detail = array(
                'starting' => $add ,
                'status' => 2 ,
                );
            $detail2 = array(
                    'status' => 1, // empty slot chanhge sstatus
                    );
            DB::table('slot_detail')->where('slot_no',$slot)->update($detail2);
            $detail3 = array(
                'status' => 0,
                );
            DB::table('activate_scr_off')->where('uniqueId',$activateId)->update($detail3);
            
        }else{
            $detail = array(
                 'starting' => $add , 
                );
        }
        $result = DB::table('add_scr_off')->where('uniqueId',$scroffId)->update($detail);
        
         $game = DB::table('add_scr_off')->select('gameName')->where('uniqueId',$scroffId)->get();
         $msg = Session::get('fName') .' '.Session::get('lName'). ' added new entry for '.$game[0]->gameName.' dated ( '.date('m/d/Y') .' )' ;
         Helper::addLog(Session::get('userId'),$data['uniqueId'],'new-number',$msg);
        
        return $result;
    } */
    
    public static function saveEntry($number,$scroffId,$endingNum,$slot,$startingNum,$activateId,$serialNo)
    {
        // firse delete then add hitory**/
        DB::table('add_scr_off_history')->where('serial_no',$serialNo)->delete();
        $data = array(
            'uniqueId' => Helper::unqNum(),
            'gameRef' => $scroffId,
            'starting' => $number,
            'ending' => $endingNum ,
            'serial_no' => $serialNo,
           );
           DB::table('add_scr_off_history')->insert($data);
        //   $add = (int)$number + (int)$startingNum;
        // if($number == ($endingNum + (int)1)) // slot free
         if($number == $endingNum ) // slot free
        {
            // $detail = array(
            //     'starting' => $endingNum ,
            //     'status' => 2 ,
            //     );
            $detail2 = array(
                    'status' => 1, // empty slot chanhge sstatus
                    );
            DB::table('slot_detail')->where('slot_no',$slot)->update($detail2);
            $detail3 = array(
                //'status' => 0,
                'endingDate' => date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day'))
                );
            DB::table('activate_scr_off')->where('uniqueId',$activateId)->update($detail3);
            $detail4  =array(
                'status' => '3',
                );
                DB::table('receive_order')->where('uniqueId',$serialNo)->update($detail4);
            
        }else{
            // $detail = array(
            //      'starting' => $number , 
            //     );
        }
        //$result = DB::table('add_scr_off')->where('uniqueId',$scroffId)->update($detail);
         /** **/
         $game = DB::table('add_scr_off')->select('gameName')->where('uniqueId',$scroffId)->get();
         $msg = Session::get('fName') .' '.Session::get('lName'). ' added new entry for '.$game[0]->gameName.' dated ( '.date('m/d/Y') .' )' ;
         Helper::addLog(Session::get('userId'),$data['uniqueId'],'new-number',$msg);
        /******/
        return true;
    }
    public static function searchSCRList($currentval)
    {
        $date = explode('/',$currentval);
        $newdate = $date[2] .'-'.$date[0] .'-'.$date[1];
        $result = DB::table('add_scr_off')->where('activate_scr_off.status',1)->where('add_scr_off.createdDate',$newdate)->select('add_scr_off.*','activate_scr_off.slotNo','activate_scr_off.uniqueId as activateUniqueId')
     ->join('activate_scr_off','activate_scr_off.activate_gameRef','=','add_scr_off.uniqueId','left')->get()->toArray();
      return $result;
    }
    

}
