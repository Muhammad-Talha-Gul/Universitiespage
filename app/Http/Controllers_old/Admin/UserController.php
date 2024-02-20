<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\UserGroups;
use App\Model\Orders;
use App\Model\OrderNotes;
use App\Model\PostLogs;
use App\Model\PostReviews;
use App\Model\TransferNotes;
use App\Model\UniversityDetail;
use Mail;

class UserController extends Controller
{
    public function index()
    {
    	$data = User::where('user_type','!=','webnet')->where('user_type','!=','university')->where('user_type','!=','customer')->where('user_type','!=','student')->where('user_type','!=','consultant')->OrderBy('first_name','ASC')->get();
    	return view('admin.users',['data'=>$data]);
    }

    public function create()
    {
        $groups = UserGroups::OrderBy('name','ASC')->get();
    	return view('admin.add_user',compact('groups'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'first_name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|unique:users',
            // 'university_name'=> 'required'
        ]);

        $data = ['name'=>$request->first_name.' '.$request->last_name,'email'=>$request->email,'password'=>$request->password];
        $request['user_type'] = 'admin';
        $request['is_verified'] = 1;
        $user = User::creator($request);
        return Redirect::route('users.index');
    }

    public function edit($id)
    {
    	$data = User::find($id);
        $groups = UserGroups::OrderBy('name','ASC')->get();
    	return view('admin.edit_user',['data'=>$data,'groups'=>$groups]);
    }

    public function update($id,Request $request)
    {
    	$password = 'Current Password';
    	if($request->has('password') || $request->has('email')) {
    		$password = $request->password;
    		$request['password'] = bcrypt($request->password);
    	}
    	$user = User::find($id);
    	$request['is_active'] = ($request->has('is_active')) ? 1 : 0;
    	$user->update($request->all());
    	$email = $user['email']; $name = $user['first_name'];
    	if($request->has('password') || $request->has('email')) {
    		$data = ['name'=>$request->first_name.' '.$request->last_name,'email'=>$email,'password'=>$password];
    		/*Mail::send('emails.user_updated', $data, function ($m) use($email,$name) {
	            $m->from('noreply@grocers.com.pk', 'Grocers Pakistan');
	            $m->to($email, $name)->subject('Your Account has beed updated');
	        });*/
    	}
    	return Redirect::route('users.index');
    }

    public function destroy($id)
    {
        // return 'Destroy: '.$id;
        $orders = Orders::where('user_id',$id)->get();
        if($orders->count() > 0){
            foreach($orders as $order) {
                if($order->orderdetail){
                    foreach($order->orderdetail as $od) {
                        $od->delete();
                    }
                }
                $order->delete();
            }
        }
        OrderNotes::where('user_id',$id)->delete();
        PostLogs::where('user_id',$id)->delete();
        PostReviews::where('user_id',$id)->delete();
        TransferNotes::where('user_id',$id)->delete();
        User::destroy($id);
        return Redirect::route('users.index');
    }
}
