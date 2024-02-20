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
        
        
        $count = $request->author;
        //echo count($count); exit;
        $ratingValue   = $request->ratingValue;
        $datePublished = $request->datePublished;
        $author        = $request->author;
        $publisherName = $request->publisherName;
        $reviewerName  = $request->reviewerName;
        $reviewBody    = $request->reviewBody;
        
        $coutnReview = 0;
        $reviewArray   = array();
        
        for ($i = 0; $i < count($count); $i++) 
        {
            $array= [];
            $coutnReview += $ratingValue[$i];
            $array['ratingValue']    = $ratingValue[$i];
            $array['datePublished']  = $datePublished[$i];
            $array['author']         = $author[$i];
            $array['publisherName']  = $publisherName[$i];
            $array['reviewerName']   = $reviewerName[$i];
            $array['reviewBody']     = $reviewBody[$i];
            array_push($reviewArray,$array);
        } 
        
        // calculate average review
        $averageReview1 = ($coutnReview/count($count));
        $averageReview = ($averageReview1 > 0)? $averageReview1 :0;
        $ratingCount = count($count);
        $reviewCount = $ratingCount;
        
        $data = $request->all();
        $data['seo'] = ($request->has('seo'))?json_encode($request->seo):null;
        $data['is_active'] = ($request->has('is_active'))?1:0;
        $data['user_id'] = auth()->user()->id;
        $data['sm_question'] = ($request->has('sm_question'))?json_encode($request->sm_question):null;
        $data['sm_answer'] = ($request->has('sm_answer'))?json_encode($request->sm_answer):null;
        $data['review_detail']      = json_encode($reviewArray);
        $data['rating_count']     = $ratingCount; 
        $data['review_count']     = $reviewCount;
        $data['avg_review_value'] = $averageReview;
        Guide::create($data);
        createSiteMap();
        return Redirect::route('guide.index');
    }
    
    public function edit($id) {
        $data = Guide::find($id);
        return view('admin.edit_guide',['data' => $data]); 
    }

    public function update(Request $request,$id) {
        
        $count = $request->author;
        //echo count($count); exit;
        $ratingValue   = $request->ratingValue;
        $datePublished = $request->datePublished;
        $author        = $request->author;
        $publisherName = $request->publisherName;
        $reviewerName  = $request->reviewerName;
        $reviewBody    = $request->reviewBody;
        
        $coutnReview = 0;
        $reviewArray   = array();
        
        if(!empty($count)) {
        
        for ($i = 0; $i < count($count); $i++) 
        {
            $array= [];
            $coutnReview += $ratingValue[$i];
            $array['ratingValue']    = $ratingValue[$i];
            $array['datePublished']  = $datePublished[$i];
            $array['author']         = $author[$i];
            $array['publisherName']  = $publisherName[$i];
            $array['reviewerName']   = $reviewerName[$i];
            $array['reviewBody']     = $reviewBody[$i];
            array_push($reviewArray,$array);
        } 
        
        // calculate average review
        $averageReview1 = ($coutnReview/count($count));
        $averageReview = ($averageReview1 > 0)? $averageReview1 :0;
        $ratingCount = count($count);
        $reviewCount = $ratingCount;
        
        } else {
            
            // calculate average review
        $averageReview1 = 0;
        $averageReview = 0;
        $ratingCount = 0;
        $reviewCount = 0;
            
            
        }
        
        
        
        $data = $request->all();
        $data['seo'] = ($request->has('seo'))?json_encode($request->seo):null;
        $data['is_active'] = ($request->has('is_active'))?1:0;
        $data['sm_question'] = ($request->has('sm_question'))?json_encode($request->sm_question):null;
        $data['sm_answer'] = ($request->has('sm_answer'))?json_encode($request->sm_answer):null;
        $data['review_detail']    = json_encode($reviewArray);
        $data['rating_count']     = $ratingCount; 
        $data['review_count']     = $reviewCount;
        $data['avg_review_value'] = $averageReview;
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
