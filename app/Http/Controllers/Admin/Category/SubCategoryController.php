<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::with(['category'])->get();
        $categories = Category::all();
        return view('admin.subcategory.index', compact('subcategories', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'subcategory_name' => 'required|min:3|max:255',
            'category_id' => 'required|numeric'
        ]);
        Subcategory::create([
            'subcategory_name' => $request->subcategory_name,
            'category_id' => $request->category_id
        ]);
        $notification = [
            'message'=>'Subcategory Added!',
            'alert-type'=>'success'
        ];
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = Subcategory::with(['category'])->where('id', $id)->first();
        $categories = Category::all();
        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'subcategory_name' => 'required|min:3|max:255',
            'category_id' => 'required|numeric'
        ]);
        Subcategory::where('id', $id)->update([
            'subcategory_name' => $request->subcategory_name,
            'category_id' => $request->category_id
        ]);
        $notification = [
            'message'=>'Subcategory Edited!',
            'alert-type'=>'success'
        ];
        return redirect()->route('subcategories')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subcategory::where('id', $id)->delete();
        $notification = [
            'message'=>'Subcategory Deleted!',
            'alert-type'=>'success'
        ];
        return redirect()->route('subcategories')->with($notification);
    }
}
