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

class TeacherController extends BaseController
{
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
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
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

        }
        catch (\Exception $exception){
            dd($exception);
            alert('Oops', 'Please try again', 'error');
        }
        // Show Sweet Alert Notification
        alert('Good Job', 'Teacher Updated Successfully', 'success');
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




}
