<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;


class ImageController extends Controller
{
    public function images(){
        return view("admin/category/create");
    }
   public function image(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:categories',
        
        ]);
        $categories = new Category();
        $categories->name=$request->name;
        $categories->slug=str_slug($request->name);

 

        if ($request->hasFile('image')) {
            $photo = $request->file('image')->getClientOriginalName();
            $destination = public_path() . '/uploads/';  
            $request->file('image')->move($destination, $photo);  
        }
        $categories->image=$photo;
        $categories->save();
        return redirect()->route('admin.category.index');
  
        
   }
}
