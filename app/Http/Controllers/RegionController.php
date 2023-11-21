<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = Region::getRecord($request);
        return view('backend.regions.list',$data);
    }
    public function add(Request $request)
    {
        return view('backend.regions.add');
    }
    public function add_post(Request $request)
    {
        $user = request()->validate([
            'region_name' => 'required',
        ]);

        $user  = new Region;
        $user->region_name  = trim($request->region_name);
        $user->save();

        return redirect('admin/regions')->with('success', 'Region Successfully Created.');
    }
    public function edit($id)
    {
        $data['getRecord'] = Region::find($id);
        return view('backend.regions.edit', $data);
    }
    public function update(Request $request,$id)
    {
        $user = $request->validate([
            'region_name' => 'required',
        ]);
        $user = Region::find($id);
        $user->region_name  = trim($request->region_name);
        $user->save();
        return redirect('admin/regions')->with('success', 'Region Successfully Updated');
    }
    public function delete($id)
    {
        $user = Region::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Region not found');
        }

        $user->delete();

        return redirect()->back()->with('error', 'Region Successfully Deleted');
    }
}
