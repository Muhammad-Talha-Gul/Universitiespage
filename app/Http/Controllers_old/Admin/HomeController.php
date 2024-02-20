<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;    
use App\Model\Preferences;
use App\Model\Downloads;
use App\Model\UserArticles;
use App\Model\Visitors;
use App\Model\CustomPostType;
use App\Model\Posts;
use App\Model\PostReviews;
use App\Model\Notifications;
use App\Model\ChatList;
use App\Model\ContactMails;
use App\Model\Subscribers;
use App\Model\Message;
use Carbon\Carbon;
use App\Model\Course;
use App\User;
use Auth;
use Session;
use Excel;
use \Swift_SmtpTransport;
use Mail;
use View;
use Storage;
use Socialite;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index(Request $request)
    {
        $users = User::whereDate('created_at',Carbon::today())->where('user_type','customer')->OrderBy('id','DESC')->get()->take(5);
        $visitors = Visitors::OrderBy('id','DESC')->whereDate('created_at',Carbon::today())->get();
        $sessions = [];
        $countries = Visitors::whereDate('created_at',Carbon::today())->get()->groupBy('location')->toArray();
        $cities = Visitors::whereDate('created_at',Carbon::today())->get()->groupBy('city')->toArray();
        $referer_types = Visitors::whereDate('created_at',Carbon::today())->get()->groupBy('referer_type')->toArray();
        $socials = Visitors::whereDate('created_at',Carbon::today())->where('referer_type','social')->get()->groupBy('referer')->toArray();
        $devices = Visitors::whereDate('created_at',Carbon::today())->get()->groupBy('device')->toArray();
        $pages = Visitors::whereDate('created_at',Carbon::today())->limit(5)->get()->groupBy('uri')->toArray();
        /*Ajax*/
        if($request->ajax()){
            $from = new Carbon($request->start);
            $from = $from->format('Y-m-d')." 00:00:00";
            $to = new Carbon($request->end);
            $to = $to->format('Y-m-d')." 23:59:59";
            $visitors = Visitors::OrderBy('id','DESC')->whereBetween('created_at', [$from, $to])->get();
            $sessions = [];
            $countries = Visitors::whereBetween('created_at', [$from, $to])->get()->groupBy('location')->toArray();
            $cities = Visitors::whereBetween('created_at', [$from, $to])->get()->groupBy('city')->toArray();
            $referer_types = Visitors::whereBetween('created_at', [$from, $to])->get()->groupBy('referer_type')->toArray();
            $socials = Visitors::whereBetween('created_at', [$from, $to])->where('referer_type','social')->get()->groupBy('referer')->toArray();
            $devices = Visitors::whereBetween('created_at', [$from, $to])->get()->groupBy('device')->toArray();
            $pages = Visitors::whereBetween('created_at', [$from, $to])->limit(5)->get()->groupBy('uri')->toArray();
            return view('admin.stats',['visitors'=>$visitors,'countries'=>$countries,'cities'=>$cities,'referer_types'=>$referer_types,'socials'=>$socials,'devices'=>$devices,'pages'=>$pages,'users'=>$users])->render();
        }
        /*End Ajax*/
        return view('admin/dashboard',['visitors'=>$visitors,'countries'=>$countries,'cities'=>$cities,'referer_types'=>$referer_types,'socials'=>$socials,'devices'=>$devices,'pages'=>$pages,'users'=>$users]);
    }

    public function orders()
    {
    	$data = Orders::OrderBy('id','DESC')->paginate(5);
    	return view('admin.orders',['data'=>$data]);
    }

    public function order_detail($id)
    {
        $data = Orders::find($id);
    	$products = OrderDetail::where('order_id',$data['id'])->get();
        $customer = User::find($data['user_id']);
        $notes = OrderNotes::where('order_id',$id)->OrderBy('created_at','DESC')->get()->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('d/M/Y');
            });
        $shipping_info = [];
        if(!empty($data['shipping_meta'])) {$shipping_info = json_decode($data['shipping_meta'],true);}
    	return view('admin.order_detail',['data'=>$data,'products'=>$products,'notes'=>$notes,'customer'=>$customer,'shipping_info'=>$shipping_info]);
    }

    public function store_note(Request $request)
    {
        OrderNotes::create([
            'order_id'=>$request->order_id,
            'user_id'=>Auth::user()->id,
            'note'=>$request->note
        ]);
        $notes = OrderNotes::where('order_id',$request->order_id)->OrderBy('created_at','DESC')->get()->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('d/M/Y');
            });
        return view('ajax.order_notes',['notes'=>$notes])->render();
    }

    public function order_status(Request $request)
    {
        $order = Orders::find($request->order_id);
        $order->order_status = $request->status;
        $order->save();
        if($request->status=="completed") {
            OrderNotes::create([
                'order_id'=>$request->order_id,
                'user_id'=>Auth::user()->id,
                'type'=>'completed',
                'note'=>$request->status
            ]);
            $resp['status'] = '<div class="label label-success"><span>Completed</span></div>';
        } else {
            OrderNotes::create([
                'order_id'=>$request->order_id,
                'user_id'=>Auth::user()->id,
                'type'=>'status',
                'note'=>$request->status
            ]);
        }
        $notes = OrderNotes::where('order_id',$request->order_id)->OrderBy('created_at','DESC')->get()->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('d/M/Y');
            });
        $resp['notes'] = view('ajax.order_notes',['notes'=>$notes])->render();
        if($request->status=="pending") { $resp['status'] = '<div class="label label-warning"><span>Pending</span></div>'; }
        elseif($request->status=="partial") { $resp['status'] = '<div class="label label-purple"><span>Partial</span></div>'; }
        elseif($request->status=="hold") { $resp['status'] = '<div class="label label-pink"><span>Hold</span></div>'; }
        elseif($request->status=="cancelled") { $resp['status'] = '<div class="label label-danger"><span>Cancelled</span></div>'; }
        return response()->json($resp);
    }

    public function order_bulk_action(Request $request)
    {
        if(!empty($request->ids)) {
            Orders::whereIn('id',$request->ids)->update(['order_status'=>$request->status]);
            foreach($request->ids as $value) {
                if($request->status=="completed") {
                    OrderNotes::create([
                        'order_id'=>$value,
                        'user_id'=>Auth::user()->id,
                        'type'=>'completed',
                        'note'=>$request->status
                    ]);
                } else {
                    OrderNotes::create([
                        'order_id'=>$value,
                        'user_id'=>Auth::user()->id,
                        'type'=>'status',
                        'note'=>$request->status
                    ]);
                }
            }
        }
        return redirect()->back();
    }

    public function delete_orders(Request $request)
    {
        if(!empty($request->ids)) {
            OrderDetail::whereIn('order_id',$request->ids)->delete();
            OrderNotes::whereIn('order_id',$request->ids)->delete();
            Orders::destroy($request->ids);
        }
        return redirect()->back();
    }

    public function settings()
    {
        $data = Preferences::find(1);
        /*$data['contact_social'] = json_decode($data['contact_social'],true);
        $data['footer_meta'] = json_decode($data['footer_meta'],true);*/
        $data['mailer'] = json_decode($data['mailer'],true);
        $data['counters'] = json_decode($data['counters'],true);
        $logs = [];
        if(Storage::exists('download-logs.txt')) {
            $temp = Storage::get('download-logs.txt');
            if(count($temp)>0) {$logs = array_unique(explode("\n", $temp));}           
        }
        return view('admin.settings',['data'=>$data,'logs'=>$logs]);
    }

    public function updateSettings(Request $request)
    {
        $uploadDir  = public_path("/uploads/logos");
        $uploadDirDocs  = public_path("/uploads/docs");
        $data = $request->except(['contact_meta','contact_social','mailer','footer_meta','analytics_file']);
        $data['contact_meta'] = json_encode($request->contact_meta);
        /*$data['contact_social'] = json_encode($request->contact_social);*/
        $data['mailer'] = json_encode($request->mailer);
        $data['general_meta'] = json_encode($request->general_meta);
        $data['optimize_image'] = ($request->optimize_image)?1:0;
        /*if(isset($request->footer_meta)) { $data['footer_meta'] = json_encode($request->footer_meta); } else { $data['footer_meta'] = ''; }*/
        $data['enabled_analytics'] = ($request->has('enabled_analytics'))?1:0;
        if ($request->hasFile('analytics_file')) {
            $file = $request->file('analytics_file');
            $filename = $file->getClientOriginalName();
            $file->move($uploadDirDocs, $filename);
            $data['analytics_file'] = $filename;
        }
        Preferences::find(1)->update($data);
        return redirect()->back();
        
    }


    public function students()
    {
        $orders = Orders::OrderBy('id','DESC')->get();
        $data = [];
        if(count($orders)>0) {
            foreach($orders as $value) {
                foreach($value->orderdetail as $val) {
                    $data[] = [
                        'user_id'=>$value->user_id,
                        'workshop'=>($val->type=='workshop')?$val->product_id:'',
                        'course'=>($val->type=='course')?$val->product_id:'',
                        'created_at'=>$val->created_at,
                        'updated_at'=>$val->updated_at
                    ];
                }
            }
        }
        return view("admin.students",compact('data'));
    }

    public function article_requests()
    {
        $data = UserArticles::OrderBy('id','DESC')->get();
        return view('admin.article_requests',['data'=>$data]);
    }

    public function request_detail($id)
    {
        $data = UserArticles::find($id);
        return view('admin.article_detail',['data'=>$data]);
    }

    public function publish_article(Request $request)
    {
        $data = UserArticles::find($request->id);
        $data->update(['status'=>1]);
        return response()->json("success");
    }

    public function getStats()
    {
        return Visitors::get();
    }

    public function checkSMTP(Request $request)
    {
        try
        {
            $transport = new \Swift_SmtpTransport($request->host, $request->port, $request->enc);
            $transport->setUsername($request->user);
            $transport->setPassword($request->pass);
            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();
            return 'ok';
        } catch (\Swift_TransportException $e) {
             return $e->getMessage();
        } catch (\Exception $e) {
          return $e->getMessage();
        }
    }

    public function notifications()
    {
        $data = Notifications::OrderBY('id','DESC')->where('user_id', null)->paginate(10);
        return view('admin.notifications',compact('data'));
    }

    public function notification_detail($id)
    {
        $notification = Notifications::find($id);
        $notification->is_read = 1;
        $notification->save();
        if($notification->type=='order') {
            return Redirect::route('orderDetail',$notification->order_id);
        } elseif($notification->type=='stock') {
            $post = Posts::find($notification->post_id);
            $type = CustomPostType::find($post['post_type']);
            return Redirect::route('edit_post',[$type['slug'],$notification->post_id]);
        } elseif($notification->type=='transfer') {
            return Redirect::route('post_issued','products');
        } elseif($notification->type=='helping') {
            return view('admin.helping',['data'=>$notification]);
        }elseif($notification->type=='comment'){
            return redirect('admin/post-comment');
        } elseif($notification->type=='email') {
            return Redirect::route('emailsDetail',$notification['mail_id']);
        } elseif($notification->type=='subscription') {
            return Redirect::route('subscriberList');
        } elseif($notification->type=='order_action') {
            return Redirect::route('orderRequests',$notification['order_id']);
        // } elseif($notification->type=='review') {
        //     return Redirect::route('postReview',$notification['review_id']);
        }

        return Redirect::route("notifications");
    }

    public function dashboard_notification_detail($id)
    {
        $notification = Notifications::find($id);
        $notification->is_read = 1;
        $notification->save();
        // dd($notification);

        if($notification->type=='review'){
            if($notification->university!==null){
                $slug = $notification->university->slug;
                return redirect('university/'.$slug);
            }
        }elseif($notification->type=='review-replay'){
            if($notification->university!==null){
                $slug = $notification->university->slug;
                return redirect('university/'.$slug);
            }
        }elseif($notification->type=='application_status'){
            return redirect('dashboard#application');
        }elseif($notification->type=='premium'){
            // return redirect('dashboard/student');
        }elseif($notification->type=='application'){
            return redirect('dashboard#application');
        }elseif($notification->type=='consult'){
            // return redirect('dashboard/consult');
        }elseif($notification->type=='reply'){
            if(Auth::user()->user_type == 'consultant'){
                // return redirect('dashboard/consult');
            }
        }
        return Redirect::back();
    }

    public function emails()
    {
        $data = ContactMails::OrderBy('id','DESC')->paginate(2);
        return view('admin.emails',compact('data'));
    }

    public function email_detail($id)
    {
        $data = ContactMails::find($id);
        $data->is_read = 1;
        $data->save();
        return view('admin.email_detail',compact('data'));
    }

    public function read_emails(Request $request)
    {
        ContactMails::whereIn('id',$request->ids)->update(['is_read'=>1]);
        return Redirect::route('emailsList');
    }

    public function destroy_emails(Request $request)
    {
        // dd($request->ids);
        if(is_array($request->ids)) {
            $count = count($request->ids);
            Notifications::whereIn('mail_id',$request->ids)->delete();
        } else {
            $count = 1;
            Notifications::where('mail_id',$request->ids)->delete();
        }
        ContactMails::destroy($request->ids);
        Session::flash('success',$count." item(s) deleted");
        return Redirect::route('emailsList');
    }

    public function update_email(Request $request)
    {
        Preferences::find(1)->update(['contact_email'=>$request->email]);
        Session::flash('success',"Email address updated to ".$request->email);
        return redirect()->back();
    }

    public function subscribers()
    {
        $data = Subscribers::OrderBy('id','DESC')->get();
        return view('admin.subscribers',['data'=>$data]);
    }

    public function helping_list()
    {
        $data = Notifications::where('type','helping')->OrderBy('id','DESC')->get();
        return view('admin.helping_list',['data'=>$data]);
    }

    public function reviews()
    {
        $data = PostReviews::OrderBy('id','DESC')->get();
        return view('admin.reviews_list',['data'=>$data]);
    }

    public function review_detail($id)
    {
        $data = PostReviews::find($id);
        return view('admin.review',['data'=>$data]);
    }

    public function approve_review($id)
    {
        $data = PostReviews::find($id);
        $data->update(['is_active'=>1]);
        return Redirect::route('postReviews');
    }

    public function delete_review($id)
    {
        $data = PostReviews::destroy($id);
        return Redirect::route('postReviews');
    }

    public function sql_backup()
    {
        $database = env('DB_DATABASE', 'forge');
        $user = env('DB_USERNAME', 'forge');
        $pass = env('DB_PASSWORD', '');
        $host = 'localhost';
        $filename = 'export-'.date('d-m-Y').'.sql';
        $dir = public_path($filename);
        exec("mysqldump --user={$user} --password={$pass} --host={$host} {$database} --result-file={$dir} 2>&1", $output);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($dir).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($dir));
        readfile($dir);
        $log = "[".Date('d-m-Y g:i A')."] ".Auth::user()->first_name." takes database backup";
        Storage::prepend('download-logs.txt',$log);
        exit();
    }

    public function sales_channels()
    {
        return view('admin.sales-channels');
    }

    public function emailverification(Request $request)
    {
        try {
            $client = new \GuzzleHttp\Client;
            $response = $client->get('https://api.neverbounce.com/v4/single/check', ['query' => [
                'key' => 'secret_4c261d964dfce45c9813c63f467ec9cb',
                'email' => $request->email
            ]]);

            $response = json_decode($response->getBody(), true);
            return $response;   
        } catch (Exception $e) {
            dd($e);
        }        
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function fb_callback() {
        $resp = Socialite::driver('facebook');
        $user = $resp->user();
        if(isset($user->email)) {
            $newUser = User::updateOrCreate(['fb_token'=>$user->getId(), 'email'=>$user->email,'provider'=>'facebook'],[
                'first_name'=>$user->name,
                'password'=>bcrypt('fb_'.rand(0,9999)),
                'is_verified'=>1,
                'is_active'=>1,
                'user_type'=>'customer',
            ]);
            Auth::login($newUser);
            if(!empty(getCart())) {
                return redirect("/checkout");
            } else {
                return redirect("/");
            }
        }
    }

    public function conversation(){
        if(auth()->user()->user_type == 'admin'){
            $data = User::where('user_type', 'student')->get();
            $message = [];
            if(count($data)>0){
                $chatList = ChatList::where('user_id',$data[0]->id)->orderBy('updated_at', 'DESC')->first();
                $message = Message::where('list_id', ($chatList->id)??0)->orderBy('created_at','DESC')->get();
            }
            return view('admin.conversation', compact('data', 'message'));
        }else{
            return redirect('errors.404');
        }
    }
    
    public function messages(Request $request){
        $message = Message::where('list_id', $request->id)->orderBy('created_at','DESC')->get();
        $view = View::make('admin.chat_message', [
            'message' => $message
        ]);
        return $html = $view->render();
    }
    public function popular($id){
     $course = Course::where('id',$id)->first();
     if (!empty($course)){
         $course->update([
             'popular' => ($course->popular == 1) ? 0 : 1
         ]);
         return response()->json(['success' => 'popular success' ],200);
     }
       abort(404);
    }
    public function getUnReadConversation(){
        $msg = Message::where('read',0)->count();
        return response()->json($msg);
    }

}