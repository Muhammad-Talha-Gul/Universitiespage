<?php
/**
 * Created by PhpStorm.
 * User: Asif
 * Date: 6/12/2017
 * Time: 3:46 PM
 */
use App\Model\CustomPostType;
use Illuminate\Cookie\CookieJar;
use App\Model\Preferences;
use App\Model\Notifications;
use App\Model\Media;
use App\Model\CMS;
use App\Model\Message;
use App\Model\Blog;
use App\Model\Posts;
use App\Model\City;
use App\Model\PostReviews;
use App\Model\Countries;
use App\Model\BlogCategory;
use App\Model\ContactMails;
use App\Model\UniversityDetail;
use App\Model\GroupModules;
use App\Model\Menus;
use App\Model\ConsultantForm;
use App\Model\Subject;
use App\Model\Wishlist;
use App\Model\Student;
use App\Model\Pages;
use App\Model\MenuItems;
use App\Model\Testimonials;
use App\Model\Guide;
use App\Model\Stores;
use App\Model\Course;
use App\Model\ApplicationForm;
use App\User;
use DevDojo\Chatter\Models\Models;
use App\Model\Review;
use Jenssegers\Agent\Agent;
//use Storage;

function show_types() {
	$data = CustomPostType::OrderBy('sort_order')->where('is_active',1)->get();
	return $data;
}

function post_rating($post_id,$col) {
	$reviews = PostReviews::where('post_id',$post_id)->where('is_active',1)->get();
	$sum = $reviews->sum($col);
	return $sum;
	if($sum>0) {
		return $avg = $sum/count($reviews);
	}
	return 0;
}
function show_post_types() {
	$data = CustomPostType::OrderBy('sort_order')->where('is_active',1)->get();
	return $data;
}


function getCatPosts($category_id = []) {
	$data = Posts::whereIn('category_id',$category_id)->where('is_active',1)->limit(2)->OrderBy('id','DESC')->get();
	return $data;
}

function blog_categories() {
	$data = BlogCategory::OrderBy('sort_order')->where('is_active',1)->get();
	return $data;
}

function showAuthors() {
	$data = User::OrderBy('first_name','ASC')->where('user_type',"author")->get();
	return $data;
}

function makeHeading($string) {
	$heading =  strtoupper($string);
	$heading = str_replace("[", "<span class='highlight'>", $heading);
	$heading = str_replace("]", "</span>", $heading);
	return $heading;
}

function getAttr($post_id, $attr) {
	$product = Posts::find($post_id);
	$attrs = json_decode($product['attributes'],true);
	if(isset($attrs[$attr])) {
		return $attrs[$attr];
	} elseif(empty(isset($attrs[$attr]))){
		return (isset($attrs[$attr]))?$attrs[$attr]:null;
	} else {
		return [];
	}
}

function getPostAttr($blog_id, $attr) {
	$blog = Blog::find($blog_id);
	$attrs = json_decode($blog['post_attributes'],true);
	if(isset($attrs[$attr])) {
		return $attrs[$attr];
	} elseif(empty(isset($attrs[$attr]))){
		return (isset($attrs[$attr]))?$attrs[$attr]:null;
	} else {
		return '';
	}
}


function getProduct($product_id) {
	$data = Posts::find($product_id);
	return $data;
}

function TalentUsers()
{
	require_once(public_path('talentlms/TalentLMS.php'));
	TalentLMS::setApiKey('WmgwgV4J5tYfnbKqV5gy2azjnqCBHl');
	TalentLMS::setDomain('elndemo.talentlms.com');
	return TalentLMS_User::all();
}

function talentLMSUser($id)
{
	require_once(public_path('talentlms/TalentLMS.php'));
	TalentLMS::setApiKey('WmgwgV4J5tYfnbKqV5gy2azjnqCBHl');
	TalentLMS::setDomain('elndemo.talentlms.com');
	return TalentLMS_User::retrieve($id);
}

