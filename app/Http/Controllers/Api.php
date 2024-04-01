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
use App\OnlineConsultant;
use Illuminate\Support\Facades\Redirect;
use DB;

class Api extends Controller
{
    
    public function showfeedback($access_key = null)
    {  
        if($access_key != 'x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd') {
	        echo 'invalid access not allowed'; exit;
	    }
        
     	$client_feedback=client_feedback::all();
        return response()->json($client_feedback);
		 exit();
    }
    
    public function index($access_key = null)
    {  
        if($access_key != 'x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd') { 
	        echo 'invalid access not allowed'; exit; 
	    }
        
     	$data = User::select('created_at','id','phone','country','first_name','last_name','first_followup','second_followup','third_followup','choosable_status','assigned_employees')->where('user_type', 'student')->orderBy('id')->get();
     	$test = json_decode(json_encode($data), true);
		echo json_encode($test);
		exit();
    }
    
        public function list_single_students($id = null, $access_key = null)
    {  
        
        if($access_key != 'x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd') {
	        
	        echo 'invalid access not allowed'; exit;
	        
	    }
        
     	$data = User::select('id','first_followup','second_followup','third_followup','choosable_status')->where('id', $id)->orderBy('id', 'ASC')->get();
     	$test = json_decode(json_encode($data), true);
		echo json_encode($test);
		 exit();
    }


    public function getOnlineConsultants($access_key = null)
    {
        // Check access key
        if($access_key != 'x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd') { 
            return response()->json(['error' => 'Invalid access key'], 403);
        }
        $data = OnlineConsultant::all();
        return response()->json($data);
		 exit();
    }

    public function list_apply_online($id = null, $access_key = null)
    {  
        if($access_key != 'x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd') {
	        echo 'invalid access not allowed'; exit;
	    }
     	$data = OnlineConsultant::select('id','first_followup','second_followup','third_followup','choosable_status')->where('id', $id)->orderBy('id')->get();
     	$test = json_decode(json_encode($data), true);
		echo json_encode($test);
		exit();
    }

    public function list_update_apply_online(Request $request)
    {   
        $data = json_decode(file_get_contents('php://input'), true);
     
        if($data['access_key'] != 'x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd') {
	        
	        echo 'invalid access not allowed'; exit;
	        
	    }
	    
	    $first_followup = $data['first_followup'];
        $second_followup = $data['second_followup'];
        $third_followup = $data['third_followup'];
        $choosable = $data['choosable'];
        $id = $data['id'];
	    

        if($first_followup == 'None') {
            $first_followup = '';
        }
        if($second_followup == 'None') {
            $second_followup = '';
        }
        if($third_followup == 'None') {
            $third_followup = '';
        }
        if($choosable == 'None') {
            $choosable = '';
        }

        if(DB::insert("UPDATE online_consultants SET `first_followup`='$first_followup',`second_followup`='$second_followup',`third_followup`='$third_followup',`choosable_status`='$choosable' WHERE id = '".$id."'")) {
            echo 'success';  exit();
        } else {
            echo 'fail';  exit();
        }

    }


    public function list_update_students(Request $request)
    {   
        $data = json_decode(file_get_contents('php://input'), true);
        if($data['access_key'] != 'x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd') {
	        echo 'invalid access not allowed'; exit;
	    }

        $first_followup = $data['first_followup'];
        $second_followup = $data['second_followup'];
        $third_followup = $data['third_followup'];
        $choosable = $data['choosable'];
        $id = $data['id'];

        if($first_followup == 'None') {
            $first_followup = '';
        }
        if($second_followup == 'None') {
            $second_followup = '';
        }
        if($third_followup == 'None') {
            $third_followup = '';
        }
        if($choosable == 'None') {
            $choosable = '';
        }

        if(DB::insert("UPDATE users SET `first_followup`='$first_followup',`second_followup`='$second_followup',`third_followup`='$third_followup',`choosable_status`='$choosable' WHERE id = '".$id."'")) {

            echo 'success';  exit();
        } else {
            echo 'fail';  exit();
        }

    }
    
    
    public function assign_students(Request $request)
    {   
        $data = json_decode(file_get_contents('php://input'), true);
        if($data['access_key'] != 'x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd') {
	        echo 'invalid access not allowed'; exit;
	    }
	    
	    $assigned_employees = $data['assigned_employees'];
        $id = $data['id'];
	    

        if($assigned_employees == 'None') {
            $assigned_employees = '';
        }

        if(DB::insert("UPDATE users SET `assigned_employees`='$assigned_employees' WHERE id = '".$id."'")) {

            echo 'success';  exit();
        } else {
            echo 'fail';  exit();
        }

    }
    
    
    
    public function assign_discount_offer(Request $request)
    {   
        $data = json_decode(file_get_contents('php://input'), true);
     
        if($data['access_key'] != 'x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd') {
	        
	        echo 'invalid access not allowed'; exit;
	        
	    }
	    $assigned_employees = $data['assigned_employees'];
        $id = $data['id'];
        if($assigned_employees == 'None') {
            $assigned_employees = '';
        }
        if(DB::insert("UPDATE discountOffers SET `assigned_employees`='$assigned_employees' WHERE id = '".$id."'")) {

            echo 'success';  exit();
        } else {
            echo 'fail';  exit();
        }
    }
    public function index_applynow($access_key = null)
    {  
        if($access_key != 'x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd') {
	        echo 'invalid access not allowed'; exit;
	    }
     	$data = ApplyNow::select('id','created_at','name','city','phone_number','last_education','intrested_country')->orderBy('id')->get();
     	$test = json_decode(json_encode($data), true);
		echo json_encode($test);
		 exit();
    }
    
