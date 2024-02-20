<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Posts;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = ['id','sm_question','sm_answer', 'university_id','fee', 'subject_id', 'name', 'qualification', 'duration', 'duration_qty', 'duration_type', 'yearly_fee', 'about', 'entry_requirments', 'curriculum', 'application_fee', 'languages', 'starting_date', 'deadline', 'scholarship', 'sort_order', 'active','popular'];

    function university(){
        return $this->hasOne('App\Model\UniversityDetail', 'id', 'university_id');
    }

    function subject(){
        return $this->belongsTo('App\Model\Subject', 'subject_id', 'id');
    }

    function qualificationName(){
        return $this->hasOne('App\Model\Posts', 'id', 'qualification');
    }

    public static function creator($data){
        
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
        
    	$detail = new Course;
    	$detail->university_id = (int)$data->university_id;
    	$detail->name = $data->name;
    	$detail->sm_question = json_encode($data->sm_question);
    	$detail->sm_answer = json_encode($data->sm_answer);
    	$detail->review_detail     = json_encode($reviewArray);
        $detail->rating_count     = $ratingCount; 
        $detail->review_count     = $reviewCount;
        $detail->avg_review_value = $averageReview;
        $detail->qualification = (int)$data->qualification;
    	$detail->subject_id = (int)$data->subject_id;
        $detail->duration_qty = $data->duration_qty;
        $detail->duration_type = $data->duration_type;
    	$detail->duration = $data->duration_qty.' '.$data->duration_type;
    	$detail->yearly_fee = $data->yearly_fee;
    	$detail->about = $data->about;
        $detail->entry_requirments = $data->entry_requirments;
        $detail->curriculum = $data->curriculum;
        $detail->application_fee = $data->application_fee;
        $detail->languages = $data->languages;
        $detail->starting_date = $data->starting_date;
        $detail->deadline = $data->deadline;
        $detail->sort_order = (int)$data->sort_order;
        $detail->active = (isset($data->active))?1:0;
    	$detail->scholarship = (isset($data->scholarship))?1:0;
    	$detail->save();
    }

    public static function updator($data, $id){
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
    	$detail = Course::findOrFail($id);
    	$detail->sm_question = json_encode($data->sm_question);
    	$detail->sm_answer = json_encode($data->sm_answer);
    	$detail->review_detail      = json_encode($reviewArray);
        $detail->rating_count     = $ratingCount; 
        $detail->review_count     = $reviewCount;
        $detail->avg_review_value = $averageReview;
    	$detail->university_id = (int)$data->university_id;
    	$detail->name = $data->name;
    	$detail->qualification = (int)$data->qualification;
    	$detail->duration_qty = $data->duration_qty;
        $detail->duration_type = $data->duration_type;
        $detail->duration = $data->duration_qty.' '.$data->duration_type;
        $detail->subject_id = (int)($data->subject_id)??null;
    	$detail->yearly_fee = $data->yearly_fee;
    	$detail->about = $data->about;
        $detail->entry_requirments = $data->entry_requirments;
        $detail->curriculum = $data->curriculum;
        $detail->application_fee = $data->application_fee;
        $detail->languages = $data->languages;
        $detail->starting_date = $data->starting_date;
        $detail->deadline = $data->deadline;
        $detail->sort_order = (int)$data->sort_order;
        $detail->scholarship = (isset($data->scholarship))?1:0;
    	$detail->active = (isset($data->active))?1:0;
    	$detail->save();
    }
}
