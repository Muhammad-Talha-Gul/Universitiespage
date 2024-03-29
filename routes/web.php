<?php

use App\Http\Controllers\Api;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Model\Course;

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return redirect('/');
});




Route::get('/', function () {
    // Check if assets are already cached
    if (!Cache::has('assets_cached')) {
        // Cache frontend assets
        cacheAssets('frontend', 'css');
        cacheAssets('frontend', 'js');
        cacheImages('frontend');

        // Cache backend assets
        cacheAssets('backend', 'css');
        cacheAssets('backend', 'js');
        cacheImages('backend');

        // Mark assets as cached
        Cache::put('assets_cached', true, now()->addDay());
    }

    // Return a response indicating that assets are cached
    return response()->json(['message' => 'Assets cached successfully']);
});

// Function to cache assets from a directory based on type (css/js) and area (frontend/backend)
function cacheAssets($area, $type)
{
    // Define the directory path based on the area and type
    $directory = public_path("assets_{$area}/{$type}");

    // Get all files in the directory
    $files = File::allFiles($directory);

    // Loop through each file
    foreach ($files as $file) {
        $filename = $file->getRelativePathname();

        // Check if the file is already cached
        if (!Cache::has("{$area}_{$type}_{$filename}")) {
            // Read the file contents
            $content = File::get($file->getPathname());

            // Set appropriate cache headers
            $headers = [
                'Content-Type' => File::mimeType($file->getPathname()),
                'Cache-Control' => 'public, max-age=' . (strtotime('12:00 PM') - time()), // Cache until 12:00 PM
            ];

            // Create the response
            $response = Response::make($content, 200, $headers);

            // Cache the response
            Cache::put("{$area}_{$type}_{$filename}", $response, now()->until('12:00 PM'));
        }
    }
}

// Function to cache all images from the public folder
function cacheImages($area)
{
    // Define the directory path
    $directory = public_path();

    // Recursively get all image files in the directory
    $imageFiles = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($directory)
    );

    // Loop through each image file
    foreach ($imageFiles as $imageFile) {
        // Exclude directories and non-image files
        if ($imageFile->isFile() && starts_with(mime_content_type($imageFile), 'image/')) {
            $filename = $imageFile->getRelativePathname();

            // Check if the file is already cached
            if (!Cache::has("{$area}_img_{$filename}")) {
                // Read the file contents
                $content = File::get($imageFile->getPathname());

                // Set appropriate cache headers
                $headers = [
                    'Content-Type' => File::mimeType($imageFile->getPathname()),
                    'Cache-Control' => 'public, max-age=' . (strtotime('12:00 PM') - time()), // Cache until 12:00 PM
                ];

                // Create the response
                $response = Response::make($content, 200, $headers);

                // Cache the response
                Cache::put("{$area}_img_{$filename}", $response, now()->until('12:00 PM'));
            }
        }
    }
}

// Route to serve cached assets
Route::get('assets/{area}/{type}/{filename}', function ($area, $type, $filename) {
    $cacheKey = "{$area}_{$type}_{$filename}";

    // Check if the asset is cached
    if (Cache::has($cacheKey)) {
        return Cache::get($cacheKey);
    }

    // If the asset is not cached, return a 404 response
    abort(404);
});


Route::get('sendbtnemail/{id}/{type}','FrontEnd\HomeController@sendbtnemail')->name('sendbtnemail');


//awais
Route::get('filter_report','FrontEnd\HomeController@search_student_report')->name('filter_report');
Route::get('filterreport','FrontEnd\HomeController@filter_student_report')->name('filterreport');

