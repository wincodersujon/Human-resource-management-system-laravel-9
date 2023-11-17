<?php

namespace App\Http\Controllers;

use App\Models\JobsHistory;
use App\Models\Jobs;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JobsHistoryExport;

class JobsHistoryController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = JobsHistory::getRecord($request);
        return view('backend.job_history.list',$data);
    }
    public function add(Request $request)
    {
        $data['getEmployee'] = User::where('is_role','=', 0)->get();
        $data['getJobs'] = Jobs::get();
        return view('backend.job_history.add', $data);
    }
    public function add_post(Request $request)
    {
        $user = request()->validate([
            'employee_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'job_id' => 'required',
            'department_id' => 'required',
        ]);

        $user  = new JobsHistory;
        $user->employee_id  = trim($request->employee_id);
        $user->start_date  = trim($request->start_date);
        $user->end_date  = trim($request->end_date);
        $user->job_id  = trim($request->job_id);
        $user->department_id  = trim($request->department_id);
        $user->save();

        return redirect('admin/job_history')->with('success', 'Job Histry Successfully Created.');
    }
    public function edit($id)
    {
        $data['getEmployee'] = User::where('is_role','=', 0)->get();
        $data['getJobs'] = Jobs::get();
        $data['getRecord'] =JobsHistory::find($id);
        return view('backend.job_history.edit', $data);
    }
    public function update(Request $request,$id)
    {
        $user = JobsHistory::find($id);
        $user->employee_id  = trim($request->employee_id);
        $user->start_date  = trim($request->start_date);
        $user->end_date  = trim($request->end_date);
        $user->job_id  = trim($request->job_id);
        $user->department_id  = trim($request->department_id);
        $user->save();
        return redirect('admin/job_history')->with('success', 'Job History Successfully Updated');
    }
    public function delete($id)
    {
        $user = JobsHistory::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Job history not found');
        }

        $user->delete();

        return redirect()->back()->with('error', 'Job History Successfully Deleted');
    }
    public function job_history_export(Request $request)
    {
        return Excel::download(new JobsHistoryExport, 'job_history.xlsx');
    }
}
