<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class MainController extends BaseController
{
    /**
     * Access the dashboard page
     * @return Application|Factory|View
     */
    public function index(){
        $this->setPageTitle('Dashboard', 'dashboard');
        $subjects = Subject::where('user_id',Auth::user()->id)->get();
        $total_subjects_handle = Subject::where('user_id',Auth::user()->id)->count();
        $students_count = Student::count();
    
        $total_number_hours = DB::table('dtr')
                                            ->where('user_id',Auth::user()->id)->sum('number_hours');
        $id = Auth::id();
        $user = DB::table('users')->select('name','email','role')->where('id',$id)->get()->first();

        return view('Manage.pages.Singles.dashboard', compact('subjects','total_subjects_handle','total_number_hours', 'students_count','user'));
    }

    public function locked_account(){
        $this->setPageTitle('Locked', 'locked');
        $id = Auth::id();
        $user = DB::table('users')->select('name','email','role')->where('id',$id)->get()->first();
        return view('Manage.layouts.lock-account',compact('user'));
    }
}
