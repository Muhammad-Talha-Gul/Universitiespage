<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Comment;
use App\Model\Reply;

class ArticleCommentsController extends Controller
{
    public function comments()
    {
        $comments = Comment::with('replies')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin.articel_comments', compact('comments'));
    }

    public function updateStatus($id, Request $request)
    {
        $status = $request->input('status');
    
        // Validate the status value if needed
        // Example: $request->validate(['status' => 'required|in:0,1']);
    
        // Update status in the database
        $comment = Comment::find($id);
        if ($comment) {
            $comment->status = $status;
            $comment->save();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Comment not found'], 404);
        }
    }
    
    public function replyUpdateStatus($id, Request $request)
    {
        $status = $request->input('status');
    
        // Validate the status value if needed
        // Example: $request->validate(['status' => 'required|in:0,1']);
    
        // Update status in the database
        $reply = Reply::find($id);
        if ($reply) {
            $reply->status = $status;
            $reply->save();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Reply not found'], 404);
        }
    }

    public function delete($id){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back()->with(['Success' => 'Comment Deleted Successfully']);
    }

    public function replyDelete($id){
        $reply = Reply::find($id);
        $reply->delete();
        return redirect()->back()->with(['Success' => 'Reply Deleted Successfully']);
    }
}
