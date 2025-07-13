<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function categoryCreate()
    {
        return view('backend.category.create');
    }

    public function createStore (Request $request)
    {
      $category = new Category();

      $category->name = $request->name;
      $category->slug = Str::slug($request->name);
      $category->img = $request->img;

      if(isset($request->img)){
        $imageName = rand().'-category-'.'.'.$request->img->extension();
        $request->img->move('backend/image/category/', $imageName);

        $category->img = $imageName;

      }

      $category->save();
    return redirect('/admin/category/list');
    }

    public function categoryList()
    {
      $categories = Category::all();
      return view('backend.category.list', compact('categories'));
    }

    public function categoryDelete ($id) 
     {
      $category = category::find($id);

if($category->img && file_exists('backend/image/category/'.$category->img)){
  unlink('backend/image/category/'.$category->img);
}

      $category->delete();
      return redirect()->back();
    }

    public function categoryEdit ($id)

    {
      $category = category::find($id);
      return view('backend.category.edit', compact('category'));
    }

     public function categoryUpdate (Request $request, $id)
     {
      $category = category::find($id);

      $category->name = $request->name;
      $category->slug = Str::slug($request->name);

      if(isset($request->img)){
        if($category->img && file_exists('backend/image/category/'.$category->img)){
  unlink('backend/image/category/'.$category->img);
      }

        $imageName = rand().'-category-'.'.'.$request->img->extension();
        $request->img->move('backend/image/category', $imageName);

        $category->img = $imageName;

      }

      $category->save();
      return redirect()->back();
      }
}
