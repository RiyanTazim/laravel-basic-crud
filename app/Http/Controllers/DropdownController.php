<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function index()
    {
        $data['countries'] = Country::get(['name', 'id']);
        
        return view('admin.country.add',  $data);
    }
    
    // public Function state(Request $request)
    // {
    //     $data['states'] = State::where('country_id', $request->country_id)->get(['name', 'id']);
    //     return response()->json($data);
    // }
    
    // public Function city(Request $request)
    // {
    //     $data['cities'] = City::where('state_id', $request->state_id)->get(['name', 'id']);
    //     return response()->json($data);
    // }

    ////////// dependancy dropdown /////////////
    // getSubcategory
    public function state($country_id)
    {
        $html = '';
        $data = State::where('country_id', $country_id)->get();

        $html .= '<option selected>Select state</option>';
        foreach ($data as $data) {
            $html .= '<option value="' . $data->id . '">' . $data->name . '</option>';
        }
        return response()->json($html);
    }

    public function city($state_id)
    {
        $html = '';
        $data = City::where('state_id', $state_id)->get();

        $html .= '<option selected>Select state</option>';
        foreach ($data as $data) {
            $html .= '<option value="' . $data->id . '">' . $data->name . '</option>';
        }
        return response()->json($html);
    }
}
