<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplyOnlineRequest;
use Illuminate\Http\Request;
use App\OnlineConsultant;
use App\Permissions;
use App\User;// Assuming User is your Eloquent model
use Illuminate\Support\Facades\Auth;
use Mail;
use DB;

class ApplyOnlineController extends Controller
{
//     public function store(ApplyOnlineRequest $request)
//     {

//         $apply = new OnlineConsultant();
//         $apply->application_type = '2';
//         $apply->student_name = $request->input('student_name');
//         $apply->student_email = $request->input('student_email');
//         $apply->student_phone_number = $request->input('student_phone_number');
//         $apply->student_last_education = $request->input('student_last_education');
//         $apply->student_country = $request->input('selected_country_name');
//         $apply->student_state = $request->input('selected_state_name');
//         $apply->student_city = $request->input('city');
//         $apply->student_apply_for = $request->input('student_apply_for');
//         // File Upload Logic
//         if ($request->hasFile('student_passport_image')) {
//             $passportImage = $request->file('student_passport_image');
//             $passportImageName = time() . '_' . $passportImage->getClientOriginalName();
//             $passportImagePath = 'uploads/images/';
//             $passportImage->move(public_path($passportImagePath), $passportImageName);
//             $apply->student_passport_image = $passportImageName; // Store only the image name
//         }

//         // if ($request->hasFile('student_last_education_image')) {
//         //     $lastEducationImage = $request->file('student_last_education_image');
//         //     $lastEducationImageName = time() . '_' . $lastEducationImage->getClientOriginalName();
//         //     $lastEducationImagePath = 'uploads/images/';
//         //     $lastEducationImage->move(public_path($lastEducationImagePath), $lastEducationImageName);
//         //     $apply->student_last_education_image = $lastEducationImageName; // Store only the image name
//         // }

//         // Define an empty array to store image paths
//         $lastEducationImagePaths = [];

//         // File Upload Logic for Last Education Images
//         if ($request->hasFile('student_last_education_images')) {
//             foreach ($request->file('student_last_education_images') as $file) {
//                 // Generate a unique image name using timestamp and random characters
//                 $imageName = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
//                 $imagePath = 'uploads/images/';
//                 $file->move(public_path($imagePath), $imageName);
//                 $lastEducationImagePaths[] = $imageName; // Add image path to the array
//             }
//         }

// // Store only the array of image paths in the database
// $apply->student_last_education_image = json_encode($lastEducationImagePaths);



//         $apply->save();
//         $request->session()->flash('success', 'Form submitted successfully!');
//         return redirect()->back()->with('successDuration', 500);
//     }


public function store(ApplyOnlineRequest $request)
    {

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
            return redirect()->back()->with(['fail' => "Failed To Verify You Are Not Robot"]);
        }

        $apply = new OnlineConsultant();
        $apply->application_type = '2';
        $apply->student_name = $request->input('student_name');
        $apply->student_email = $request->input('student_email');
        $apply->student_phone_number = $request->input('student_phone_number');
        $apply->student_last_education = $request->input('student_last_education');
        $apply->student_country = $request->input('selected_country_name');
        $apply->student_state = $request->input('selected_state_name');
        $apply->student_city = $request->input('city');
        $apply->student_apply_for = $request->input('student_apply_for');
        // File Upload Logic
        if ($request->hasFile('student_passport_image')) {
            $passportImage = $request->file('student_passport_image');
            $passportImageName = time() . '_' . $passportImage->getClientOriginalName();
            $passportImagePath = 'uploads/images/';
            $passportImage->move(public_path($passportImagePath), $passportImageName);
            $apply->student_passport_image = $passportImageName; // Store only the image name
        }

        // if ($request->hasFile('student_last_education_image')) {
        //     $lastEducationImage = $request->file('student_last_education_image');
        //     $lastEducationImageName = time() . '_' . $lastEducationImage->getClientOriginalName();
        //     $lastEducationImagePath = 'uploads/images/';
        //     $lastEducationImage->move(public_path($lastEducationImagePath), $lastEducationImageName);
        //     $apply->student_last_education_image = $lastEducationImageName; // Store only the image name
        // }

        // Define an empty array to store image paths
        $lastEducationImagePaths = [];

        // File Upload Logic for Last Education Images
        if ($request->hasFile('student_last_education_images')) {
            foreach ($request->file('student_last_education_images') as $file) {
                // Generate a unique image name using timestamp and random characters
                $imageName = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                $imagePath = 'uploads/images/';
                $file->move(public_path($imagePath), $imageName);
                $lastEducationImagePaths[] = $imageName; // Add image path to the array
            }
        }

// Store only the array of image paths in the database
$apply->student_last_education_image = json_encode($lastEducationImagePaths);