function addTalentLMSUser($data)
{
	require_once(public_path('talentlms/TalentLMS.php'));
	TalentLMS::setApiKey('WmgwgV4J5tYfnbKqV5gy2azjnqCBHl');
	TalentLMS::setDomain('elndemo.talentlms.com');
	$password = $data->secret;
	return TalentLMS_User::signup([
		'first_name'=>$data->first_name,
		'last_name'=>$data->last_name,
		'email'=>$data->email,
		'login'=>$data->email,
		'password'=>$password,
	]);
}
function assignCourse($user_id, $course_id)
{
	require_once(public_path('talentlms/TalentLMS.php'));
	TalentLMS::setApiKey('WmgwgV4J5tYfnbKqV5gy2azjnqCBHl');
	TalentLMS::setDomain('elndemo.talentlms.com');
	TalentLMS_Course::addUser([
		'user_id' => $user_id,
		'course_id' => $course_id,
		'role' => 'learner']);
}
function randomPassword()
{
  return "eln".substr(uniqid('', true), -6);
}

function getpreferences() {
	$data = Preferences::find(1);
	return $data;
}

function getLogo() {
	$data = Preferences::find(1)->logo;
	return $data;
}

function getFooterLogo(){
	$data = Preferences::find(1)->sticky_logo;
	return $data;
}

function getSocialMeta() {
	$data = Preferences::find(1);
	return json_decode($data['contact_social'],true);
}
function getMenu($id) {
	$data = Menus::find($id);
	return $data;
}
function getContactMeta() {
	$data = Preferences::find(1);
	return json_decode($data['contact_meta'],true);
}
function getFooterMeta() {
	$data = Preferences::find(1);
	return json_decode($data['footer_meta'],true);
}
function getCounters() {
	$data = Preferences::find(1);
	return json_decode($data['counters'],true);
}
function getUser($id){
	$data = User::find($id);
	return $data;
}

function role($role,$module) {
	$previliges = [];
	if($role=="blog_author") {
		if($module=='blog') {
			$previliges = ['create','edit','delete','show'];
		} elseif($module=='products') {
			$previliges = [];
		} elseif($module=='orders') {
			$previliges = [];
		}
		elseif($module=='subscribers') {
			$previliges = [];
		} elseif($module=='users') {
			$previliges = [];
		}
	}

	elseif($role=="blog_editor") {
		if($module=='blog') {
			$previliges = ['create','edit','delete','show','publish'];
		} elseif($module=='products') {
			$previliges = [];
		} elseif($module=='orders') {
			$previliges = [];
		}
		elseif($module=='subscribers') {
			$previliges = [];
		} elseif($module=='users') {
			$previliges = [];
		}
	}

	elseif($role=="agent") {
		if($module=='blog') {
			$previliges = ['create','edit','delete','show','publish'];
		} elseif($module=='products') {
			$previliges = [];
		} elseif($module=='orders') {
			$previliges = ['create','edit','delete','show','publish'];
		}
		elseif($module=='subscribers') {
			$previliges = [];
		} elseif($module=='users') {
			$previliges = ['show'];
		}
	}

	elseif($role=="content_editor") {
		if($module=='blog') {
			$previliges = ['create','edit','delete','show','publish'];
		} elseif($module=='products') {
			$previliges = ['create','edit','delete','show','publish'];
		} elseif($module=='orders') {
			$previliges = [];
		}
		elseif($module=='subscribers') {
			$previliges = [];
		} elseif($module=='users') {
			$previliges = [];
		}
	} 

	elseif($role=="admin") {
		if($module=='blog') {
			$previliges = ['create','edit','delete','show','publish'];
		} elseif($module=='products') {
			$previliges = ['create','edit','delete','show','publish'];
		} elseif($module=='orders') {
			$previliges = ['create','edit','delete','show','publish'];
		}
		elseif($module=='subscribers') {
			$previliges = ['create','edit','delete','show','publish'];
		} elseif($module=='users') {
			$previliges = ['create','edit','delete','show','publish'];
		}
	}
	return $previliges;
}

function userCount() {
	return User::where('user_type','learner')->count();
}

function getAnalyticsCode(){
	$data = Preferences::find(1);
	$code = '';
	(isset($data->analytics_code)) ? $code = $data->analytics_code : $code = '';
	return $code;
}


