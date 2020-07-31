<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
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
            'category_name' => 'required|unique:categories|min:3|max:191'
        ]);
        Category::create([
            'category_name' => $request->category_name
        ]);
        $notification = [
            'messege'=>'Category Added!',
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
        $category = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
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
            'category_name' => 'required|unique:categories|min:3|max:191'
        ]);
        $update = Category::where('id', $id)->update([
            'category_name' => $request->category_name
        ]);
        if($update){
            $notification = [
                'messege'=>'Category Edited!',
                'alert-type'=>'success'
            ];
            return redirect()->route('categories')->with($notification);
        }else{
            $notification = [
                'messege'=>'Category Edit Failed!',
                'alert-type'=>'danger'
            ];
            return redirect()->route('categories')->with($notification);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        $notification = [
            'messege'=>'Category Deleted!',
            'alert-type'=>'success'
        ];
        return redirect()->back()->with($notification);
    }
}
