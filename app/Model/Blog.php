<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Auth;

class Blog extends Model
{
    protected $fillable = [
        'user_id','category_id','title','sm_question','sm_answer','short_description','description','image','image_ext','is_active','views','ip','slug','is_featured','sort_order','seo'
    ];
    

    public function getSeoAttribute($value)
    {
        $data = json_decode($value);
        return $data;
    }

    public function comments()
{
    return $this->hasMany(Comment::class, 'article_id', 'id');
}

    function user() {
        return $this->hasOne('App\User', 'id','user_id');
    }

    function category() {
        return $this->hasOne('App\Model\BlogCategory', 'id','category_id');
    }

    // function comments() {
    //     return $this->hasMany('App\Model\PostsComments', 'post_id');
    // }

    public function approve_comments() {
        return $this->comments()->where('is_active','=', 1);
    }

    public static function creator($data)
    {   
        $count = $data->author;
        //echo count($count); exit;
        $ratingValue   = $data->ratingValue;
        $datePublished = $data->datePublished;
        $author        = $data->author;
        $publisherName = $data->publisherName;
        $reviewerName  = $data->reviewerName;
        $reviewBody    = $data->reviewBody;
        
        $coutnReview = 0;
        $reviewArray   = array();
        
        for ($i = 0; $i < count($count); $i++) 
        {
            $array= [];
            $coutnReview += $ratingValue[$i];
            $array['ratingValue']    = $ratingValue[$i];
            $array['datePublished']  = $datePublished[$i];
            $array['author']         = $author[$i];
            $array['publisherName']  = $publisherName[$i];
            $array['reviewerName']   = $reviewerName[$i];
            $array['reviewBody']     = $reviewBody[$i];
            array_push($reviewArray,$array);
        } 
        
        // calculate average review
        $averageReview1 = ($coutnReview/count($count));
        $averageReview = ($averageReview1 > 0)? $averageReview1 :0;
        $ratingCount = count($count);
        $reviewCount = $ratingCount;
        
        $blog = new Blog;
        $blog->user_id = Auth::user()->id;
        $blog->category_id = $data->category_id;
        $blog->title = $data->title;
        $blog->sm_question = json_encode($data->sm_question);
        $blog->sm_answer = json_encode($data->sm_answer);
        $blog->review_detail      = json_encode($reviewArray);
        $blog->rating_count     = $ratingCount; 
        $blog->review_count     = $reviewCount;
        $blog->avg_review_value = $averageReview;
        $blog->slug = (isset($data->slug)) ? $data->slug : str_slug($data->title);
        $blog->description = $data->description;
        $blog->short_description = $data->short_description;
        $blog->image = ($data->has('image')?$data->image:null);
        $blog->views = $data->views;
        $blog->seo = json_encode($data->seo);
        $blog->is_active = ($data->has('is_active'))?1:0;
        $blog->custom_post_type = $data->custom_post_type;
        $blog->sort_order = $data->sort_order;
        $blog->post_attributes = ($data->has('post_attributes'))?$data->post_attributes:null;
       
        $curl = curl_init();

        curl_setopt_array($curl, [
          CURLOPT_URL => "https://onesignal.com/api/v1/notifications",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\"included_segments\":[\"Subscribed Users\"],\"name\":\"INTERNAL_CAMPAIGN_NAME\",\"app_id\":\"4d179767-ad5c-49d4-9a4b-42448a90a9ee\",\"url\":\"https://universitiespage.com/".$data->slug."\",\"chrome_web_image\":\"https://universitiespage.com/".$data->image."\",\"contents\":{\"en\":\"".$data->title."\"}}",
          CURLOPT_HTTPHEADER => [
            "Authorization: Basic NWYzYzRmZjMtMTM0NC00NGMxLTk5NTktMjYxYzRmNmFlZDBl",
            "accept: application/json",
            "content-type: application/json"
          ],
        ]);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);

        $blog->save();
    }

    public static function updator($id,$data)
    { 
        $count         = $data->author;
        $ratingValue   = $data->ratingValue;
        $datePublished = $data->datePublished;
        $author        = $data->author;
        $publisherName = $data->publisherName;
        $reviewerName  = $data->reviewerName;
        $reviewBody    = $data->reviewBody;
        
        $coutnReview = 0;
        $averageReview1 = 0;
        $averageReview = 0;
        $ratingCount = 0;
        $reviewCount = 0;
        $reviewArray   = array();
        
        if(!empty($data->author)) {
        
        for ($i = 0; $i < count($author); $i++) 
        {
            $array= [];
            $coutnReview += $ratingValue[$i];
            $array['ratingValue']    = $ratingValue[$i];
            $array['datePublished']  = $datePublished[$i];
            $array['author']         = $author[$i];
            $array['publisherName']  = $publisherName[$i];
            $array['reviewerName']   = $reviewerName[$i];
            $array['reviewBody']     = $reviewBody[$i];
            array_push($reviewArray,$array);
        } 
        
        // calculate average review
        $averageReview1 = ($coutnReview/count($count));
        $averageReview = ($averageReview1 > 0)? $averageReview1 :0;
        $ratingCount = count($count);
        $reviewCount = $ratingCount;
        
        }
        
        $blog = Blog::find($id);
        $blog->user_id = Auth::user()->id;
        $blog->category_id = $data->category_id;
        $blog->title = $data->title;
        $blog->sm_question = json_encode($data->sm_question);
        $blog->sm_answer = json_encode($data->sm_answer);
        $blog->review_detail    = json_encode($reviewArray);
        $blog->rating_count     = $ratingCount; 
        $blog->review_count     = $reviewCount;
        $blog->avg_review_value = $averageReview;
        $blog->slug = (isset($data->slug)) ? $data->slug : str_slug($data->title);
        $blog->description = $data->description;
        $blog->short_description = $data->short_description;
        $blog->image = ($data->has('image')?$data->image:null);
        $blog->views = $data->views;
        $blog->seo = json_encode($data->seo);
        $blog->is_active = ($data->has('is_active'))?1:0;
        $blog->sort_order = $data->sort_order;
        $blog->custom_post_type = $data->custom_post_type;
        $blog->post_attributes = ($data->has('post_attributes'))?$data->post_attributes:null;
        $blog->save();
    }
}
