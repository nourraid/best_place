<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class cityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::orderByDesc('created_at')->paginate(5);
        return view('admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cities.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = ['name' => 'required|max:25|min:4',
        ];

        $masseges = [
            'name.required' => 'name must be entered',
            'name.min' => 'name must be more than 3',
            'name.max' => 'name must less than 25',
        ];

        $validator = Validator::make($request->all(), $rules, $masseges);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $city = new City();
        $city->name = $request->name;

        $city->save();

        return redirect()->route('city.index')->with('success', 'City Added Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $rules = ['name' => 'required|max:25|min:4'];

        $masseges = [
            'name.required' => 'name must be entered',
            'name.min' => 'name must be more than 3',
            'name.max' => 'name must less than 25',
        ];

        $validator = Validator::make($request->all(), $rules, $masseges);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $city->name = $request->name;

        $city->save();

        return redirect()->route('city.index')->with('success', 'City Updated Successfully');;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {

        $users = $city->users;

        if ($users->isEmpty()){
            $city->delete();
            return redirect()->route('city.index')->with('success', 'City Deleted Successfully');
        }else{
            return redirect()->route('city.index')->with('warning', 'City can not be deleted');

        }


    }
}
