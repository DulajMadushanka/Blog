<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscriber;

class SubscriberController extends Controller
{
    public function index(){
        $subscribers = Subscriber::latest()->get();
        return view('admin.subscriber',compact('subscribers'));
    }

    public function destroy(Request $request,$id){
       
       
        
       
        Subscriber::where('id',$id)->delete();
        $subscribers = Subscriber::latest()->get();
        return view('admin.subscriber',compact('subscribers'));
       
    }
}
