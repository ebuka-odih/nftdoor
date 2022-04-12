<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::all();
        return view('admin.categories', compact('category'));
    }


    public function create()
    {
        return view('admin.add-category');
    }


    public function store(Request $request)
    {
        $request->validate([
                'title' => 'required',
                'slug' => 'nullable',
            ]
        );
//        if(Category::where('slug', '=', strtolower(implode('-',explode(' ',$request->title)))))
//        {
//            return redirect()->back()->with('failed', "Such Category already exist");
//        }
        $category = new Category();
        $category->title = $request->title;
        $category->slug = strtolower(implode('-',explode(' ',$request->title)));
        $category->save();
        return redirect()->route('admin.category.index');


    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('deleted', "Category Successfully Deleted");
    }
}
