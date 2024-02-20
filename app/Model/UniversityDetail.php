<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UniversityDetail extends Model
{
    protected $table = 'university_details';
    protected $fillable = ['id', 'user_id', 'name', 'slug', 'founded_in', 'area', 'country', 'city', 'address', 'postcode', 'phone_no', 'agency_number', 'total_students', 'international_student', 'scholarship', 'accommodation', 'accommodation_detail','logo', 'feature_image', 'about', 'languages', 'intake', 'ranking', 'active','package', 'expiry', 'display', 'popular'];

    public function courses(){
        return $this->hasMany('App\Model\Course', 'university_id')->where('active',1)->where('display',1);
    }

    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }

    Public function support(){
        return $this->hasMany('App\Model\Support', 'university_id',  'user_id');
    }

    public function getFeatureImageAttribute($value){
        $data = json_decode($value, true);
        return $data;
    }

    public static function creator($data, $id){

        $slug = strtolower($data->university_name);
        $slug = preg_replace("/[^a-z0-9_\s-]/", "", $slug);
        $slug = preg_replace("/[\s-]+/", " ", $slug);
        $slug = preg_replace("/[\s_]/", "-", $slug);
        
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
        


    	$detail = new UniversityDetail;
    	$detail->user_id = $id;
    	$detail->sm_question = json_encode($data->sm_question);
    	$detail->sm_answer = json_encode($data->sm_answer);
    	$detail->review_detail      = json_encode($reviewArray);
        $detail->rating_count     = $ratingCount; 
        $detail->review_count     = $reviewCount;
        $detail->avg_review_value = $averageReview;
    	$detail->name = $data->university_name;
        $detail->slug = $slug;
    	$detail->founded_in = $data->founded_in;
    	$detail->area = $data->area;
    	$detail->country = $data->country;
    	$detail->city = $data->city;
    	$detail->address = $data->address;
    	$detail->phone_no = $data->phone_no;
    	$detail->total_students = $data->total_students;
    	$detail->international_student = $data->international_student;
    	$detail->scholarship = $data->scholarship;
    	$detail->logo = $data->logo;
        $detail->about = $data->about;
        $detail->agency_number = $data->agency_number;
        $detail->postcode = $data->postcode;
        $detail->accommodation = ($data->accommodation)??null;
    	$detail->accommodation_detail = $data->accommodation_detail;
    	$detail->feature_image = (isset($data->feature_image))?json_encode($data->feature_image):null;
    	$detail->guide = $data->guide;
    	$detail->expanse = $data->expanse;
        $detail->intake = $data->intake;
        $detail->designation = ($data->designation)??null;
        $detail->alternate_email = ($data->alternate_email)??null;
        $detail->website = ($data->website)??null;
        $detail->languages = $data->languages;
    	$detail->active = (isset($data->active))?1:0;
    	$detail->save();
        return $detail;
    }

    public static function updator($data, $id){

        $slug = strtolower($data->university_name);
        $slug = preg_replace("/[^a-z0-9_\s-]/", "", $slug);
        $slug = preg_replace("/[\s-]+/", " ", $slug);
        $slug = preg_replace("/[\s_]/", "-", $slug);
        
        $count         = $data->author;
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


        $detail = UniversityDetail::where('user_id',$id)->first();
        $detail->user_id = $id;
        $detail->sm_question = json_encode($data->sm_question);
    	$detail->sm_answer = json_encode($data->sm_answer);
    	$detail->review_detail    = json_encode($reviewArray);
        $detail->rating_count     = $ratingCount; 
        $detail->review_count     = $reviewCount;
        $detail->avg_review_value = $averageReview;
        $detail->name = $data->university_name;
        $detail->slug = $slug;
        $detail->founded_in = $data->founded_in;
        $detail->area = $data->area;
        $detail->country = $data->country;
        $detail->city = $data->city;
        $detail->address = $data->address;
        $detail->phone_no = $data->phone_no;
        $detail->total_students = $data->total_students;
        $detail->international_student = $data->international_student;
        $detail->scholarship = $data->scholarship;
        $detail->agency_number = $data->agency_number;
        $detail->postcode = $data->postcode;
        $detail->accommodation = $data->accommodation;
        $detail->accommodation_detail = $data->accommodation_detail;
        (isset($data->logo))?$detail->logo = $data->logo:'';
        $detail->about = $data->about;
        (isset($data->feature_image))?$detail->feature_image = json_encode($data->feature_image):'';
        $detail->guide = $data->guide;
        $detail->expanse = $data->expanse;
        $detail->intake = $data->intake;
        $detail->languages = $data->languages;
        $detail->active = (isset($data->active) || isset($data->profile))?1:0;
        // $detail->premium = (isset($data->premium) || isset($data->premium))?1:0;
        $detail->save();
    }
    
}