// Talha
Route::get('/track-application', 'FrontEnd\HomeController@trackApplication')->name('track-application');
Route::get('/student-login', 'Auth\LoginController@StudentLogin')->name('student-login');
Route::get('/student-register', 'Auth\RegisterController@register')->name('student-register');
Route::get('/consultant-login', 'Auth\Consultant\LoginController@login')->name('consultant-login');
Route::get('/consultant-register', 'Auth\Consultant\RegisterController@register')->name('consultant-register');
Route::get('/discount-offer', 'FrontEnd\HomeController@discountOfferPage')->name('discount-offer');
Route::get('/blog/search', 'FrontEnd\HomeController@search')->name('blog.search');
Route::get('/apply-online', 'FrontEnd\HomeController@applyOnline')->name('apply-online');
Route::post('/apply-online', 'ApplyOnlineController@store')->name('apply-online');
Route::get('/applied-consultant', 'ApplyOnlineController@index')->name('applied-consultant');
Route::get('/admin-register', 'ApplyOnlineController@adminRegister')->name('admin-register');
Route::post('admin/register', 'ApplyOnlineController@adminRegisterSubmit')->name('admin-register-submit');
Route::get('/admin-users', 'ApplyOnlineController@adminusers')->name('admin-users');
Route::get('/admin-details/{id}', 'ApplyOnlineController@showAdminDetails')->name('admin-details');
Route::get('/admin-delete/{id}', 'ApplyOnlineController@adminDelete')->name('admin-delete');
Route::post('/permissions/{id}', 'PermissionController@updatePermission')->name('updatePermission');
Route::get('contact-us', 'FrontEnd\ContactUsController@index')->name('contact-us');
Route::post('message-post', 'FrontEnd\ContactUsController@messagePost')->name('message-post');
Route::get('get-messages', 'Admin\ContactUsController@getMessages')->name('get-messages');
Route::get('/message-delete/{id}', 'Admin\ContactUsController@messageDelete')->name('message-delete');

Route::get('/consultant-details/{id}', 'ApplyOnlineController@show')->name('consultant-details');
Route::get('/consultant-delete/{id}', 'ApplyOnlineController@delete')->name('consultant-delete');




// events trigger

Route::post('/event_trigger_web', 'FrontEnd\HomeController@event_trigger_web')->name('event_trigger_web');


Route::get('/events_whatsappbutton', 'Admin\EventsController@whatsappbutton')->name('events_whatsappbutton');


//awais


Route::get('delete_contactbtn/{id}','FrontEnd\HomeController@delete_contactbtn')->name('delete_contactbtn');

Route::post('ajax-email-verification',['as'=>'ajaxEmailVefication','uses'=>'Admin\HomeController@emailverification']);
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/get/site-notification','FrontEnd\HomeController@site_notifications')->name('getSiteNotifications');
Route::get('/', ['as'=>'homepage','uses'=>'FrontEnd\HomeController@index']);
Route::get('/complaint', ['as'=>'complaint','uses'=>'FrontEnd\HomeController@complaintPage']);

// Route::get('/discount-offer', ['as'=>'discountOffer','uses'=>'FrontEnd\HomeController@discountOfferPage'])->name('discount-offer');
Route::post('send-offer',['as'=>'discountOffer','uses'=>'FrontEnd\HomeController@submitOffer']);

Route::get('/guides/{slug}', ['as' => 'guide_page', 'uses' => 'FrontEnd\HomeController@guidePage']);


Route::get('/visa/{slug}', ['as' => 'visa_information', 'uses' => 'FrontEnd\HomeController@visaInformation']);

Route::get('/visit_visa', ['as' => 'visit_visa', 'uses' => 'FrontEnd\HomeController@visitVisa']);


Route::post('/ajax-search',['as'=>'ajaxSearch','uses'=>'FrontEnd\HomeController@ajax_search']);
Route::get('/get-uni-course',['as'=>'getUniCourse','uses'=>'Admin\UniversityController@getUniCourse']);

Route::get('/contact', ['as' => 'contact', 'uses' => 'FrontEnd\HomeController@contact']);
Route::post('store-user',['as' => 'store_user', 'uses' => 'FrontEnd\HomeController@store_user']);
/* ===Amir edit======== */
Route::post('student/password/reset',['as' => 'reset_user', 'uses' => 'FrontEnd\HomeController@sendresetLink']);
/* =====end amir edit========== */

Route::get('/admin', 'Auth\LoginController@showLoginForm');
Route::post('/download',['as'=>'download-pdf','uses'=>'FrontEnd\HomeController@downloads']);
Route::get('/thank-you',['as'=>'successPage','uses'=>'FrontEnd\HomeController@thank_you']);
Route::post('/add-to-wishlist',['as'=>'addToWishlist','uses'=>'FrontEnd\HomeController@addToWishlist']);