    public function list_single_applynow($id = null, $access_key = null)
    {  
        if($access_key != 'x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd') {
	        echo 'invalid access not allowed'; exit;
	    }
     	$data = ApplyNow::select('name','city','phone_number','last_education','intrested_country')->where('id', $id)->orderBy('id')->get();
     	$test = json_decode(json_encode($data), true);
		echo json_encode($test);
		 exit();
    }
    
    
    public function index_consultations($access_key = null)
    {  
        if($access_key != 'x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd') {
	        echo 'invalid access not allowed'; exit;
	    }
     	$data = FreeConsulation::select('id','created_at','name','email','phone_number','last_education','city','apply_for','first_followup','second_followup','third_followup','choosable_status','assigned_employees')->orderBy('id')->get();
     	$test = json_decode(json_encode($data), true);
		echo json_encode($test);
		 exit();
        
    }
    
    
    public function list_single_consultations($id = null, $access_key = null)
    {  
        if($access_key != 'x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd') {
	        echo 'invalid access not allowed'; exit;
	    }
     	$data = FreeConsulation::select('id','first_followup','second_followup','third_followup','choosable_status')->where('id', $id)->orderBy('id')->get();
     	$test = json_decode(json_encode($data), true);
		echo json_encode($test);
		exit();
    }

    public function list_update_consultations(Request $request)
    {   
        $data = json_decode(file_get_contents('php://input'), true);
     
        if($data['access_key'] != 'x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd') {
	        
	        echo 'invalid access not allowed'; exit;
	        
	    }
	    
	    $first_followup = $data['first_followup'];
        $second_followup = $data['second_followup'];
        $third_followup = $data['third_followup'];
        $choosable = $data['choosable'];
        $id = $data['id'];
	    

        if($first_followup == 'None') {
            $first_followup = '';
        }
        if($second_followup == 'None') {
            $second_followup = '';
        }
        if($third_followup == 'None') {
            $third_followup = '';
        }
        if($choosable == 'None') {
            $choosable = '';
        }

        if(DB::insert("UPDATE free_consulations SET `first_followup`='$first_followup',`second_followup`='$second_followup',`third_followup`='$third_followup',`choosable_status`='$choosable' WHERE id = '".$id."'")) {
            echo 'success';  exit();
        } else {
            echo 'fail';  exit();
        }

    }
    
    
        public function assign_complaints(Request $request)
    {   
        $data = json_decode(file_get_contents('php://input'), true);
     
        if($data['access_key'] != 'x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd') {
	        echo 'invalid access not allowed'; exit;
	    }
	    
	    $assigned_employees = $data['assigned_employees'];
        $id = $data['id'];
        if($assigned_employees == 'None') {
            $assigned_employees = '';
        }
        if(DB::insert("UPDATE emails SET `assigned_employees`='$assigned_employees' WHERE id = '".$id."'")) {
            echo 'success';  exit();
        } else {
            echo 'fail';  exit();
        }
    }
    
    
    public function assign_consultations(Request $request)
    {   
        $data = json_decode(file_get_contents('php://input'), true);
     
        if($data['access_key'] != 'x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd') {
	        echo 'invalid access not allowed'; exit;
	    }
	    
	    $assigned_employees = $data['assigned_employees'];
        $id = $data['id'];
        if($assigned_employees == 'None') {
            $assigned_employees = '';
        }

        if(DB::insert("UPDATE free_consulations SET `assigned_employees`='$assigned_employees' WHERE id = '".$id."'")) {
            echo 'success';  exit();
        } else {
            echo 'fail';  exit();
        }
    }
    
    
    public function list_complaints($access_key = null,$location= null)
    {  
        if($access_key != 'x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd') {
	        echo 'invalid access not allowed'; exit;
	    }
        
     	$data = ContactMails::select('id','name','email','phone','subject','message','created_at','location','assigned_employees')->where('type', 'complaint')->where('location', $location)->orderBy('id')->get();
     	$test = json_decode(json_encode($data), true);
		echo json_encode($test);
		exit();
    }
    
    
    public function list_discount_offer($access_key = null,$location= null)
    {  
        if($access_key != 'x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd') {
	        echo 'invalid access not allowed'; exit;
	    }
     	$data = DiscountOffers::select('id','name','lastEducation','lastEducationPer','phone','email','familyDetail','created_at','location','assigned_employees')->where('location', $location)->orderBy('id','DESC')->get();
     	$test = json_decode(json_encode($data), true);
		echo json_encode($test);
		 exit();
    }

    public function messages($access_key = null)
    {
        // Check access key
        if($access_key != 'x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd') { 
            return response()->json(['error' => 'Invalid access key'], 403);
        }
        $data = ContactUsMessages::latest()->get();
        return response()->json($data);
		 exit();
    }
}
