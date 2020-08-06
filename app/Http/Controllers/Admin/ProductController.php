<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Product;
use App\Model\Subcategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ProductController extends Controller
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
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'brands'));
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
            'product_code' => 'required|min:3|max:12',
            'product_name' => 'required|min:3|max:191',
            'product_qty' => 'required|numeric',
            'product_description' => 'required|min:10',
            'product_size' => 'required',
            'product_color' => 'required',
            'category_id' => 'required|numeric',
            'subcategory_id' => 'nullable|numeric',
            'brand_id' => 'nullable|numeric',
            'normal_price' => 'required|numeric',
            'video_link' => 'nullable|min:10',
            'main_slider' => 'nullable|numeric',
            'hot_deal' => 'nullable|numeric',
            'best_rated' => 'nullable|numeric',
            'mid_slider' => 'nullable|numeric',
            'hot_new' => 'nullable|numeric',
            'trend' => 'nullable|numeric',
            'status' => 'nullable|numeric',
            'image_one' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'image_two' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'image_three' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        $image_one = $request->image_one->getClientOriginalName();
        $one_flname = Str::slug(pathinfo($image_one, PATHINFO_FILENAME) . '-' . uniqid()) .'.'. $request->image_one->getClientOriginalExtension();
        $image_two = $request->image_two->getClientOriginalName();
        $two_flname = Str::slug(pathinfo($image_two, PATHINFO_FILENAME) . '-' .uniqid()) .'.'. $request->image_two->getClientOriginalExtension();
        $image_three = $request->image_three->getClientOriginalName();
        $three_flname = Str::slug(pathinfo($image_three, PATHINFO_FILENAME) . '-' . uniqid()) .'.'. $request->image_three->getClientOriginalExtension();
        if($image_one && $image_two && $image_three){
            Image::make($request->image_one)->save(public_path('media/products/' . $one_flname));
            Image::make($request->image_two)->save(public_path('media/products/' . $two_flname));
            Image::make($request->image_three)->save(public_path('media/products/' . $three_flname));
            Product::create([
                'product_code' => $request->product_code,
                'product_name' => $request->product_name,
                'product_qty' => $request->product_qty,
                'product_description' => $request->product_description,
                'product_size' => $request->product_size,
                'product_color' => $request->product_color,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'brand_id' => $request->brand_id,
                'normal_price' => $request->normal_price,
                'video_link' => $request->video_link,
                'main_slider' => $request->main_slider,
                'hot_deal' => $request->hot_deal,
                'best_rated' => $request->best_rated,
                'mid_slider' => $request->mid_slider,
                'hot_new' => $request->hot_new,
                'trend' => $request->trend,
                'status' => 1,
                'image_one' => $one_flname,
                'image_two' => $two_flname,
                'image_three' => $three_flname,
            ]);
        }
        $notification = [
            'message' => 'Product '. $request->product_name .' Created!',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.products')->with($notification);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showSubCategory($category_id)
    {
        $subcategories = Subcategory::where('category_id', $category_id)->get();
        return json_encode($subcategories);
    }
}
