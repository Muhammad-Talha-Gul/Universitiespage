<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\ContactUsMessages;
use App\Mail\SendUserEmail;

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

    public function replyMessage(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'reply' => 'required|string|max:1000',
        ]);

        try {
            $message = ContactUsMessages::findOrFail($request->id);
            $message->reply = $request->reply;
            $message->save();

            // Send email using Gmail SMTP
            $details = ['reply' => $request->reply];
            Mail::to('talhagul70@gmail.com')->send(new SendUserEmail($details));

            return redirect()->back()->with('success', 'Reply saved successfully.');
        } catch (\Exception $e) {
            // Log error or handle accordingly
            Log::error('Failed to save reply:', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to save reply: ' . $e->getMessage());
        }
    }
}
