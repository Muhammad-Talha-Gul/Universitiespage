<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Model\Guide;
use App\Model\Subject;
use App\Model\PostsComments;
use Auth;

class GuideController extends Controller
{
    public function index() {
        $data = Guide::OrderBy('id','DESC')->get();
        return view('admin.guides',['data'=>$data]);
    }

    public function create() {
        return view('admin.add_guide');
    }

    public function store(Request $request) {
        $data = $request->all();
        $data['seo'] = ($request->has('seo'))?json_encode($request->seo):null;
        $data['is_active'] = ($request->has('is_active'))?1:0;
        $data['user_id'] = auth()->user()->id;
        Guide::create($data);
        createSiteMap();
        return Redirect::route('guide.index');
    }
    
    public function edit($id) {
        $data = Guide::find($id);
        return view('admin.edit_guide',['data' => $data]); 
    }

    public function update(Request $request,$id) {
        $data = $request->all();
        $data['seo'] = ($request->has('seo'))?json_encode($request->seo):null;
        $data['is_active'] = ($request->has('is_active'))?1:0;
        Guide::find($id)->update($data);
        createSiteMap();
        return Redirect::route('guide.index');
    }

    public function destroy($id) {
        $type = Guide::find($id);
        $type->delete();
        createSiteMap();
        return Redirect::route('guide.index');
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

    public function guideFeatured(Request $request){
        $post = Guide::find($request->id);
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
