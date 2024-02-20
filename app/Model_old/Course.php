<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Posts;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = ['id', 'university_id', 'subject_id','popular', 'name', 'qualification', 'duration', 'duration_qty', 'duration_type', 'yearly_fee', 'about', 'entry_requirments', 'curriculum', 'application_fee', 'languages', 'starting_date', 'deadline', 'scholarship', 'sort_order', 'active'];

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
    	$detail = new Course;
    	$detail->university_id = (int)$data->university_id;
    	$detail->name = $data->name;
        $detail->qualification = (int)$data->qualification;
    	$detail->subject_id = (int)$data->subject_id;
        $detail->duration_qty = $data->duration_qty;
        $detail->duration_type = $data->duration_type;
    	$detail->duration = $data->duration_qty.' '.$data->duration_type;
    	$detail->yearly_fee = (int)$data->yearly_fee;
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
    	$detail = Course::findOrFail($id);
    	$detail->university_id = (int)$data->university_id;
    	$detail->name = $data->name;
    	$detail->qualification = (int)$data->qualification;
    	$detail->duration_qty = $data->duration_qty;
        $detail->duration_type = $data->duration_type;
        $detail->duration = $data->duration_qty.' '.$data->duration_type;
        $detail->subject_id = (int)($data->subject_id)??null;
    	$detail->yearly_fee = (int)$data->yearly_fee;
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
