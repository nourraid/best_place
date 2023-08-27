<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderByDesc('id')->paginate(5);
        return view('admin.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
    public function register()
    {
        $cities = City::all();
        return view('front_site.register', compact(['cities']));
    }
    public function user_register(Request $request)
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