function getPosts($type) {
	$type_id = CustomPostType::where('slug',$type)->value('id');
    $posts = Posts::where('post_type',$type_id)->where('is_active',1)->get();
    return $posts;
}
function getHome() {
	$data = CMS::where('page','home')->value('meta');
	return json_decode($data,true);
}
function getAbout() {
	$data = CMS::where('page','about')->value('meta');
	return json_decode($data,true);
}
function getTeam() {
	$data = CMS::where('page','team')->value('meta');
	return json_decode($data,true);
}
function getFaqs() {
	$data = CMS::where('page','faq')->value('meta');
	return json_decode($data,true);
}
function getCourses() {
	$data = CMS::where('page','courses')->value('meta');
	return json_decode($data,true);
}
/*function getWorkshops() {
	$data = CMS::where('page','workshops')->value('meta');
	return json_decode($data,true);
}*/
function getBlog() {
	$data = CMS::where('page','blog')->value('meta');
	return json_decode($data,true);
}

function getCategory() {
	$data = CMS::where('page','category')->value('meta');
	return json_decode($data,true);
}

function getContact() {
	$data = CMS::where('page','contact')->value('meta');
	return json_decode($data,true);
}

function pendingOrders() {
 	$count = Orders::where('order_status','pending')->count();
 	return $count;
}

function productsCount() {
	$type = CustomPostType::where('slug','products')->value('id');
 	$count = Posts::where('post_type',$type)->count();
 	return $count;
}

function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address",'lat','long','timezone');
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
                case "lat":
                	$output = @$ipdat->geoplugin_latitude;
                    break;
                case "long":
                	$output = @$ipdat->geoplugin_longitude;
                    break;
                case "timezone":
                	$output = @$ipdat->geoplugin_timezone;
                    break;
            }
        }
    }
    return $output;
}

function detectDevice(){
	$userAgent = $_SERVER["HTTP_USER_AGENT"];
	$devicesTypes = array(
        "computer" => array("msie 10", "msie 9", "msie 8", "windows.*firefox", "windows.*chrome", "x11.*chrome", "x11.*firefox", "macintosh.*chrome", "macintosh.*firefox", "opera"),
        "tablet"   => array("tablet", "android", "ipad", "tablet.*firefox"),
        "mobile"   => array("mobile ", "android.*mobile", "iphone", "ipod", "opera mobi", "opera mini"),
        "bot"      => array("googlebot", "mediapartners-google", "adsbot-google", "duckduckbot", "msnbot", "bingbot", "ask", "facebook", "yahoo", "addthis")
    );
 	foreach($devicesTypes as $deviceType => $devices) {           
        foreach($devices as $device) {
            if(preg_match("/" . $device . "/i", $userAgent)) {
                $deviceName = $deviceType;
            }
        }
    }
    return ucfirst($deviceName);
}

function get_domain($url) {
  $pieces = parse_url($url);
  $domain = isset($pieces['host']) ? $pieces['host'] : $pieces['path'];
  if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
    return $regs['domain'];
  }
  return false;
}

function get_reftype($url) {
	$a = $url;
	if (strpos($a, 'facebook') !== false || strpos($a, 'twitter') !== false || strpos($a, 'linkedin') !== false || strpos($a, 'googleplus') !== false || strpos($a, 'pinterest') !== false || strpos($a, 'instagram') !== false) {
	    return "social";
	} elseif(strpos($a, 'google') !== false || strpos($a, 'bing') !== false || strpos($a, 'yahoo') !== false) {
		return "search";
	} else {
		return "direct";
	}
}

function getThumb($file) {
	if(isset(explode("/", $file)[0])){
		$thumb = explode("/", $file);
		$sliced = array_slice($thumb, 0, -1);
		$temp = implode("/", $sliced);
		return $temp.'/'."thumbs/".end($thumb);
	} else {
		return $file;
	}
}

