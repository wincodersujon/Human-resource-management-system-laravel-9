<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Region;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CountriesExport;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = Country::getRecord($request);
        return view('backend.countries.list',$data);
    }
    public function add(Request $request)
    {
        $data['getRecord'] = Region::get();
        return view('backend.countries.add',$data);
    }
    public function add_post(Request $request)
    {
        $user = request()->validate([
            'country_name' => 'required',
            'regions_id' => 'required'
        ]);

        $user  = new Country;
        $user->country_name  = trim($request->country_name);
        $user->regions_id  = trim($request->regions_id);
        $user->save();

        return redirect('admin/countries')->with('success', 'Country Successfully Created.');
    }
    public function edit($id)
    {
        $data['getRecord'] = Country::find($id);
        $data['getRegion'] = Region::get();
        return view('backend.countries.edit', $data);
    }
    public function update(Request $request,$id)
    {
        $user = $request->validate([
            'country_name' => 'required',
            'regions_id' => 'required'
        ]);
        $user = Country::find($id);
        $user->country_name  = trim($request->country_name);
        $user->regions_id  = trim($request->regions_id);
        $user->save();
        return redirect('admin/countries')->with('success', 'Country Successfully Updated');
    }
    public function delete($id)
    {
        $user = Country::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Country not found');
        }

        $user->delete();

        return redirect()->back()->with('error', 'Country Successfully Deleted');
    }
    public function countries_export(Request $request)
    {
        return Excel::download(new CountriesExport, 'countries.xlsx');
    }
}
