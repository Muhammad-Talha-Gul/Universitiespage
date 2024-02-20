<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = ['id', 'user_id', 'name', 'nationality', 'gender', 'prefered_program', 'active'];

    function users(){
        return $this->belongsTo('App\User', 'user_id');
    }

    function prefers(){
        return $this->hasOne('App\Model\Posts', 'id', 'prefered_program');
    }

    function applications(){
        return $this->hasMany('App\Model\ApplicationForm', 'student_id', 'user_id');
    }

    function consults(){
        return $this->hasMany('App\Model\ConsultantForm', 'student_id');
    }

    public static function creator($data, $id){
    	$detail = new Student;
    	$detail->user_id = $id;
    	$detail->name = $data->first_name.' '.$data->last_name;
        $detail->nationality = $data->country;
        $detail->gender = $data->gender;
        $detail->prefered_program = $data->prefer;
    	$detail->save();
        return $detail;
    }

    public static function updator($data, $id){
        $detail = Student::where('user_id',$id)->first();
        $detail->name = $data->first_name.' '.$data->last_name;
        $detail->nationality = $data->country;
        $detail->gender = $data->gender;
        $detail->prefered_program = $data->prefer;
        $detail->save();
    }


}
