<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\UniversityDetail;
use App\User;
use App\Model\Course;
use Mail;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Model\Notifications;
use App\Model\News;
use App\Model\Blog;
use App\Model\Guide;
use Auth;
use Exception;
use DB;

class UniversityController extends Controller
{
    public function index()
    {
    	$data = User::where('user_type', 'university')->with(['university_detail'=> function($que){$que->where('display', 1)->get();}])->where('is_active', 1)->orderBy('created_at', 'DESC')->get();
    	return view('admin.university',['data'=>$data]);
    }

    public function create()
    {
    	return view('admin.add_university');
    }

    public function store(Request $request) 
    {
    	$this->validate($request, [
            'first_name' => 'required|string',
            // 'email' => 'required|string|email|max:255|unique:users',
            // 'phone' => 'required',
            // 'university_name'=> 'required'
        ]);
        $random_email = substr(md5(mt_rand()), 0, 12);
        $random_email2 = substr(md5(mt_rand()), 0, 5);
        $request['email'] = $random_email.'@'.$random_email2.'.edu';
        // $data = ['name'=>$request->university_name,'email'=>$request->email,'password'=>$request->password, 'type'=>'University'];
        $request['user_type'] = ($request->has('user_type'))?$request->user_type:'admin';
        $request['is_verified'] = 1;
        $request['password'] = bcrypt('qwerty123456!@#$%^');
        $user = User::creator($request);
        $uni = UniversityDetail::creator($request, $user->id);
        // try{
        //     if(request()->has('email')){
        //         $email = $request->email;
        //         $name = $user->first_name;
        //         Mail::send('emails.user_created', $data, function ($m) use($name,$email) {
        //             $m->from('noreply@universitiespage.com', 'University');
        //             $m->to($email, $name)->subject('Your Account has beed created');
        //         });
        //     }
        // }catch(\Exception $e){
        //     //
        // }
        Notifications::create([
            'type'=>'account',
            'name'=>$request->university_name,
            'email'=>$request->email,
            'university_id'=>$uni->id,
            'meta'=>'New University',
            'is_read'=>0,
        ]);
        Session::flash('success', 'Successfully Saved');
        return Redirect::route('university.index');
    }

    public function edit($id)
    {
    	$data = User::where('id', $id)->with(['university_detail'=> function($que){$que->where('display', 1)->get();}])->where('is_active', 1)->first();
        $news = News::where('university_id', $data->university_detail->id)->orderBy('created_at', 'DESC')->get();
    	return view('admin.edit_university',['data'=>$data,'news'=>$news]);
    }

    public function update($id,Request $request)
    {
    	$this->validate($request, [
            'first_name' => 'required|string',
            // 'email' => 'required|string|email|max:255|',
            // 'phone' => 'required',
            // 'university_name'=> 'required'
        ]);
        $user = User::find($id);
        // $data = ['name'=>$request->university_name,'email'=>$request->email,'password'=>$password, 'type'=>'University'];
        $request['user_type'] = ($request->has('user_type'))?$request->user_type:'admin';
        $request['is_verified'] = 1;
        $request['password'] = bcrypt('qwerty123456!@#$%^');
        User::updator($id, $request);
        UniversityDetail::updator($request, $id);
        // if($request->has('university_email') && request('university_email') !== null){
        //     $email = $request['university_email']; $name = $user['first_name'];
        //     Mail::send('emails.user_created', $data, function ($m) use($name,$email) {
        //         $m->from('noreply@universitiespage.com', 'University');
        //         $m->to($email, $name)->subject('Your Account has beed created');
        //     });
        // }
        Session::flash('success', 'Successfully Updated');
        return Redirect::route('university.index');

    }

    public function destroy($id,Request $request)
    {
        // dd($id);
    	$uni = UniversityDetail::where('user_id', $id)->first();
        $uni->display = 0;
        $uni->save();
        $users = User::findOrFail($id);
        $users->is_active = 0;
        $users->save();
    	return Redirect::route('university.index');
    }

    public function getCourse(Request $request){
        $course = Course::where('university_id', $request->id)->get();
        $html = '<option value="" selected>All Courses</option>';
        foreach ($course as $key => $value) {
            $html .= '<option value="'.$value->name.'">'.$value->name.'</option>';
        }
        return response()->json($html);
    }

    public function popular(Request $request){
        $post = UniversityDetail::find($request->id);
        if($post['popular']=='1') {
            $post->update(['popular'=>0]);
        } else {
            $post->update(['popular'=>1]);
        }
        return response()->json("success");
    }

