<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// public route
Route::get('/', function () {
    return view('Manage.pages.landing-page');
});
Route::get('/about-us', function () {
    return view('Manage.pages.about-us');
});

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes(['register' =>true, 'reset' => false]);

Route::get('/home', function (){
    abort(404);
})->name('home');


Route::group(['middleware' => 'role:Admin','namespace' => 'Manage', 'prefix' => 'admin'], function () {

    Route::get('/dashboard', 'MainController@index')->name('dashboard');

    // Student Resources
    Route::resource('/student', 'StudentController')->except('create', 'edit');

    // Teacher Resources
    Route::resource('/teacher', 'TeacherController')->except('create', 'edit');

    Route::get('/teacher/{teacher}/assign','TeacherController@assignSubjects')->name('teacher.assign-subject');

    // Go to assign students page for the class
    Route::get('/subject/{subject}/assign', 'SubjectController@assignStudents')->name('subject.assign-student');
    // Store the assigned student to the database
    Route::post('/subject/{subject}/attach', 'SubjectController@attachAssignedStudents')->name('subject.attach-student');
    // Store the assigned student to the database
    Route::delete('/subject/{subject}/detach/{student}', 'SubjectController@detachAssignedStudent')->name('subject.remove.student');
    // Subject Resources
    Route::resource('/subject', 'SubjectController')->except('create', 'edit');

    // Attach students Attendance records
    Route::post('attendance/attach/{attendance}', 'AttendanceController@attachStudents')->name('attendance.attach');
    // Edit students Attendance records
    Route::put('attendance/attach/{attendance}/update', 'AttendanceController@updateAttendanceData')->name('attendance.student.update');
    // Attendance Resources
    Route::resource('attendance', 'AttendanceController');

    // Settings
    Route::get('/settings', 'SettingController@index')->name('settings.index');
    Route::post('/settings', 'SettingController@update')->name('settings.update');
});


Route::group(['middleware' => 'role:User','namespace' => 'Manage', 'prefix' => 'user'], function () {

    Route::get('/teacher-dashboard', 'MainController@index')->name('teacher-dashboard');

    // Student Resources
    Route::resource('/student-list', 'StudentController')->except('create', 'edit');
    // Subject Resources
    Route::resource('/view-subjects', 'SubjectController')->except('create', 'edit');
    // Attach students Attendance records
    Route::post('set-attendance/attach/{attendance}', 'AttendanceController@attachStudents')->name('set-attendance.attach');
    // Edit students Attendance records
    Route::put('set-attendance/attach/{attendance}/update', 'AttendanceController@updateAttendanceData')->name('set-attendance.student.update');
    // Attendance Resources
    Route::resource('set-attendance', 'AttendanceController');
});


