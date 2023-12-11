<?php

namespace App\Http\Controllers;
use App\Models\Location;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JobsExport;
use App\Exports\LocationsExport;
use App\Models\Country;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = Location::getRecord($request);

        return view('backend.locations.list',$data);
    }
    public function add()
    {
        $data['getCountries'] = Country::get();
        return view('backend.locations.add', $data);
    }
    public function add_post(Request $request)
    {
        $user = request()->validate([
            'street_address' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'state_provice' => 'required',
            'countries_id' => 'required',
        ]);

        $user  = new Location;
        $user->street_address  = trim($request->street_address);
        $user->postal_code  = trim($request->postal_code);
        $user->city  = trim($request->city);
        $user->state_provice  = trim($request->state_provice);
        $user->countries_id  = trim($request->countries_id);
        $user->save();

        return redirect('admin/locations/')->with('success', 'Location Successfully Created.');
    }
    public function edit($id)
    {
        $data['getRecord'] = Location::find($id);
        $data['getCountries'] = Country::get();
        return view('backend.locations.edit', $data);
    }
    public function update(Request $request,$id)
    {
        $user = Location::find($id);
        $user->street_address  = trim($request->street_address);
        $user->postal_code  = trim($request->postal_code);
        $user->city  = trim($request->city);
        $user->state_provice  = trim($request->state_provice);
        $user->countries_id  = trim($request->countries_id);
        $user->save();
        return redirect('admin/locations')->with('success', 'Location Successfully Updated');
    }
    public function delete($id)
    {
        $user = Location::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Location not found');
        }

        $user->delete();

        return redirect()->back()->with('error', 'Location Successfully Deleted');
    }
    public function locations_export(Request $request)
    {
        return Excel::download(new LocationsExport, 'locations.xlsx');
    }
}
