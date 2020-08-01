<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Model\Admin\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
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
        $coupons = Coupon::all();
        return view('admin.coupon.index', compact('coupons'));
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
            'coupon' => 'required|min:3',
            'discount' => 'required|numeric'
        ]);

        Coupon::create([
            'coupon' => $request->coupon,
            'discount' => $request->discount
        ]);
        $notification = [
            'message'=>'Coupon Added!',
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
        $coupon = Coupon::where('id', $id)->first();
        return view('admin.coupon.edit', compact('coupon'));
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
            'coupon' => 'required|min:3',
            'discount' => 'required|numeric'
        ]);

        Coupon::where('id', $id)->update([
            'coupon' => $request->coupon,
            'discount' => $request->discount
        ]);
        $notification = [
            'message'=>'Coupon Edited!',
            'alert-type'=>'success'
        ];
        return redirect()->route('admin.coupons')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coupon::where('id', $id)->delete();
        $notification = [
            'message'=>'Coupon Deleted!',
            'alert-type'=>'success'
        ];
        return redirect()->route('admin.coupons')->with($notification);
    }
}
