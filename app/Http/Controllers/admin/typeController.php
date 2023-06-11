<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class typeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::orderByDesc('created_at')->paginate(5);
        return view('admin.types.index', compact('types'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = ['name' => 'required|max:25|min:4',
            'imageName' => 'required'];

        $masseges = [
            'name.required' => 'name must be entered',
            'name.min' => 'name must be more than 4',
            'name.max' => 'name must less than 25',
            'imageName.required' => 'image must be entered',
        ];

        $validator = Validator::make($request->all(), $rules, $masseges);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $type = new Type();
        $type->name = $request->name;

        $type_image = $request->file('imageName');
        $file_name = $type->name . time() . '.' . $type_image->extension();
        $type_image->move('images/type', $file_name);

        $type->imageName = $file_name;
        $type->save();

        return redirect()->route('type.index')->with('success', 'Type Added Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $rules = ['name' => 'required|max:25|min:4'];

        $masseges = [
            'name.required' => 'name must be entered',
            'name.min' => 'name must be more than 4',
            'name.max' => 'name must less than 25',
        ];

        $validator = Validator::make($request->all(), $rules, $masseges);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $type->name = $request->name;

        if ($request->file('image_name') != null) {
            $type_image = $request->file('image_name');
            $file_name = $type->name . time() . '.' . $type_image->extension();
            $type_image->move('images/type/', $file_name);
            $type->imageName = $file_name;
        }

        $type->save();

        return redirect()->route('type.index')->with('success', 'Type Updated Successfully');;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
//        $books = $category->books;
//
//        foreach ($books as $book) {
//            $b = Book::find($book->id);
//            $b->fav()->delete();
//        }
//
//        $category->books()->delete();

        $type->delete();
        return redirect()->route('type.index')->with('success', 'Type Deleted Successfully');

    }
}
