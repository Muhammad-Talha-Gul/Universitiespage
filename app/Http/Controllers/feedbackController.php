<?php

namespace App\Http\Controllers;
use App\Model\client_feedback;
use App\Model\Consultant;
use Illuminate\Http\Request;

class feedbackController extends Controller
{
 public function viewfeedback(){
   $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://universitiespagecrm.com/Api/fetch_employees/x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Cookie: ci_session=2a9e76bf68d73bcdaaa7b4bcde09fddce0665d90'
  ),
));

$consuler_names = curl_exec($curl);
$consuler_names = json_decode($consuler_names, true);
curl_close($curl);
return view('feedback' ,['consuler_names'=>$consuler_names]);
 }
 public function savefeedback(Request $request){
    
 if($request->ajax()){
  
$inputData = [
    'full_name' => $request->full_name,
    'contact_number' => $request->contact_number,
    'consultant_id' => $request->consuler_id,
    'rating' => $request->star_rating,
    'behaviour_satis_level' => $request->behaviour,
    'timely_response' => $request->timely_response,
    'call_response' => $request->call_response,
    'knowledge' => $request->knowledge,
    'likelihood' => $request->likelihood,
    'customer_experience' => $request->customer_experience,
];
// Check if a record with the same data already exists
$existingRecord = client_feedback::where($inputData)->first();

if (!$existingRecord) {
    $feedback = new client_feedback($inputData);
    $feedback->save();
     //////Now average_rating of consuler in this table///////////////
    $avg_rating =[ 'average_rating'  => client_feedback::where('consultant_id', $request->consuler_id)->pluck('rating')->avg(),];
    // client_feedback::Insert(['consultant_id' => $request->consuler_id],  $avg_rating);
    client_feedback::updateOrInsert(['consultant_id' => $request->consuler_id], $avg_rating);
    return response()->json(['success' => 'success', 'message' => 'Thank you ' . $request->full_name . ' for giving Feedback']);
} else {
    return response()->json(['success' => "warning", 'message' => 'Your Feedback already submitted']);
}
}
}
public function showfeedback(){
$client_feedback=client_feedback::all();
// $clientFeedbacks = client_feedback::with('Consultant')->get();

return response()->json($client_feedback);

}
public function deletefeedback($id){
  client_feedback::where('id',$id)->delete();
  $client_feedback=$id;
  return response()->json($client_feedback);
  
  }
  public function updatefeedback($id){
//   $jsondata = json_decode(file_get_contents("php://input"), true);
  print_r($jsondata);
//   $data=client_feedback::where('id',$id)->update($jsondata);
//   return response()->json($data);
  
  }
}
