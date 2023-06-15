<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class frontController extends Controller
{
    public function aboutUs(Request $request){
       $properties = Property::all() ;
       $users = User::all();
       $rates =  DB::table('ratings')->select('rating');
       $completed_properties =  DB::table('reservations')->where('state','Completed')->get();

        return view('front_site.about',compact('properties' , 'users' , 'rates' ,'completed_properties'));
    }

}
