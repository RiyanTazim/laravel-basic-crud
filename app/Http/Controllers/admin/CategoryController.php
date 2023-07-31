<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add(){
        return view('admin.category.add-category');
    }

    public function store(Request $request){
        $category = new Category();
        $category->name = $request->name;
        $category->desc = $request->desc;
        $category->save();
        return back()->with('notification', 'Category added successfully');
    }

    public function manage(){
        $categories = Category::get();
        return view('admin.category.manage-category', compact('categories'));
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit-category', compact('category'));
    }

    public function update(Request $request, $id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->desc = $request->desc;
        $category->save();
        return back()->with('notification', 'Category Updated Successfully');
    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return back()->with('notification', 'Category deleted Successfully');
    }
}
