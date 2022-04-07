<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;

class categorycontroller extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));

    }
    public function add()
    {
        return view('admin.category.add');

    }

    public function insert(Request $request)
    {
        $category = new category();
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category',$filename);
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == True ? '1':'0';
        $category->popular = $request->input('popular') == True ? '1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->save();
        return redirect('/dashboard')->with('status',"category adder successfull");

    }

    public function edit($id)
    {
        $category =  Category::find($id);
        return view('admin.category.edit', compact('category') );
    }
}
