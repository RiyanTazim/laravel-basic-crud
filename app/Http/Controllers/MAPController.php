<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class MAPController extends Controller
{
    public function index()
    {
        return view('admin.map.add');
    }

    

    public function manage(){
        $locations = Location::latest()->get();
        return view('admin.map.manage', compact('locations'));
    }

    public function location()
    {
        return view('admin.map.location');
    }

    public function store(Request $request)
    {
        
        // $latitude = $request->input('locationName');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        
        
        $location = new Location();
            $location->latitude = $latitude;
            $location->longitude = $longitude;
            // $location->locationName = $locationName;
            $location->save();
        
        // You can save this data to the database or process it as needed
        
        return redirect()->route('map.manage')->with('success', 'Location data saved.');
    }

    public function edit($id)
    {
        $location = Location::find($id);
        return view('admin.map.edit', compact('location'));
    }

    public function update(Request $request, $id){
        $location = Location::find($id);
        $location->locationName = $request->locationName;
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;
        
        $location->save();
        return redirect()->route('map.manage')->with('notification', 'Location has been Updated');
    }

    public function delete($id){
        $location = Location::find($id);
        
        $location->delete();
        return back()->with('notification', 'Location has been deleted');
    }
}
