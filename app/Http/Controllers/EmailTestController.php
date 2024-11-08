<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
class EmailTestController extends Controller
{
    public function sendTestEmail()
{
    $to = 'talhagul70@gmail.com';
    $message = 'This is a test email from University Pages.';

    try {
        Mail::to($to)->send(new TestEmail($message));

        Log::info('Test email sent successfully to: ' . $to);
        return 'Test email sent successfully to ' . $to;
    } catch (\Exception $e) {
        Log::error('Error sending test email: ' . $e->getMessage());
        return 'Failed to send test email. Check log for details.';
    }
}
}