function getSearchList($type){
	if($type=='programs'){
		return Posts::where('post_type',1)->take(5)->get();
	}elseif($type=='country'){
		return Guide::where('guide_type', 'country')->take(5)->get();
	}elseif($type=='subject'){
		return Guide::where('guide_type', 'subject')->take(5)->get();
	}elseif($type=='university'){
		return UniversityDetail::where('active', 1)->where('display', 1)->where('popular', 1)->orderBy('ranking','DESC')->take(5)->get();
	}
	return [];
}

function subjects(){
	return Subject::OrderBy('name')->get();
}

function pluckSubjects(){
	return Subject::OrderBy('name')->pluck('name', 'id');
}
function todayApplications(){
	return ApplicationForm::whereDate('created_at', date('Y-m-d'))->count();
}
function totalApplications(){
	return ApplicationForm::count();
}
function getGuide($type){
	return Guide::OrderBy('title', "ASC")->where('guide_type', $type)->get();
}

function getCountries() {
	$data = Countries::OrderBy('country','ASC')->get();
	return $data;
}

function getSelectedCountries() {
	$data = City::where('selected', 1)->OrderBy('country','ASC')->get();
	return $data;
}

function getUniCountries() {
	$data = UniversityDetail::where('display',1)->where('active',1)->pluck('country')->toArray();
	$data = array_unique($data);
	return $data;
}

function subQuantity($id,$qty) {
	$post = Posts::find($id);
	$post->quantity = $post['quantity']-(int)$qty;
	$post->save();
}

function checkStock() {
    $type = CustomPostType::where('slug','products')->value('id');
    $items = Posts::where('post_type',$type)->where('quantity','<',5)->pluck('id')->toArray();
    foreach ($items as $key => $value) {
        if(Notifications::where('type','stock')->where('post_id',$value)->where('is_read',1)->count()==0) {
            Notifications::create([
                'type'=>'stock',
                'post_id'=>$value,
                'meta'=>'low stock alert',
                'is_read'=>0,
            ]);
        }
    }
}
function no_user_notification(){
	$data = Notifications::where('user_id', null)->where('is_read',"!=",1)->OrderBy('id','DESC')->count();
	return $data;
}
function notifications() {
	$data = Notifications::where('is_read',"!=",1)->OrderBy('id','DESC')->count();
	return $data;
}

function unread_notifications2() {
	$data = Notifications::where('user_id', null)->where('is_read',"!=",1)->OrderBy('id','DESC')->limit(3)->get();
	return $data;
}

function unread_notifications() {
	$data = Notifications::where('is_read',"!=",1)->OrderBy('id','DESC')->limit(3)->get();
	return $data;
}

function check_access($user_id,$module,$access) {
	$user = User::find($user_id);
	if($user['user_type']=='admin' && empty($user['group_id'])) {
		 return true; }
	elseif($user['user_type']=='admin' && !empty($user['group_id'])) {
		$module = GroupModules::where('group_id',$user['group_id'])->where('module',$module)->first();
		if(!empty($module)) {
			return ($module[$access]==1)?true:false;
		} else { return false; }
	} else {
		return false;
	}
}

function primaryMenu() {
	$menu = Menus::where('is_primary',1)->value('id');
	$items = MenuItems::whereNull('parent')->where('menu_id',$menu)->OrderBy('sort_order','ASC')->get();
	return $items;
}


function getMenuById($id) {
	$menu = Menus::where('id',$id)->value('id');
	$items = MenuItems::whereNull('parent')->where('menu_id',$menu)->OrderBy('sort_order','ASC')->get();
	return $items;
}

function getCommonSearched(){
	$array = [];
	if(Storage::exists('search.txt')) {
		$temp = Storage::get('search.txt');
		if(count($temp)>0) {$array = array_unique(explode("\n", $temp));}    		
	}
    return array_slice($array, 0, 4);
}

function totalCustomers() {
	return User::where('user_type','customer')->count();
}


function orders_nsettings() {
	return Preferences::find(1)['notification_settings'];
}

function getStores() {
	$data = Stores::OrderBy('id','DESC')->get();
	return $data;
}

