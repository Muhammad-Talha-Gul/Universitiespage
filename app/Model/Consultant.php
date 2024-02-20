<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    protected $table = 'consultants';
    protected $fillable = ['id', 'user_id', 'name', 'nationality', 'email', 'phone', 'active', 'company_name', 'employeeno', 'state', 'designation', 'comment', 'city', 'address'];

    function users(){
        return $this->belongsTo('App\User', 'user_id');
    }

    function prefers(){
        return $this->hasOne('App\Model\Posts', 'id', 'prefered_program');
    }

    // function applications(){
    //     return $this->hasMany('App\Model\ApplicationForm', 'student_id', 'user_id');
    // }

    // function consults(){
    //     return $this->hasMany('App\Model\ConsultantForm', 'student_id');
    // }

    public static function creator($data, $id){
    	$detail = new Consultant;
    	$detail->user_id = $id;
    	$detail->name = $data->first_name.' '.$data->last_name;
        $detail->company_name = $data->company_name;
        $detail->employeeno = $data->employeeno;
        $detail->nationality = $data->country;
        $detail->state = $data->state;
        $detail->city = $data->city;
        $detail->address = $data->address;
        $detail->designation = $data->designation;
        $detail->email = $data->email;
        $detail->phone = $data->phone;
        $detail->comment = $data->comment;
    	$detail->save();
        return $detail;
    }

    public static function updator($data, $id){
        $detail = Consultant::where('user_id',$id)->first();
    	$detail->name = $data->first_name.' '.$data->last_name;
        $detail->company_name = $data->company_name;
        $detail->employeeno = $data->employeeno;
        $detail->nationality = $data->country;
        $detail->state = $data->state;
        $detail->city = $data->city;
        $detail->address = $data->address;
        $detail->designation = $data->designation;
        $detail->email = $data->email;
        $detail->phone = $data->phone;
        $detail->comment = $data->comment;
        $detail->save();
    }


}
