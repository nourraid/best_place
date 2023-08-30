<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use App\Models\City;
use App\Models\Property;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class propertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::orderByDesc('created_at')->paginate(5);
        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $users = User::all();
        $cities = City::all();
        return view('admin.properties.add' , compact('types' , 'users' , 'cities'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = ['name' => 'required|max:25|min:4',
            'description' => 'required' ,
            'price' => 'required|numeric' ,
            'address' => 'required' ,
            'city_id' => 'required' ,
            'user_id' => 'required' ,
            'type_id' => 'required' ,
            'Certificate' => 'required' ,
            'imageName' => 'required'];

        $masseges = [
            'name.required' => 'name must be entered',
            'name.min' => 'name must be more than 4',
            'name.max' => 'name must less than 25',
            'description.required' => 'description must be entered',
            'price.required' => 'price must be entered',
            'price.numeric' => 'price must be number',
            'address.required' => 'address must be entered',
            'city_id.required' => 'city must be entered',
            'user_id.required' => 'user must be entered',
            'type_id.required' => 'type must be entered',
            'imageName.required' => 'image must be entered',
            'Certificate.required' => 'Certificate image must be entered',
        ];

        $validator = Validator::make($request->all(), $rules, $masseges);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $property = new Property();
        $property->name = $request->name;
        $property->description = $request->description;
        $property->price = $request->price;
        $property->address = $request->address;
        $property->city_id = $request->city_id;
        $property->user_id = $request->user_id;
        $property->type_id = $request->type_id;

        $property_image = $request->file('imageName');
        $file_name1 = $property->name . time() . '.' . $property_image->extension();
        $property_image->move('images/property/', $file_name1);
        $property->image = $file_name1;


        $property_Certificate_image = $request->file('Certificate');
        $file_name2 = $property->name . time() . '.' . $property_Certificate_image->extension();
        $property_Certificate_image->move('images/Certificate_of_ownership/', $file_name2);
        $property->Certificate_of_ownership = $file_name2;

        $property->state = 'waiting';
        $property->save();

        return redirect()->route('property.index')->with('success', 'property Added Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        $types = Type::all();
        $users = User::all();
        $cities = City::all();

        return view('admin.properties.edit', compact('property' , 'types' , 'users' , 'cities'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $rules = ['name' => 'required|max:25|min:4',
            'description' => 'required' ,
            'price' => 'required|numeric' ,
            'address' => 'required' ,
            'city_id' => 'required' ,
            'user_id' => 'required' ,
            'type_id' => 'required' ,
            'state' => 'required' ,
            ];

        $masseges = [
            'name.required' => 'name must be entered',
            'name.min' => 'name must be more than 4',
            'name.max' => 'name must less than 25',
            'description.required' => 'description must be entered',
            'price.required' => 'price must be entered',
            'price.numeric' => 'price must be number',
            'address.required' => 'address must be entered',
            'city_id.required' => 'city must be entered',
            'user_id.required' => 'user must be entered',
            'type_id.required' => 'type must be entered',
            'state.required' => 'state must be entered',
        ];

        $validator = Validator::make($request->all(), $rules, $masseges);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }


        $property->name = $request->name;
        $property->description = $request->description;
        $property->price = $request->price;
        $property->address = $request->address;
        $property->city_id = $request->city_id;
        $property->user_id = $request->user_id;
        $property->type_id = $request->type_id;
        $property->state = $request->state;


        if ($request->file('image_name') != null) {
            $property_image = $request->file('image_name');
            $file_name = $property->name . time() . '.' . $property_image->extension();
            $property_image->move('images/property/', $file_name);
            $property->image = $file_name;
        }


        $property->save();

        return redirect()->route('property.index')->with('success', 'Property Updated Successfully');;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('property.index')->with('success', 'Property Deleted Successfully');

    }
}
