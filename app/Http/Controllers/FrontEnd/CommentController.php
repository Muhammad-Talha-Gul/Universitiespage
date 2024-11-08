<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Model\Comment;
use App\Model\Reply;

class CommentController extends Controller
{
    public function commentStore(CommentRequest $request){
        Comment::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'comment' => $request->input('comment'),
            'article_id' => $request->input('article_id'),
            'article_url' => $request->input('article_url'),
        ]);
        $blogId = $request->input('article_id');

        $comments = Comment::with(['replies' => function ($query) {
            $query->where('status', '1');
        }])
        ->where('article_id', $blogId)
        ->where('status', '1') // Ensure only comments with status '1' are retrieved
        ->orderBy('created_at', 'desc')
        ->get();
        
        return response()->json(['success' => 'Comments and Replies Retrieved Successfully', 'Comments' => $comments]);
        
        
    }

    public function commentReply(Request $request){
        Reply::create([
            'parent_comment_id' => $request->input('parent_comment_id'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'comment' => $request->input('comment'),
            'article_id' => $request->input('article_id'),
        ]);
        $blogId = $request->input('article_id');

        $comments = Comment::with(['replies' => function ($query) {
            $query->where('status', '1');
        }])
        ->where('article_id', $blogId)
        ->where('status', '1') // Ensure only comments with status '1' are retrieved
        ->orderBy('created_at', 'desc')
        ->get();
        
        return response()->json(['success' => 'Comments and Replies Retrieved Successfully', 'Comments' => $comments]);
        
    }
    
    
    
}
