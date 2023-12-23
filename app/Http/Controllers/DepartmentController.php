<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Location;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = Department::getRecord($request);

        return view('backend.departments.list',$data);
    }
    public function add()
    {
        $data['getLocations'] = Location::get();
        return view('backend.departments.add', $data);
    }
    public function add_post(Request $request)
    {
        $user = request()->validate([
            'department_name' => 'required',
            'manager_id' => 'required',
            'location_id' => 'required',
        ]);

        $user  = new Department;
        $user->department_name  = trim($request->department_name);
        $user->manager_id  = trim($request->manager_id);
        $user->location_id  = trim($request->location_id);
        $user->save();

        return redirect('admin/departments')->with('success', 'Department Successfully Created.');
    }
    public function edit($id)
    {
        $data['getRecord'] = Department::find($id);
        // $data['getCountries'] = Country::get();
        return view('backend.departments.edit', $data);
    }
    public function update(Request $request,$id)
    {
        $user = Department::find($id);
        $user->street_address  = trim($request->street_address);
        $user->postal_code  = trim($request->postal_code);
        $user->city  = trim($request->city);
        $user->state_provice  = trim($request->state_provice);
        $user->countries_id  = trim($request->countries_id);
        $user->save();
        return redirect('admin/departments')->with('success', 'Department Successfully Updated');
    }
    public function delete($id)
    {
        $user = Department::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Department not found');
        }

        $user->delete();

        return redirect()->back()->with('error', 'Department Successfully Deleted');
    }
    // public function locations_export(Request $request)
    // {
    //     return Excel::download(new LocationsExport, 'locations.xlsx');
    // }
}
