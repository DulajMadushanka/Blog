<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function update(Request $request, $id)
    {
       
        $categories = new Category();
        $categories->name = $request->input('name');
        $categories->slug = str_slug($request->input('name'));
        $data = array(
            'name'=>$categories->name,
            'slug'=>$categories->slug
        );
 
        Category::where('id',$id)->update($data);
        $categories->update($data);
        //Toastr::success('Tag Successfully Updated :','success');
        return redirect()->route('admin.category.index');
    }

    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin.category.edit',['categories'=>$categories]);
    }

    public function delete($id){
        Category::where('id',$id)->delete();
        return redirect()->route('admin.category.index');
    }

    
}