      $apply->save();


                 // pixel event start here


     $accessToken = 'EAANNLuLQNasBOZCZA3ldU6NZAgEIRF4IQCoNYdMVEeRbkqdF5Wzf7Xm1Hwpn7hr1M5CHPOa5fiLEKvZBi7IqD8kIh88o5D15rS9O752q9lf5qKaYTBoRdQ9PFlShIrayE1peqHTUZAUuj1vV8ZBHeD0262pLnsqDKwdOD5eaOLxLcGVj0R0ZByeiIIwv1yEo1PmWQZDZD';
    $pixelId = '707529750730580';

    $email = hash('sha256', $request->input('student_email')); 

    $userData = [
        'email' => $email
    ];

    $event = [
        'event_name' => 'Apply Online', 
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
        
         $studentEmail = $request->input('student_email');

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

        DB::insert("UPDATE online_consultants SET `emailSended` = $emailSended WHERE id = '".$apply->id."'");


        return redirect()->back()->with(['success' => 'Application Submitted Successfully']);
    }

    public function index(Request $request)
    {
        $data = OnlineConsultant::all();
        return view('admin.online-consultant', compact('data'));
    }


    public function show($id)
    {
        $consultant = OnlineConsultant::findOrFail($id);

        return view('admin.online-consultant-details', compact('consultant'));
    }
    public function delete($id)
    {
        $consultant = OnlineConsultant::findOrFail($id);

        // Delete the consultant
        $consultant->delete();

        // Redirect the user back to the previous page
        return back()->with('success', 'Consultant deleted successfully');
    }

    // public function adminDelete(Request $request, $id){
    //     try {
    //         // Find the admin user by ID
    //         $adminUser = User::findOrFail($id);
    
    //         // Check if the user is actually an admin (optional, depending on your application logic)
    //         if ($adminUser->user_type !== 'admin') {
    //             return redirect()->back()->with('error', 'The user is not an admin.');
    //         }
    
    //         // Delete the admin user
    //         $adminUser->delete();
    
    //         return redirect()->back()->with('success', 'Admin user deleted successfully.');
    //     } catch (\Exception $e) {
    //         // Handle any exceptions or errors
    //         return redirect()->back()->with('error', 'Failed to delete admin user: ' . $e->getMessage());
    //     }
    
    // }

    public function adminDelete(Request $request, $id)
{
    try {
        // Find the admin user by ID
        $adminUser = User::findOrFail($id);

        // Check if the user is actually an admin (optional, depending on your application logic)
        if ($adminUser->user_type !== 'admin') {
            return redirect()->back()->with('error', 'The user is not an admin.');
        }

        // Find and delete the permissions record associated with the admin user ID
        Permissions::where('admin_id', $id)->delete();

        // Delete the admin user
        $adminUser->delete();

        return redirect()->back()->with('success', 'Admin user and associated permissions deleted successfully.');
    } catch (\Exception $e) {
        // Handle any exceptions or errors
        return redirect()->back()->with('error', 'Failed to delete admin user and associated permissions: ' . $e->getMessage());
    }
}


    public function adminRegister(){
        return view('admin.auth.admin_register');
    }

   public function adminusers()
{
    // Get all admin users
    $adminUsers = User::where('user_type', 'admin')->get();

    // Retrieve permissions for each admin user
    foreach ($adminUsers as $adminUser) {
        $permissionsData[$adminUser->id] = Permissions::where('admin_id', $adminUser->id)->first();
        if ($permissionsData[$adminUser->id]) {
            $permissionsData[$adminUser->id]->admin_permissions = json_decode($permissionsData[$adminUser->id]->admin_permissions, true);
        }
    }

    // Pass admin users and permissions data to the view
    return view('admin.auth.admin-users', ['adminUsers' => $adminUsers, 'permissionsData' => $permissionsData]);
}

    public function adminRegisterSubmit(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            // Add more validation rules as needed for admin registration
        ]);

        // Create a new admin user record using the create method
        $user = User::create([
            'user_type' => 'admin',
            'is_verified' => '1',
            'is_active' => '1',
            // Add other admin-specific fields here
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), // Hash the password
            'secret' => $validatedData['password'],
        ]);

        // Optionally, you can log in the admin user automatically after registration
        // Auth::login($user);

        // Redirect the user to a success page or perform other actions as needed
        return redirect()->back()->with('success', 'Admin registered successfully!');
    }
}
