<?php

namespace App\Http\Controllers;

use App\ContactUsMessages;
use App\Model\Student;
use App\Model\FreeConsulation;
use App\Model\ApplyNow;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\ContactMails;
use App\Model\DiscountOffers;
use App\Model\client_feedback;
use App\Model\Comment;
use App\Model\JobOpprtunities;
use App\Model\Resume;
use App\OnlineConsultant;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use DB;
use Mail;

class Api extends Controller
{

    public function testpostapi(Request $request)
    {

        $data = $request->json()->all();

        if ($data['access_key'] != 'x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd') {
            return response()->json(['message' => 'invalid access not allowed'], 403);
        }

        return response()->json(['test_data' => $data['test_data']]);
    }


    public function showfeedback($access_key = null)
    {
        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }

        $client_feedback = client_feedback::all();
        return response()->json($client_feedback);
        exit();
    }

    public function index($access_key = null)
    {
        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }

        $data = User::select('emailSended', 'email', 'created_at', 'id', 'phone', 'country', 'city', 'first_name', 'last_name', 'first_followup', 'second_followup', 'third_followup', 'choosable_status', 'assigned_employees', 'assigned_date', 'first_date', 'second_date', 'third_date', 'not_connected_status', 'first_followup_change_date', 'second_followup_change_date', 'third_followup_change_date')->where('user_type', 'student')->orderBy('id')->get();
        $test = json_decode(json_encode($data), true);
        echo json_encode($test);
        exit();
    }

        public function list_single_students($id = null, $access_key = null)
        {

            if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {

                echo 'invalid access not allowed';
                exit;
            }

            $data = User::select('id', 'first_followup', 'second_followup', 'third_followup', 'choosable_status', 'assigned_date', 'first_date', 'second_date', 'third_date', 'email', 'phone', 'not_connected_status', 'first_name', 'last_name', 'assigned_employees', 'first_followup_change_date', 'second_followup_change_date', 'third_followup_change_date')->where('id', $id)->orderBy('id', 'ASC')->get();
            $test = json_decode(json_encode($data), true);
            echo json_encode($test);
            exit();
        }


    public function getOnlineConsultants($access_key = null)
    {
        // Check access key
        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            return response()->json(['error' => 'Invalid access key'], 403);
        }
        $data = OnlineConsultant::all();
        return response()->json($data);
        exit();
    }

    public function list_apply_online($id = null, $access_key = null)
    {
        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }
        $data = OnlineConsultant::select(`emailSended`,`student_email`, 'id', 'first_followup', 'second_followup', 'third_followup', 'choosable_status', 'first_date', 'second_date', 'third_date', 'student_email', 'student_phone_number', 'not_connected_status', 'student_name', 'assigned_employees', 'first_followup_change_date', 'second_followup_change_date', 'third_followup_change_date')->where('id', $id)->orderBy('id')->get();
        $test = json_decode(json_encode($data), true);
        echo json_encode($test);
        exit();
    }
    
        public function assign_apply_online($assigned_employees)
    {
        //$data = json_decode(file_get_contents('php://input'), true);

        $data = json_decode(base64_decode($assigned_employees), true);

        if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }

        $assigned_employees = $data['assigned_employees'];
        $id = $data['id'];
        // Check if the ID is empty
