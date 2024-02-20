<?php

namespace App\Http\Controllers\Admin;

use App\Model\ApplicationForm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Notifications;
use Auth;
use App\Model\UniversityDetail;
use App\Model\Student;
use Mail;

class ApplicationFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ApplicationForm::with('university', 'course', 'student')->orderBy('created_at', 'DESC')->get();
        return view('admin.application', ['data'=>$data]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\ApplicationForm  $applicationForm
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ApplicationForm::where('id', $id)->first();
        return view('admin.view_application', ['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\ApplicationForm  $applicationForm
     * @return \Illuminate\Http\Response
     */
    public function edit(ApplicationForm $applicationForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ApplicationForm  $applicationForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApplicationForm $applicationForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ApplicationForm  $applicationForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApplicationForm $applicationForm)
    {
        //
    }

    public function changeStatus(Request $request){
        $app = ApplicationForm::find($request->id);
        $app->status = (int)$request->status;
        $app->save();
        $status = '';
        if($request->status==0){
            $status = 'Rejected';
        }elseif($request->status==1){
            $status = 'Accepted';
        }elseif($request->status==2){
            $status = 'Pending';
        }elseif($request->status==3){
            $status = 'Process';
        }
        $student = Student::where('user_id', $app->student_id)->first();
        Notifications::create([
            'type'=>'application_status',
            'name'=> $app->university->name,
            'email'=> $app->university->users->email,
            'meta'=> $status,
            'university_id'=> $app->university_id,
            'student_id'=> $student->id,
            'user_id'=> $student->user_id,
            'is_read'=>0,
        ]);
        Notifications::noUser();
        try{
            $app_id = $app->application_id.'-'.$app->id;
            $course = $app->course->name;
            $uni = $app->university->name;
            $email = $app->student->users->email;
            $name = $app->student->name;
            $datas = ['app_id'=>$app_id, 'course'=>$course, 'uni'=>$uni,'name'=>$name,'email',$email,'status'=>$status];
            Mail::send('emails.app_status', $datas, function ($m) use($name,$email,$status) {
                $m->from('noreply@universitiespage.com', 'Universities Page');
                $m->to($email, $name)->subject('Application Status ('.$status.')');
            });
        }catch(\Exception $e){
            //
        }
        return redirect()->back();
    }
}
