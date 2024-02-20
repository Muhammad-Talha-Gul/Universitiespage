<?php

namespace App\Http\Controllers\Admin;

use App\Model\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\UniversityDetail;
use App\User;
use Mail;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;

class CourseController extends Controller
{
    public function index()
    {
        $xmlCourses = Course::select("id","name")->distinct()->get();
        $data = Course::with(['university', 'subject'])->where('display', 1)->orderBy('id', 'DESC')->paginate(100);
        $uni = collect();
        return view('admin.course',['data'=>$data,'uni'=>$uni,'xmlCourses'=>$xmlCourses]);
    }
    public function courses($name = null){
        $xmlCourses = Course::select("id","name")->distinct()->get();
        
        if (!empty($name)) {
            $data = Course::with(['university' , 'subject'])->where('display', 1)
                ->where('name', 'like', '%' . $name . '%')
                ->orderBy('id', 'DESC')->paginate(100);
            if (count($data) < 1 ){
               $data = collect();
                $uni = UniversityDetail::with(['courses' , 'courses.subject'])->where('name', 'like', '%' . $name . '%')->where('display', 1)->paginate(100);
                return view('admin.course_partial', ['data' => $data ,'uni'=>$uni,'xmlCourses'=>$xmlCourses])->render();
            }
            $uni = collect();
            return view('admin.course_partial', ['data' => $data ,'uni'=>$uni,'xmlCourses'=>$xmlCourses])->render();
        }else {
            $uni = collect();
            $data = Course::with(['university', 'subject'])->where('display', 1)->orderBy('id', 'DESC')->paginate(100);
            return view('admin.course_partial', ['data' => $data ,'uni'=>$uni,'xmlCourses'=>$xmlCourses])->render();
        }
    }

    public function create()
    {
        $universities = UniversityDetail::where('active', 1)->where('display',1)->get();
        return view('admin.add_course', compact('universities'));
    }

    public function store(Request $request) 
    {

//         dd($request->all());
        $this->validate($request, [
            'name' => 'required|string',
            'qualification' => 'required',
            'university_id' => 'required',
        ]);

        Course::creator($request);
        if($request->has('profile')){
            return Redirect::route('dashboard_course');
        }else{
            return Redirect::route('course.index');
        }
    }

    public function edit($id)
    {
        $universities = UniversityDetail::where('active', 1)->where('display',1)->get();
        $data = Course::where('id', $id)->where('display',1)->first();
        return view('admin.edit_course',['data'=>$data,'universities'=>$universities]);
    }

    public function update($id,Request $request)
    {
//        dd($request);
        $this->validate($request, [
            'name' => 'required|string',
            'qualification' => 'required',
            'university_id' => 'required',
        ]);
        
        Course::updator($request, $id);
        if($request->has('profile')){
            return Redirect::route('dashboard_course');
        }else{
            return Redirect::route('course.index');
        }

    }

    public function destroy($id,Request $request)
    {
        $cou = Course::findOrFail($id);
        $cou->display = 0;
        $cou->save();
        return redirect()->back();
    }

    public function selectedCourse(Request $request){
        if(isset($request->id)){
            $course = Course::where('id', $request->id)->with('university')->first();
            $html = '
              <div class="ous-p-callout-snapshot__pair">
                 <dt class="ous-p-callout-snapshot__key h4 text-black caps">University:</dt>
                 <dd class="ous-p-callout-snapshot__value sans-serif">'.$course->university->name.'</dd>
              </div>
              <div class="ous-p-callout-snapshot__pair">
                 <dt class="ous-p-callout-snapshot__key h4 text-black caps">Est. time to complete:</dt>
                 <dd class="ous-p-callout-snapshot__value sans-serif">'.$course->duration.'</dd>
              </div>
              <div class="ous-p-callout-snapshot__pair">
                 <dt class="ous-p-callout-snapshot__key h4 text-black caps">Yearly Fee:</dt>
                 <dd class="ous-p-callout-snapshot__value sans-serif">RMB '.$course->yearly_fee.'</dd>
              </div>   
            ';
            return response()->json($html);
        }
    }

    