if (empty($assigned_employees)) {
    $assigned_date = null; // Set date to null or empty string
} else {
    $assigned_date = date('Y-m-d H:i:s'); // Store the current date and time
}

             if (DB::insert("UPDATE online_consultants SET `assigned_employees`='$assigned_employees', `assigned_date` = " . ($assigned_date ? "'$assigned_date'" : "NULL") . " WHERE id = '$id'")) {

            echo 'success';
            exit();
        } else {
            echo 'fail';
            exit();
        }
    }

    public function list_update_apply_online($request_data)
    {
        //$data = json_decode(file_get_contents('php://input'), true);
        $data = json_decode(base64_decode($request_data), true);

        if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {

            echo 'invalid access not allowed';
            exit;
        }

        $first_followup = $data['first_followup'];
        $second_followup = $data['second_followup'];
        $third_followup = $data['third_followup'];
         $first_date = $data['first_date'];
        $second_date = $data['second_date'];
        $third_date = $data['third_date'];
        $choosable = $data['choosable'];
        $not_connected_status = $data['not_connected_status'];
         $first_followup_change_date = $data['first_followup_change_date'];
        $second_followup_change_date = $data['second_followup_change_date'];
         $third_followup_change_date = $data['third_followup_change_date'];

        $id = $data['id'];

        if (DB::insert("UPDATE online_consultants SET `first_followup`='$first_followup',`second_followup`='$second_followup',`third_followup`='$third_followup', `first_date`='$first_date',`second_date`='$second_date',`third_date`='$third_date',`choosable_status`='$choosable',`not_connected_status`='$not_connected_status',  `first_followup_change_date`='$first_followup_change_date',  `second_followup_change_date`='$second_followup_change_date',  `third_followup_change_date`='$third_followup_change_date' WHERE id = '" . $id . "'")) {
            echo 'success';
            exit();
        } else {
            echo 'fail';
            exit();
        }
    }
 public function list_single_apply_online($id = null, $access_key = null)
    {
        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }
        $data = OnlineConsultant::select('id', 'first_followup', 'second_followup', 'third_followup', 'choosable_status', 'first_date', 'second_date', 'third_date', 'student_email', 'student_phone_number', 'not_connected_status', 'student_name', 'assigned_employees', 'first_followup_change_date', 'second_followup_change_date', 'third_followup_change_date')->where('id', $id)->orderBy('id')->get();
        $test = json_decode(json_encode($data), true);
        echo json_encode($test);
        exit();
    }

    public function list_update_students($request_data)
    {
        //$data = json_decode(file_get_contents('php://input'), true);
        $data = json_decode(base64_decode($request_data), true);

        if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }

        $first_followup = $data['first_followup'];
        $second_followup = $data['second_followup'];
        $third_followup = $data['third_followup'];


         $first_date = $data['first_date'];
        $second_date = $data['second_date'];
        $third_date = $data['third_date'];
        $choosable = $data['choosable'];
        $not_connected_status = $data['not_connected_status'];
        $first_followup_change_date = $data['first_followup_change_date'];
        $second_followup_change_date = $data['second_followup_change_date'];
         $third_followup_change_date = $data['third_followup_change_date'];
        $id = $data['id'];

        if (DB::insert("UPDATE users SET `first_followup`='$first_followup',`second_followup`='$second_followup',`third_followup`='$third_followup', `first_date`='$first_date',`second_date`='$second_date',`third_date`='$third_date', `not_connected_status`='$not_connected_status',  `choosable_status`='$choosable',  `first_followup_change_date`='$first_followup_change_date',  `second_followup_change_date`='$second_followup_change_date',  `third_followup_change_date`='$third_followup_change_date' WHERE id = '" . $id . "'")) {

            echo 'success';
            exit();
        } else {
            echo 'fail';
            exit();
        }
    }


    public function assign_students($assigned_employees)
    {
        //$data = json_decode(file_get_contents('php://input'), true);

        $data = json_decode(base64_decode($assigned_employees), true);

        if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }

        $assigned_employees = $data['assigned_employees'];
        $id = $data['id'];
        // Check if the ID is empty
