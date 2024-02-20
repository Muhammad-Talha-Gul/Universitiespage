<?php

namespace App\Http\Controllers\Admin;

use App\Model\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use Session;
use Auth;
use App\User;
use App\Model\Notifications;
use Illuminate\Support\Facades\Redirect;

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
        return view('admin.student',['data'=>$data]);
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

        $data = ['name'=>$request->first_name.' '.$request->last_name ,'email'=>$request->email,'password'=>$request->password, 'type'=>'Student'];
        $request['user_type'] = ($request->has('user_type'))?$request->user_type:'admin';
        $request['is_verified'] = 1;
        $request['is_active'] = 1;
        $user = User::creator($request);
        $stud = Student::creator($request, $user->id);
        try{    
            if(request('email') !== null){
                $email = $request['email']; $name = $user['first_name'].' '.$user['last_name'];
                Mail::send('emails.user_created', $data, function ($m) use($name,$email) {
                    $m->from('noreply@universitiespage.com', 'University');
                    $m->to($email, $name)->subject('Your Account has beed created');
                });
            }
        }catch(\Exception $e){
            //
        }
        $full_name = $request->first_name.' '.$request->last_name;
        Notifications::create([
            'type'=>'account',
            'name'=>$full_name,
            'email'=>$request->email,
            'student_id'=>$stud->id,
            'meta'=>'New Student',
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
