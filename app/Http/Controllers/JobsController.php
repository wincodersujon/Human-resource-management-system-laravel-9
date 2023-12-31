<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JobsExport;

class JobsController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = Jobs::getRecord($request);

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

        $user  = new Jobs;
        $user->job_title  = trim($request->job_title);
        $user->min_salary  = trim($request->min_salary);
        $user->max_salary  = trim($request->max_salary);
        $user->save();

        return redirect('admin/jobs/')->with('success', 'Job Successfully Created.');
    }
    public function view($id)
    {
        $data['getRecord'] = Jobs::find($id);
        return view('backend.jobs.view', $data);
    }
    public function edit($id)
    {
        $data['getRecord'] = Jobs::find($id);
        return view('backend.jobs.edit', $data);
    }
    public function update(Request $request,$id)
    {
        $user = $request->validate([
            'job_title' => 'required',
            'min_salary' => 'required',
            'max_salary' => 'required'
        ]);
        $user = jobs::find($id);
        $user->job_title  = trim($request->job_title);
        $user->min_salary  = trim($request->min_salary);
        $user->max_salary  = trim($request->max_salary);
        $user->save();
        return redirect('admin/jobs')->with('success', 'Job Successfully Updated');
    }
    public function delete($id)
    {
        $user = Jobs::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Job not found');
        }

        $user->delete();

        return redirect()->back()->with('error', 'Job Successfully Deleted');
    }

    public function jobs_export(Request $request)
    {
        return Excel::download(new JobsExport, 'jobs.xlsx');
    }
}
