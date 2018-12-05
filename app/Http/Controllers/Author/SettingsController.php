<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index(){
        return view('author.settings');
    }

    public function updateProfile(Request $request){
        $this->validate($request,[
            'name'=> 'required',
            'email'=>'required|email',
            'image'=>'required|image'
        ]);
        
        $slug = str_slug($request->name);
        $id = Auth::user()->id;
        
        if ($request->hasFile('image')) {
            $photo = $request->file('image')->getClientOriginalName();
            $destination = public_path() . '/uploads/';  
            $request->file('image')->move($destination, $photo);  
        }
        $user = new User();
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->about = $request->input('about');
        $data = array(
            'name' => $user->name,
            //'slug' => $slug,
            'email' => $user->email,
            'image' => $photo,
            'about' => $user->about
        );

        User::where('id',$id)->update($data);

        return redirect()->back();

    }

    public function updatePassword(Request $request){
        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password' 
        ]);
        
        $hashedPassword = Auth::user()->password;
//return $hashedPassword;




        if(Hash::check($request->old_password,$hashedPassword)){
          
            if(!Hash::check($request->password,$hashedPassword)){
                
                $id = Auth::user()->id;
                $user = new User();
                $user = User::find($id);
                $user->password = Hash::make($request->password);
               
                $data = array(
                'password' => $user->password
                );
                
                
                User::where('id',$id)->update($data);
                Auth::logout();
                return redirect()->route('author.settings');
            }
            else{
               
                //alert new password cannot be the same as old password
                return redirect()->back();
            }
        }
        else{
             //current password not match
            
             return redirect()->back();
        }
    }
}
