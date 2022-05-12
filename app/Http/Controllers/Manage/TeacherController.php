<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Teacher\StoreTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class TeacherController extends BaseController
{
    public function __construct()
    {
        //assign the middleware to all the methods of the controller
        // $this->middleware('role:Admin');
    }
        /**
     * Access the index page for the teacher to see all students
     * @return Application|Factory|View
     */
    public function index(){
        $this->setPageTitle('Teachers', 'All Teachers');
        $users = User::all();
        return view('Manage.pages.Teachers.index', compact('users'));
    }
    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(Request $request,User $user){
        $current_user = $user->where('id',$request->teacher)->first();
        $this->setPageTitle($user->name, $user->role . ' Information');
        $info = $user->load('attendances');
        return view('Manage.pages.Teachers.show', compact('current_user'));
    }

    /** 
     * @param  StoreTeacherRequest $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        try {

            $isValid =  $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
            ]);
           // dd($isValid);
            if($isValid){      
                $users = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => $request->role
                ];
                User::create($users);
            }


 
        }
        catch (\Exception $exception){
            alert('Oops', 'Please try again', 'error');
            dd($exception);
        }
        // Show Sweet Alert Notification
        alert('Good Job', 'Teacher Created Successfully', 'success');
        // Redirect Back
        return redirect()->back();
    }

     /**
     * @param UpdateTeacherRequest $request
     * @param User $users
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        try {
            $users = new User;
            $isValid =  $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:8'],
            ]);
            if($isValid){
                $user = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => $request->role
                ];
                $data = $users->where('id',$request->teacher)->update($user);

            }
            // Show Sweet Alert Notification
            alert('Good Job', 'Teacher Updated Successfully', 'success');
        }
        catch (\Exception $exception){
            //dd($exception);
            alert('Invalid Changes', 'Some input seems invalid', 'error');
        }
     
        // Redirect Back
        return redirect()->back();
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(Request $request, User $user): RedirectResponse
    {
        try {
            $user->where('id',$request->teacher)->delete();
        }
        catch (\Exception $exception){
            alert('Oops', 'Please try again', 'error');
        }
        // Show Sweet Alert Notification
        alert('Good Job', 'Student removed Successfully', 'success');
        // Redirect Back
        return redirect()->back();
    }


     /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function assignSubjects(Request $request, User $user){
        $current_user = $user->where('id',$request->teacher)->first();
        $this->setPageTitle($current_user->name, 'Assign Subjects');
        $subjects = Subject::WhereNotIn('id', $current_user->subjects->pluck('id'))->get();
        return view('Manage.pages.Teachers.assign-subject', compact('user', 'subjects'));
    }

     /**
     * Save students
     * @param Subject $subject
     * @param Request $request
     * @return RedirectResponse
     */
    public function attachAssignedSubjects(Subject $subject, Request $request): RedirectResponse
    {
        $subject->students()->attach($request->get('students'));
        alert('Good Job', 'Students Assigned Successfully', 'success');
        // Redirect Back
        return redirect()->route('subject.index');
    }


    public function updateEnableDisable(Request $request, User $users){
        $id = $request->id;
        $current = $users->where('id',$id)->first();
        $current_status = $current->status;
        if($current->role == 'User'){
            if($current_status == "active"){
                $current_status = "inactive";
            }
            else{
                $current_status = "active";
            }
            $user = [
                'status' => $current_status
            ];
            $data = $users->where('id',$id)->update($user);
    
            return [
                'result' => 'success',
                'id' => $id,
                'status' => $current_status
            ];
        }
        else{
            return [
                'result' => 'error'
            ];
        }
        
    }

    public function showGeneralDTRLogs(Request $request){
        $this->setPageTitle('Teachers', 'All Teachers DTR Logs');
        $users_logs = DB::table('dtr')
                            ->select(
                                'users.name',
                                'users.role',
                                'dtr.timeIn_fulldate',
                                'dtr.timeIn_hours',
                                'dtr.timeOut_hours',
                                'dtr.number_hours',
                                'dtr.status AS dtr_status'
                            )
                            ->join('users','users.id','=','dtr.user_id')
                            ->orderBy('dtr.timeIn', 'DESC')->get();
        //dd($users_logs);
        return view('Manage.pages.Logs.admin-dtr-logs', compact('users_logs'));
    }

    public function showTeacherDTRLogs(Request $request){
        $this->setPageTitle('Teachers', 'Your DTR Logs');
        $user_logs = DB::table('dtr')
                            ->select(
                                'users.name',
                                'users.role',
                                'dtr.timeIn_fulldate',
                                'dtr.timeIn_hours',
                                'dtr.timeOut_hours',
                                'dtr.number_hours',
                                'dtr.status AS dtr_status'
                            )
                            ->join('users','users.id','=','dtr.user_id')
                            ->where('users.id',Auth::user()->id)
                            ->orderBy('dtr.id', 'DESC')->get();
        //dd($users_logs);
        return view('Manage.pages.Logs.teacher-dtr-logs', compact('user_logs'));
    }





}