Route::post('ajaxSubscribe',['as' => 'ajaxSubscribe', 'uses' => 'FrontEnd\HomeController@subscribe']);
Route::post('send-mail',['as'=>'contactMail','uses'=>'FrontEnd\HomeController@sendmail']);
Route::get('/email-verication/{key}',['as'=>'emailVerification','uses'=>'FrontEnd\HomeController@verify_email']);
Route::get('stats',['as'=>'getStats','uses'=>'Admin\HomeController@getStats']); //for new
Route::get('api/getmap','FrontEnd\HomeController@getMap');

Auth::routes();
Route::get('api/getmap','FrontEnd\HomeController@getMap');
Route::post('ajax-quick-view','FrontEnd\HomeController@ajaxQuickView');
Route::get('/suggestion', 'FrontEnd\HomeController@suggestSearch');



Route::get('get-courses', ['as' => 'getCourses', 'uses' => 'Admin\UniversityController@course']);
Route::get('get-student-search', ['as' => 'getStudentSearch', 'uses' => 'Admin\CourseController@studentSearch']);
Route::post('/getCoursesOfUniversity', 'Admin\UniversityController@getCourse');
Route::post('/send-comment', ['as' => 'blog_comment', 'uses' => 'FrontEnd\HomeController@post_comment']);
Route::post('/get-selected-course', 'Admin\CourseController@selectedCourse');
Route::post('/getCoursesOfUniversity', 'Admin\UniversityController@getCourse');
Route::post('admin/ajax-popular-university', ['as'=>'ajaxPopularUniversity', 'uses'=>'Admin\UniversityController@popular']);
Route::post('/admin/consultant/make' ,['as'=>'ask-for-consultant', 'uses'=>'Admin\ConsultantFormController@store']);
Route::get('get-consultant-search', ['as' => 'getConsultantSearch', 'uses' => 'Admin\ConsultantController@consultantSearch']);
Route::post('admin/ajax-popular-consultant', ['as'=>'ajaxPopularConsultant', 'uses'=>'Admin\ConsultantController@popular']);
Route::Resource('/admin/student', 'Admin\StudentController');
Route::get('admin_consultant','Admin\StudentController@indexconsultant')->name('admin_consultant');
Route::get('/show_consultant/{slug}','Admin\StudentController@showconsultant')->name('show_consultant');
Route::get('/show_consultant_student/{slug}','Admin\StudentController@showconsultantstudent')->name('show_consultant_student');
Route::post('edit-student-report', 'Admin\StudentController@edit_student_report')->name('edit-student-report');
Route::get('/university/{slug}', 'FrontEnd\HomeController@university')->name('universityDetail');
Route::get('/courses/{id}', 'FrontEnd\HomeController@courseDetail');
Route::get('/admin-course/{searchName?}', 'Admin\CourseController@courses');
Route::get('/consultant/{slug}/{id}', 'FrontEnd\HomeController@consultantDetail');
Route::post('/free-consulation', 'FrontEnd\HomeController@freeConsulation');
Route::post('/apply-now-form', 'FrontEnd\HomeController@applyNowForm');
Route::post('save-review', ['as'=>'save-review', 'uses'=>'FrontEnd\HomeController@saveReview']);
Route::post('remove-review', ['as'=>'remove-review', 'uses'=>'FrontEnd\HomeController@removeReview']);
Route::post('university-register', ['as'=>'university-register', 'uses'=>'Admin\UniversityController@register']);
Route::get('apply-for-course/{id}', 'FrontEnd\HomeController@applyCourse');

Route::post('apply-validation', 'FrontEnd\HomeController@applyPersonalInfo');
Route::post('/admin/consultant/store', 'Admin\ConsultantController@store');
Route::post('/get-university-list', 'FrontEnd\HomeController@universityList');