if (empty($assigned_employees)) {
    $assigned_date = null; // Set date to null or empty string
} else {
    $assigned_date = date('Y-m-d H:i:s'); // Store the current date and time
}


        if ($assigned_employees == 'None') {
            $assigned_employees = '';
        }

             if (DB::insert("UPDATE users SET `assigned_employees`='$assigned_employees', `assigned_date` = " . ($assigned_date ? "'$assigned_date'" : "NULL") . " WHERE id = '$id'")) {

            echo 'success';
            exit();
        } else {
            echo 'fail';
            exit();
        }
    }



    public function assign_discount_offer($assigned_employees)
    {
        //$data = json_decode(file_get_contents('php://input'), true);

        $data = json_decode(base64_decode($assigned_employees), true);

        if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {

            echo 'invalid access not allowed';
            exit;
        }
        $assigned_employees = $data['assigned_employees'];
          if (empty($assigned_employees)) {
            $assigned_date = null; // Set date to null or empty string
        } else {
            $assigned_date = date('Y-m-d H:i:s'); // Store the current date and time
        }
        $id = $data['id'];
        if (DB::insert("UPDATE discountOffers SET `assigned_employees`='$assigned_employees',`assigned_date` = " . ($assigned_date ? "'$assigned_date'" : "NULL") . " WHERE id = '$id'")) {
            echo 'success';
            exit();
        } else {
            echo 'fail';
            exit();
        }
    }
    public function index_applynow($access_key = null)
    {
        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }
        $data = ApplyNow::select('id', 'created_at', 'name', 'city', 'phone_number', 'last_education', 'intrested_country')->orderBy('id')->get();
        $test = json_decode(json_encode($data), true);
        echo json_encode($test);
        exit();
    }

    public function list_single_applynow($id = null, $access_key = null)
    {
        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }
        $data = ApplyNow::select('name', 'city', 'phone_number', 'last_education', 'intrested_country')->where('id', $id)->orderBy('id')->get();
        $test = json_decode(json_encode($data), true);
        echo json_encode($test);
        exit();
    }


    public function index_consultations($access_key = null)
    {
        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }
        $data = FreeConsulation::select('emailSended', 'id', 'created_at', 'name', 'email', 'phone_number', 'last_education', 'country', 'city', 'apply_for', 'first_followup', 'second_followup', 'third_followup', 'choosable_status', 'assigned_employees', 'assigned_date', 'first_date', 'second_date', 'third_date', 'not_connected_status', 'first_followup_change_date', 'second_followup_change_date', 'third_followup_change_date', 'interested_country')->orderBy('id')->get();
        $test = json_decode(json_encode($data), true);
        echo json_encode($test);
        exit();
    }


    public function list_single_consultations($id = null, $access_key = null)
    {
        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }
        $data = FreeConsulation::select('id', 'first_followup', 'second_followup', 'third_followup', 'choosable_status', 'first_date', 'second_date', 'third_date',  'email', 'phone_number', 'not_connected_status', 'name', 'assigned_employees', 'first_followup_change_date', 'second_followup_change_date', 'third_followup_change_date')->where('id', $id)->orderBy('id')->get();
        $test = json_decode(json_encode($data), true);
        echo json_encode($test);
        exit();
    }

    public function list_update_consultations($request_data)
    {
        //$data = json_decode(file_get_contents('php://input'), true);
        $data = json_decode(base64_decode($request_data), true);

        if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {

            echo 'invalid access not allowed';
            exit;
        }

        $first_followup = $data['first_followup'];
        $second_followup = $data['second_followup'];
        $third_followup = $data['third_followup'];
         $first_date = $data['first_date'];
        $second_date = $data['second_date'];
        $third_date = $data['third_date'];
        $choosable = $data['choosable'];
        $not_connected_status = $data['not_connected_status'];
         $first_followup_change_date = $data['first_followup_change_date'];
        $second_followup_change_date = $data['second_followup_change_date'];
         $third_followup_change_date = $data['third_followup_change_date'];

        $id = $data['id'];

        if (DB::insert("UPDATE free_consulations SET `first_followup`='$first_followup',`second_followup`='$second_followup',`third_followup`='$third_followup', `first_date`='$first_date',`second_date`='$second_date',`third_date`='$third_date',`choosable_status`='$choosable',  `first_followup_change_date`='$first_followup_change_date',  `second_followup_change_date`='$second_followup_change_date',  `second_followup_change_date`='$second_followup_change_date', `not_connected_status`='$not_connected_status' WHERE id = '" . $id . "'")) {
            echo 'success';
            exit();
        } else {
            echo 'fail';
            exit();
        }
    }


    public function assign_consultations($assigned_employees)
    {
        // dd($assigned_employees);
        //$data = json_decode(file_get_contents('php://input'), true);

        $data = json_decode(base64_decode($assigned_employees), true);

        if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }

        $assigned_employees = $data['assigned_employees'];
        $emailSended = $data['emailSended'];
        $id = $data['id'];
        // Check if the ID is empty
        if (empty($assigned_employees)) {
            $assigned_date = null; // Set date to null or empty string
        } else {
            $assigned_date = date('Y-m-d H:i:s'); // Store the current date and time
        }
        
         if (empty($emailSended)) {
            $emailSended = "0"; // Set date to null or empty string
        } else {
            $emailSended = "1"; // Store the current date and time
        }

        if ($assigned_employees == 'None') {
            $assigned_employees = '';
        }

             if (DB::insert("UPDATE free_consulations SET `assigned_employees`='$assigned_employees', `emailSended`='$emailSended', `assigned_date` = " . ($assigned_date ? "'$assigned_date'" : "NULL") . " WHERE id = '$id'")) {


    //     $consularPhone = $data['consularPhone'];
    //     $consularName = $data['consularName'];
    //     $consularGender = $data['consularGender'];
    //     $studentName = $data['studentName'];
    //     $studentEmail = $data['studentEmail'];

    //     if($consularGender == '0') {
    //         $consularGender = 'Mr';
    //     } else {
    //         $consularGender = 'Ms';
    //     }

    //     $details = [
    //         'studentName' => $studentName,
    //         'consularGender' => $consularGender,
    //         'consularName' => $consularName,
    //         'consularPhone' => $consularPhone,
    //     ];

    //     if($data['assigned_employees'] != '') {

    //     Mail::send('emails.free_consulations', $details, function ($message) use ($studentEmail) {
    //         $message->from('info@universitiespage.com', 'Universities Page')
    //                 ->to($studentEmail)
    //                 ->subject('Universities Page');
    //     });

    //     if (Mail::failures()) {
    //         $emailSended = '0'; 
    //     } else {
    //         $emailSended = '1';  
    //     }

    //     DB::insert("UPDATE free_consulations SET `emailSended` = $emailSended WHERE id = '".$id."'");

    //   }


            echo 'success';
            exit();
        } else {
            echo 'email send fail';
            exit();
        }
    }
    public function website_list_complaints($access_key = null)
    {
        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }

        $data = ContactMails::select('id', 'name', 'email', 'phone', 'subject', 'message', 'created_at', 'location', 'first_followup', 'second_followup', 'third_followup', 'choosable_status', 'assigned_employees', 'assigned_date', 'first_date', 'second_date', 'third_date', 'not_connected_status', 'first_followup_change_date', 'second_followup_change_date', 'third_followup_change_date')->where('type', 'complaint')->orderBy('id')->get();
        $test = json_decode(json_encode($data), true);
        echo json_encode($test);
        exit();
    }

    public function list_complaints($access_key = null, $location = null)
    {
        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }

        $data = ContactMails::select('id', 'name', 'email', 'phone', 'subject', 'message', 'created_at', 'location', 'first_followup', 'second_followup', 'third_followup', 'choosable_status', 'assigned_employees', 'assigned_date', 'first_date', 'second_date', 'third_date', 'not_connected_status', 'first_followup_change_date', 'second_followup_change_date', 'third_followup_change_date')->where('type', 'complaint')->where('location', $location)->orderBy('id')->get();
        $test = json_decode(json_encode($data), true);
        echo json_encode($test);
        exit();
    }
    public function assign_complaints($assigned_employees)
    {
        //$data = json_decode(file_get_contents('php://input'), true);

        $data = json_decode(base64_decode($assigned_employees), true);

        if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }

        $assigned_employees = $data['assigned_employees'];
        $id = $data['id'];
         // Check if the ID is empty
        if (empty($assigned_employees)) {
            $assigned_date = null; // Set date to null or empty string
        } else {
            $assigned_date = date('Y-m-d H:i:s'); // Store the current date and time
        }
        if ($assigned_employees == 'None') {
            $assigned_employees = '';
        }
        if (DB::insert("UPDATE emails SET `assigned_employees`='$assigned_employees', `assigned_date` = " . ($assigned_date ? "'$assigned_date'" : "NULL") . " WHERE id = '$id'")) {
            echo 'success';
            exit();
        } else {
            echo 'fail';
            exit();
        }
    }
    
        public function list_single_complaint($id = null, $access_key = null)
    {
        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }
        $data = ContactMails::select('id', 'first_followup', 'second_followup', 'third_followup', 'choosable_status', 'first_date', 'second_date', 'third_date','name', 'email', 'phone', 'assigned_employees', 'not_connected_status', 'first_followup_change_date', 'second_followup_change_date', 'third_followup_change_date')->where('id', $id)->orderBy('id')->get();
        $test = json_decode(json_encode($data), true);
        echo json_encode($test);
        exit();
    }
    
    
    public function list_update_complaint($request_data)
    {
        //$data = json_decode(file_get_contents('php://input'), true);
        $data = json_decode(base64_decode($request_data), true);

        if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {

            echo 'invalid access not allowed';
            exit;
        }

        $first_followup = $data['first_followup'];
        $second_followup = $data['second_followup'];
        $third_followup = $data['third_followup'];
         $first_date = $data['first_date'];
        $second_date = $data['second_date'];
        $third_date = $data['third_date'];
        $choosable = $data['choosable'];
        $not_connected_status = $data['not_connected_status'];
         $first_followup_change_date = $data['first_followup_change_date'];
        $second_followup_change_date = $data['second_followup_change_date'];
         $third_followup_change_date = $data['third_followup_change_date'];
        $id = $data['id'];

        if (DB::insert("UPDATE emails SET `first_followup`='$first_followup',`second_followup`='$second_followup',`third_followup`='$third_followup', `first_date`='$first_date',`second_date`='$second_date',`third_date`='$third_date',`choosable_status`='$choosable',`not_connected_status`='$not_connected_status',  `first_followup_change_date`='$first_followup_change_date',  `second_followup_change_date`='$second_followup_change_date',  `third_followup_change_date`='$third_followup_change_date'  WHERE id = '" . $id . "'")) {
            echo 'success';
            exit();
        } else {
            echo 'fail';
            exit();
        }
    }
  public function website_list_discount_offer($access_key = null)
    {
        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }
        $data = DiscountOffers::select('id', 'name', 'lastEducation', 'lastEducationPer', 'city', 'phone', 'email', 'emailSended', 'familyDetail', 'created_at', 'location', 'first_followup', 'second_followup', 'third_followup', 'choosable_status', 'assigned_employees', 'assigned_date', 'first_date', 'second_date', 'third_date', 'not_connected_status', 'first_followup_change_date', 'second_followup_change_date', 'third_followup_change_date')->orderBy('id', 'DESC')->get();
        $test = json_decode(json_encode($data), true);
        echo json_encode($test);
        exit();
    }
    public function list_discount_offer($access_key = null, $location = null)
    {
        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }
        $data = DiscountOffers::select('id', 'name', 'lastEducation', 'lastEducationPer', 'city', 'phone', 'email', 'emailSended', 'familyDetail', 'created_at', 'location', 'first_followup', 'second_followup', 'third_followup', 'choosable_status', 'assigned_employees', 'assigned_date', 'first_date', 'second_date', 'third_date', 'not_connected_status', 'first_followup_change_date', 'second_followup_change_date', 'third_followup_change_date')->where('location', $location)->orderBy('id', 'DESC')->get();
        $test = json_decode(json_encode($data), true);
        echo json_encode($test);
        exit();
    }
    
      public function list_single_discount_offer($id = null, $access_key = null)
    {
        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }
        $data = DiscountOffers::select('id', 'first_followup', 'second_followup', 'third_followup', 'choosable_status', 'first_date', 'second_date', 'third_date', 'name', 'city', 'phone', 'email', 'assigned_employees', 'not_connected_status', 'first_followup_change_date', 'second_followup_change_date', 'third_followup_change_date')->where('id', $id)->orderBy('id')->get();
        $test = json_decode(json_encode($data), true);
        echo json_encode($test);
        exit();
    }
    
    
    public function list_update_discount_offer($request_data)
    {
        //$data = json_decode(file_get_contents('php://input'), true);
        $data = json_decode(base64_decode($request_data), true);

        if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {

            echo 'invalid access not allowed';
            exit;
        }

        $first_followup = $data['first_followup'];
        $second_followup = $data['second_followup'];
        $third_followup = $data['third_followup'];
         $first_date = $data['first_date'];
        $second_date = $data['second_date'];
        $third_date = $data['third_date'];
        $choosable = $data['choosable'];
        $not_connected_status = $data['not_connected_status'];
        $first_followup_change_date = $data['first_followup_change_date'];
        $second_followup_change_date = $data['second_followup_change_date'];
         $third_followup_change_date = $data['third_followup_change_date'];
        $id = $data['id'];

        if (DB::insert("UPDATE discountOffers SET `first_followup`='$first_followup',`second_followup`='$second_followup',`third_followup`='$third_followup', `first_date`='$first_date',`second_date`='$second_date',`third_date`='$third_date',`choosable_status`='$choosable',`not_connected_status`='$not_connected_status',  `first_followup_change_date`='$first_followup_change_date',  `second_followup_change_date`='$second_followup_change_date',  `third_followup_change_date`='$third_followup_change_date'  WHERE id = '" . $id . "'")) {
            echo 'success';
            exit();
        } else {
            echo 'fail';
            exit();
        }
    }

    public function messages($access_key = null)
    {
        // Check access key
        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            return response()->json(['error' => 'Invalid access key'], 403);
        }
        $data = ContactUsMessages::latest()->get();
        return response()->json($data);
        exit();
    }

    public function assign_messages($assigned_employees)
    {
        //$data = json_decode(file_get_contents('php://input'), true);


        $data = json_decode(base64_decode($assigned_employees), true);

        if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }

        $assigned_employees = $data['assigned_employees'];
        $id = $data['id'];
       if (empty($assigned_employees)) {
    $assigned_date = null; // Set date to null or empty string
} else {
    $assigned_date = date('Y-m-d H:i:s'); // Store the current date and time
}

        if (DB::insert("UPDATE contact_us_messages SET `assigned_employees`='$assigned_employees', `assigned_date` = " . ($assigned_date ? "'$assigned_date'" : "NULL") . " WHERE id = '$id'")) {
            echo 'success';
            exit();
        } else {
            echo 'fail';
            exit();
        }
    }

    public function index_contactUs_messages($access_key = null)
    {
        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }
        $data = ContactUsMessages::select('id', 'emailSended', 'office_location', 'created_at', 'user_name',  'user_email', 'phone_number', 'reply', 'first_followup', 'second_followup', 'third_followup', 'choosable_status', 'assigned_employees', 'assigned_date', 'first_date', 'second_date', 'third_date', 'not_connected_status')->orderBy('id')->get();
        
        $test = json_decode(json_encode($data), true);
        echo json_encode($test);
        exit();
    }

    public function list_single_message($id = null, $access_key = null)
    {
        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }
        $data = ContactUsMessages::select('id', 'first_followup', 'second_followup', 'third_followup', 'choosable_status', 'first_date', 'second_date', 'third_date', 'user_name',  'user_email', 'phone_number', 'assigned_employees', 'not_connected_status')->where('id', $id)->orderBy('id')->get();
        $test = json_decode(json_encode($data), true);
        echo json_encode($test);
        exit();
    }
    
        public function list_update_message($request_data)
    {
        //$data = json_decode(file_get_contents('php://input'), true);
        $data = json_decode(base64_decode($request_data), true);

        if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {

            echo 'invalid access not allowed';
            exit;
        }

        $first_followup = $data['first_followup'];
        $second_followup = $data['second_followup'];
        $third_followup = $data['third_followup'];
         $first_date = $data['first_date'];
        $second_date = $data['second_date'];
        $third_date = $data['third_date'];
        $choosable = $data['choosable'];
        $not_connected_status = $data['not_connected_status'];
        $id = $data['id'];


        if (DB::insert("UPDATE contact_us_messages SET `first_followup`='$first_followup',`second_followup`='$second_followup',`third_followup`='$third_followup', `first_date`='$first_date',`second_date`='$second_date',`third_date`='$third_date',`choosable_status`='$choosable',`not_connected_status`='$not_connected_status' WHERE id = '" . $id . "'")) {
            echo 'success';
            exit();
        } else {
            echo 'fail';
            exit();
        }
    }



    public function comments($access_key = null)
    {
        // Check access key
        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            return response()->json(['error' => 'Invalid access key'], 403);
        }
        $data = Comment::get();
        return response()->json($data);
        exit();
    }