function emailVerication($email) {
	$client = new \GuzzleHttp\Client;
    $response = $client->get('https://api.neverbounce.com/v4/single/check', ['query' => [
        'key' => 'secret_4c261d964dfce45c9813c63f467ec9cb', 
        'email' => $email
    ]]);

    $response = json_decode($response->getBody(), true);
    return $response;        
}

function createSiteMap(){
	$slugs = Pages::pluck('slug','updated_at');
	$blog = Blog::pluck('slug','updated_at');
	// $porduct = Posts::where('post_type', 1)->pluck('slug','updated_at');
	$slugs = $slugs->merge($blog);
	// $slugs = $slugs->merge($porduct);
	$xml = 
	'<urlset>
		';
		foreach ($slugs as $key => $value) {
			if($value == 'home'){
				$xml .= 
		'<url>
			<loc>'.url("/").'/</loc>
			<lastmod>'.date('c',strtotime($key)).'</lastmod>
			<changefreq>daily</changefreq>
		</url>
		';
			}else{
				$xml .= 
		'<url>
			<loc>'.url($value).'/</loc>
			<lastmod>'.date('c',strtotime($key)).'</lastmod>
			<changefreq>daily</changefreq>
		</url>
		';
			}
		}
		$xml .= 
	'</urlset>';

	$f_path = base_path('sitemap.xml');
    $f_robot=fopen($f_path,'w');
    fwrite($f_robot,$xml);
    fclose($f_robot);
}

// function getBlogs($paginate, $category){
// 	if($paginate !== 0 && $category==null){
// 		return Blog::where('is_active', 1)->where('is_featured',0)->with('category')->orderBy('sort_order', 'ASC')->paginate($paginate);
// 	}elseif($paginate !== 0 && $category!==null){
// 		return Blog::where('is_active', 1)->where('is_featured',0)->where('category_id', $category)->orderBy('sort_order', 'ASC')->with('category')->paginate($paginate);
// 	}elseif($paginate == 0 && $category!==null){
// 		return Blog::where('is_active', 1)->where('is_featured',0)->where('category_id', $category)->orderBy('sort_order', 'ASC')->with('category')->get();
// 	}else{
// 		return Blog::where('is_active', 1)->where('is_featured',0)->orderBy('sort_order', 'ASC')->with('category')->get();
// 	}
// }

function getBlogs($paginate, $category){
    if($paginate !== 0 && $category==null){
        return Blog::where('is_active', 1)->where('is_featured',0)->with('category')->orderBy('sort_order', 'ASC')->paginate($paginate + 1);
    } elseif($paginate !== 0 && $category!==null){
        return Blog::where('is_active', 1)->where('is_featured',0)->where('category_id', $category)->orderBy('sort_order', 'ASC')->with('category')->paginate($paginate + 1);
    } elseif($paginate == 0 && $category!==null){
        return Blog::where('is_active', 1)->where('is_featured',0)->where('category_id', $category)->orderBy('sort_order', 'ASC')->with('category')->get();
    } else {
        return Blog::where('is_active', 1)->where('is_featured',0)->orderBy('sort_order', 'ASC')->with('category')->get();
    }
}

function pluckBlog(){
	return Blog::where('is_active',1)->orderBy('sort_order', 'ASC')->pluck('slug')->toArray();
}

function getAuthorName($id){
	return User::where('id', $id)->value('first_name');
}

function getCategoryName($id){
	return BlogCategory::where('id', $id)->value('name');
}

function getBlogCategories(){
	return BlogCategory::with('blogs')->where('is_active', 1)->get();
}

function popularBlog(){
	return Blog::where('is_active',1)->where('is_featured', 1)->orderBy('sort_order', 'DESC')->get();
}

function latestBlog($take){
	return Blog::where('is_active',1)->orderBy('created_at', 'DESC')->take($take)->get();
}

function getPopularBlog($take){
	return Blog::where('is_active',1)->where('is_featured', 1)->orderBy('sort_order', 'DESC')->take($take)->get();
}

