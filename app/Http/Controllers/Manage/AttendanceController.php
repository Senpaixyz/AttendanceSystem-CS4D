<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Attendance\StoreAttendanceRequest;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendanceController extends BaseController
{
    /**
     * @return Application|Factory|View
     */
    public function index(){
        $this->setPageTitle("Attendances" , 'All Attendances');
        $attendances = Attendance::with(['subject', 'teacher'])->WhereSubject(request()->get('subject_filter'))->WhereDateIs(request()->get('date_filter'))->withCount('students')->get();
        $subjects = Subject::where('user_id',Auth::user()->id)->get();
        return view('Manage.pages.Attendance.index', compact('attendances', 'subjects'));
    }

    /**
     * @param StoreAttendanceRequest $request
     * @return Application|Factory|View
     */
    public function store(StoreAttendanceRequest $request){
        $attendance = Attendance::create($request->validated() + [
            'user_id' => Auth::id(),
            ]);
        $subject = Subject::findorfail($request->get('subject_id'));
        $subject->load('students');
        $this->setPageTitle($attendance->idm , 'Attendance');
        alert('Good Job', 'You can start your attendance now!!', 'success');
        return view('Manage.pages.Attendance.take-attendance', compact('attendance', 'subject'));
    }

    /**
     * @param Attendance $attendance
     * @return Application|Factory|View
     */
    public function edit(Attendance $attendance){
        $this->setPageTitle($attendance->id , 'Attendance');
        $attendance->load('students', 'subject');
        return view('Manage.pages.Attendance.edit', compact('attendance'));
    }

    /**
     * @param Attendance $attendance
     * @param Request $request
     * @return RedirectResponse
     */
    public function attachStudents(Attendance $attendance, Request $request): RedirectResponse
    {
        if ($request->get('status') == null) {
            $attendance->delete();
            alert('Oops', "You didn't take any attendance. Try again and fill all entries please", 'error');
        }
        else{
            foreach ($request->get('status') as $student_id => $status) {
                $student = Student::findorfail($student_id);
                if ($status == "on") {
                    $value = 1;
                } elseif($status == "off") {
                    $value = 0;
                }
                else{
                    $value = null;
                }
                $attendance->students()->attach($student->id, ['status' => $value]);
            }
            alert('Good Job', 'Attendance taken successfully', 'success');
        }
        return  back();
    }

    /**
     * @param Attendance $attendance
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateAttendanceData(Attendance $attendance, Request $request): RedirectResponse
    {
        $attendance->students()->detach();
        $this->attachStudents($attendance, $request);
        alert('Good Job', 'Attendance Data updated successfully', 'success');
        return  back();
    }

    /**
     * @param Attendance $attendance
     * @return RedirectResponse
     */
    public function destroy(Attendance $attendance): RedirectResponse
    {
        try {
            $attendance->delete();
            alert('Good Job', 'Attendance removed successfully', 'success');
        }
        catch (\Exception $exception){
            alert('Oops', 'Please try again', 'error');
        }
 
        return  back();
    }


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