public function index_comments($access_key = null)
    {
        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }
        $data = Comment::select('comment_id', 'created_at', 'first_name', 'last_name', 'comment', 'phone_number', 'email', 'status')->orderBy('comment_id')->get();

        $test = json_decode(json_encode($data), true);
        echo json_encode($test);
        exit();
    }



    public function comment_reply($data)
    {
        //$data = json_decode(file_get_contents('php://input'), true);
        $data = json_decode(base64_decode($data), true);
        
        if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            return response()->json(['success' => false, 'message' => 'Invalid access key'], 403);
        }
        
        $firstName = $data['first_name'];
        $lastName = $data['last_name'];
        $email = $data['email'];
        $phoneNumber = $data['phone_number'];
        $comment = $data['comment'];
        $status = $data['status'];
        $parentCommentId = $data['parent_comment_id'];
        $articleId = $data['article_id'];
        
        $replyData = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'phone_number' => $phoneNumber,
            'comment' => $comment,
            'status' => $status,
            'parent_comment_id' => $parentCommentId,
            'article_id' => $articleId
        ];
        
        $success = DB::table('replies')->insert($replyData);

        if ($success) {
            return response()->json(['success' => true, 'message' => 'Reply added successfully'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to add reply'], 500);
        }
    }

    // public function update_comment_status($dataa)
    // {
    //     //$data = json_decode(file_get_contents('php://input'), true);
    //     $data = json_decode(base64_decode($dataa), true);
        
    //     if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
    //         return response()->json(['success' => false, 'message' => 'Invalid access key'], 403);
    //     }
        
    //     $status = $data['status'];

    //     // Use $id to identify the comment being updated
    //     $success = DB::table('comments')->where('comment_id', $comment_id)->update(['status' => $status]);

    //     if ($success) {
    //         return response()->json(['success' => true, 'message' => 'Comment status updated successfully'], 200);
    //     } else {
    //         return response()->json(['success' => false, 'message' => 'Failed to update comment status'], 500);
    //     }
    // }
    // public function comment_mail($request_data)
    // {
    //     //$data = json_decode(file_get_contents('php://input'), true);
    //     $data = json_decode(base64_decode($request_data), true);
    
    //     if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
    //         echo 'invalid access not allowed';
    //         exit;
    //     }
    
    //     $mail_status = $data['mail_status'];
    //     $comment_id = $data['comment_id']; // Assuming this is the comment ID
    //     // Use $id to identify the comment being updated
    //     $success = DB::table('comments')->where('comment_id', $comment_id)->update(['mail_status' => $mail_status]);

    //     if ($success) {
    //         return response()->json(['success' => true, 'message' => 'mail sent successfullyt successfully'], 200);
    //     } else {
    //         return response()->json(['success' => false, 'message' => 'mail not sent'], 500);
    //     }
    // }

        public function comment_mail($request_data)
    {
        //$data = json_decode(file_get_contents('php://input'), true);


        $data = json_decode(base64_decode($request_data), true);

        if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }

        $mail_status = $data['mail_status'];
        $comment_id = $data['comment_id']; // Assuming this is the comment ID

        if (DB::insert("UPDATE comments SET `mail_status`='$mail_status' WHERE comment_id = '" . $comment_id . "'")) {
            echo 'success';
            exit();
        } else {
            echo 'fail';
            exit();
        }
    }
    public function update_comment_status($comment_data)
    {
        //$data = json_decode(file_get_contents('php://input'), true);


        $data = json_decode(base64_decode($comment_data), true);

        if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }

        $status = $data['status'];
        $comment_id = $data['comment_id']; // Assuming this is the comment ID

        if (DB::insert("UPDATE comments SET `status`='$status' WHERE comment_id = '" . $comment_id . "'")) {
            echo 'success';
            exit();
        } else {
            echo 'fail';
            exit();
        }
    }


    public function comment_all_replies($comment_id = null, $access_key = null)
    {
    if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
        echo 'invalid access not allowed';
        exit;
    }

    if ($comment_id === null || !is_numeric($comment_id)) {
        echo json_encode(['error' => 'Invalid ID']);
        exit;
    }

    $data = Comment::with('replies')->where('comment_id', $comment_id)->orderBy('created_at', 'desc')->get();
    $test = json_decode(json_encode($data), true);
    echo json_encode($test);
    exit();
    }

    public function update_reply_status($reply_data)
    {
        //$data = json_decode(file_get_contents('php://input'), true);


        $data = json_decode(base64_decode($reply_data), true);

        if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }

        $status = $data['status'];
        $reply_id = $data['reply_id']; // Assuming this is the comment ID

        if (DB::insert("UPDATE replies SET `status`='$status' WHERE reply_id = '" . $reply_id . "'")) {
            echo 'success';
            exit();
        } else {
            echo 'fail';
            exit();
        }
    }
    public function jobList($access_key = null)
    {
        // Check access key
        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            return response()->json(['error' => 'Invalid access key'], 403);
        }
        $data = JobOpprtunities::with('jobApplies')->get();
        return response()->json($data);
        exit();
    }
    public function job_all_applies($id = null, $access_key = null)
    {
    if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
        echo 'invalid access not allowed';
        exit;
    }

    if ($id === null || !is_numeric($id)) {
        echo json_encode(['error' => 'Invalid ID']);
        exit;
    }

    $data = JobOpprtunities::with('jobApplies')->where('id', $id)->orderBy('created_at', 'desc')->get();
    $test = json_decode(json_encode($data), true);
    echo json_encode($test);
    exit();
    }

    public function update_job_status($job_data)
    {
        //$data = json_decode(file_get_contents('php://input'), true);


        $data = json_decode(base64_decode($job_data), true);

        if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }

        $post_status = $data['post_status'];
        $id = $data['id']; // Assuming this is the comment ID

        if (DB::insert("UPDATE job_opprtunities SET `post_status`='$post_status' WHERE id = '" . $id . "'")) {
            echo 'success';
            exit();
        } else {
            echo 'fail';
            exit();
        }
    }

    // public function add_job_post($data)
    // {
    //     //$data = json_decode(file_get_contents('php://input'), true);
    //     $data = json_decode(base64_decode($data), true);
        
    //     if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
    //         return response()->json(['success' => false, 'message' => 'Invalid access key'], 403);
    //     }
        
    //     $title = $data['title'];
    //     $job_type = $data['job_type'];
    //     $city = $data['city'];
    //     $province = $data['province'];
    //     $country = $data['country'];
    //     $site_based = $data['site_based'];
    //     $skills = $data['skills'];
    //     $experience = $data['experience'];
    //     $requirements = $data['requirements'];
    //     $responsibilities = $data['responsibilities'];
    //     $description = $data['description'];
        
    //     $replyData = [
    //         'title' => $title,
    //         'job_type' => $job_type,
    //         'city' => $city,
    //         'province' => $province,
    //         'country' => $country,
    //         'site_based' => $site_based,
    //         'skills' => $skills,
    //         'experience' => $experience,
    //         'requirements' => $requirements,
    //         'responsibilities' => $responsibilities,
    //         'description' => $description
    //     ];
        
    //     $success = DB::table('job_opprtunities')->insert($replyData);

    //     if ($success) {
    //         return response()->json(['success' => true, 'message' => 'Job added successfully'], 200);
    //     } else {
    //         return response()->json(['success' => false, 'message' => 'Failed to add Job'], 500);
    //     }
    // }
    public function add_job_post(Request $request)
{
    // Retrieve all inputs from the request
    $data = $request->all();

    // Check access key
    if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
        return response()->json(['success' => false, 'message' => 'Invalid access key'], 403);
    }

    // Insert data into database
    $success = DB::table('job_opprtunities')->insert([
        'title' => $data['title'],
        'job_type' => $data['job_type'],
        'city' => $data['city'],
        'province' => $data['province'],
        'country' => $data['country'],
        'site_based' => $data['site_based'],
        'skills' => $data['skills'],
        'experience' => $data['experience'],
        'requirements' => $data['requirements'],
        'responsibilities' => $data['responsibilities'],
        'description' => $data['description']
    ]);

    if ($success) {
        echo 'success';
    } else {
        echo 'fail';
    }
}



    public function list_single_job($id = null, $access_key = null)
    {

        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {

            echo 'invalid access not allowed';
            exit;
        }

        $data = JobOpprtunities::select('id', 'title', 'job_type', 'city', 'province', 'country', 'site_based', 'skills', 'experience', 'requirements', 'responsibilities', 'description')->where('id', $id)->orderBy('id', 'ASC')->get();
        $test = json_decode(json_encode($data), true);
        echo json_encode($test);
        exit();
    }
   

    public function update_job_post(Request $request)
{
    // Retrieve all inputs from the request
    $data = $request->all();

    // Check access key
    if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
        return response()->json(['success' => false, 'message' => 'Invalid access key'], 403);
    }

        $title = $data['title'];
        $job_type = $data['job_type'];
        $city = $data['city'];
        $province = $data['province'];
        $country = $data['country'];
        $site_based = $data['site_based'];
        $skills = $data['skills'];
        $experience = $data['experience'];
        $requirements = $data['requirements'];
        $responsibilities = $data['responsibilities'];
        $description = $data['description'];
        $id = $data['id'];
