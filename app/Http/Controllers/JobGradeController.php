<?php

namespace App\Http\Controllers;

use App\Models\JobGrade;
use Illuminate\Http\Request;

class JobGradeController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = JobGrade::getRecord($request);
        return view('backend.job_grade.list',$data);
    }
    public function add(Request $request)
    {

        return view('backend.job_grade.add');
    }
    public function add_post(Request $request)
    {
        $user = request()->validate([
            'grade_level' => 'required',
            'lowest_salary' => 'required',
            'highest_salary' => 'required',
        ]);

        $user  = new JobGrade;
        $user->grade_level  = trim($request->grade_level);
        $user->lowest_salary  = trim($request->lowest_salary);
        $user->highest_salary  = trim($request->highest_salary);
        $user->save();

        return redirect('admin/job_grades')->with('success', 'Job Grade Successfully Created.');
    }
    public function edit($id)
    {
        $data['getRecord'] = JobGrade::find($id);
        return view('backend.job_grade.edit', $data);
    }
    public function update(Request $request,$id)
    {
        $user = $request->validate([
            'grade_level' => 'required',
            'lowest_salary' => 'required',
            'highest_salary' => 'required'
        ]);
        $user = JobGrade::find($id);
        $user->grade_level  = trim($request->grade_level);
        $user->lowest_salary  = trim($request->lowest_salary);
        $user->highest_salary  = trim($request->highest_salary);
        $user->save();
        return redirect('admin/job_grades')->with('success', 'Job Grade Successfully Updated');
    }
    public function delete($id)
    {
        $user = JobGrade::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Job grade not found');
        }

        $user->delete();

        return redirect()->back()->with('error', 'Job Grade Successfully Deleted');
    }
}
