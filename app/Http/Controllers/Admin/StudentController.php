<?php

namespace App\Http\Controllers\Admin;

use App\Model\Student;
use App\Model\Consultant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use Session;
use Auth;
use App\User;
use App\Model\Notifications;
use Illuminate\Support\Facades\Redirect;
use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $data = User::where('user_type', 'student')->with('students')->get();
        //print_r($data); exit();
        return view('admin.student',['data'=>$data]);
    }

    public function indexconsultant()
    { 
        $data = User::where('user_type', 'consultant')->with('students')->get();
        //print_r($data); exit();
        return view('admin.consultant',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

  if($request['user_type'] == 'student') {

    $this->validate($request, [
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|confirmed|min:6',
        'phone' => 'required',
        'country' => 'required',
        'gender' => 'required',
        'prefer' => 'required',
        'terms' => 'required|in:1',
    ]);

    $meta = 'New Student';

  } else {

    $this->validate($request, [
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|confirmed|min:6',
        'phone' => 'required',
        'country' => 'required',
        'company_name' => 'required',
        'employeeno' => 'required',
        'state' => 'required',
        'designation' => 'required',
        'comment' => 'required',
        'terms' => 'required|in:1',
    ]);

    $meta = 'New Consultant';

  }



        $data = ['name'=>$request->first_name.' '.$request->last_name ,'email'=>$request->email,'password'=>$request->password, 'type'=>'Student'];
        $request['user_type'] = ($request->has('user_type'))?$request->user_type:'admin';
        $request['is_verified'] = 1;
        $request['is_active'] = 1;
        $user = User::creator($request);

        if($request['user_type'] == 'student') {
            $stud = Student::creator($request, $user->id);
        } else {
            $stud = Consultant::creator($request, $user->id);
        }

        
        try{    
            if(request('email') !== null){
                $email = $request['email']; $name = $user['first_name'].' '.$user['last_name'];
                Mail::send('emails.user_created', $data, function ($m) use($name,$email) {
                    $m->from('noreply@universitiespage.com', 'University');
                    $m->to($email, $name)->subject('Your Account has been created');
                });
            }
        } catch(\Exception $e){
            //
        }
        $full_name = $request->first_name.' '.$request->last_name;
        Notifications::create([
            'type'=>'account',
            'name'=>$full_name,
            'email'=>$request->email,
            'student_id'=>$stud->id,
            'meta'=> $meta,
            'is_read'=>0,
        ]);
        Auth::loginUsingId($user->id);

        if($request->has('terms')){
            return response()->json(1);
        }
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Student::where('id', $id)->with('users', 'prefers')->first();
        return view('admin.view_student',['data'=>$data]);
    }


    public function showconsultant($id)
    { 
        $data = Consultant::where('user_id', $id)->with('users', 'prefers')->first();
        
        return view('admin.view_consultant',['data'=>$data]);
    }

    public function showconsultantstudent($id)
    { 
        $data = DB::Table('cstudents')->select('*')->where('consultant_id',$id)->get();

        return view('admin.view_consultant_students',['cstudents'=>$data]);
    }

    public function edit_student_report(Request $request)
    {   
        $intial_documents_assessment = $request->intial_documents_assessment;
        $course_finalaztion = $request->course_finalaztion;
        $application_submitted = $request->application_submitted;
        $got_admission = $request->got_admission;
        $visa_applied = $request->visa_applied;
        $case_closed = $request->case_closed;
        $recordid = $request->recordid;

        if(DB::insert("UPDATE cstudents SET `intial_documents_assessment`='$intial_documents_assessment',`course_finalaztion`='$course_finalaztion',`got_admission`='$got_admission',`visa_applied`='$visa_applied',`case_closed`='$case_closed',`application_submitted`='$application_submitted' WHERE id = '".$recordid."'")) {

            echo json_encode(array('message' => 'success', 'message_text' => 'Record Has Been Successfully Inserted'));  exit();
        } else {
            echo json_encode(array('message' => 'error', 'message_text' => 'There is an Error While Inserting The Record'));  exit();
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'phone' => 'required',
            'country' => 'required',
            'gender' => 'required',
            'prefer' => 'required',
        ]);

        User::updator($id, $request);
        Student::updator($request, $id);
        Session::flash('success', 'Successfully Updated');
        return redirect('dashboard#profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if((int)$student->active == 1){
            $st = Student::findOrFail($id);
            $st->active = 0;
            $st->save();
            $us = User::findOrFail($student->user_id);
            $us->is_active = 0;
            $us->save();
        }else{
            $st = Student::findOrFail($id);
            $st->active = 1;
            $st->save();
            $us = User::findOrFail($student->user_id);
            $us->is_active = 1;
            $us->save();
        }
        return redirect()->back();
    }
}