//echo "UPDATE job_opprtunities SET `title`='$title',`job_type`='$job_type',`city`='$city',`province`='$province',  `country`='$country',`site_based`='$site_based',`skills`='$skills',`experience`='$experience',`requirements`='$requirements',`responsibilities`='$responsibilities',`description`='$description'  WHERE id = '" . $id . "'"; exit;
        if (DB::insert("UPDATE job_opprtunities SET `title`='$title',`job_type`='$job_type',`city`='$city',`province`='$province',  `country`='$country',`site_based`='$site_based',`skills`='$skills',`experience`='$experience',`requirements`='$requirements',`responsibilities`='$responsibilities',`description`='$description'  WHERE id = '" . $id . "'")) {

            echo 'success';
            exit();
        } else {
            echo 'fail';
            exit();
        }
    }
    
    public function list_single_resume($id = null, $access_key = null)
    {
        if ($access_key != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
            echo 'invalid access not allowed';
            exit;
        }
        $data = Resume::select('id', 'student_id', 'full_name', 'email', 'phone_number', 'gender', 'birth_date', 'nationality', 'about_yourself' , 'profile_image', 'postal_code', 'city', 'country', 'address' , 'education_details', 'experience_details', 'skills', 'languages', 'created_at')->where('student_id', $id)->orderBy('id')->get();
        $test = json_decode(json_encode($data), true);
        echo json_encode($test);
        exit();
    }
    
