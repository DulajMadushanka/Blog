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

 

        $file = $request->file('image');
        $name = time().'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path('/uploads');
       
        
        $file->move($destinationPath, $name);
        $categories->image=$destinationPath;
        $categories->save();
        return redirect()->route('admin.category.index');
  
        
   }
}