// Route::get('getIp', function(){
//     // dd(ip_info($_SERVER['REMOTE_ADDR'] ,'country'));
//     // dd(ip_config());
// });
//======================================Feedback routes========================
Route::get('/feedback','feedbackController@viewfeedback')->name('feedback');
Route::post('/submitfeedback','feedbackController@savefeedback')->name('submitfeeback');
Route::get('displayfeedback','feedbackController@showfeedback')->name('displayfeedback');
//=============================end of feedback routes==============
Route::middleware(['auth'])->group(function (){
    Route::get('/country-list', 'Admin\CityController@getCountriesList')->name('countryList');
    Route::get('/add-country', 'Admin\CityController@addCountry')->name('addCountry');
    Route::post('/store-country', 'Admin\CityController@saveCountry')->name('store-country');
    Route::get('admin/country/{id}/edit','Admin\CityController@editCountry')->name('edit-country');
    Route::post('/update-country/{id}', 'Admin\CityController@updateCountry')->name('update-country');
    Route::delete('/delete-country/{id}', 'Admin\CityController@destroy')->name('delete-country');
    /* Custom Routes For Course and Univeersities */
    Route::resource('admin/university', 'Admin\UniversityController');
    Route::resource('admin/course', 'Admin\CourseController');
    Route::get('/admin/home', 'Admin\HomeController@index');
    Route::get('admin/pages',['as'=>'dynamicPages','uses'=>'Admin\PageController@dynamicPages']);
    Route::Resource('admin/blog', 'Admin\BlogController');
    Route::Resource('admin/visacountries', 'Admin\VisaCountriesController');
    Route::Resource('admin/visadetails', 'Admin\VisaDetailsController');
    Route::Resource('admin/post_type', 'Admin\PostTypeController');
    Route::Resource('admin/attribute', 'Admin\AttributeController');
    Route::Resource('admin/category', 'Admin\CategoryController');
    // Route::Resource('admin/blog', 'Admin\BlogController');
    Route::Resource('admin/users', 'Admin\UserController');
    Route::Resource('admin/groups', 'Admin\GroupController');
    Route::Resource('admin/customers', 'Admin\CustomerController');
    Route::resource('admin/forum', 'Admin\ForumController');
    Route::resource('admin/guide', 'Admin\GuideController');
    Route::resource('admin/subject', 'Admin\SubjectController');
    Route::Resource('/admin/cities', 'Admin\CityController');
    Route::Resource('/admin/consultantForm', 'Admin\ConsultantFormController');
    Route::Resource('/admin/consultant', 'Admin\ConsultantController');
    Route::Resource('/admin/applicationForm', 'Admin\ApplicationFormController');
    Route::Resource('/admin/plan', 'Admin\PlanController');
    Route::Resource('admin/blog-category', 'Admin\BlogCategoryController');

    Route::post('admin/plan/price-update', 'Admin\PlanController@update_price');
    Route::get('consultant-services', ['as'=>'consultant-services', 'uses'=>'Admin\ConsultantController@services']);
    Route::get('/admin/free-consulation','Admin\PageController@freeConsulation');
    Route::get('/admin/apply-now','Admin\PageController@apply_now');
    Route::get('/admin/free-consulation-delete/{id}','Admin\PageController@freeConsulationDelete');
    Route::get('/admin/apply-now-delete/{id}','Admin\PageController@applyNowDelete');
    Route::get('consultant-conversation', ['as'=>'consultant-conversation', 'uses'=>'Admin\ConsultantController@conversation']);
    Route::post('verified-consultant/{id}', 'Admin\ConsultantController@verifiedConsultant');
    Route::post('ask-for-support', 'Admin\ConsultantController@support');
    Route::post('approve-support-req', 'Admin\ConsultantController@approveSupport');
    Route::post('save-news', 'Admin\UniversityController@saveNews');
    Route::post('delete-news', 'Admin\UniversityController@deleteNews');
    Route::post('edit-news', 'Admin\UniversityController@editNews');
    Route::post('update-news', 'Admin\UniversityController@updateNews');
    Route::get('admin/conversation','Admin\HomeController@conversation');
    Route::get('/admin/{id}','Admin\HomeController@popular');
    Route::post('get-all-list-message','Admin\HomeController@messages');




    //Route::get('/admin/home', 'Admin\HomeController@index');
    Route::get('/admin/home', 'Admin\HomeController@index');
   
    

    /*Media Routes */
    Route::get('admin/sliders',['as'=>'sliders','uses'=>'Admin\MediaController@sliders']);
    Route::get('admin/sliders/add',['as'=>'addSlider','uses'=>'Admin\MediaController@add_slider']);
    Route::post('admin/sliders/store',['as'=>'storeSlider','uses'=>'Admin\MediaController@store_slider']);
    Route::get('admin/sliders/{id}/edit',['as'=>'editSlider','uses'=>'Admin\MediaController@edit_slider']);
    Route::post('admin/sliders/{id}/update',['as'=>'updateSlider','uses'=>'Admin\MediaController@update_slider']);
    Route::delete('admin/sliders/{id}/delete',['as'=>'deleteSlider','uses'=>'Admin\MediaController@delete_slider']);
    Route::post('admin/sliders/delete-all',['as'=>'deleteSliders','uses'=>'Admin\MediaController@delete_sliders']);

    Route::get('admin/banners',['as'=>'banners','uses'=>'Admin\MediaController@banners']);
    Route::get('admin/banners/add',['as'=>'addBanner','uses'=>'Admin\MediaController@add_banner']);
    Route::post('admin/banners/store',['as'=>'storeBanner','uses'=>'Admin\MediaController@store_banner']);
    Route::get('admin/banners/{id}/edit',['as'=>'editBanner','uses'=>'Admin\MediaController@edit_banner']);
    Route::post('admin/banners/{id}/update',['as'=>'updateBanner','uses'=>'Admin\MediaController@update_banner']);
    Route::delete('admin/banners/{id}/delete',['as'=>'deleteBanner','uses'=>'Admin\MediaController@delete_banner']);
    Route::post('admin/banners/delete-all',['as'=>'deleteBanners','uses'=>'Admin\MediaController@delete_banners']);
    /*End Media Routes */

    /* Pages Routes */
    /* Dynamic Pages Routes */
    
    Route::get('admin/pages/create',['as'=>'createPage','uses'=>'Admin\PageController@createPage']);
    Route::post('admin/pages/store',['as'=>'storePage','uses'=>'Admin\PageController@storePage']);
    Route::get('admin/pages/{id}/edit',['as'=>'editPage','uses'=>'Admin\PageController@editPage']);
    Route::post('admin/pages/{id}/update',['as'=>'updatePage','uses'=>'Admin\PageController@updatePage']);
    Route::delete('admin/pages/{id}/delete',['as'=>'deletePage','uses'=>'Admin\PageController@deletePage']);
    Route::get('admin/pages/{id}/make-home',['as'=>'makeHomePage','uses'=>'Admin\PageController@make_home']);
    Route::post('admin/pages/get-components',['as'=>'ajaxGetComps','uses'=>'Admin\PageController@getComponent']);
    Route::post('admin/pages/duplicate',['as'=>'duplicatePage','uses'=>'Admin\PageController@duplicate']);
    Route::get('admin/pages/logs',['as'=>'pageLogs','uses'=>'Admin\PageController@logs']);
    Route::get('admin/pages/logs/{id}/restore',['as'=>'restoreLog','uses'=>'Admin\PageController@restore_log']);
    Route::get('admin/icons','Admin\PageController@icons');

    /*Product Routes*/

    /* ================================ CUSTOM BLOG ========================*/
 
    Route::get('admin/post-comment', ['as'=>'show_comment', 'uses'=>'Admin\BlogController@post_comment']);
    Route::get('admin/view-post-comment/{slug}', ['as'=>'view_comment', 'uses'=>'Admin\BlogController@view_comment']);
    Route::get('admin/delete-post-comment/{slug}', ['as'=>'delete_comment', 'uses'=>'Admin\BlogController@delete_comment']);
    Route::post('admin/ajax-active-comment', ['as'=>'ajaxActiveComment', 'uses'=>'Admin\BlogController@comment_approve']);
    Route::post('admin/ajax-popular-blog', ['as'=>'ajaxPopularBlog', 'uses'=>'Admin\BlogController@blogFeatured']);
    Route::post('admin/ajax-popular-guide', ['as'=>'ajaxPopularGuide', 'uses'=>'Admin\GuideController@guideFeatured']);
 
    /* ================================ CUSTOM BLOG ========================*/


    /*Post Routes*/
    Route::get('admin/post/{type}',['as'=>'posts_lists','uses'=>'Admin\PostController@index']);
    Route::get('admin/post/{type}/create',['as'=>'create_post','uses'=>'Admin\PostController@create']);
    Route::post('admin/post/{type}/store',['as'=>'store_post','uses'=>'Admin\PostController@store']);
    Route::get('admin/post/{type}/edit/{id}',['as'=>'edit_post','uses'=>'Admin\PostController@edit']);
    Route::post('admin/post/{type}/update/{id}',['as'=>'update_post','uses'=>'Admin\PostController@update']);
    Route::delete('admin/post/{post}',['as'=>'delete_post','uses'=>'Admin\PostController@destroy']);
    Route::post('admin/post/get-component',['as'=>'getPostComponent','uses'=>'Admin\PostController@get_component']);
    Route::post('ajax-post-featured',['as'=>'ajaxFeaturedPost','uses'=>'Admin\PostController@mark_featured']);
    Route::post('admin/post/{type}/get-related',['as'=>'getRelatedPosts','uses'=>'Admin\PostController@get_posts']);
    Route::post('ajaxPostImport',['as'=>'importPosts','uses'=>'Admin\PostController@importPosts']);
    Route::get('admin/{type}/download',['as'=>'downloadSample','uses'=>'Admin\PostController@downloadSample']);
    Route::post('deleteAllPosts',['as'=>'deleteAllPosts','uses'=>'Admin\PostController@bulkDelete']);
    Route::post('admin/post/duplicate',['as'=>'duplicatePost','uses'=>'Admin\PostController@duplicate']);
    Route::post('admin/post/export',['as'=>'exportPosts','uses'=>'Admin\PostController@export']);

    Route::get('admin/getUnReadConversation', 'Admin\HomeController@getUnReadConversation');

    /* Logs Routes */
    Route::get('admin/{type}/logs',['as'=>'postLogs','uses'=>'Admin\PostController@post_logs']);
    /* End Logs Routes */

    /*Configuration Routes*/
    Route::get('admin/settings',['as'=>'webnetSettings','uses'=>'Admin\HomeController@settings']);
    Route::post('admin/settings/update',['as'=>'updateSettings','uses'=>'Admin\HomeController@updateSettings']);
    Route::post('admin/settings/sql-backup',['as'=>'sqlBackup','uses'=>'Admin\HomeController@sql_backup']);

    Route::get('admin/students',['as'=>'studentsList','uses'=>'Admin\HomeController@students']);

    Route::get('notification',['as'=>'notifications','uses'=>'Admin\HomeController@notifications']);
    Route::get('notification/{id}',['as'=>'notification_detail','uses'=>'Admin\HomeController@notification_detail']);
    Route::get('dashboard-notification-detail/{id}',['as'=>'dashboard-notification-detail','uses'=>'Admin\HomeController@dashboard_notification_detail']);


    /*************************************************************************
                            Additionals Routes
    *************************************************************************/
    /*FAQs*/

    /*Contact Emails*/
    Route::get('admin/additionals/emails/list/{type}',['as'=>'emailsList','uses'=>'Admin\HomeController@emails']);
    
    
    Route::get('admin/courses/emails',['as'=>'courselog','uses'=>'Admin\HomeController@courseslog']);
    
    
    Route::get('admin/universities/emails',['as'=>'universitylog','uses'=>'Admin\HomeController@universitylog']);
    
    
    Route::get('admin/additionals/emails/{id}',['as'=>'emailsDetail','uses'=>'Admin\HomeController@email_detail']);
    Route::post('admin/additionals/emails/read',['as'=>'readEmails','uses'=>'Admin\HomeController@read_emails']);
    Route::post('admin/additionals/emails/delete',['as'=>'deleteEmails','uses'=>'Admin\HomeController@destroy_emails']);
    Route::post('admin/additionals/emails/update-email',['as'=>'updateEmail','uses'=>'Admin\HomeController@update_email']);

    Route::get('admin/additionals/footer-editor',['as'=>'footerEditor','uses'=>'Admin\CMSController@footer']);
    Route::post('admin/additionals/footer-editor',['as'=>'updateFooter','uses'=>'Admin\CMSController@update_footer']);
    /*Helping Hands List*/
    Route::get('admin/additionals/helping-hands',['as'=>'helpingsList','uses'=>'Admin\HomeController@heling-hands']);
    Route::get('admin/reviews',['as'=>'postReviews','uses'=>'Admin\HomeController@reviews']);
    Route::get('admin/reviews/{id}',['as'=>'postReview','uses'=>'Admin\HomeController@review_detail']);
    Route::post('admin/reviews/{id}/approve',['as'=>'approveReview','uses'=>'Admin\HomeController@approve_review']);
    Route::post('admin/reviews/{id}/delete',['as'=>'deleteReview','uses'=>'Admin\HomeController@delete_review']);

    /*************************************************************************
                            User Dashboard Routes
    *************************************************************************/


    Route::get('dashboard',['as'=>'dashboard','uses'=>'FrontEnd\HomeController@dashboard']);
    Route::get('dashboard/account',['as'=>'profile','uses'=>'FrontEnd\HomeController@profile']);
    Route::get('dashboard/course',['as'=>'dashboard_course','uses'=>'FrontEnd\HomeController@course']);
    Route::get('dashboard/set-course',['as'=>'addCourse','uses'=>'FrontEnd\HomeController@setCourse']);
    Route::get('dashboard/set-course/{id}',['as'=>'editCourse','uses'=>'FrontEnd\HomeController@setCourse']);
    Route::post('dashboard/account',['as'=>'updateProfile','uses'=>'FrontEnd\HomeController@update_profile']);
    Route::get('dashboard/change-password',['as'=>'accountPassword','uses'=>'FrontEnd\HomeController@password']);
    Route::post('dashboard/change-password',['as'=>'updatePassword','uses'=>'FrontEnd\HomeController@update_password']);
    Route::get('dashboard/review',['as'=>'dashboard_review','uses'=>'FrontEnd\HomeController@review']);
    Route::post('give-a-reply',['as'=>'give-a-reply','uses'=>'FrontEnd\HomeController@reviewReply']);
    Route::get('dashboard/news',['as'=>'dashboard_news','uses'=>'FrontEnd\HomeController@news']);
    Route::get('dashboard/set-news',['as'=>'set_news','uses'=>'FrontEnd\HomeController@setNews']);
    Route::get('dashboard/set-news/{id}',['as'=>'set_news','uses'=>'FrontEnd\HomeController@setNews']);
    Route::post('dashboard/news-update',['as'=>'news_update','uses'=>'FrontEnd\HomeController@updateNews']);
    Route::post('dashboard/news-store',['as'=>'news_store','uses'=>'FrontEnd\HomeController@storeNews']);
    Route::post('dashboard/news-destroy',['as'=>'news_destroy','uses'=>'FrontEnd\HomeController@destroyNews']);
    Route::get('dashboard/applications',['as'=>'dashboard_applications','uses'=>'FrontEnd\HomeController@applicationView']);
    Route::post('dashboard/remove-application/{id}',['as'=>'remove-application','uses'=>'FrontEnd\HomeController@removeApplication']);
    Route::get('dashboard/student',['as'=>'studentSearch','uses'=>'FrontEnd\HomeController@student']);
    Route::get('student/profile/{id}', 'FrontEnd\HomeController@studentProfileDetail');
    Route::get('dashboard/notifications','FrontEnd\HomeController@dashboardNotifications');
    Route::get('dashboard/support','FrontEnd\HomeController@support');

    Route::post('change-app-status', 'Admin\ApplicationFormController@changeStatus');

    Route::get('dashboard/consult',['as'=>'consult','uses'=>'FrontEnd\HomeController@consult']);
    Route::get('student-filter',['as'=>'student-filter','uses'=>'FrontEnd\HomeController@studentFilter']);

    Route::post('student-filter-payment', 'FrontEnd\HomeController@studentFilterPayment');
    Route::post('user-notifcation', 'FrontEnd\HomeController@userNotification');
    Route::post('read-notifcation', 'FrontEnd\HomeController@readNotification');

    Route::post('save-session', 'Admin\MessageController@saveSession');
    Route::get('dashboard/chatList',['as'=>'chatList','uses'=>'Admin\MessageController@chatList']);
    // Route::get('dashboard/chat/{id}',['as'=>'chat','uses'=>'Admin\MessageController@chat']);
    Route::post('fetch-chatList', 'Admin\MessageController@fetchList');
    Route::post('fetch-message', 'Admin\MessageController@fetch');
    Route::post('send-message', 'Admin\MessageController@send');
    Route::post('/get-unread-chat-messages', 'Admin\MessageController@unread');

    Route::get('/dashboard/payment',['as'=>'payment','uses'=>'FrontEnd\HomeController@paymentPage']);

    // Route::post('dashboard/review-status',['as'=>'review-status','uses'=>'FrontEnd\HomeController@reviewStatus']);

    Route::get('dashboard/wishlist',['as'=>'myWishlist','uses'=>'FrontEnd\HomeController@wishlist']);
    Route::get('dashboard/wishlist/{id}/delete',['as'=>'deleteWishlist','uses'=>'FrontEnd\HomeController@delete_wishlist']);



    Route::get('admin/articles-requests',['as'=>'articleRequests','uses'=>'Admin\HomeController@article_requests']);
    Route::get('admin/articles-requests/{id}/detail',['as'=>'requestDetail','uses'=>'Admin\HomeController@request_detail']);
    Route::post('ajax-publish-article',['as'=>'publishArticle','uses'=>'Admin\HomeController@publish_article']);



    Route::post('ajax-smtp-test',['as'=>'checkSMTP','uses'=>'Admin\HomeController@checkSMTP']);

    //awais
    Route::post('dashboard/add-student',['as'=>'addstudent','uses'=>'FrontEnd\HomeController@add_student']);
    //Route::get('sendbtnemail/{id}/{type}','FrontEnd\HomeController@sendbtnemail')->name('sendbtnemail');
    Route::get('delete_student/{id}','FrontEnd\HomeController@delete_student')->name('delete_student');
    Route::get('delete_doc/{type}/{id}/{docname}','FrontEnd\HomeController@delete_doc')->name('delete_doc');
    Route::post('add_doc','FrontEnd\HomeController@add_doc')->name('add_doc');
    Route::post('edit_student','FrontEnd\HomeController@edit_student')->name('edit_student');
    Route::get('show_student_report/{id}','FrontEnd\HomeController@show_student_report')->name('show_student_report');
    

});

