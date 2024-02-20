<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Model\Blog;
use App\Model\PostsComments;
use Auth;

class BlogController extends Controller
{
    public function index() {
        $data = Blog::OrderBy('id','DESC')->get();
        if(Auth::user()->user_type=='blog_author') {
            $data = $data->where('user_id',Auth::user()->id);
        }
        return view('admin.blogs',['data'=>$data]);
    }

    public function create() {
        return view('admin.add_blog');
    }

    public function store(Request $request) {
        Blog::creator($request);
        createSiteMap();
        return Redirect::route('blog.index');
    }
    
    public function edit($id) {
        $data = Blog::find($id);
        return view('admin.edit_blog',['data'=>$data]); 
    }

    public function update(Request $request,$id) {
        Blog::updator($id,$request);
        createSiteMap();
        return Redirect::route('blog.index');
    }

    public function destroy($id) {
        $type = Blog::find($id);
        $type->delete();
        createSiteMap();
        return Redirect::route('blog.index');
    }

    public function post_comment(){
        $data = PostsComments::with('has_post')->OrderBy('id','DESC')->get();
        return view('admin.post_comment',['data'=>$data]);
    }

    public function view_comment($id){
        $data = PostsComments::where("id", $id)->with('has_post')->OrderBy('id','DESC')->first();
        return view('admin.view_comment',['data'=>$data]);
    }

    public function comment_approve(Request $request){
        $post = PostsComments::find($request->id);
        if($post['is_active']=='1') {
            $post->update(['is_active'=>0]);
        } else {
            $post->update(['is_active'=>1]);
        }
        return response()->json("success");
    }

    public function blogFeatured(Request $request){
        $post = Blog::find($request->id);
        if($post['is_featured']=='1') {
            $post->update(['is_featured'=>0]);
        } else {
            $post->update(['is_featured'=>1]);
        }
        return response()->json("success");
    }

    public function delete_comment($id){
        PostsComments::destroy($id);
        return Redirect::route('show_comment');
    }
}