function getPopualrUniversity(){
	return UniversityDetail::where('display',1)->where('active',1)->where('popular', 1)->orderBy('ranking','DESC')->get();
}
function getPopualrCourse(){
	return Course::with(['university','subject','qualificationName'])->where('display',1)->where('active',1)->where('popular', 1)->orderBy('id','DESC')->get();
}

function getUserOfBlog($id){
	return User::where('id', $id)->first();
}

function getSliderByName($id){
	return Media::where('id', $id)->where('type','slider')->first();
}

function qualification(){
	return Posts::where('post_type',1)->get();
}

function courseName(){
	return Course::where('active', 1)->where('display', 1)->pluck('name')->toArray();
}

function coursesOfLevel($name){
	
	$qualification = Posts::where('post_type', 1)->where('title', $name)->value('id');
	return Course::where('qualification', $qualification)->get();
}

function singleQualification($id){
	return Posts::where('post_type',1)->where('id', $id)->first();
}

function getAllUniversity(){
	return UniversityDetail::where('display', 1)->where('active', 1)->get();
}

function totalUniversity(){
	return UniversityDetail::where('display', 1)->count();
}

function totalStudent(){
	return Student::count();
}

function getAllCourse(){
	return Course::where('display', 1)->where('active', 1)->get();
}

function getUniversity(){
	return UniversityDetail::where('user_id', Auth::user()->id)->first();
}

function country(){
	return City::where('selected', 1)->get();
}

function allCountry(){
	return City::all();
}

function pluckCountry(){
	return City::pluck('country');
}

function topicRelated($s){
	if($s !== null){
		$raw = "( courses.name LIKE '%".$s."%' or courses.duration LIKE '".$s."%' or courses.yearly_fee LIKE '".$s."%' or courses.languages LIKE '%".$s."%' or university_details.name LIKE '%".$s."%' or posts.title LIKE '%".$s."%' or  DATE_FORMAT(courses.starting_date,'%W %D %M %Y') LIKE '%".$s."%' or  DATE_FORMAT(courses.deadline,'%W %D %M %Y') LIKE '%".$s."%'  )";

		$course = Course::join('university_details','university_details.id', '=','courses.university_id')
	                        ->join('posts','posts.id', '=','courses.qualification')
	                        ->select('courses.*', 'university_details.name AS university_name', 'university_details.ranking', 'posts.title', 'university_details.logo')
	                        ->whereRaw($raw)->whereDate('courses.deadline', '>', date('Y-m-d'))->orderBy("name")->pluck('courses.name', 'courses.id')->take(10);

	    return $course;
    }else{
    	return [];
    }
}

function services(){
	$array = ['educational_counselling', 'course_selection', 'university_selection', 'offers_&_admissions_in_universities_/_colleges', 'visa_assistance', 'scholarship_assistance', 'study_abroad_loan_assistance', 'airport_assistance', 'accommodation_services', 'part_time_job_guidance', 'psychometric_testing', 'registration_for_entrance_and_english_tests', 'immigration_assistance', 'visitor_visas', 'overseas_work_permits', 'collaboration_services_to_institutions'];
	return $array;
}

function myWishlist(){
	return Wishlist::where('user_id', Auth::user()->id)->get();
}

function userNoti(){
	return Notifications::where('user_id', Auth::user()->id)->where('is_read',0)->count();
}

function appliedCourse(){
	return ApplicationForm::where('student_id', Auth::user()->id)->get();
}

function acceptedApplications(){
	return ApplicationForm::where('student_id', Auth::user()->id)->where('status', 1)->get();
}

function reviews(){
	return Review::where('university_id', Auth::user()->university_detail->id)->get();
}

function pendingApplication(){
	return ApplicationForm::where('university_id', Auth::user()->university_detail->id)->where('status', 2)->get();
}

function totalCourses(){
	return Course::where('university_id', Auth::user()->university_detail->id)->where('display',1)->get();
}

function descussionCateVise($id){
	return Models::discussion()->where('chatter_category_id', $id)->count();
}

function check_course($id){
	$data = Course::where('id',$id)->whereDate('deadline', '>=', date('Y-m-d'))->where('active', 1)->where('display', 1)->first();
	if($data==null){
		return 0;
	}else{
		return 1;
	}
}

