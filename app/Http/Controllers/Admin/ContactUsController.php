<?php

namespace App\Http\Controllers\admin;

use App\ContactUs;
use App\ContactUsMessages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    public function getMessages()
    {
        $messages = ContactUsMessages::latest()->get();
        return view('admin.contact_us_message', compact('messages'));
    }
    public function messageDelete($id)
    {
        $message = ContactUsMessages::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('success', 'Message Delete Successfully');
    }
}