    public function register(Request $request){
        $request->validate([
            'user_type'=> 'required',
            'university_name'=> 'required|string|max:255',
            'founded_in'=> 'required|max:255',
            'country'=> 'required|max:255',
            'city'=> 'required|max:255',
            'address'=> 'required',
            'postcode'=> 'required|max:255',
            'first_name'=> 'required|string|max:255',
            'designation'=> 'required',
            'email'=> 'required|string|email|max:255|unique:users',
            'alternate_email'=> 'required|string|email|max:255',
            'password'=> 'required|confirmed|min:6',
            'phone'=> 'required|max:15',
            'agency_number'=> 'required|max:15',
        ]);

        $data = ['name'=>$request->university_name,'email'=>$request->email,'password'=>$request->password];
        $request['user_type'] = 'university';
        $request['is_verified'] = 1;
        $request['active'] = 1;
        $request['phone_no'] = $request->phone;
        // dd($request->all());
        $user = User::creator($request);
        UniversityDetail::creator($request, $user->id);
        if(request('university_email') !== null){
            $email = $request['university_email']; $name = $user['first_name'];
            Mail::send('emails.user_created', $data, function ($m) use($name,$email) {
                $m->from('noreply@universitiespage.com', 'University');
                $m->to($email, $name)->subject('Your Account has beed created');
            });
        }
        Auth::loginUsingId($user->id);
        return response()->json(1);
    }

    public function course(Request $request){

        //dd($request->input());


        $courses = [];
        $universities = [];
        $guides = [];
        $articles = [];
        $raw = 'active = 1 and display = 1';
        $c_raw = 'active = 1 and display = 1';
        // $c_raw .= " and deadline >= '".date('Y-m-d')."'";
        $g_raw = 'guide_type IS NOT null ';
        $a_raw = 'id IS NOT null ';

        if($request->has('location')){
            $scho = $request->location;
            if($scho !== 2){
                $raw .= " and country = '".$scho ."'";
            }
        }

        if($request->has('scholarship')){
            $scho = (int)$request->scholarship;
            if($scho !== 2){
                $raw .= " and scholarship = ".$scho;
            }
        } 

        if($request->subject!=0){

            $c_raw .= ' and subject_id = '.(int)$request->subject;
        }

        if($request->university!=0){

            $c_raw .= ' and university_id = '.(int)$request->university;
        }

        if($request->has('star')){

            $raw .= " and ranking <= ".$request->star;
        }

        if($request->has('languages')){

            $languages = explode( ',', strtolower(  $request->languages));
            $raw .= ' and (';
            $c_raw .= ' and (';
            $or = '';

            foreach ($languages as $key => $value) {
                (!$key==0)?$or =' or':'';
                $raw .= $or." languages LIKE '%".$value."%' ";
                $c_raw .= $or." languages LIKE '%".$value."%' ";
            }


            $raw .= ')';
            $c_raw .= ')';
        }/*else{
            $raw .= " and languages = 'null' ";
            $c_raw .= " and languages = 'null' ";
        }*/

        if($request->has('qualification')){
            $qualification = $request->qualification;
            $c_raw .= " and qualification IN (".$qualification.") ";
        }
        
        if($request->has('minDur') || $request->has('maxDur')){
            $minDur = ($request->minDur)??0;
            $maxDur = ($request->maxDur)?$request->maxDur:Course::where('active',1)->where('display',1)->orderBy('duration_qty','DESC')->value('duration_qty');
            if($minDur > $maxDur){
                $_GET['minDur'] = $_GET['maxDur'];
                $_GET['maxDur'] = $minDur;
                $minDur = $maxDur;
                $maxDur = $_GET['maxDur'];
            }
            $c_raw .= 'and ( duration_qty between '.(int)$minDur.' and '.(int)$maxDur.' or duration is null ) ';
        }

        if($request->has('minFee') || $request->has('maxFee')){
            $minFee = ($request->minFee)??0;
            $maxFee = ($request->maxFee)?$request->maxFee:Course::where('active',1)->where('display',1)->orderBy('duration_qty','DESC')->value('yearly_fee');
            if($minFee > $maxFee){
                $_GET['minFee'] = $_GET['maxFee'];
                $_GET['maxFee'] = $minFee;
                $minFee = $maxFee;
                $maxFee = $_GET['maxFee'];
            }
            $c_raw .= 'and ( yearly_fee between '.(int)$minFee.' and '.(int)$maxFee.' or duration is null ) ';
        }

        if($request->has('guide') && $request->guide!==null){
            $guide = explode( ',', $request->guide);
            $g_raw .= ' and (';
            $or = '';
            
            foreach ($guide as $key => $value) {
                (!$key==0)?$or =' or':'';
                $g_raw .= $or." guide_type = '".$value."' ";
            }
            $g_raw .= ')';
        }else{

            $g_raw .= " and guide_type = 'null' ";
        }

        if($request->search!=null){
            $s = $request->search;
            $u_id = Course::where('name', 'LIKE', '%'.$s.'%')->pluck('id')->toArray();
            $u_id = implode(',', $u_id);
            $u_id = ($u_id=='')?0:$u_id;
            $raw .= " and ( id in (".$u_id.") or name LIKE '%".$s."%' or country LIKE '".$s."%' or city LIKE '".$s."%' or address LIKE '".$s."%' or languages LIKE '%".$s."%' or intake LIKE '%".$s."%' ) ";
            $c_raw .= " and ( name LIKE '%".$s."%' or languages LIKE '%".$s."%' or duration LIKE '%".$s."%' ) ";
            $g_raw .= " and ( title LIKE '%".$s."%' or sub_title LIKE '".$s."%') ";
            $a_raw .= " and ( title LIKE '%".$s."%' or short_description LIKE '".$s."%') ";
        }

        // if(isset($request->type) && $request->type=='university'){
        //     $universities = UniversityDetail::with(['courses'=>function($que) use($c_raw){
        //                     $que->whereRaw($c_raw)->orderBy('sort_order','ASC')
        //                     ->whereDate('deadline', '>=', date('Y-m-d'))->orderBy('name');
        //                     }, 'courses.qualificationName'])->whereRaw($raw)
        //                     ->selectRaw('(select count(*) from courses where '.$c_raw.' and courses.university_id = university_details.id) AS course_count,university_details.*')
        //                     ->orderBy('course_count','DESC')->paginate(($request->limit)??10);
        // }elseif(isset($request->type) && $request->type=='course'){
        //     // dd($c_raw);

        //     $courses = Course::whereRaw($c_raw)->with('university', 'qualificationName', 'subject')
        //                         ->orderBy('name')->paginate(($request->limit)??10);
        // }elseif(isset($request->type) && $request->type=='guide'){

        //     $guides = Guide::whereRaw($g_raw)->with('university', 'subject')->orderBy('sort_order', 'ASC')->paginate(($request->limit)??10);
        // }elseif(isset($request->type) && $request->type=='articles'){

        //     $articles = Blog::whereRaw($a_raw)->orderBy('sort_order', 'ASC')->paginate(($request->limit)??10);
        // }else{
            $universities = UniversityDetail::with(['courses'=>function($que) use($c_raw){
                            $que->whereRaw($c_raw)->orderBy('sort_order','ASC')
                            ->whereDate('deadline', '>=', date('Y-m-d'))->orderBy('name');
                            }, 'courses.qualificationName'])->whereRaw($raw)
                            ->selectRaw('(select count(*) from courses where courses.university_id = university_details.id) AS course_count,university_details.*')
                            ->orderBy('course_count','DESC')->paginate(($request->limit)??10);

            $courses = Course::whereRaw($c_raw)->with('university','qualificationName','subject')
                        ->orderBy('name')->paginate(($request->limit)??10);

            $guides = Guide::whereRaw($g_raw)->with('university', 'subject')->orderBy('sort_order', 'ASC')->paginate(($request->limit)??10);

            $articles = Blog::whereRaw($a_raw)->orderBy('sort_order', 'ASC')->paginate(($request->limit)??10);
        // }
        

        return response()->json(['universities'=>$universities,'courses'=>$courses,'guides'=>$guides, 'articles'=>$articles]);

    }

