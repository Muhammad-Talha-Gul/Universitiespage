<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\BlogCategory;
use Illuminate\Support\Facades\Redirect;

class BlogCategoryController extends Controller
{

    public function index()
    {
        $data = BlogCategory::OrderBy('id','DESC')->get();
        return view('admin.blog_category',['data'=>$data]);
    }


    public function create()
    {
        return view('admin.add_blog_category');
    }

    
    public function store(Request $request)
    {
        BlogCategory::create($request->all());
        return Redirect::route('blog-category.index');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $data = BlogCategory::find($id);
        return view('admin.edit_blog_category',['data'=>$data]); 
    }

   
    public function update(Request $request, $id)
    {   

        $cate = BlogCategory::find($id);
        $cate->update($request->all());
        return Redirect::route('blog-category.index');
    }

    
    public function destroy($id)
    {
        BlogCategory::destroy($id);
        return Redirect::route('blog-category.index');
    }
}
