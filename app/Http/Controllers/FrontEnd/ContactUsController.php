<?php

namespace App\Http\Controllers\Frontend;

use App\ContactUsMessages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;

class ContactUsController extends Controller
{
    public function index(){
        return view('frontend.contact_us');
    }

    public function messagePost(MessageRequest $request){
       ContactUsMessages::Create([
        'message_reason' => $request['message_reason'],
        'user_name' => $request['user_name'],
        'user_email' => $request['user_email'],
        'message' => $request['message'],
       ]);
       return redirect()->back()->with('success', 'Message Sent Successfully');
    }

    
}