function serviceFee(){
	return (Preferences::find(1)->general_meta['service_charges'])??'0';
}

function newOrNot($date){
	$now = \Carbon\Carbon::now();
	$date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s' ,date('Y-m-d H:i:s',strtotime($date) ));
	$diff = $date->diffInDays($now, false);
	if($diff >= 0 && $diff <= 6){
		return 1;
	}else{
		return 0;
	}
}
function diffInSec($date){
	$now = \Carbon\Carbon::now();
	$date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s' ,date('Y-m-d H:i:s',strtotime($date) ));
	$diff = $date->diffInSeconds($now, false);
	if($diff >= 0){
		return 0;
	}else{
		return 1;
	}
}

function topReviews($id, $type){
	if($type == 'consultant'){
		return Review::where('consultant_id', $id)->orderBy('stars', 'DESC')->take(3)->get();
	}elseif($type == 'university'){
		return Review::where('university_id', $id)->orderBy('stars', 'DESC')->take(3)->get();
	}
}

function getUserID($id, $type){
	if($type == 'student'){
		$user_id = Student::where('id', $id)->value('user_id');
	}elseif ($type == 'university'){
		$user_id = UniversityDetail::where('id', $id)->value('user_id');
	}
	return $user_id;
}

function getUserById($id){
	$user = User::where('id', $id)->first();
	return $user;	
}
function totalMessage(){
	return ContactMails::count();
}


function newChat(){
	// $raw = '(receiver_id = '.auth()->user()->id.' or sender_id = '.auth()->user()->id.')';
	return Message::where('read',0)->where('receiver_id', auth()->user()->id)->count();
}

function getRandGuides($type){
	return Guide::orderBy(DB::raw('RAND()'))->where('guide_type', $type)->take(8)->get();
}

function getRandUni(){
	return UniversityDetail::orderBy(DB::raw('RAND()'))->where('active',1)->where('display',1)->take(3)->get();
}


function getUniLanguages(){
	$uni = UniversityDetail::where('active',1)->where('display',1)->pluck('languages')->toArray();
	$arr=[];
	foreach ($uni as $value) {
		if(strpos($value,",") !== false){
		    $ex = explode(',', $value);
		    foreach ($ex as $va) {
				if($va!==null){
					array_push($arr, $va);
		    	}
		    }
		}else{
			if($value!==null){
				array_push($arr, $value);
			}
		}
	}
	return array_unique($arr);
}

function iph(){
	return 'public/imageplaceholder.jpg';
}

function fix($file, $size=null){
	$agent = new Agent();
	$url = iph();
	$thumb = explode("/", $file);
	if(in_array('filemanager', $thumb)){
		$thumb = array_flip($thumb);
		unset($thumb['filemanager']);
		$thumb = array_flip($thumb);
		$thumb = implode("/", $thumb);
		if(!file_exists(public_path().$thumb)){
			return $url;
		}
	}
	$thumb = explode("/", $file);
	$sliced = array_slice($thumb, 0, -1);
	$temp = implode("/", $sliced);
	$ext = explode(".", end($thumb));
	$ext = strtolower(end($ext));
	if(!in_array($ext, ['jpg', 'png', 'jpeg','svg','gif','exif','bmp'])){
		return $url;
	}
	if($size!==null){
		$url = $temp.'/'.$size.'/'.end($thumb);
	}else{
		if($agent->isMobile()){
			$size = 'small';
			$url = $temp.'/'.$size.'/'.end($thumb);
		}else{
			if(Preferences::find(1)->optimize_image==1){
				$size = 'optimize';
				$url = $temp.'/'.$size.'/'.end($thumb);
			}else{
				$url = $temp.'/'.end($thumb);
			}
		}	
	}
	return $url;
}

function is_mobile(){
	$agent = new Agent();
	return ($agent->isMobile())?1:0;
}
function op_image(){
	return Preferences::find(1)->optimize_image;
}
function pre_url($REFERER){
	$path = explode('/', $REFERER);
    $path = end($path);
    return $path;
}


?>