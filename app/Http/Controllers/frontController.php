<?php

namespace App\Http\Controllers;

use App\Mail\email;
use App\Models\Author;
use App\Models\Book;
use App\Models\City;
use App\Models\Favorite;
use App\Models\Property;
use App\Models\Rating;
use App\Models\Reservation;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Mail;
use function PHPUnit\Framework\isEmpty;

class frontController extends Controller
{

    public function aboutUs(Request $request)
    {

        $properties = Property::where('state', '=', 'accept')->get();
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
        $properties = Property::where('state', '=', 'accept')->orderByDesc('created_at')->take(6)->get();

//        $properties = Property::orderByDesc('created_at')->take(6)->get();

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
        $properties = $type->properties->where('state', '=', 'accept');

        return view('front_site.properties_type', compact('type', 'properties'));
    }

    public function showAllProperties()
    {
        $properties = Property::where('state', '=', 'accept')->get();

//        $properties = Property::all();
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

    public function add_fav(Request $request)
    {
        $property_id = $request->property_id;
        $user_id = $request->user_id;
        $favorite = DB::table('favorites')->where('property_id', $property_id)->Where('user_id', $user_id)->get();
        if (count($favorite) > 0) {
            return redirect()->route('property_details', $property_id)->with('error', 'property already favorite');
        }
        $fav = new Favorite();
        $fav->property_id = $property_id;
        $fav->user_id = $user_id;
        $fav->save();
        return redirect()->route('property_details', $property_id)->with('success', 'Property added To Favorite Successfully');
    }

    public function delete_fav(Request $request)
    {
        Favorite::find($request->fav_id)->delete();
        return redirect()->route('profile')->with('success', 'property removed from favorite successfully');
    }

    public function delete_my_request(Request $request)
    {
        Reservation::find($request->res_id)->delete();
        return redirect()->route('profile')->with('success', 'request removed successfully');
    }

    public function delete_my_property(Request $request)
    {

        $property = Property::find($request->property_id);
        $property->fav()->delete();
        $property->reservations()->delete();
        $property->delete();

        return redirect()->route('profile')->with('success', 'property removed successfully');
    }


    public function reserve(Request $request)
    {
        $property_id = $request->property_id;
        $user_id = $request->user_id;
        $favorite = DB::table('reservations')->where('property_id', $property_id)->Where('user_id', $user_id)->get();
        if (count($favorite) > 0) {
            return redirect()->route('property_details', $property_id)->with('error', 'property already reserved');
        }
        $reserve = new Reservation();
        $reserve->property_id = $property_id;
        $reserve->user_id = $user_id;
        $reserve->state = 'waiting';

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';

        for ($i = 0; $i < 6; $i++) {
            $index = random_int(0, strlen($characters) - 1);
            $code .= $characters[$index];
        }

        $reserve->reservation_code = $code;

        $reserve->save();
        return redirect()->route('property_details', $property_id)->with('success', 'Property reserved Successfully');
    }

    public function profile()
    {
        $id = Auth::id();
        $user = User::find($id);
        $favorites = $user->fav;
        $reservations = $user->reservations;
        $properties = $user->properties;

        return view('front_site.profile', compact('user', 'favorites', 'reservations', 'properties'));
    }

    public function add_property()
    {
        $id = Auth::id();
        $cities = City::all();
        $types = Type::all();
        $user = User::find($id);
        $favorites = $user->fav;
        $reservations = $user->reservations;
        $properties = $user->properties;

        return view('front_site.add_property', compact('user', 'types', 'cities', 'favorites', 'reservations', 'properties'));
    }

    public function do_add_property(Request $request)
    {
        $rules = ['name' => 'required|max:25|min:4',
            'description' => 'required',
            'price' => 'required|numeric',
            'address' => 'required',
            'city_id' => 'required',
            'type_id' => 'required',
            'Certificate' => 'required',
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
        $property->user_id = Auth::user()->id;
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

        return redirect()->route('profile')->with('success', 'property Added Successfully');

    }


    public function property_reservations($id)
    {
        $property = Property::find($id);
        $property_reservations = $property->reservations;
        return view('front_site.property_reservations', compact('property', 'property_reservations'));
    }

    public function search()
    {
        $types = Type::all();
        $cities = City::all();

        return view('front_site.search', compact('types', 'cities'));
    }


    public function do_search(Request $request)
    {
        $min_price = $request->minPrice;
        $max_price = $request->maxPrice;
        $properties = DB::table('properties')->where('name', 'like', '%' . $request->name . '%')->where('state' , '=' , 'accept')->orWhere('city_id', $request->city_id)->orWhere('type_id', $request->type_id)->whereBetween('price', [$min_price, $max_price])->get();

        return view('front_site.allProperties', compact('request', 'properties'));

//        if (!isEmpty($request)->count()) {
//
//        $min_price = $request->minPrice;
//        $max_price = $request->maxPrice;
//        $properties = DB::table('properties')->where('name', 'like', '%' . $request->name . '%')->where('state', '=', 'accept')->orWhere('city_id', $request->city_id)->orWhere('type_id', $request->type_id)->whereBetween('price', [$min_price, $max_price])->get();
//
//        return view('front_site.allProperties', compact('request', 'properties'));
//
//        } else {
//            return redirect()->back()->with('error', 'no data set?!');
//
//        }
    }

    public function user_authenticate(Request $request)
    {
        $login_data = ['email' => $request->email, 'password' => $request->password];
        if (Auth::guard('web')->attempt($login_data)) {
            return redirect()->route('home');
//            return redirect()->route('profile' , Auth::user());
        }
        return redirect()->back()->with('error', 'invalid username or password');
    }

    public function user_logout()
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
            return view('front_site.login');

        }
    }