    public function studentSearch(Request $request){

        $raw = 'courses.active = 1 and courses.display = 1';
        if($request->university!=''){
            $uni = (int)$request->university;
            $raw .= " and university_details.id = ".$uni;
        }
        if($request->country!=''){
            $raw .= " and university_details.country = '".$request->country."'";
        }
        if($request->scholarship!=''){
            $raw .= " and courses.scholarship = ".(int)$request->scholarship;
        }
        if($request->fee!=''){
            $raw .= " and courses.yearly_fee ".$request->fee;
        }
        if($request->languages!=''){
            $languages = explode( ',', $request->languages);
            $raw .= ' and (';
            $or = '';
            
            foreach ($languages as $key => $value) {
                (!$key==0)?$or =' or':'';
                $raw .= $or." courses.languages LIKE '%".$value."%' ";
            }
            $raw .= ')';
        }
        if($request->duration!=''){
            $durations = explode( ',', $request->duration);
            $raw .= ' and (';
            $or = '';
            foreach ($durations as $key => $value) {
                (!$key==0)?$or =' or':'';
                if($value == '1'){
                    $raw .= $or." courses.duration LIKE '1%'";
                }elseif($value == '1-3'){
                    $raw .= $or." courses.duration LIKE '1%'";
                    $raw .= " or courses.duration LIKE '2%'";
                    $raw .= " or courses.duration LIKE '3%'";
                }elseif($value == '3-5'){
                    $raw .= $or." courses.duration LIKE '3%'";
                    $raw .= " or courses.duration LIKE '4%'";
                    $raw .= " or courses.duration LIKE '5%'";
                }elseif($value == '5'){
                    $raw .= $or." courses.duration LIKE '5%'";
                    $raw .= " or courses.duration LIKE '6%'";
                    $raw .= " or courses.duration LIKE '7%'";
                    $raw .= " or courses.duration LIKE '8%'";
                    $raw .= " or courses.duration LIKE '9%'";
                    $raw .= " or courses.duration LIKE '10%'";
                    $raw .= " or courses.duration LIKE '11%'";
                    $raw .= " or courses.duration LIKE '12%'";
                }
            }
            $raw .= ')';
            // dd($raw);
        }
        if($request->qualification!=''){
            $qualifications = explode( ',', $request->qualification);
            $raw .= ' and (';
            $or = '';
            foreach ($qualifications as $key => $value) {
                (!$key==0)?$or =' or':'';
                $raw .= $or." courses.qualification = ".$value;
            }
            $raw .= ')';
        }
        if($request->search!=null){
            $s = $request->search;
            $raw .= " and ( courses.name LIKE '%".$s."%' or courses.duration LIKE '".$s."%' or courses.yearly_fee LIKE '".$s."%' or courses.languages LIKE '%".$s."%' or university_details.name LIKE '%".$s."%' or posts.title LIKE '%".$s."%' or  DATE_FORMAT(courses.starting_date,'%W %D %M %Y') LIKE '%".$s."%' or  DATE_FORMAT(courses.deadline,'%W %D %M %Y') LIKE '%".$s."%'  )";
        }
        $raw .= " and (courses.deadline >= ".date('Y-m-d')." or courses.deadline IS NULL)";
            // dd($raw);
        $course = Course::join('university_details','university_details.id', '=','courses.university_id')
                        ->join('posts','posts.id', '=','courses.qualification')
                        ->select('courses.*', 'university_details.name AS university_name', 'university_details.ranking', 'posts.title', 'university_details.logo', 'university_details.slug')
                        ->whereRaw($raw)->orderBy("name")->paginate(($request->limit)??12);
        return response()->json(['courses'=>$course]);
    }
}