    public function getUniCourse(Request $request){
        $uni = (int)($request->university)??0;
        $raw = 'university_id = '.$uni.' and active = 1 and display = 1 and (deadline >= '.date('Y-m-d').' || deadline is Null)';
        if($request->subject!=0){
            $raw .= ' and subject_id = '.$request->subject;
        }
        if($request->qualification!=0){
            $raw .= ' and qualification = '.$request->qualification;
        }
        if($request->search!=null){
            $s = $request->search;
            $raw .= ' and name LIKE "%'.$s.'%"';
        }
        $course = Course::whereRaw($raw)->orderBy('created_at','DESC')
                        ->with('qualificationName', 'subject')
                        ->paginate(($request->limit)??10);

        return response()->json($course);
    }

    public function saveNews(Request $request){
        $data = $request->all();
        $data['title'] = ($request->news_title)??null;
        $data['title'] = ($request->news_title)??null;
        $data['description'] = ($request->news_description)??null;
        News::create($data);
        $news = News::where('university_id', $request->university_id)->orderBy('created_at', 'DESC')->get();
        $news = view('ajax.news_list', compact('news'))->render();
        return response(['news'=>$news]);
    }

    public function deleteNews(Request $request){
        $data = $request->id;
        $n = News::find($data);
        $n->delete();
        $news = News::where('university_id', $n->university_id)->orderBy('created_at', 'DESC')->get();
        $news = view('ajax.news_list', compact('news'))->render();
        return response(['news'=>$news]);
    }

    public function editNews(Request $request){
        $id = $request->id;
        $news = News::find($id);
        return response($news);
    }

    public function updateNews(Request $request){
        $data = $request->all();
        $data['title'] = ($request->news_title)??null;
        $data['title'] = ($request->news_title)??null;
        $data['description'] = ($request->news_description)??null;
        News::find($request->new_id)->update($data);
        $news = News::where('university_id', $request->university_id)->orderBy('created_at', 'DESC')->get();
        $news = view('ajax.news_list', compact('news'))->render();
        return response(['news'=>$news]);
    }
}
