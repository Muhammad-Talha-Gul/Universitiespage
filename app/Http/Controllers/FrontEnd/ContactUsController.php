<?php

namespace App\Http\Controllers\Frontend;

use App\ContactUsMessages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use Mail;
use DB;

class ContactUsController extends Controller
{
    public function index(){
        return view('frontend.contact_us');
    }

    public function messagePost(MessageRequest $request){


                $recaptcha_secret = '6LdLb9UpAAAAAEQEnc09YjdF45Rm1Ezje94_7AJZ';
    $recaptcha_response = $request['g-recaptcha-response'];

    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => $recaptcha_secret,
        'response' => $recaptcha_response
    );

    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success = json_decode($verify);

    if (!$captcha_success->success) {
         return response()->json(['success' => "Failed To verify recaptcha"]);
    }

     $contactusdetails = ContactUsMessages::create([
        'office_location' => $request->input('office_location'),
        'user_name' => $request->input('user_name'),
        'user_email' => $request->input('user_email'),
        'phone_number' => $request->input('phone_number'),
        'message' => $request->input('message'),
    ]);


     // pixel event start here


     $accessToken = 'EAANNLuLQNasBOZCZA3ldU6NZAgEIRF4IQCoNYdMVEeRbkqdF5Wzf7Xm1Hwpn7hr1M5CHPOa5fiLEKvZBi7IqD8kIh88o5D15rS9O752q9lf5qKaYTBoRdQ9PFlShIrayE1peqHTUZAUuj1vV8ZBHeD0262pLnsqDKwdOD5eaOLxLcGVj0R0ZByeiIIwv1yEo1PmWQZDZD';
    $pixelId = '707529750730580';

    $email = hash('sha256', $request->input('user_email')); 

    $userData = [
        'email' => $email
    ];

    $event = [
        'event_name' => 'Contact Us', 
        'event_time' => time(),
        'user_data' => $userData,
    ];

    $payload = [
        'data' => [$event],
    ];

    $jsonPayload = json_encode($payload);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v14.0/{$pixelId}/events?access_token={$accessToken}");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonPayload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
    ]);

    // Execute the request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Check for errors
    // if ($response === false) {
    //     echo 'cURL Error: ' . curl_error($ch);
    // } else {
    //     echo "Response Code: {$httpCode}\n";
    //     echo "Response: {$response}\n";
    // }

    curl_close($ch);


     // pixel event ends here


                       $studentEmail = $request->input('user_email');

        $details = [
            'studentEmail' => $studentEmail
        ];


        Mail::send('emails.thank_you', $details, function ($message) use ($studentEmail) {
            $message->from('noreply@universitiespage.com', 'Universities Page')
                    ->to($studentEmail)
                    ->subject('Universities Page');
        });


        if (Mail::failures()) {
            $emailSended = '0'; 
        } else {
            $emailSended = '1';  
        }

        DB::insert("UPDATE contact_us_messages SET `emailSended` = $emailSended WHERE id = '".$contactusdetails->id."'");
      

    return response()->json(['success' => 'Message sent successfully']);
    }
 public function getComments(){
    
 }
    
}
