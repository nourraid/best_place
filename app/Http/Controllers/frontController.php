<?php

namespace App\Http\Controllers;

use App\Mail\email;
use App\Models\City;
use App\Models\Property;
use App\Models\Rating;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Mail;

class frontController extends Controller
{
    public function aboutUs(Request $request){
       $properties = Property::all() ;
       $users = User::all();
       $rates =  DB::table('ratings')->select('rating')->get()->toArray();
       $completed_properties =  DB::table('reservations')->where('state','Completed')->get();

       $waiting_properties =  DB::table('reservations')->where('state','waiting')->get();


        $ReserveProperty = Property::whereHas('reservations', function($q) {
            $q->select("property_id");
        })->pluck('id')->toArray();

        $notReserveProperty = Property::whereNotIn('id', $ReserveProperty)->pluck('id')->toArray();

        return view('front_site.about',compact('properties' , 'users' , 'rates' ,'completed_properties' , 'waiting_properties' , 'notReserveProperty'));
    }

    public function contactUs(Request $request){

        return view('front_site.contact');
    }

    public function home(Request $request){
        $types = Type::orderByDesc('created_at')->take(6)->get();

//        dd($types);
        return view('front_site.home', compact('types'));
    }

    public function send_question(Request $request){


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

//    public function show_home_types(Request $request){
//        $types = Type::orderByDesc('created_at')->limit(6);
//        dd($types);
//        return view('front_site.home', compact('types'));
//    }
}
