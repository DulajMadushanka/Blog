<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index',compact('categories'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:categories',
           
        ]);
        $categories = new Category();
        $categories->name=$request->name;
        $categories->slug=str_slug($request->name);
        $image = $request->input('image');
        $file = $request->input('image');

       
        $name = time().'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path('/uploads');
       

        $file->move($destinationPath, $name);
     
        $categories->save();
  
        return redirect()->route('admin.category.index');
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
        $categories = Category::find($id);
        return view('admin.category.edit',['categories'=>$categories]);
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
        
        $categories = new Category;
        $categories->name = $request->input('name');
        return $request->name;
        exit;
       
        $categories->slug = str_slug($request->input('name'));

        $file = $request->file('image');
        $name = time().'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path('/uploads');
        return $destinationPath;
        exit;
       
        
        $file->move($destinationPath, $name);
       
      
        $data = array(
            'name'=>$categories->name,
            'slug'=>$categories->slug,
            'image'=>$destinationPath
        );
 
        Category::where('id',$id)->update($data);
        $categories->update($data);
        //Toastr::success('Tag Successfully Updated :','success');
        return redirect()->route('admin.tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Category::where('id',$id)->delete();
        return redirect()->route('admin.tag.index');
    }
}
