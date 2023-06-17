<?php

namespace App\Http\Controllers;

use App\Mail\email;
use App\Models\Author;
use App\Models\Book;
use App\Models\City;
use App\Models\Property;
use App\Models\Rating;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Mail;

class frontController extends Controller
{
    public function aboutUs(Request $request)
    {
        $properties = Property::all();
        $users = User::all();
        $rates = DB::table('ratings')->select('rating')->get()->toArray();
        $completed_properties = DB::table('reservations')->where('state', 'Completed')->get();

        $waiting_properties = DB::table('reservations')->where('state', 'waiting')->get();


        $ReserveProperty = Property::whereHas('reservations', function ($q) {
            $q->select("property_id");
        })->pluck('id')->toArray();

        $notReserveProperty = Property::whereNotIn('id', $ReserveProperty)->pluck('id')->toArray();

        return view('front_site.about', compact('properties', 'users', 'rates', 'completed_properties', 'waiting_properties', 'notReserveProperty'));
    }

    public function contactUs(Request $request)
    {

        return view('front_site.contact');
    }

    public function home(Request $request)
    {
        $types = Type::orderByDesc('created_at')->take(6)->get();
        $properties = Property::orderByDesc('created_at')->take(6)->get();

        return view('front_site.home', compact('properties', 'types'));
    }

    public function send_question(Request $request)
    {


        $rules = [
            'name' => 'required|max:25|min:4',
            'subject' => 'required',
            'email' => 'required',
            'phoneNumber' => 'required',
            'message' => 'required',
        ];

        $masseges = [
            'name.required' => 'name must be entered',
            'name.min' => 'name must be more than 3',
            'name.max' => 'name must less than 25',
            'subject.required' => 'subject must be entered',
            'email.required' => 'email must be entered',
            'phoneNumber.required' => 'phone Number must be entered',
            'message.required' => 'message must be entered',
        ];

        $validator = Validator::make($request->all(), $rules, $masseges);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $data = [
            'name' => $request->name,
            'subject' => $request->subject,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'message' => $request->message,
        ];

        Mail::to('nrayd633@gmail.com')->send(new email($data));


        return view('front_site.contact')->with('success', 'question sent Successfully');
    }

    public function typeProperties($id)
    {
        $type = Type::find($id);
        $properties = $type->properties;

        return view('front_site.properties_type', compact('type', 'properties'));
    }

    public function showAllProperties()
    {
        $properties = Property::all();
        return view('front_site.allProperties', compact('properties'));
    }

    public function show_property_details($id)
    {
        $property = Property::find($id);
        return view('front_site.property_details', compact('property'));
    }

    public function login()
    {
        return view('front_site.login');
    }

    public function register()
    {
        $cities = City::all();
        return view('front_site.register', compact(['cities']));
    }

    public function do_register(Request $request)
    {
        $rules = [
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'city_id' => 'required',
            'mobileNumber' => 'required',
            'userImage' => 'required',
        ];
        $masseges = [
            'fname.required' => 'first name must be Entered',
            'mname.required' => 'middle name must be Entered',
            'lname.required' => 'last name must be Entered',
            'email.required' => 'email must be Entered',
            'city_id.required' => 'city must be Entered',
            'password.required' => 'password must be Entered',
            'mobileNumber.required' => 'mobile number must be Entered',
            'userImage.required' => 'image must be entered'
        ];

        $validator = Validator::make($request->all(), $rules, $masseges);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $user = new User();
        $user->firstName = $request->fname;
        $user->middleName = $request->mname;
        $user->lastName = $request->lname;
        $user->email = $request->email;
        $user->city_id = $request->city_id;
        $user->mobile_number = $request->mobileNumber;
        $user->password = Hash::make($request->password);


        $user_image = $request->file('userImage');
        $file_name = $user->mobile_number . time() . '.' . $user_image->extension();
        $user_image->move('images/user', $file_name);
        $user->userImage = $file_name;

        $user->save();


        return redirect()->route('login');

    }

}
