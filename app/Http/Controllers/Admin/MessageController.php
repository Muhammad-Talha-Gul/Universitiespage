<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Model\Message;
use App\Model\ChatList;
use Session;
use App\User;
use App\Model\Student;
use Cookie;
use Auth;
use App\Events\MessageSent;

class MessageController extends Controller
{
    public function chatList(){
    	if(!Auth::check()){
    		return redirect()->back();
    	}

        $cook = (Cookie::get('user_id'))??0;
        $data1 = ChatList::where('first_person', Auth::user()->id)->where('second_person', (int)$cook)->count();
    	$data2 = ChatList::where('first_person', (int)$cook)->where('second_person', Auth::user()->id)->count();
        // dd($data2);
    	if($data1 == 0 && $data2 == 0 && Cookie::has('user_id')){
    		ChatList::creator();
    	}

		Cookie::forget('user_id');
    	return view('frontend.chat_listing');
    }

    public function fetchList(Request $request){
        $data = ChatList::with('lastMessage','unread','user')->orderBy('updated_at','DESC')->get();
        $students = Student::whereNotIn('user_id',($data->pluck('user_id')->toArray())??0)->orderBy('created_at','DESC')->get();
        return response()->json(['data'=>$data, 'students'=>$students]);
    }

    public function saveSession(Request $request){
    	return response(1)->cookie(
            'user_id', $request->id , 60
        );
    }

    public function chat($id){
    	return view('frontend.chat', compact('id'));
    }

    public function unread(){
        $msg = Message::where('read', 0)->whereRaw('(sender_id = '.auth()->user()->id.' or receiver_id = '.auth()->user()->id.')');
        $unread = $msg->count();
        return response()->json($unread);
    }

    public function fetch(Request $request){
        if(auth()->check()){
            if(auth()->user()->user_type == 'student'){
                $msg = Message::where('read', 0)->whereRaw('(sender_id = '.auth()->user()->id.' or receiver_id = '.auth()->user()->id.')');
                $msg->update(['read'=>1]);
                $unread = $msg->count();
                $chatlist = ChatList::where('user_id', auth()->user()->id)->with('messages')->first();
                $messages = [];
                if($chatlist!==null){
                    $messages = $chatlist->messages;
                }
                return response()->json(['messages'=>$messages,'unread'=>$unread]);
            }else if(auth()->user()->user_type == 'admin'){
                $msg = Message::where('read', 0)->whereRaw('(sender_id = '.$request->id.' or receiver_id = '.$request->id.')');
                $unread = $msg->count();
                $msg->update(['read'=>1]);
                $chatlist = ChatList::where('user_id', $request->id)
                                    ->with(['messages'=>function($que){
                                        $que->with('receiver', 'sender')->get();
                                    }])->first();
                $messages = [];
                $live = '';
                if($chatlist!==null){
                    $messages = $chatlist->messages;
                    $live = $chatlist->user;
                }
                $data = ChatList::with('lastMessage','unread','user')->orderBy('updated_at','DESC')->get();
                $students = Student::whereNotIn('user_id',($data->pluck('user_id')->toArray())??0)->orderBy('created_at','DESC')->get();
                return response()->json(['messages'=>$messages,'data'=>$data, 'students'=>$students, 'live'=>$live]);
            }
        }
    }

  	public function send(Request $request){

        if(auth()->check()){
            $receive_id = 0;
            $is_student = 0;
            if(auth()->user()->user_type == 'student'){
                $chat = ChatList::where('user_id', auth()->user()->id)->first();
                $is_student = 1;
                $receive_id = 1;
                if($chat==null){
                    $chat = ChatList::create(['user_id' => auth()->user()->id]);
                }
                $msg['receiver_id'] = 1;
            }else if(auth()->user()->user_type == 'admin'){
                $chat = ChatList::where('user_id', (int)$request->id)->first();
                $is_student = 0;
                $receive_id = (int)$request->id;
                if($chat==null){
                    $chat = ChatList::create(['user_id' => (int)$request->id]);
                }
                $msg['receiver_id'] = (int)$request->id;
            }
            

      		
    		$msg['is_student'] = $is_student;
            $msg['list_id'] = $chat->id;
            $msg['sender_id'] = auth()->user()->id;
    		$msg['message'] = $request->message;
    		$msg = Message::create($msg);
            $chat->update(['updated_at'=>date('Y-m-d H:i:s')]);
            $msgs = Message::where('id', $msg->id)->with('receiver', 'sender')->first();

            // if($msgs->receive_id !== Auth::user()->id){
            //     $receive_id = $msgs->receiver->id;
            // }else{
            //     $receive_id = $msgs->sender->id;
            // }
    		// event(new MessageSent(json_encode($msgs), $receive_i
            broadcast(new MessageSent(json_encode($msgs), $receive_id))->toOthers();

        	return response()->json($msgs);
        }

    }
}