public function update_resume_record($request_data)
{
    $data = json_decode(base64_decode($request_data), true);

    if ($data['access_key'] != 'BB27V4PHw87u4Z86v10gEELSG3wrE549K10Z') {
        echo 'invalid access not allowed';
        exit;
    }

    // Basic user information
    $full_name = $data['full_name'];
    $email = $data['email'];
    $phone_number = $data['phone_number'];
    $gender = $data['gender'];
    $birth_date = $data['birth_date'];
    $nationality = $data['nationality'];
    $about_yourself = $data['about_yourself'];
    $education_details = $data['education_details'];
    $experience_details = $data['experience_details'];
    $skills = $data['skills'];
    $languages = $data['languages'];
    $id = $data['id'];

    // Prepare update data array
    $update_data = [
        'full_name' => $full_name,
        'email' => $email,
        'phone_number' => $phone_number,
        'gender' => $gender,
        'birth_date' => $birth_date,
        'nationality' => $nationality,
        'about_yourself' => $about_yourself,
    ];
   
    // Build the SET part of the query
    $set_parts = [];
    foreach ($update_data as $column => $value) {
        if ($value !== null) {
            $set_parts[] = "`$column` = '" . DB::escape($value) . "'";
        }
    }

    if (empty($set_parts)) {
        echo 'No data to update';
        exit();
    }
    
    $set_query = implode(", ", $set_parts);
    
    // Update user information in resumes table
    $query = "UPDATE resumes SET $set_query WHERE id = '" . DB::escape($id) . "'";

    if (DB::query($query)) {
        echo 'success';
        exit();
    } else {
        echo 'fail';
        exit();
    }
}





}
