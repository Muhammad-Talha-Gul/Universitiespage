<?php

namespace App\Http\Controllers\FrontEnd;

use App\Model\FreeConsulation;
use App\Model\ApplyNow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Cookie\CookieJar;
use App\Model\CustomProductType;
use App\Model\CustomPostType;
use App\Model\CustomCategory;
use App\Model\Brands;
use App\Model\Downloads;
use App\Model\Posts;
use App\Model\PostReviews;
use App\Model\PostsComments;
use App\Model\PostComponents;
use App\Model\Orders;
use App\Model\ConsultantForm;
use App\Model\OrderDetail;
use App\Model\Subject;
use App\Model\ApplicationForm;
use App\Model\CMS;
use Validator;
use App\Model\Team;
use App\Model\Student;
use App\Model\Testimonials;
use App\Model\FAQs;
use App\Model\UniversityDetail;
use App\Model\Review;
use App\Model\Logos;
use App\Model\Course;
use App\Model\Pages;
use App\Model\PlanMaster;
use App\Model\PlanDetail;
use App\Model\PageComponents;
use App\Model\News;
use App\Model\BlogCategory;
use App\Model\Media;
use App\Model\Support;
use App\Model\Wishlist;
use App\Model\UserArticles;
use App\Model\Visitors;
use App\Model\Notifications;
use App\Model\Subscribers;
use App\Model\ContactMails;
use App\Model\Blog;
use App\Model\Preferences;
use App\Model\Consultant;
use App\Model\Guide;
use App\Model\VisaCountries;
use App\Model\VisaDetails;
use App\Model\ContactButton;
use App\Model\DiscountOffers;
use App\Model\WebEvents;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Auth\Passwords\PasswordBroker;

use App\User;
use Hash;
use Response;
use Session;
use Auth;
use Mail;
use Cookie;
use Storage;
use DB;

