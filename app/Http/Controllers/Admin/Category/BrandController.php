<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Model\Admin\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
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
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
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
            'brand_name' => 'required|unique:brands|min:2|max:191'
        ]);
        $logo = $request->file('brand_logo');
        if($logo){
            $logo_name = date('dmy_H_s_i');
            $ext = strtolower($logo->getClientOriginalExtension());
            $logo_name = $logo_name . '.' .$ext;
            $upload_path = 'public/media/brand/';
            $img_url = $upload_path . $logo_name;
            $success = $logo->move($upload_path, $logo_name);
            Brand::create([
                'brand_name' => $request->brand_name,
                'brand_logo' => $img_url
            ]);
            $notification = [
                'message'=>'Brand Added!',
                'alert-type'=>'success'
            ];
            return redirect()->back()->with($notification);
        }else{
            $notification = [
                'message'=>'It\'s done ',
                'alert-type'=>'success'
            ];
            return redirect()->back()->with($notification);

        }
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
        $brand = Brand::where('id', $id)->first();
        return view('admin.brand.edit', compact('brand'));
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
            'brand_name' => 'required|min:2|max:191'
        ]);
        $current_logo = $request->current_logo;
        $logo = $request->file('brand_logo');
        if($logo){
            unlink($current_logo);
            $logo_name = date('dmy_H_s_i');
            $ext = strtolower($logo->getClientOriginalExtension());
            $logo_name = $logo_name . '.' .$ext;
            $upload_path = 'public/media/brand/';
            $img_url = $upload_path . $logo_name;
            $success = $logo->move($upload_path, $logo_name);
            Brand::where('id', $id)->update([
                'brand_name' => $request->brand_name,
                'brand_logo' => $img_url
            ]);
            $notification = [
                'message'=>'Brand Edited!',
                'alert-type'=>'success'
            ];
            return redirect()->route('brands')->with($notification);
        }else{
            Brand::where('id', $id)->update([
                'brand_name' => $request->brand_name,
            ]);
            $notification = [
                'message'=>'Brand Name Edited!',
                'alert-type'=>'success'
            ];
            return redirect()->route('brands')->with($notification);

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
        $brand = Brand::where('id', $id);
        $image = $brand->first()->brand_logo;
        unlink($image);
        $brand->delete();
        $notification = [
            'message'=>'Brand Deleted!',
            'alert-type'=>'success'
        ];
        return redirect()->back()->with($notification);
    }
}
