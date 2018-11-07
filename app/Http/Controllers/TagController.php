<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function update(Request $request, $id)
    {
        //$tag = Tag::find($id);
        $tags = new Tag;
        $tags->name = $request->input('name');
        $tags->slug = str_slug($request->input('name'));
        $data = array(
            'name'=>$tags->name,
            'slug'=>$tags->slug
        );
 
        Tag::where('id',$id)->update($data);
        $tags->update($data);
        //Toastr::success('Tag Successfully Updated :','success');
        return redirect()->route('admin.tag.index');
    }

    public function edit($id)
    {
        $tags = Tag::find($id);
        return view('admin.tag.edit',['tags'=>$tags]);
    }

    public function delete($id){
        Tag::where('id',$id)->delete();
        return redirect()->route('admin.tag.index');
    }
}
