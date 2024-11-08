<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'dob', 'address', 'country', 'city', 'postal', 'password', 'user_type', 'is_verified', 'is_active', 'talentlms_id', 'image', 'secret','brief','group_id', 'fb_token', 'provider','is_login'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    function group() {
        return $this->hasOne('App\Model\UserGroups', 'id','group_id');
    }

    function orders() {
        return $this->hasMany('App\Model\Orders', 'user_id');
    }

    function university_detail(){
        return $this->hasOne('App\Model\UniversityDetail', 'user_id');
    }
    
    function students(){
        return $this->hasOne('App\Model\Student', 'user_id');
    }

    function consultant(){
        return $this->hasOne('App\Model\Consultant', 'user_id');
    }

    public function permission()
    {
        return $this->hasOne(Permissions::class, 'admin_id');
    }

    public static function creator($data)
    {
        // dd($data);
        $user = new User;
        $user->first_name = ($data['first_name'])??null;
        $user->last_name = ($data['last_name'])??null;
        $user->email = ($data['email'])??null;
        $user->phone = ($data['phone'])??null;
        $user->dob = ($data['dob'])??null;
        $user->address = ($data['address'])??null;
        $user->country = ($data['country'])??null;
        $user->city = ($data['city'])??null;
        $user->postal = ($data['postal'])??null;
        if(isset($data['logo'])){
            $user->image = ($data['logo'])??null;
        }else{
            $user->image = ($data['image'])??null;
        }
        $user->brief = ($data['brief'])??null;
        $user->password = bcrypt(($data['password'])??str_random(10));
        $user->user_type = ($data['user_type'])??'student';
        $user->secret = ($data['password'])??null;
        $user->is_verified = (isset($data['is_verified']))?1:0;
        $user->group_id = ($data['group_id'])??null;
        if(isset($data['active'])){
            $user->is_active = 1;
        }else{
            $user->is_active = (isset($data['is_active']))?1:0;
        }
        $user->choosable_status = ($data['choosable_status'])??null;
        $user->save();
        return $user;
    }

    public static function updator($id,$data)
    {

        $user = User::find($id);
        // $filename = str_replace(" ", "_", $data['first_name']).rand(0,99);
        // $uploadDir  = public_path("/uploads/profiles/");
        // if($user['image']!=null) { $filename = $user['image'];  }

        // if ($data->hasFile('image')) {
        //     $file = $data->file('image');
        //     $file_ext = $file->getClientOriginalExtension();
        //     $filename = $filename.'.'.$file_ext;
        //     $file->move($uploadDir, $filename);
        // }

        $user->first_name = ($data['first_name'])??'';
        $user->last_name = ($data['last_name'])??'';
        $user->email = $data['email'];
        $user->phone = ($data['phone'])??'';
        $user->dob = ($data['dob'])??'';
        $user->address = ($data['address'])??'';
        if(isset($data['logo'])){
            $user->image = ($data['logo'])??null;
        }else{
            $user->image = ($data['image'])??null;
        }
        $user->country = ($data['country'])??'';
        $user->password = bcrypt(($data['password'])??str_random(10));
        $user->city = ($data['city'])??'';
        $user->postal = ($data['postal'])??'';
        $user->brief = ($data['brief'])??'';
        // if ($data->hasFile('image')) { 
        //     $user->image = $filename;
        // }
        $user->group_id = ($data['group_id'])??null;
        $user->save();
        return $user;
    }

}