    public function user_reset($id)
    {
        return view('front_site.edite_password', compact('id'));
    }

    public function user_do_reset(Request $request, $id)
    {
        $user = User::find($id);

        $rules = [
            'password' => 'required|confirmed',
            'old_password' => 'required',
        ];

        $masseges = [
            'old_password.required' => 'password must be entered',
            'password.required' => 'password must be entered',
            'password.confirmed' => 'password must be matched',
        ];

        $validator = Validator::make($request->all(), $rules, $masseges);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('profile', $user)->with('success', 'Reset Password Admin Successfully');;
        } else {
            return redirect()->back()->withErrors('incorrect old password');
        }

    }

    public function user_change($id)
    {
        $user = User::find($id);
        $cities = City::all();
        return view('front_site.edite_profile', compact('user', 'cities'));
    }

    public function user_do_change(Request $request, $id)
    {
        $user = User::find($id);
        $rules = [
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'city_id' => 'required',
            'mobileNumber' => 'required',
        ];
        $masseges = [
            'fname.required' => 'first name must be Entered',
            'mname.required' => 'middle name must be Entered',
            'lname.required' => 'last name must be Entered',
            'email.required' => 'email must be Entered',
            'city_id.required' => 'city must be Entered',
            'mobileNumber.required' => 'mobile number must be Entered',
        ];

        $validator = Validator::make($request->all(), $rules, $masseges);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $user->firstName = $request->fname;
        $user->middleName = $request->mname;
        $user->lastName = $request->lname;
        $user->email = $request->email;
        $user->city_id = $request->city_id;
        $user->mobile_number = $request->mobileNumber;


        if ($request->file('userImage') != null) {
            $ext = $request->file('userImage')->extension();
//            dd($ext);
            // || $ext != 'jpeg' || $ext != 'jfif' || $ext != 'pjpeg' || $ext != 'pjp' || $ext != 'png' || $ext != 'webp'
            if ($ext != 'jpg') {
                return redirect()->back()->with('error', 'your image must be image type !?');
            }
            $user_image = $request->file('userImage');
            $file_name = $user->phoneNumber . time() . '.' . $user_image->extension();
            $user_image->move('images/user', $file_name);
            $user->userImage = $file_name;
        }

        $user->save();

        return redirect()->route('profile', $user)->with('success', 'your information Updated Successfully');

    }

    public function reject($id)
    {
        $user = Auth::user();
        $reservation = Reservation::find($id);
        $reservation->state = 'rejected';
        $reservation->save();

        return redirect()->back()->with('success', 'reject request Successfully');

//        return redirect()->route('profile', $user)->with('success', 'your information Updated Successfully');

    }

    public function accept($id)
    {
        $user = Auth::user();
        $reservation = Reservation::find($id);
        $reservation->state = 'accepted';
        $reservation->save();
        return redirect()->back()->with('success', 'accept request Successfully');

//        return redirect()->route('profile', $user)->with('success', 'your information Updated Successfully');

    }

    public function user_login(Request $request)
    {

        if (Auth::user()) {
            return redirect()->route('home');
        } else {
            return view('front_site.login');
        }
    }
}
