<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = Jobs::getRecord();

        return view('backend.jobs.list', $data);
    }
    public function add()
    {
        return view('backend.jobs.add');
    }
    public function add_post(Request $request)
    {
        $user = request()->validate([
            'job_title' => 'required',
            'min_salary' => 'required',
            'max_salary' => 'required',
        ]);

        $jobs  = new Jobs;
        $jobs->job_title  = trim($request->job_title);
        $jobs->min_salary  = trim($request->min_salary);
        $jobs->max_salary  = trim($request->max_salary);
        $jobs->save();

        return redirect('admin/jobs/')->with('success', 'Jobs Successfully Created.');
    }
    public function view($id)
    {
        $data['getRecord'] = Jobs::find($id);
        return view('backend.jobs.view', $data);
    }
    public function edit($id)
    {
        // $data['getRecord'] = User::find($id);
        // return view('backend.employees.edit', $data);
    }
    public function update($id, Request $request)
    {
        $user = request()->validate([
            'email' => 'required|unique:users,email,' . $id
        ]);
        // $user = User::find($id);
        // $user->name  = trim($request->name);
        // $user->last_name  = trim($request->last_name);
        // $user->email  = trim($request->email);
        // $user->phone_number  = trim($request->phone_number);
        // $user->hire_date  = trim($request->hire_date);
        // $user->job_id  = trim($request->job_id);
        // $user->salary  = trim($request->salary);
        // $user->commission_pct  = trim($request->commission_pct);
        // $user->manager_id  = trim($request->manager_id);
        // $user->department_id  = trim($request->department_id);
        // $user->is_role  = 0;  //0 - Employees
        // $user->save();
        return redirect('admin/employees')->with('success', 'Employee Successfully Updated');
    }
}
