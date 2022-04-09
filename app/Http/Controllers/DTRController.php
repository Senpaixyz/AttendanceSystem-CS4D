<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DTRController extends Controller
{
   // for DTR or manual attendance


   function GetData(Request $request){
    $user_id = $request->user_id;
    $lastTime = DB::table('dtr')->where('user_id',$user_id)
                ->orderBy('id', 'desc')->limit(1)->get()->first();

        if($lastTime){
            return [
                'result' => 'success',
                'timeIn' => $lastTime->timeIn,
                'timeIn_time' => $lastTime->timeIn_hours,
                'timeIn_day' => $lastTime->timeIn_day,
                'timeIn_fulldate' => $lastTime->timeIn_fulldate,
                'status' => $lastTime->status
            ];
        }
        else{
            return [
                'result' => 'empty',
            ];
        }
        
    }
    function GetTimeIn(Request $request){
        $user_id = $request->user_id;
        $timeIn = $request->timeIn;
        $timeIn_time = $request->timeIn_time;
        $timeIn_day = $request->timeIn_day;
        $timeIn_fulldate = $request->timeIn_fulldate;
        $status = "timeIn";
        $affected = DB::table('dtr')->insert([
            'user_id' => $user_id,
            'timeIn' => $timeIn,
            'timeIn_hours' => $timeIn_time,
            'timeIn_day' => $timeIn_day,
            'timeIn_fulldate' => $timeIn_fulldate,
            'status' => $status
        ]);
        if($affected){
            return [
                'result' => 'success',
                'status' => $status,
                'timeIn' => $timeIn,
                'timeIn_time' => $timeIn_time,
                'timeIn_day' => $timeIn_day,
                'timeIn_fulldate' => $timeIn_fulldate
            ];
        }
        else{
            return [
                'result' => 'failed',
            ]; 
        }
        
    }
    function GetTimeOut(Request $request){
        $user_id = $request->user_id;
        $timeIn = $request->timeIn;
        $timeOut = $request->timeOut;
        $timeOut_time = $request->timeOut_time;
        $timeOut_day = $request->timeOut_day;
        $timeOut_fulldate = $request->timeOut_fulldate;
        $status = "timeOut";
        $hours = $request->number_hours;

        $affected = DB::table('dtr')
            ->where('user_id', $user_id)
            ->where('timeIn',$timeIn)
            ->where('status','timeIn')
            ->update([
                'timeOut' => $timeOut,
                'timeOut_hours' => $timeOut_time,
                'timeOut_day' => $timeOut_day,
                'timeOut_fulldate' => $timeOut_fulldate,
                'status' => 'timeOut',
                'number_hours' => $hours
                ]);
        if($affected){
            return [
                'result' => 'success'
            ];
        }
        else{
            return [
                'result' => 'failed'
            ];
        }

    }
}
