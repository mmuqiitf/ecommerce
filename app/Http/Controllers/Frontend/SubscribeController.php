<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Admin\Newsletter;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function subscribe(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|min:3|email|unique:newsletters'
        ]);

        Newsletter::create([
            'email' => $request->email,
        ]);
        $notification = [
            'message'=>'Thanks for subscribe!',
            'alert-type'=>'success'
        ];
        return redirect()->back()->with($notification);
    }
}
