<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Subject\StoreSubjectRequest;
use App\Http\Requests\Subject\UpdateSubjectRequest;
use App\Models\Subject;
use App\Models\Student;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SubjectController extends BaseController
{
    /**
     * Access the index page for the students to see all students
     * @return Application|Factory|View
     */
    public function index(){
        $this->setPageTitle('Subjects', 'All Subjects');
        $users = User::all();
        $subjects = Subject::withCount('students')->with('teacher')->get();
        return view('Manage.pages.Subject.index', compact('subjects', 'users'));
    }

    /**
     * @param Subject $subject
     * @return Application|Factory|View
     */
    public function show(Subject $subject){
        $this->setPageTitle($subject->name, 'Show Subject');
        return view('Manage.pages.Subject.show', compact('subject'));
    }
    public function viewteachersubject(Subject $subject){
        $this->setPageTitle($subject->name, 'Show Subject');
        return view('Manage.pages.Subject.show', compact('subject'));
    }

    /**
     * @param Subject $subject
     * @return Application|Factory|View
     */
    public function assignStudents(Subject $subject){
        $this->setPageTitle($subject->name, 'Assign Students');
        $students = Student::WhereNotIn('id', $subject->students->pluck('id'))->get();
        return view('Manage.pages.Subject.assign-student', compact('students', 'subject'));
    }

    /**
     * Save students
     * @param Subject $subject
     * @param Request $request
     * @return RedirectResponse
     */
    public function attachAssignedStudents(Subject $subject, Request $request): RedirectResponse
    {
        $subject->students()->attach($request->get('students'));
        alert('Good Job', 'Students Assigned Successfully', 'success');
        // Redirect Back
        return redirect()->route('subject.index');
    }

    /**
     * Remove students from the course
     * @param Subject $subject
     * @param Student $student
     * @return RedirectResponse
     */
    public function detachAssignedStudent(Subject $subject, Student $student): RedirectResponse
    {
        $subject->students()->detach($student);
        alert('Good Job', $student->name . ' Removed Successfully', 'success');
        // Redirect Back
        return redirect()->back();
    }

    /**
     * @param StoreSubjectRequest $request
     * @return RedirectResponse
     */
    public function store(StoreSubjectRequest $request): RedirectResponse
    {
        try {
            $subject = Subject::create($request->validated());
            // $subject_current->teacher_subjects()->save(['user_id' => $request->user_id]);
            alert('Good Job', 'Subject Created Successfully', 'success');
        }
        catch (\Exception $exception){
            dd($exception);
            alert('Oops','Please validate input', 'error');
        }
        // Show Sweet Alert Notification

        // Redirect Back
        return redirect()->back();
    }

    /**
     * @param UpdateSubjectRequest $request
     * @param Subject $subject
     * @return RedirectResponse
     */
    public function update(UpdateSubjectRequest $request, Subject $subject): RedirectResponse
    {
        try {
            $subject->update($request->validated());
            alert('Good Job', 'Subject Updated Successfully', 'success');
        }
        catch (\Exception $exception){
            alert('Oops', 'Please try again', 'error');
        }
        // Show Sweet Alert Notification

        // Redirect Back
        return redirect()->back();
    }

    /**
     * @param Subject $subject
     * @return RedirectResponse
     */
    public function destroy(Subject $subject): RedirectResponse
    {
        try {
            $subject->delete();
            alert('Good Job', 'Subject removed Successfully', 'success');
        }
        catch (\Exception $exception){
            alert('Oops', 'Please try again', 'error');
        }
        // Show Sweet Alert Notification
  
        // Redirect Back
        return redirect()->back();
    }
}