class HomeController extends Controller
{
      public function complaintPage()
      {
        return view('frontend.complaint');
      }
       public function discountOfferPage()
      {
        return view('frontend.discountOffer');
      }
    public function submitOffer(Request $request)
    { 
        
        $data = $request->all(); //print_r($data); exit;
        $mail = DiscountOffers::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'lastEducation'=>($request->lastEducation)??'', 
            'lastEducationPer'=>($request->lastEducationPer)??'',
            'phone'=>($request->phone)??'',
            'location'=>($request->location),
            'company'=>($request->company)??'',
            'familyDetail'=>$request->familyDetail
        ]);

       
        Session::flash('success','Thank You for contacting us :)');
        return redirect('discount-offer?message=success');
    }
    
    


    public function event_trigger_web(Request $request)
    { 
        
        
        $mail = WebEvents::create([
            'action_button'=>$request->action_button,
            'page_hit_name'=>$request->page_hit_name,
            'whatsapp_button_text'=>$request->whatsapp_button_text,
            'type' => "button"
        ]);

       
    }

    public function site_notifications()
    {
        $resp = [];
        if(isset(orders_nsettings()['enabled']) && orders_nsettings()['enabled']==1) {
            if(isset(orders_nsettings()['type']) && orders_nsettings()['type']=="orders") {
                foreach(notifications_orders() as $key => $value) {
                    $resp['image'][] = (isset($value->orderdetail->first()->item->image))?url($value->orderdetail->first()->item->image):'';
                    $resp['product'][] = (isset($value->orderdetail->first()->item->title))?str_limit($value->orderdetail->first()->item->title,30,'...'):'';
                    $resp['link'][] = (isset($value->orderdetail->first()->item->link))?route('product_detail',$value->orderdetail->first()->item->slug):'';
                    $resp['user'][] = (isset($value->user->first_name))?$value->user->first_name.' '.$value->user->last_name:'';
                    $resp['city'][] = (isset($value->user->city))?$value->user->city:'';
                    $resp['country'][] = (isset($value->user->country))?$value->user->country:'';
                }
            } else {
                foreach(notifications_forders() as $key => $value) {
                    $resp['image'][] = (isset($value->item->image))?url($value->item->image):'';
                    $resp['product'][] = (isset($value->item->title))?str_limit($value->item->title,30,'...'):'';
                    $resp['link'][] = (isset($value->item->slug))?route('product_detail',$value->item->slug):'';
                    $resp['user'][] = $value->customer;
                    $resp['city'][] = $value->city;
                    $resp['country'][] = $value->country;
                }
            }
        }
        return response()->json($resp);
    }
    
    public function getStats()
    {
        $data = [
            'ip_address' => (isset($_SERVER['REMOTE_ADDR']))?$_SERVER['REMOTE_ADDR']:'',
            'uri' => (isset($_SERVER['REQUEST_URI']))?$_SERVER['REQUEST_URI']:'',
            'referer' => isset($_SERVER['HTTP_REFERER']) ? get_domain($_SERVER['HTTP_REFERER']) : '',
            'referer_type' => isset($_SERVER['HTTP_REFERER']) ? get_reftype($_SERVER['HTTP_REFERER']) : 'direct',
            'device' => detectDevice(),
            'location' => ip_info($_SERVER['REMOTE_ADDR'],'country'),
            'region' => ip_info($_SERVER['REMOTE_ADDR'],'region'),
            'city' => ip_info($_SERVER['REMOTE_ADDR'],'city'),
            'timezone' => ip_info($_SERVER['REMOTE_ADDR'],'timezone'),
            'latitude' => ip_info($_SERVER['REMOTE_ADDR'],'lat'),
            'longitude' => ip_info($_SERVER['REMOTE_ADDR'],'long'),
        ];
        Visitors::create($data);
    }

    public function index()
    {
       
        $data = Pages::where('is_home',1)->first();
        $type = CustomPostType::where('slug','products')->value('id');
        $components = PageComponents::where('page_id',$data['id'])->OrderBy('sort_order','ASC')->get();
        foreach($components as $key => $value) {
            // if($value->type=="slider"){
            //     $value->meta = Media::find(json_decode($value->meta,true)['id']);
            // } 
            if($value->type=="products") {
                $meta = json_decode($value->meta,true);
                if($meta['type']=='best_seller') {
                    $meta['products'] = Posts::where('post_type',$type)->where('is_active',1)->where('best_seller',1)->limit($meta['limit'])->get();            
                } elseif($meta['type']=='latest') {
                    $meta['products'] = Posts::where('post_type',$type)->where('is_active',1)->OrderBy('id','DESC')->limit($meta['limit'])->get();            
                } elseif($meta['type']=='top_rated') {
                    $meta['products'] = Posts::where('post_type',$type)->where('is_active',1)->where('top_rated',1)->limit($meta['limit'])->get();            
                } elseif($meta['type']=='featured') {
                    $meta['products'] = Posts::where('post_type',$type)->where('is_active',1)->where('is_featured',1)->limit($meta['limit'])->get();            
                } elseif($meta['type']=='category') {
                    $meta['products'] = Posts::where('post_type',$type)->where('is_active',1)->whereIn('category_id',$meta['cat'])->limit($meta['limit'])->get();            
                }
                $value->meta = $meta;
            } elseif($value->type=="p_grid") { $ids = [];
                if(!empty($value->meta)){ $ids =  json_decode($value->meta,true); }
                $value->meta = CustomCategory::whereIn('id',$ids['ids'])->where('is_active',1)->get();
            } elseif($value->type=="ads") {
                $value->meta = Media::find(json_decode($value->meta,true)['id']);
            } elseif($value->type=="banners" || $value->type=="icons" || $value->type=="testimonials" || $value->type=="history" || $value->type=="content" || $value->type=="spacer" || $value->type=="editor" || $value->type=="contact" || $value->type=="tabs" || $value->type=='features'|| $value->type=='image') {
                $value->meta = json_decode($value->meta,true);
            }
            $value->meta = json_decode($value->meta,true);
            
        }
        $slider = [];
        if(!empty($data['slider_id'])) {
            $slider = Media::find($data['slider_id']);
        }
        $this->getStats(); 
        return view('frontend.page',['data'=>$data,'components'=>$components,'slider'=>$slider]);
    }

    public function categories()
    {
        $type = CustomPostType::where('slug','products')->value('id');
        $data = CustomCategory::where('custom_post_type',$type)->whereNull('parent_id')->where('is_active',1)->get();
        return view('frontend.categories',['data'=>$data]);
    }

    public function category_page($slug)
    {
        $data = CustomCategory::where('slug',$slug)->first();
        $cats = [$data['id']];
        if($data->childrens->count()>0) {
            foreach($data->childrens as $child) {
                if($child->childrens->count()>0) {
                    foreach ($child->childrens as $value) {
                        $cats[] = $value->id;
                    }
                }
                $cats[] = $child->id;
            }
        }
        $products = Posts::whereIn('category_id',$cats)->where('is_active',1)->paginate(12);
        $slider = Media::find($data['slider_id']);
        if(!empty($slider) && !empty($slider['meta'])) {
            $slider = json_decode($slider['meta'],true);
        }
        $type = CustomPostType::where('slug','products')->value('id');
        $categories = CustomCategory::where('custom_post_type',$type)->whereNull('parent_id')->where('is_active',1)->get();
        return view('frontend.category',['data'=>$data,'products'=>$products,'categories'=>$categories,'slider'=>$slider]);
    }

    public function search_result(Request $request)
    {        
        $data = [];
        $type = CustomPostType::where('slug','products')->value('id');
        if($request->has('q')) {
            $data = Posts::where('title','like','%'.$request->q.'%')->where('is_active',1)->where('post_type',$type)->paginate(12)->appends('q', request('q'));
            Storage::append('search.txt', $request->q);
        }        
        $categories = CustomCategory::where('custom_post_type',$type)->whereNull('parent_id')->where('is_active',1)->get();
        return view('frontend.search_result',['data'=>$data,'categories'=>$categories]);
    }

    public function guidePage($slug){
        $data=Guide::where('slug', $slug)->where('is_active',1)->first();
        if($data!==null){
            return view('frontend.guide', compact('data'));
        }else{
            return view('errors.404');
        }
    }
    
        public function visitVisa(){ 
            
            
        //$data=VisaCountries::OrderBy('id','DESC')->get();
        $data =DB::table('visa_countries')
            ->leftJoin('visa_details', 'visa_countries.id', '=', 'visa_details.country_id')->OrderBy('visa_countries.id','DESC')->get();
        
        if($data!==null){ 
            return view('frontend.visit_visa', ['datas'=>$data]);
        }else{
            return view('errors.404');
        }
    }
     
     
        public function visaInformation($slug){
           
        $datacountry =DB::table('visa_countries')
            ->leftJoin('visa_details', 'visa_countries.id', '=', 'visa_details.country_id')->OrderBy('visa_countries.id','DESC')->limit(4)->get();
       
        $datas=VisaDetails::where('slug', $slug)->first();
     
            $data['seo'] = $datas['seo'];
            $data['title'] = $datas['visa_title'];
        
        if($data!==null){
            return view('frontend.visa_information', ['data'=>$datas, 'datacountries'=>$datacountry]);
        }else{
            return view('errors.404');
        }
    }
     

    public function product_detail($slug)
    {
        $data = Posts::where('slug',$slug)->first();
        $components = PostComponents::where('post_id',$data['id'])->OrderBy('sort_order','ASC')->get();
        $type = CustomPostType::where('slug','products')->value('id');
        $related = []; $gallery = [];
        if(!empty($data['gallery'])) { $gallery = json_decode($data['gallery'],true); }
        if(!empty($data['related'])) { 
            $ids = json_decode($data['related'],true); 
            $related = Posts::find($ids);
        }
        // $reviews = PostReviews::where('post_id',$data['id'])->where('is_active',1)->OrderBy('id','DESC')->get();
        
        $p_array = [];
        if(!empty(Cookie::get('viewed'))) {
            $viewed = Cookie::get('viewed'); $p_array = unserialize($viewed);
            array_push($p_array, [$data['id']]);
        } else { $p_array = [$data['id']]; }
        $viewed = serialize($p_array);
        Cookie::queue(Cookie::make('viewed', $viewed, 2628000));
        return view('frontend.single_product',['data'=>$data,'related'=>$related,'gallery'=>$gallery,'components'=>$components]);
    }

    public function product_rating($id, Request $request)
    {
        $request['post_id'] = $id;
        $request['user_id'] = (Auth::check())?Auth::user()->id:null;
        $review = PostReviews::create($request->all());
        Notifications::create([
            'type'=>'review',
            'name'=>$request->name,
            'post_id'=>$id,
            'review_id'=>$review['id'],
            'meta'=>'New Review',
            'is_read'=>0,
        ]);       
        return "success";
    }


    public function ajax_search(Request $request)
    {
        $type = CustomPostType::where('slug','products')->value('id');
        $data = Posts::where('title','like','%'.$request->q.'%')->where('is_active',1)->where('post_type',$type)->get();
        return view('includes.frontend.search',['q'=>$request->q,'data'=>$data]);
    }

    public function contact()
    {
        $seo = CMS::where('page','contact')->first();
        return view('frontend.contact',['seo'=>$seo]);
    }

    public function login_page()
    {
        return view('frontend.login');
    }

    public function sendmail(Request $request)
    { 
        $emails = getpreferences()['contact_email'];
        $to = explode(",", trim($emails));
        $data = $request->all(); //print_r($data); exit;
        $mail = ContactMails::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>($request->subject)??'',
            'phone'=>($request->phone)??'',
            'location'=>($request->location),
            'company'=>($request->company)??'',
            'message'=>$request->contact_message,
            'type'=>$request->type,
            'location'=>$request->location,
            'is_read'=>0,
        ]);

        if($request->type == 'email') {
            $subjectmessage = 'Contact Email from University Pages';
            $metamessage = 'New Contact Email';
        } else {
            $subjectmessage = 'Complaint Email from University Pages';
            $metamessage = 'New Complaint Email';
        }

        Notifications::create([
            'type'=>'email',
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>($request->subject)??'',
            'mail_id'=>$mail['id'],
            'meta'=>$metamessage,
            'is_read'=>0,
        ]);



        try{
            Mail::send('emails.contact', $data, function ($m) use($to) {
                $m->from('info@universitiespage.com', 'University Pages');
                $m->to($to)->subject($subjectmessage);
            });
        }catch(\Exception $e){
            //
        }
        if($request->type == 'email') {
          Session::flash('success','Thank You for contacting us :)');
          return redirect('/');
        } else {
          return redirect('complaint?message=success');  
        }
    }

    public function store_user(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
        ]);
        $count = User::where('email',$request->email)->count();
        if($count>0) {
            return $resp = "Email Already Exists";
        }
        else {
            $key = Crypt::encryptString($request->email);
            $user = User::creator($request);
            $data = ['key'=>$key];
            $to = $request->email; $name = $request->first_name.' '.$request->last_name;
            Mail::send('emails.verification', $data, function ($m) use($to, $name) {
                $m->from('info@universitiespage.com', 'University Pages');
                $m->to($to,$name)->subject('Please Verify your email');
            });
        }
        return $resp = "Verification email sent. Please verify your email to proceed;";
    }

    public function verify_email($key)
    {
        $key = Crypt::decryptString($key);
        $user = User::where('email',$key)->first();
        $user->is_verified = 1;
        $user->save();
        if($user['is_active']==0) {
            $name = $user['first_name'].' '.$user['last_name']; $to = $user['email'];
            $password = "g_".rand(0,999);
            $user->update(['password'=>bcrypt($password),'is_active'=>1]);
            $data = ['name'=>$user['first_name'], 'email'=>$user['email'], 'password'=>$password];
            Mail::send('emails.user_activated', $data, function ($m) use($to, $name) {
                $m->from('info@universitiespage.com', 'University Pages');
                $m->to($to,$name)->subject('Your Account has been verified');
            });
        }
        Auth::login($user);
        if(!empty(getCart())) {
            return redirect("/checkout");
        } else {
            return redirect("/");
        }
    }
    /* ===========Amir Edit=========== */
	public function sendresetLink(Request $request){
		$request->validate([
			'email' => 'required|email',
		]);
		$user = User::where('email', '=', $request->email)->first();
		if (!$user) {
			
			return back()->withErrors(
				['email' => 'No match foucd']
			);
		}
		$token = app(PasswordBroker::class)->createToken($user);

		if ($this->sendResetEmail($request->email, $token)) {
			return back()->with('status', 'A reset link is send to your email address!!');
		} else {
			return back()->withErrors(
				['email' => 'something went wrong']
			);
		}
	}
	private function sendResetEmail($email, $token)
	{
		//Retrieve the user from the database
		$user = DB::table('users')->where('email', $email)->select('first_name','last_name', 'email')->first();
		//Generate, the password reset link. The token generated is embedded in the link
		$link = url(\URL::to('/') . '/password/reset/' . $token . '?email=' . urlencode($email));
		$to = $email;
		$name = $user->first_name.' '.$user->last_name; $to = $user->email;
		$data = ['name'=>$name, 'email'=>$to,'link' => $link];
		Mail::send('emails.reset_password', $data, function ($m) use($to, $name) {
			$m->from('info@universitiespage.com', 'University Pages');
			$m->to($to,$name)->subject('Password reset');
		});
		return true;
		
	}
	/* ==========End amir edit=========== */

    public function cart()
    {
        $data = getCart();
        return view('frontend.cart',['data'=>$data]);
    }

    public function addToWishlist(Request $request) {
        $user_id = Auth::user()->id;
        if(Wishlist::where('course_id',$request->course_id)->where('user_id',$user_id)->count()>0) {
            return "error";
        } else {
            Wishlist::create(['course_id'=>$request->course_id,'user_id'=>$user_id]);
            return "success";
        }
    }

    
   
    public function dashboard()
    {
        $user = Auth::user();
        if(isset(auth()->user()->id)){
            $user_id = auth()->user()->id;
        }
        if(Auth::user()->user_type == 'student'){
            $users =Student::where('user_id', $user->id)->first();
            $wishlist = Wishlist::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
            $notifications = Notifications::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
            $app = ApplicationForm::with('university', 'course', 'student')->where('display', 1)->where('student_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
           return view('frontend.student.dashboard', compact('wishlist','notifications','app','users'));
        } elseif(Auth::user()->user_type == 'university'){
            $university = UniversityDetail::where('active', 1)
                                ->where('display', 1)->where('user_id', $user->id)->first();
            return view('frontend.university.dashboard',['user'=>$user,'university'=>$university]);
        } elseif(Auth::user()->user_type == 'consultant'){
            $consultant = Consultant::where('active', 1)->where('user_id', $user->id)->first();
            $cstudents = DB::Table('cstudents')->select('*')->where('consultant_id' , $user_id)->get();
             
            return view('frontend.consultant.dashboard',['cstudents'=>$cstudents,'users'=>$consultant,'consultant'=>$consultant]);
        }
        
    }

    public function profile()
    {
        $data = Auth::user();
        if(Auth::user()->user_type == 'student'){
            $user = User::where('is_active', 1)->where('id', Auth::user()->id)
                                ->with(['students'=>function($que){
                                    $que->where('active', 1)->get();
                                }])->first();
            return view('frontend.student.account',['user'=>$user]); 
        }elseif(Auth::user()->user_type == 'university'){
            $user = User::where('is_active', 1)->where('id', Auth::user()->id)
                                ->with(['university_detail'=>function($que){
                                    $que->where('display', 1)->get();
                                }])->first();
            return view('frontend.university.profile',['user'=>$user]);
        }elseif(Auth::user()->user_type == 'consultant'){
            // auth()->user()->update(['is_active'=>1]);
            $user = User::where('is_active', 1)
                        ->where('id', Auth::user()->id)
                        ->with(['consultant'=>function($que){
                            $que->where('active', 1)->get();
                        }])->first();

            return view('frontend.consultant.account',['user'=>$user]);
        }else{
            return view('errors.404');
        }
    }

    public function course()
    {
        if(Auth::user()->user_type == 'university'){
            $courses = Course::where('display', 1)->where('university_id', Auth::user()->university_detail->id)->paginate(10);
            return view('frontend.university.course',['courses'=>$courses]);
        }else{
            return view('errors.404');
        }
    }

    public function setCourse($id=null)
    {
        if(Auth::user()->user_type == 'university'){
            if($id!==null){
                $course = Course::where('display', 1)->where('id',$id)->where('university_id', Auth::user()->university_detail->id)->first();
            }else{
                $course=[];
            }
            return view('frontend.university.set_course',['course'=>$course]);
        }else{
            return view('errors.404');
        }
    }

    public function consult(){
        if(Auth::user()->user_type == 'consultant'){
            $data = ConsultantForm::where('consultant_id', Auth::user()->consultant->id)->orderBy('created_at', 'DESC')->get();
            return view('frontend.consultant.consult',['data'=>$data]);
        }else{
            return view('errors.404');
        }
    }

    public function update_profile(Request $request)
    {
        $user = Auth::user();
        if($request->email!=$user['email']) {
            $validatedData = $request->validate([
                'email' => 'required|string|email|max:255|unique:users',
            ]);
        }
        $user->update($request->all());
        Session::flash('success','Profile updated successfully!');
        return redirect()->back();
    }

    public function review(){
        if(Auth::user()->user_type == 'university'){
            $data = Review::with('users')->where('university_id', (Auth::user()->university_detail->id)??0)->orderBy('created_at', 'DESC')->get(); 
            return view('frontend.university.review',['data'=>$data]);
        }elseif(Auth::user()->user_type == 'consultant'){
            $data = Review::with('users')->where('consultant_id', (Auth::user()->consultant->id)??0)->orderBy('created_at', 'DESC')->get(); 
            return view('frontend.consultant.review',['data'=>$data]);
        }else{
            return view('errors.404');
        }
    }

    public function reviewReply(Request $request){
        // dd($request->all());
        $r = Review::findOrFail((int)$request->id);
        $r->reply = ($request->reply)??'';
        $r->save();
        if($r->university_id!==null){
            $slug = UniversityDetail::find($r->university_id)->slug;
            $student = Student::where('user_id',$r->user_id)->first();
            Notifications::create([
                'type'=>'review-replay',
                'meta'=>'Review Reply',
                'message'=> $slug,
                'student_id'=> $student->id,
                'university_id'=> $r->university_id,
                'user_id'=> $student->user_id,
                'is_read'=>0,
            ]);
        }else{
            $cons = Consultant::find($r->consultant_id);
            $slug = $cons->organization_name.'/'.$cons->id;
            $student = Student::where('user_id',$r->user_id)->first();
            Notifications::create([
                'type'=>'review-replay',
                'meta'=>'Review Reply',
                'message'=> $slug,
                'student_id'=> $student->id,
                'consultant_id'=> $r->consultant_id,
                'user_id'=> $student->user_id,
                'is_read'=>0,
            ]);
        }
        
        Notifications::noUser();
        return response()->json(1);
    }

    public function news(){
        if(Auth::user()->user_type == 'university'){
            $data = News::where('university_id', Auth::user()->university_detail->id)->paginate(10);
            return view('frontend.university.news',['data'=>$data]);
        }elseif(Auth::user()->user_type == 'consultant'){
            $data = News::where('consultant_id', Auth::user()->consultant->id)->paginate(10);
            return view('frontend.consultant.news',['data'=>$data]);
        }else{
            return view('errors.404');
        }
    }

    public function setNews($id=null){
        if(Auth::user()->user_type == 'university'){
            if($id!==null){
                $news = News::where('id', $id)->where('university_id', Auth::user()->university_detail->id)->first();
                return view('frontend.university.set_news',['news'=>$news]);   
            }else{
                return view('frontend.university.set_news');   
            }
        }elseif(Auth::user()->user_type == 'consultant'){
            if($id!==null){
                $news = News::where('id', $id)->where('consultant_id', Auth::user()->consultant->id)->first();
                return view('frontend.consultant.set_news',['news'=>$news]);   
            }else{
                return view('frontend.consultant.set_news');   
            }
        }else{
            return view('errors.404');
        }
    }

    public function applicationView(){
        if(Auth::user()->user_type == 'university'){
            $app = ApplicationForm::with('university', 'course', 'student.users', 'student.prefers')->where('display', 1)->where('university_id', Auth::user()->university_detail->id)->where('send_to_uni', 1)->orderBy('created_at', 'DESC')->get();
            return view('frontend.university.application', ['app'=>$app]);
        }elseif(Auth::user()->user_type == 'student'){
            $app = ApplicationForm::with('university', 'course', 'student')->where('display', 1)->where('student_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
            return view('frontend.student.application', ['app'=>$app]);
        }else{
            return view('errors.404');
        }
    }

    public function student(){
        if(currentPackage('access_to_student_profile')){
            return view('frontend.student.search');
        }elseif(Auth::check() && Auth::user()->user_type !== 'student'){
            return redirect('dashboard/payment');
        }else{
            return view('errors.404');
        }
    }

    public function studentFilter(Request $request){
        if(currentPackage('access_to_student_profile')){
            $raw = 'active = 1 ';
            $app_raw = 'id > 0';
            if($request->has('nationality')){
                $raw .= ' and nationality = "'.$request->nationality.'"';
            }
            if($request->has('program')){
                $raw .= ' and prefered_program = "'.$request->program.'"';
            }
            if($request->has('hsk')){
                $level = '"hsk_level":"'.$request->hsk.'"';
                $app_raw .= " and language_qualification LIKE '%".$level."%'";
            }
            if($request->has('status')){
                $app_raw .= ' and status = "'.$request->status.'"';
            }
            if($request->has('date')){
                if($request->get('date') == '2 days ago'){
                    $raw .= ' and created_at > "'.\Carbon\Carbon::now()->subDays(2).'"';
                }elseif($request->get('date') == 'One week ago'){
                    $raw .= ' and created_at > "'.\Carbon\Carbon::now()->subDays(7).'"';
                }elseif($request->get('date') == 'One month ago'){
                    $raw .= ' and created_at > "'.\Carbon\Carbon::now()->subDays(30).'"';
                }
            }
            if($request->has('search')){
                $s = $request->get('search');
                $raw .= ' and ( name LIKE "%'.$s.'%" or nationality LIKE "%'.$s.'%" or gender LIKE "%'.$s.'%" )';
            }
            // dd($raw);
            $students = Student::with([ 'consults',
                                        'users', 
                                        'prefers',
                                        'applications.course', 
                                        'applications.university.users', 
                                        'applications'=>function($que) use($app_raw){
                                            $que->whereRaw($app_raw)->orderBy('created_at', 'DESC')->get();
                                        }])->whereRaw($raw)->paginate(($request->limit)??5);
            return response()->json(['students'=>$students]);
        }else{
            return response()->json('redirect-now');
        }
    }

    // public function studentFilterPayment(Request $request){

    //     dd($request->all());

    //     $name = Auth()->user()->first_name.' '.Auth()->user()->last_name;
    //     $data = ['name'=>$name];
    //     $email = Auth()->user()->email;
    //     Mail::send('emails.premium_package', $data, function ($m) use($name,$email) {
    //         $m->from('info@universitiespage.com', 'University');
    //         $m->to($email, $name)->subject('Premium Package Successfully Purchased');
    //     });
    //     if(Auth::user()->user_type == 'university'){
    //         Notifications::create([
    //             'type'=>'premium',
    //             'meta'=> 'Buy Premium',
    //             'university_id' => Auth::user()->university_detail->id,
    //             'user_id'=> Auth::user()->id,
    //             'is_read'=>0,
    //         ]);
    //     }else{
    //         Notifications::create([
    //             'type'=>'premium',
    //             'meta'=> 'Buy Premium',
    //             'consultant_id' => Auth::user()->consultant->id,
    //             'user_id'=> Auth::user()->id,
    //             'is_read'=>0,
    //         ]);  
    //     }
    //     Notifications::noUser();
    //     return redirect()->back();
    // }

    public function thank_you(){

        $name = Auth()->user()->first_name.' '.Auth()->user()->last_name;
        $email = Auth()->user()->email;
        $type = Session::get('type');
        $months = Session::get('months');
        $plan = PlanMaster::find(1);
        $plan_type='';
        $desc = 'Buy Package';
        if($type=='standard'){
            $plan_type = $plan->standard;
            $desc = "Buy ".$plan_type." Package";
        }elseif($type=='premium'){
            $plan_type = $plan->premium;
            $desc = "Buy ".$plan_type." Package";
        }elseif($type=='enterprise'){
            $plan_type = $plan->enterprise;
            $desc = "Buy ".$plan_type." Package";
        }

        if($type==null){
            return redirect()->back();
        }

        if(auth()->user()->user_type=='consultant'){
            $expiry = date('Y-m-d H:i:s',strtotime(\Carbon\Carbon::now()->addMonths($months)));
            auth()->user()->consultant->update(['package'=>$type, 'expiry'=>$expiry]);
        }elseif(auth()->user()->user_type=='university'){
            $expiry = date('Y-m-d H:i:s',strtotime(\Carbon\Carbon::now()->addMonths($months)));
            auth()->user()->university_detail->update(['package'=>$type, 'expiry'=>$expiry]);
        }

        $data = ['name'=>$name, 'type'=>$plan_type, 'expiry'=>$expiry];
        Mail::send('emails.premium_package', $data, function ($m) use($name,$email,$desc) {
            $m->from('info@universitiespage.com', 'University');
            $m->to($email, $name)->subject($desc.' Successfully');
        });
        if(Auth::user()->user_type == 'university'){
            Notifications::create([
                'type'=>'premium',
                'meta'=> $desc,
                'university_id' => Auth::user()->university_detail->id,
                'user_id'=> Auth::user()->id,
                'is_read'=>0,
            ]);
        }else{
            Notifications::create([
                'type'=>'premium',
                'meta'=> $desc,
                'consultant_id' => Auth::user()->consultant->id,
                'user_id'=> Auth::user()->id,
                'is_read'=>0,
            ]);  
        }
        Notifications::noUser();

        Session::forget('type');
        Session::forget('months');
        // Session::flash('message', 'Success');
        Session::flash('success', 'Payment successful!, Your account has been upgraded to '.$type.' package');
        return redirect('/dashboard');
    }

    public function removeApplication(Request $request , $id){
        $app = ApplicationForm::findOrFail($id);
        $app->display = 0;
        $app->save();
        Session::flash('success','Destroy Successfully!');
        return redirect('dashboard#application');
    }

    public function storeNews(Request $request){
        $data = $request->all();
        if(!Auth::check()){return redirect()->back();}
        if(Auth::user()->user_type == 'university'){
            $data['university_id'] = Auth::user()->university_detail->id;
        }else{
            $data['consultant_id'] = Auth::user()->consultant->id;
        }
        News::create($data);
        Session::flash('success','Saved Successfully!');
        return redirect('dashboard/news');
    }

    public function updateNews(Request $request){
        $data = $request->all();
        if(!Auth::check()){return redirect()->back();}
        if(Auth::user()->user_type == 'university'){
            $data['university_id'] = Auth::user()->university_detail->id;
        }else{
            $data['consultant_id'] = Auth::user()->consultant->id;
        }
        News::find($request->id)->update($data);
        Session::flash('success','Update Successfully!');
        return redirect('dashboard/news');
    }

    public function destroyNews(Request $request){
        News::find($request->id)->delete();
        Session::flash('success','Destroy Successfully!');
        return redirect('dashboard/news');
    }

    public function shipping()
    {
        $data = Auth::user();
        return view('frontend.dashboard.shipping',['data'=>$data]);
    }

    public function update_shipping(Request $request)
    {
        $user = Auth::user();
        $user->update($request->all());
        Session::flash('success','Shipping Information updated successfully!');
        return redirect()->back();
    }

    public function orders()
    {
        $data = Orders::OrderBy('id','DESC')->where('user_id', Auth::user()->id)->paginate(8);
        return view('frontend.dashboard.orders',['data'=>$data]);   
    }

    public function view_order($id)
    {
        $data = Orders::find($id);
        $products = OrderDetail::where('order_id',$data['id'])->get();
        $shipping = [];
        if(!empty($data['shipping_meta'])) {$shipping = json_decode($data['shipping_meta'],true);}
        return view('frontend.dashboard.order_detail',['data'=>$data,'shipping'=>$shipping,'products'=>$products]);   
    }

    public function re_order($id)
    {
        $order = Orders::find($id);
        Cookie::queue(Cookie::forget('products'));
        if(!empty($order->orderdetail)) {
            $p_array = [];
            foreach($order->orderdetail as $key => $value) {
                if(count(getProduct($value->product_id))>0) {
                    $price = getProduct($value->product_id)['price'];
                    array_push($p_array, ['product'=>$value->product_id,'qty'=>$value->qty,'price'=>$price,'total'=>$price*$value->qty]);
                }
            }
            $products = serialize($p_array);
            Cookie::queue(Cookie::make('products', $products, 2628000));
        }
        return redirect("/cart");
    }

    public function order_action($id, Request $request)
    {
        $order = Orders::find($id);
        $meta = "";
        if($request->type=='cancel') { 
            $order->cancel_order = 1;
            $meta = "Order Cancel Request";
         } else { 
            $order->return_order = 1; 
            $meta = "Order Return Request";
        }
        $order->reason = $request->reason;
        $order->save();
        Notifications::create([
            'type'=>'order_action',
            'meta'=>$meta,
            'order_id'=>$order['id'],
            'user_id'=>Auth::user()->id,
            'is_read'=>0,
        ]);
        Session::flash('success',"Your request has been submitted.We'll get back to you soon.");
        return redirect()->back();
    }

    public function wishlist()
    {
        if(Auth::user()->user_type == 'student'){
            $data = Wishlist::where('user_id',Auth::user()->id)->get();
            return view('frontend.student.wishlist',['data'=>$data]); 
        }else{
            return view('errors.404');  
        }
    }

    public function delete_wishlist($id)
    {
        Wishlist::destroy($id);
        Session::flash('success',"Successfully Delete");
        return redirect('dashboard#wishlist');

    }

    public function password()
    {
        if(Auth::user()->user_type == 'university'){
            return view('frontend.university.password');
        }elseif(Auth::user()->user_type == 'student'){
            return view('frontend.student.password');
        }elseif(Auth::user()->user_type == 'consultant'){
            return view('frontend.consultant.password');
        }else{
            return view('errors.404');
        }
    }

    public function update_password(Request $request)
    {
        Session::put('id','password');
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            Session::flash('error','Your current password does not matches with the password you provided. Please try again.');
            return redirect()->back();
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            Session::flash('error','New Password cannot be same as your current password. Please choose a different password.');
            return redirect()->back();
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        Session::forget('id','password');
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        Session::flash('success','Password changed successfully!');
        if(pre_url($_SERVER['HTTP_REFERER']) == 'dashboard'){
            return redirect('dashboard#password');
        }else{
            return redirect()->back();
        }
    }

    public function submit_article()
    {
        $user = Auth::user();
        return view('frontend.submit_article',['user'=>$user]);
    }

    public function store_article(Request $request)
    {
        $uploadDir  = public_path("/uploads/articles/");
        $data = $request->except("file");
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = strtolower(str_replace(" ", "_", $file->getClientOriginalName()));
            $file->move($uploadDir, $filename);
            $data['file'] = $filename;
        }
        $data['user_id'] = Auth::user()->id;
        UserArticles::create($data);
        Session::flash('success','File submitted successfully');
        return redirect()->back();
    }

    public function dynamicPage($slug)
    {

        $data = Pages::where('slug',$slug)->first();
        $blog = Blog::where('slug', $slug)->first();
        $blogCategory = BlogCategory::where('slug', $slug)->first();
        $type = CustomPostType::where('slug','products')->value('id');
        if($data!==null){
            $components = PageComponents::where('page_id',$data['id'])->OrderBy('sort_order','ASC')->get();
            foreach($components as $key => $value) {
                if($value->type=="products") {
                    $meta = json_decode($value->meta,true);
                    if($meta['type']=='best_seller') {
                        $meta['products'] = Posts::where('post_type',$type)->where('is_active',1)->where('best_seller',1)->limit($meta['limit'])->get();            
                    } elseif($meta['type']=='latest') {
                        $meta['products'] = Posts::where('post_type',$type)->where('is_active',1)->OrderBy('id','DESC')->limit($meta['limit'])->get();            
                    } elseif($meta['type']=='top_rated') {
                        $meta['products'] = Posts::where('post_type',$type)->where('is_active',1)->where('top_rated',1)->limit($meta['limit'])->get();            
                    } elseif($meta['type']=='featured') {
                        $meta['products'] = Posts::where('post_type',$type)->where('is_active',1)->where('is_featured',1)->limit($meta['limit'])->get();            
                    } elseif($meta['type']=='category') {
                        $meta['products'] = Posts::where('post_type',$type)->where('is_active',1)->whereIn('category_id',$meta['cat'])->limit($meta['limit'])->get();            
                    }
                    $value->meta = $meta;
                } elseif($value->type=="p_grid") { $ids = [];
                    if(!empty($value->meta)){ $ids =  json_decode($value->meta,true); }
                    $value->meta = CustomCategory::whereIn('id',$ids['ids'])->where('is_active',1)->get();
                } elseif($value->type=="ads") {
                    $value->meta = Media::find(json_decode($value->meta,true)['id']);
                } elseif($value->type=="banners" || $value->type=="icons" || $value->type=="testimonials" || $value->type=="history" || $value->type=="content" || $value->type=="spacer" || $value->type=="tabs" || $value->type=='features'|| $value->type=='images') {
                    $value->meta = json_decode($value->meta,true);
                }
                
                $value->meta = json_decode($value->meta,true);
                
            }
            $slider = [];
            if(!empty($data['slider_id'])) {
                $slider = Media::find($data['slider_id']);
            }

            return view('frontend.page',['data'=>$data,'components'=>$components,'slider'=>$slider]);
        }
        if($blog!==null){
            $data = Pages::where('slug','blog')->first();
            $data['seo'] = $blog['seo'];
            $data['title'] = $blog['title'];
            $components = PageComponents::where('page_id',$data['id'])->OrderBy('sort_order','ASC')->get();
            foreach($components as $key => $value) { $value->meta = json_decode($value->meta,true); }
            return view('frontend.page',['data'=>$data,'components'=>$components,'slider'=>null,'blog'=>$blog]);
        }elseif($blogCategory!==null){
            $data = Pages::where('slug','blog')->first();
            $data['seo'] = $blogCategory['seo'];
            $data['title'] = $blogCategory['name'];
            $components = PageComponents::where('page_id',$data['id'])->OrderBy('sort_order','ASC')->get();
            foreach($components as $key => $value) { $value->meta = json_decode($value->meta,true); }
            return view('frontend.page',['data'=>$data,'components'=>$components,'slider'=>null,'blog'=>$blogCategory]);
        }else{
            return view('errors.404');
        }
        
    }

    public function university($slug)
    {
        $data = UniversityDetail::where('active', 1)->where('display', 1)->where('slug', $slug)->with('courses', 'users')->first();
        $sub_id = $data->courses->pluck('subject_id')->toArray();
        $sub_id = array_unique($sub_id);
        $subject = Subject::whereIn('id', $sub_id)->get();
        $reviews = Review::with('users.students')->where('university_id', $data->id)->orderBy('created_at','DESC')->get();
        $news = News::where('university_id', $data->id)->orderBy('created_at','ASC')->get();
        return view('frontend.university_detail', ['data'=>$data, 'reviews'=>$reviews, 'news'=>$news, 'subject'=>$subject]);
    }

    public function courseDetail($id){
        $data = Course::where('id', $id)->where('display',1)->with('university', 'qualificationName')->first();
        
        $dataaa = Course::where('id', $id)->where('display',1)->get();
        
        $coursedetailfetch = json_decode($dataaa,true);
            $coursedetailfetch = array_shift($coursedetailfetch);
            $courseunvid = $coursedetailfetch['university_id'];
            
        $getrandcourses = Course::where('university_id',$courseunvid)->where('display',1)->inRandomOrder()->limit(3)->get(); 
        
        $getrandcourses = Course::select('courses.name','courses.id','university_details.logo','university_details.country','university_details.city','university_details.name as unvname')
        ->leftJoin('university_details', 'courses.university_id', '=', 'university_details.id')->inRandomOrder()->limit(3)->get();

        return view('frontend.course_detail',['data'=>$data, 'getrandcourses' => $getrandcourses]);
    
    }

      public function consultantDetail($slug=null, $id=null){
        $data = Consultant::where('organization_name', $slug)->where('id', $id)->first();
        $reviews = Review::with('users.students')->where('consultant_id', $data->id)->orderBy('created_at','DESC')->get();
        if(Auth::check()){
            $reviews_pag = Review::with('users.students')->where('consultant_id', $data->id)->where('user_id','!=', Auth::user()->id)->orderBy('created_at','DESC')->paginate(5);
        }else{
            $reviews_pag = Review::with('users.students')->where('consultant_id', $data->id)->orderBy('created_at','DESC')->paginate(5);
        }

        $news = News::where('consultant_id', $data->id)->orderBy('created_at','DESC')->get();
        if($data!==null){
            return view('frontend.consultant_detail',['data'=>$data, 'reviews'=>$reviews, 'reviews_pag'=>$reviews_pag, 'news'=>$news]);
        }else{
            return redirect()->back();
        }

    }



    public function saveReview(Request $request){
        // dd($request->all());
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $review = Review::create($data);
        $user = Auth::user();
        $stars = '';
        if(isset($request->university_id)){
            $ratings = Review::where('university_id', $request->university_id)->get();
            $givenStars = Review::where('university_id', $request->university_id)->pluck('stars')->sum();
            $totalStars = ($ratings->count()!==0)?$ratings->count():1;
            $rate = ($givenStars/($totalStars*5))*5;
            $uni = UniversityDetail::find((int)$request->university_id);
            $uni->ranking = $rate;
            $uni->save();
        }
        $reviews = Review::where('university_id', $request->university_id)->orderBy('created_at', "DESC")->get();
        $view = view('frontend.student.review',compact('reviews'))->render();
        return response($view);
    }

    public function removeReview(Request $request){
        $data = $request->all();
        Review::findOrFail($data['id'])->delete();
        $reviews = Review::where('university_id', $request->uni_id)->orderBy('created_at', "DESC")->get();
        $view = view('frontend.student.review',compact('reviews'))->render();
        return response($view);
    }



    public function post_comment(Request $request){
        PostsComments::create($request->all());
        $comment = PostsComments::latest()->first();
        Notifications::create([
            'type'=>'comment',
            'email'=> (Auth::check())?Auth::user()->email:null,
            'meta'=>'New Comment',
            'is_read'=>0,
        ]);
        return Response()->json(1);
    }

    public function helping_action(Request $request)
    {
        Notifications::create([
            'type'=>'helping',
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message,
            'meta'=>'Helping Hand Received',
            'is_read'=>0,
        ]);
        Session::flash('success','Form submitted successfully');
        return redirect()->back();
    }

    public function subscribe(Request $request)
    {
        $msg = "";
        $subs = Subscribers::where('email',$request->email)->first();
            if(empty($subs)) {
                Subscribers::create($request->all());
                $msg = "You have successfully Subscribed";
                Notifications::create([
                    'type'=>'subscription',
                    'email'=>$request->email,
                    'meta'=>'New Subscription',
                    'is_read'=>0,
                ]);
            } else { $msg = 'You are already subscribed.'; }
        return $msg;
    }

    public function ajaxQuickView(Request $request) {
        $data = Posts::find($request->id);
        $gallery = [];
        if(!empty($data['gallery'])) { $gallery = json_decode($data['gallery'],true); }
        return view('frontend.components.quick-view',compact('data','gallery'))->render();
    }

    public function applyCourse($id){
        if(Auth::check() && Auth::user()->user_type == 'student'){
            $raw = "( deadline >= ".date('Y-m-d')." or deadline IS NULL)";
            $data = Course::where('id',$id)->with('university')->whereRaw($raw)->where('active', 1)->where('display', 1)->first();
            $app = ApplicationForm::where('student_id', Auth::user()->id)->where('display', 1)->where('course_id', $id)->orderBy('created_at', "DESC")->first();
            $current = 1;
            if($app == null){
                $app = ApplicationForm::where('student_id', Auth::user()->id)->where('display', 1)->orderBy('created_at', "DESC")->first();
                // dd($data);
                $rand = mt_rand(10000000, 99999999);
                $application['application_id'] = $rand;
                $application['student_id'] = Auth::user()->id;
                $application['university_id'] = $data->university->id;
                $application['course_id'] = $data->id;
                $application['personal_information'] = ($app->personal_information)??null;
                $application['educational_background'] = ($app->educational_background)??null;
                $application['language_qualification'] = ($app->language_qualification)??null;
                // $application['reasons_to_choose'] = ($app->reasons_to_choose)??null;
                // $application['family'] = ($app->family)??null;
                $application['financial_support'] = ($app->financial_support)??null;
                $application['mailling_address'] = ($app->mailling_address)??null;
                $app = ApplicationForm::create($application);
                $current = 0;
            }
            return view('frontend.apply', ['data' => $data, 'app'=>$app, 'current'=>$current]);
        }else{
            return redirect('courses/'.$id);
        }
    }

    public function applyPersonalInfo(Request $request){
        $data = $request->all();
        if(Auth::check() && Auth::user()->user_type == 'student'){
            $user_id = Auth::user()->id;
            $app = ApplicationForm::where('course_id', $data['course_id'])
                                    ->where('university_id', $data['university_id'])
                                    ->where('student_id', $user_id)->where('display', 1)->first();
            $application['student_id'] = $user_id;
            $application['university_id'] = $data['university_id'];
            $application['course_id'] = $data['course_id'];

            
            if($data['type']=='personal_info'){
                $validator = \Validator::make($data['data'], [
                    "first_name" => 'required|string|max:255',
                    "last_name" => 'required|string|max:255',
                    "gender" => 'required|string|max:255',
                    "dob" => 'required',
                    "nationality" => 'required|string|max:255',
                    "passport" => 'required',
                    "valid_until" => 'required',
                    "marital_status" => 'required|string|max:255',
                    "religion" => 'required|string|max:255',
                    "previous_education" => 'required|string|max:255',
                    "field_of_study" => 'required|string|max:255',
                    "p_address" => 'required|string|max:255',
                    "p_phone" => 'required|max:15',
                    "c_address" => 'required|string|max:255',
                    "c_phone" => 'required|max:15',
                ]);
                $application['personal_information'] = json_encode($data['data']);
            }elseif($data['type']=='educational_background'){
                $validator = \Validator::make($data, [
                    "data" => 'required',
                ]);
                $application['educational_background'] = json_encode($data['data']);
            }elseif($data['type']=='language_qual'){
                $validator = \Validator::make($data['data'], [
                    // 'learned_chinese' => 'required|string|max:255',
                    // 'how_long' => 'required|string|max:255',
                    // 'hsk_level' => 'required|string|max:255',
                    'is_english' => 'required|string|max:255',
                    'native_language' => 'required|string|max:255',
                ]);
                $application['language_qualification'] = json_encode($data['data']);
                // }elseif($data['type']=='reason_to_choose'){
                //     $validator = \Validator::make($data['data'], [
                //         "reason_to_choose" => 'required',
                //     ]);
                //     $application['reasons_to_choose'] = $data['data']['reason_to_choose'];
                // }elseif($data['type']=='family_mem'){
                //     $validator = \Validator::make($data, [
                //         "data" => 'required',
                //     ]);
                //     $application['family'] = json_encode($data['data']);
            }elseif($data['type']=='financial'){
                $validator = \Validator::make($data['data'], [
                    'source_of_financial'=> 'required|string|max:255',
                    'financial_guarantor'=> 'required|string|max:255',
                    'relationship' => 'required|string|max:255',                  
                    'phone'=> 'required|string|max:255',
                ]);
                $application['financial_support'] = json_encode($data['data']);
            }elseif($data['type']=='mailing'){
                $validator = \Validator::make($data['data'], [
                    'name' => 'required|string|max:255',
                    'tel' => 'required|max:255',
                    'phone' => 'required|max:255',
                    'building' => 'required|string|max:255',
                    'street' => 'required|string|max:255',
                    'city' => 'required|string|max:255',
                    'country' => 'required|string|max:255',
                    'postcode' => 'required|string|max:255',
                ]);
                $application['mailling_address'] = json_encode($data['data']);
            }elseif($data['type']=='declaration'){
                $validator = \Validator::make($data, [
                    'data' => 'required',
                ]);
                $application['declaration'] = 1;
            }elseif($data['type']=='uploads'){
                // dd($data);
                $validator = \Validator::make($data, [
                    'highest_education' => 'required',
                    // 'medical_report' => 'required',
                ]);
                $uploads = [
                    'highest_education'=>$data['highest_education'],
                    'medical_report'=>$data['medical_report'],
                    'passport'=>$data['passport'],
                    'other'=>$data['other'],
                ];
                $application['uploads'] = json_encode($uploads);
                // }elseif($data['type']=='payment'){
                // $validator = \Validator::make($data, [
                //     'data' => 'required',
                // ]);
                // $application['application_fee'] = 0;
            }elseif($data['type']=='submit'){
                // dd($data['data']);
                $validator = \Validator::make($data, [
                    'data' => 'required',
                ]);
                $inComplete = 0;
                foreach($data['data'] as $key=>$value){
                    if($value==0){
                        $inComplete = 1;
                    }
                }
                $application['status'] = ($inComplete)?4:2;
                if($inComplete == 0){
                    $application['send_to_uni'] = 1;
                    Notifications::create([
                        'type'=>'application',
                        'email'=> Auth::user()->email,
                        'university_id' => $data['university_id'],
                        'student_id' => Auth::user()->students->id,
                        'user_id' => $app->university->user_id,
                        'meta'=>'New Application',
                        'is_read'=>0,
                    ]);
                    Notifications::noUser();
                    
                }
            }

            if ($validator->fails()){
                return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            }else {
                if($app!==null){
                    $send = ApplicationForm::find($app->id);
                    $send->update($application);
                    if($send->send_to_uni==1){
                        try{
                            $app_id = $app->application_id.'-'.$app->id;
                            $course = $app->course->name;
                            $uni = $app->university->name;
                            $email = auth()->user()->email;
                            $name = auth()->user()->students->name;
                            $datas = ['app_id'=>$app_id, 'course'=>$course, 'uni'=>$uni,'name'=>$name,'email',$email];
                            Mail::send('emails.new_application', $datas, function ($m) use($name,$email) {
                                $m->from('noreply@universitiespage.com', 'Universities Page');
                                $m->to($email, $name)->subject('Application Form');
                            });
                        }catch(\Exception $e){
                            //
                        }
                        // try{
                        //     $app_id = $app->application_id.'-'.$app->id;
                        //     $course = $app->course->name;
                        //     $student = $app->student->name;
                        //     $email = $app->university->users->email;
                        //     $name = $app->university->name;
                        //     $datas = ['app_id'=>$app_id, 'course'=>$course, 'student'=>$student,'name'=>$name,'email',$email];
                        //     Mail::send('emails.new_application_u', $datas, function ($m) use($name,$email) {
                        //         $m->from('noreply@universitiespage.com', 'Universities Page');
                        //         $m->to($email, $name)->subject('Application Form');
                        //     });
                        // }catch(\Exception $e){
                        //     //
                        // }
                    }
                }else{
                    $rand = mt_rand(10000000, 99999999);
                    $application['application_id'] = $rand;
                    ApplicationForm::create($application);
                }
                return response()->json(1);
            }

        }else{
            return response('redirect');
        }
        
    }

    public function dashboardNotifications(){
        if(Auth::check()){
            $note = Notifications::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(10);
        }else{$note=[];}
        return view('frontend.university.notification', ['data'=>$note]); 
    }

    public function userNotification(){
        if(Auth::check()){
            $note = Notifications::where('user_id', Auth::user()->id)->where('is_read', 0)->orderBy('created_at', 'DESC')->get();
            $msg = newChat();
        }else{$note=[];$msg=0;}
        return response()->json(['note'=>$note, 'msg'=>$msg]);  
    }

    public function readNotification(Request $request){
        $note = Notifications::find($request->id);
        $note->is_read = 1;
        $note->save();
        return response()->json(1);
    }

    public function studentProfileDetail($id){
        if(!currentPackage('access_to_student_profile')){ return redirect()->back(); }

        $student = Student::where('id', $id)->first();
        $applications = ApplicationForm::where('student_id', $student->user_id)->paginate(7);
        return view('frontend.student_profile', compact('student','applications'));
    }

    public function paymentPage(){
        $master = PlanMaster::find(1);
        $detail = PlanDetail::get();
        return view('frontend.payment', compact('master', 'detail'));
    }

    public function support(){
        if(Auth::check()){
            if(Auth::user()->user_type == 'consultant'){
                $data= Support::where('consultant_id', Auth::user()->id)->orWhere('university_id', Auth::user()->id)->get();
                return view('frontend.consultant.support',compact('data'));
            }elseif(Auth::user()->user_type == 'university'){
                $data= Support::where('consultant_id', Auth::user()->id)->orWhere('university_id', Auth::user()->id)->get();
                return view('frontend.university.support',compact('data'));
            }else{
                return view('errors.404');
            }
        }else{
            return view('errors.404');
        }
    }
    public function universityList(Request $request){
        // if(isset($request->serach) && $request->serach !== ''){
           $uni = UniversityDetail::where('active',1)->where('display',1)->where('name', 'LIKE','%'.$request->search.'%')->orderBy('name')->get();
           return response()->json($uni);
        // }
    }

    public function suggestSearch(Request $request){
        if($request->has('search')){
          
            $s = $request->search;

            $u_raw = 'active = 1 and display = 1 and ( name LIKE "%'.$s.'%" or founded_in LIKE "%'.$s.'%" or city LIKE "%'.$s.'%" or country LIKE "%'.$s.'%" or  languages LIKE "%'.$s.'%" )';
            $uni = UniversityDetail::whereRaw($u_raw)->get();
            $uni_id = (count($uni)>0)?$uni->first()->id:0;

            $sub = Subject::where('name', 'LIKE', '%'.$s.'%')->value('id');
            $sub_id = ($sub!==null)?$sub:0;


            $g_raw = 'is_active = 1 and ( title LIKE "%'.$s.'%" or sub_title LIKE "%'.$s.'%" or university_id = '.$uni_id.' or subject_id = '.$sub_id.' )';
            $guide = Guide::whereRaw($g_raw)->get();

            $c_raw = 'active = 1 and display = 1 and ( name LIKE "%'.$s.'%" or university_id = '.$uni_id.' or subject_id = '.$sub_id.' or duration LIKE "%'.$s.'%" or  languages LIKE "%'.$s.'%" )';
            $course = Course::whereRaw($c_raw)->with('university')->get();


            $cat = BlogCategory::where('name', 'LIKE', '%'.$s.'%')->value('id');
            $cat_id = ($cat!==null)?$cat:0;
            $user = User::where('first_name', 'LIKE', '%'.$s.'%')->value('id');
            $user_id = ($user!==null)?$user:0;

            $a_raw = 'id is Not Null and ( title LIKE "%'.$s.'%" or category_id = '.$cat_id.' or user_id = '.$user_id.' or short_description LIKE "%'.$s.'%" )';
            $article = Blog::whereRaw($a_raw)->with('category', 'user')->get();

            return response()->json(['uni'=>$uni, 'guide'=>$guide, 'course'=>$course, 'article'=>$article]);
        }else{
            return [];
        }
    }

 
    public function freeConsulation(){
     $request =  request()->all();
//        dd($request);
        $validator = Validator::make(request()->all(), [
            'email' => 'required|email|max:255',
            'name'=> 'required|max:255',
            "phone_number" => 'required',
            'last_education' => 'required|max:500',
            'apply_for' => 'required|max:500',
        ]);
        if ($validator->fails()){
            return response()->json(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false],422);
        }
       FreeConsulation::create($request);
    return  response()->json(['status'=>'success','msg'=>"Thankyou for inquiry, we will contact you back soon"],200);

    }
    
    
        public function applyNowForm(){
     $request =  request()->all();
     
//        dd($request);
        $validator = Validator::make(request()->all(), [
            'name'=> 'required|max:255',
            "phone_number" => 'required|max:30',
            'city' => 'required|max:255',
            'last_education' => 'required|max:500',
            'intrested_country' => 'required|max:255',
        ]);
        if ($validator->fails()){
            return response()->json(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false],422);
        }
       ApplyNow::create($request);
    return  response()->json(['status'=>'success','msg'=>"Thankyou for Applying, we will contact you back soon"],200);

    }
    
    
     public function sendbtnemail($id,$type)
    {
        
        if(isset(auth()->user()->id)){
            $student_id = auth()->user()->id;
        } else {
            echo json_encode(array('message' => 'login', 'message_text' => 'Please Login To Send Information Request'));  exit();
        }
       
        $student_first_name = auth()->user()->first_name;
        $student_last_name = auth()->user()->last_name;
        $student_email = auth()->user()->email;
        $student_age = auth()->user()->dob;
        $student_country = auth()->user()->country;
        $student_phone = auth()->user()->phone;
        $student_fullname = $student_first_name.' '.$student_last_name;
        $unv_name = 'none';
        $course_name = 'none';

        $date = date('Y-m-d');
        
        if($type == 'university') {
            
            $university_id = $id;
            $course_id = 0;
            $universities = UniversityDetail::where('id', $university_id)->get();
            $universities = json_decode($universities,true);
            $universities = array_shift($universities);
            $mailpage = 'emails.universitybtn';
            $count_check_array = ContactButton::where('student_id', $student_id)->where('date', $date)->get();
            $count_check_array = json_decode($count_check_array,true);
            $unv_name = $universities['name'];
            $too_email = $universities['alternate_email'];
            
        } else {
            
            $university_id = 0;
            $course_id = $id;   
            $courses = Course::where('id', $course_id)->get();
            $courses = json_decode($courses,true);
            $courses = array_shift($courses);
            $mailpage = 'emails.coursebtn';
            $count_check_array = ContactButton::where('student_id', $student_id)->where('date', $date)->get();
            $count_check_array = json_decode($count_check_array,true);
            $uni_id = $courses['university_id'];
            $universitiesfetchcourseone = UniversityDetail::where('id', $uni_id)->get();
            $universitiesfetchcourseone = json_decode($universitiesfetchcourseone,true);
            $universitiesfetchcourseone = array_shift($universitiesfetchcourseone);
            $course_name = $courses['name'];
            $unv_name = $universitiesfetchcourseone['name'];
            $too_email = $universitiesfetchcourseone['alternate_email'];
            
        }
        
        if($too_email == ''){
            echo json_encode(array('message' => 'error', 'message_text' => 'Request Information Could not Be Sent')); 
           exit();
        }
        
        $count_check = 0;
        
        foreach($count_check_array as $count_array) {
            $count_check++;
        }
        $remailing_requests = 4-$count_check;
        
        // if($count_check >= '5') {
            
        //     echo json_encode(array('message' => 'error', 'message_text' => 'You have reached your limit.Wait till next day.'));
        //     exit();
            
        // }
        
      $data = array('student_first_name' => $student_first_name,'student_last_name' => $student_last_name,'student_age' => $student_age,'student_country' => $student_country,'student_phone' => $student_phone,'course_name' => $course_name,'unv_name' => $unv_name,'student_email' => $student_email);
      
   

      Mail::send($mailpage, $data, function ($m) use($too_email) {
                $m->from('Admission@universitiespage.com', 'Universities Page');
                $m->to($too_email)->subject('Alert Email from Universities Page');
            });
      
      if (Mail::failures()) {
           echo json_encode(array('message' => 'error', 'message_text' => 'Request Information Could not Be Sent.Try Again.')); 
           exit();
       } else {
          
        ContactButton::create([
            'university_id'=>$university_id,
            'course_id'=>$course_id,
            'student_id'=>$student_id,
            'date'=>$date
        ]);
        
        $success_message = 'Your request information has been successfully sent to '.$unv_name.'. You will be contacted soon by this University.(Note:Send atleast 20 admission requests to different universities for fast response.)';
        // Today you have '.$remailing_requests.' More Request Information Left.
         echo json_encode(array('message' => 'success', 'message_text' => $success_message));
         exit();
          
       }
      
    }

    public function delete_contactbtn($id)
    { 
      $query =  ContactButton::find($id)->delete();
    
        if($query){
            
         echo json_encode(array('message' => 'success', 'message_text' => 'Record has been successfully Deleted'));
         exit();
            
        } else {
            
          echo json_encode(array('message' => 'error', 'message_text' => 'Record Could not be Deleted')); 
           exit();
            
        }
    
    }




    //  Consutltant Work

    public function add_student(Request $request)
    {
        
        if(isset(auth()->user()->id)){
            $user_id = auth()->user()->id;
        } else {
            echo json_encode(array('message' => 'login', 'message_text' => 'Please Login To Send Information Request'));  exit();
        }

        $validator = Validator::make(request()->all(), [
            'name'=> 'required|max:255',
            'passport_number'=> 'required|max:255',
            'course_doc' => 'required|max:255',
        ]);
        
        if ($validator->fails()){
            Session::flash('error', $validator->errors());
            return redirect('dashboard#addstd');
        }
        
        $name = $request->name;
        $passport_number = $request->passport_number;
        $intrested_country_doc = $request->intrested_country_doc;
        $passport_doc = $this->addMultipleAttacement('passport_doc', $request);
        $photo_doc = $this->addMultipleAttacement('photo_doc', $request);
        $educational_degree_doc = $this->addMultipleAttacement('educational_degree_doc', $request);
        $educational_certificate_doc = $this->addMultipleAttacement('educational_certificate_doc', $request);
        $recomendation_letter_doc = $this->addMultipleAttacement('recomendation_letter_doc', $request);
        $study_plan = $this->addMultipleAttacement('study_plan', $request);
        $ielts_english_proficiency_letter = $this->addMultipleAttacement('ielts_english_proficiency_letter', $request);
        $course_doc = $request->course_doc;

        
        DB::insert("insert into cstudents ( 
            name,
            passport_number,
            intrested_country_doc,
            passport_doc,
            photo_doc,
            educational_degree_doc,
            educational_certificate_doc,
            recomendation_letter_doc,
            study_plan,
            ielts_english_proficiency_letter,
            course_doc,
            consultant_id
            
            ) 
        
        values (
            '".$name."',
            '".$passport_number."',
            '".$intrested_country_doc."',
            '".$passport_doc."',
            '".$photo_doc."',
            '".$educational_degree_doc."',
            '".$educational_certificate_doc."',
            '".$recomendation_letter_doc."',
            '".$study_plan."',
            '".$ielts_english_proficiency_letter."',
            '".$course_doc."',
            '".$user_id."'
            
        )");


        Notifications::create([
            'type'=>'account',
            'name'=>$name,
            'email'=>'Student Name:'.$name,
            'student_id'=>0,
            'meta'=> 'Student Added By Consultant',
            'is_read'=>0,
        ]);

        Session::flash('success', "Student Record Has Been Sucessfully Added");    
        return redirect('dashboard#student-list');


    }


    function addMultipleAttacement($filename, $request)
    { 
        
        $data = array();    

        if($request->hasfile($filename))
         {

            foreach($request->file($filename) as $file)
            {
                $name=uniqid(). '.' .$file->getClientOriginalName();
                $file->move(public_path().'/assets_frontend/cstudent/', $name);  
                $data[] = $name;  
            }
         }

        
         return json_encode($data);
        
       
    }


         public function delete_student($id)
    {
        
        if(isset(auth()->user()->id)){
            $student_id = auth()->user()->id;
        } else {
            echo json_encode(array('message' => 'login', 'message_text' => 'Please Login To Send Information Request'));  exit();
        }


        if(DB::insert("DELETE FROM cstudents WHERE id = '".$id."'")) {
            echo json_encode(array('message' => 'success', 'message_text' => 'Record Has Been Successfully Deleted'));  exit();
        } else {
            echo json_encode(array('message' => 'error', 'message_text' => 'There is an Error While Deleting The Record'));  exit();
        }


    }


    public function delete_doc($type, $id, $docname)
    {
        
        if(isset(auth()->user()->id)){
            $student_id = auth()->user()->id;
        } else {
            echo json_encode(array('message' => 'login', 'message_text' => 'Please Login To Send Information Request'));  exit();
        }

        $getdata = DB::Table('cstudents')->select('*')->where('id',$id)->get();  

        $course_docs = $getdata[0]->$type;

        $course_docs = json_decode($course_docs);

        $arraydocs = array();

        foreach($course_docs as $course_doca) {
            if($docname != $course_doca) {
              $arraydocs[] = $course_doca;
            }
        }

        $arraydocs = json_encode($arraydocs);

        if(DB::insert("UPDATE cstudents SET $type='$arraydocs' WHERE id = '".$id."'")) {

            echo json_encode(array('message' => 'success', 'message_text' => 'Record Has Been Successfully Deleted'));  exit();
        } else {
            echo json_encode(array('message' => 'error', 'message_text' => 'There is an Error While Deleting The Record'));  exit();
        }


    }


    public function add_doc(Request $request)
    {        
        if(isset(auth()->user()->id)){
            $student_id = auth()->user()->id;
        } else {
            echo json_encode(array('message' => 'login', 'message_text' => 'Please Login To Send Information Request'));  exit();
        }

        $id = $request->recordid;
        $type = $request->type;

        $getdata = DB::Table('cstudents')->select('*')->where('id',$id)->get();  

        $course_docs = $getdata[0]->$type;

        $course_docs = json_decode($course_docs);

        $data = $course_docs;

        if($request->hasfile('file_name'))
         {
                $file = $request->file('file_name');
                $name=uniqid(). '.' .$file->getClientOriginalName();
                $file->move(public_path().'/assets_frontend/cstudent/', $name);
                $storedname = $name;  
                $data[] = $name;  
            
         } else {

            echo json_encode(array('message' => 'error', 'message_text' => 'Please Select A File First'));  exit();

         }

        $data = json_encode($data);

        if(DB::insert("UPDATE cstudents SET $type='$data' WHERE id = '".$id."'")) {

            echo json_encode(array('docname' => $storedname,'message' => 'success', 'message_text' => 'Record Has Been Successfully Inserted'));  exit();
        } else {
            echo json_encode(array('message' => 'error', 'message_text' => 'There is an Error While Inserting The Record'));  exit();
        }


    }


    public function edit_student(Request $request)
    {        
        if(isset(auth()->user()->id)){
            $student_id = auth()->user()->id;
        } else {
            echo json_encode(array('message' => 'login', 'message_text' => 'Please Login To Send Information Request'));  exit();
        }

        $name = $request->name;
        $passport_number = $request->passport_number;
        $intrested_country_doc = $request->intrested_country_doc;
        $course_doc = $request->course_doc;
        $recordid = $request->recordid;

        if(DB::insert("UPDATE cstudents SET `name`='$name',`passport_number`='$passport_number',`intrested_country_doc`='$intrested_country_doc',`course_doc`='$course_doc' WHERE id = '".$recordid."'")) {

            echo json_encode(array('id' => $recordid,'name' => $name,'passport_number' => $passport_number,'passport_number' => $passport_number,'intrested_country_doc' => $intrested_country_doc,'course_doc' => $course_doc,'message' => 'success', 'message_text' => 'Record Has Been Successfully Inserted'));  exit();
        } else {
            echo json_encode(array('message' => 'error', 'message_text' => 'There is an Error While Inserting The Record'));  exit();
        }


    }


    public function show_student_report($id)
    {        
        if(isset(auth()->user()->id)){
            $consultant_id = auth()->user()->id;
        } else {
            echo 'Invalid Access Not Allowed';
            exit;
        }

        $data = DB::Table('cstudents')->select('*')->where('id',$id)->get()->first();

        return view('frontend.consultant.student',['filtersearch'=>$data]);


    }

    public function search_student_report()
    {       
    
        return view('frontend.filter_report');

    }

    public function filter_student_report(Request $request)
    {        

        $spassport = $request->spassport; 
        $sname = $request->sname;
        $sname = str_replace(" ","%20", $sname);
        $accesstoken = 'x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd';

        $url = "https://universitiespagecrm.com/Api/filteronbyone/".$accesstoken."/".$sname."/".$spassport."";
        $json = file_get_contents($url);
        
        if($json != 'false') {

        $returnarray = json_decode($json, true);
        if(!empty($returnarray))
        {
           $returnarray = array_shift($returnarray); 
        }
        

        return view('frontend.filter_report',['filtersearch'=>true, 'cstudent' => $returnarray]);            

        } else {
            
            return view('frontend.filter_report',['nodataavailble'=> true]);

        }

    }

    public function trackApplication(){
        return view('frontend.filter_report');
    }



    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
    
        // Perform a search query to find related blogs based on the keyword
        $relatedBlogs = Blog::where('title', 'like', '%' . $keyword . '%')
                            ->select('title', 'slug', 'image', 'short_description')
                            ->paginate(4); // Paginate the results with 12 items per page
    
        // Pass the search results to the view along with the keyword
        return view('frontend.search-article', compact('relatedBlogs', 'keyword'));
    }
    

}
