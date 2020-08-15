<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Model\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
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
        $post_cat = PostCategory::all();
        return view('admin.post-cat.index', compact('post_cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required|min:3',
            'category_name_id' => 'required|min:3'
        ]);
        PostCategory::create([
            'category_name_en' => $request->category_name_en,
            'category_name_id' => $request->category_name_id,
        ]);
        $notification = [
            'message'=>'Post Category Added!',
            'alert-type'=>'success'
        ];
        return redirect()->back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post_cat = PostCategory::find($id);
        return view('admin.post-cat.edit', compact('post_cat'));
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
        $request->validate([
            'category_name_en' => 'required|min:3',
            'category_name_id' => 'required|min:3'
        ]);
        PostCategory::where('id', $id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_id' => $request->category_name_id,
        ]);
        $notification = [
            'message'=>'Post Category Edited!',
            'alert-type'=>'success'
        ];
        return redirect()->route('admin.post-cat')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PostCategory::find($id)->delete();
        $notification = [
            'message'=>'Post Category Deleted!',
            'alert-type'=>'success'
        ];
        return redirect()->route('admin.post-cat')->with($notification);
    }
}
