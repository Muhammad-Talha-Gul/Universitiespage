<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VisaDetails extends Model
{
    protected $table = 'visa_details';
    protected $fillable = [
        'visa_title','sm_question','sm_answer','visa_description','country_id','seo'
    ];
    
    public function getSeoAttribute($value)
    {
        $data = json_decode($value);
        return $data;
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

        $VisaDetails = new VisaDetails;
        $VisaDetails->visa_title       = $data->visa_title;
        $VisaDetails->visa_image       = $data->visa_image;
        $VisaDetails->slug             = $data->slug;
        $VisaDetails->sm_question      = json_encode($data->sm_question);
        $VisaDetails->sm_answer        = json_encode($data->sm_answer);
        $VisaDetails->review_detail      = json_encode($reviewArray);
        $VisaDetails->rating_count     = $ratingCount; 
        $VisaDetails->review_count     = $reviewCount;
        $VisaDetails->avg_review_value = $averageReview;
        $VisaDetails->seo              = json_encode($data->seo);
        $VisaDetails->country_id       = $data->country_id;
        $VisaDetails->visa_description = ($data->has('visa_description')?$data->visa_description:null);
        $VisaDetails->save();
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
        
        $VisaDetails = VisaDetails::find($id);
        $VisaDetails->visa_title       = $data->visa_title;
        $VisaDetails->visa_image       = $data->visa_image;
        $VisaDetails->slug             = $data->slug;
        $VisaDetails->sm_question      = json_encode($data->sm_question);
        $VisaDetails->sm_answer        = json_encode($data->sm_answer);
        $VisaDetails->sm_answer        = json_encode($data->sm_answer);
        $VisaDetails->review_detail      = json_encode($reviewArray);
        $VisaDetails->rating_count     = $ratingCount; 
        $VisaDetails->review_count     = $reviewCount;
        $VisaDetails->avg_review_value = $averageReview;
        $VisaDetails->seo              = json_encode($data->seo);
        $VisaDetails->country_id       = $data->country_id;
        $VisaDetails->visa_description = ($data->has('visa_description')?$data->visa_description:null);
        $VisaDetails->save();
    }
    
}
