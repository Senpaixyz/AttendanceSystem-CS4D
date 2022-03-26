<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


//    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    protected function redirectTo(): string
    {
        if (Auth::user()->role === 'Admin') {
            return '/admin/dashboard';
        }
        else if (Auth::user()->role === 'User') {
            return '/user/teacher-dashboard';
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
