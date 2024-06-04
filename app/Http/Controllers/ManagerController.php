<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ManagersExport;
class ManagerController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = Manager::getRecord($request);
        return view('backend.managers.list',$data);

        // return view('backend.managers.list', [
        //     'getRecord' => Manager::getRecord($request)
        // ]); This is another solution
    }
    public function add()
    {
        return view('backend.managers.add');
    }
    public function add_post(Request $request)
    {
        $user = request()->validate([
            'manager_name' => 'required|unique:managers',
            'manager_email' => 'required',
            'manager_mobile' => 'required',
        ]);

        $user  = new Manager;
        $user->manager_name  = trim($request->manager_name);
        $user->manager_email  = trim($request->manager_email);
        $user->manager_mobile  = trim($request->manager_mobile);
        $user->save();

        return redirect('admin/managers/')->with('success', 'Manager Successfully Created.');
    }
    public function edit($id)
    {
        $data['getRecord'] = Manager::find($id);
        return view('backend.managers.edit', $data);
    }
    public function update(Request $request,$id)
    {
        $user = Manager::find($id);
        $user->manager_name  = trim($request->manager_name);
        $user->manager_email  = trim($request->manager_email);
        $user->manager_mobile  = trim($request->manager_mobile);
        $user->save();
        return redirect('admin/managers')->with('success', 'Manager Successfully Updated');
    }
    public function delete($id)
    {
        $user =Manager::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Manager not found');
        }

        $user->delete();

        return redirect()->back()->with('error', 'Manager Successfully Deleted');
    }
    public function manager_export(Request $request)
    {
        return Excel::download(new ManagersExport, 'managers.xlsx');
    }
}
