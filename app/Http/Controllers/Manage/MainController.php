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
class MainController extends BaseController
{
    /**
     * Access the dashboard page
     * @return Application|Factory|View
     */
    public function index(){
        $this->setPageTitle('Dashboard', 'dashboard');
        $subjects = Subject::all();
        $students_count = Student::count();
        $id = Auth::id();
        $user = DB::table('users')->select('name','email','role')->where('id',$id)->get()->first();

        return view('Manage.pages.Singles.dashboard', compact('subjects', 'students_count','user'));
    }
}