Route::get('/{slug}', ['as'=>'dynamicPage','uses'=>'FrontEnd\HomeController@dynamicPage']);
    // Api
    
    
    Route::get('list_students/{id}','Api@index')->name('list_students');
    Route::post('list_update_students','Api@list_update_students')->name('list_update_students');
    Route::get('list_single_students/{aa}/{bb}','Api@list_single_students')->name('list_single_students');
    Route::post('assign_students','Api@assign_students')->name('assign_students');
    
    Route::get('list_consultations/{aa}','Api@index_consultations')->name('list_consultations');
    Route::post('assign_consultations','Api@assign_consultations')->name('assign_consultations');
    Route::get('list_single_consultations/{aa}/{bb}','Api@list_single_consultations')->name('list_single_consultations');
    Route::post('list_update_consultations','Api@list_update_consultations')->name('list_update_consultations');
    Route::post('assign_complaints','Api@assign_complaints')->name('assign_complaints');
    
    Route::get('list_applynow/{aa}','Api@index_applynow')->name('list_applynow');
    Route::get('list_single_applynow/{aa}/{bb}','Api@list_single_applynow')->name('list_single_applynow');
    
    
    Route::get('list_complaints/{id}/{location}','Api@list_complaints')->name('list_complaints');  
    Route::get('list_discount_offer/{id}/{location}','Api@list_discount_offer')->name('list_discount_offer');  
    Route::post('assign_discount_offer','Api@assign_discount_offer')->name('assign_discount_offer');
    Route::get('showfeedback/{id}','Api@showfeedback')->name('showfeedback');
    Route::get('showfeedback/{id}','Api@showfeedback')->name('showfeedback');
    Route::get('/online-consultants/{access_key}', 'Api@getOnlineConsultants');



    Route::get('list_apply_online/{aa}/{bb}','Api@list_apply_online')->name('list_apply_online');
    Route::post('list_update_apply_onlin','Api@list_update_apply_onlin')->name('list_update_apply_onlin');
    Route::get('contact_us_messages/{access_key}','Api@messages')->name('contact_us_messages');

    // Api End


