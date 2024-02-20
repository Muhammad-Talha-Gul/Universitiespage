@foreach($message as $msg)
    <li>
        <div class="msg-box" @if($msg->list->first_person!==$msg->sender_id) align="right" @endif>
            <p>
                {{$msg->message}}
                <span>
                    @if($msg->sender->user_type=='consultant')
                        ({{$msg->sender->consultant->organization_name}})
                    @elseif($msg->sender->user_type=='university')
                        ({{$msg->sender->university_detail->name}})
                    @else
                        ({{$msg->sender->first_name}})
                    @endif
                </span>
            </p>
            <span>{{date('Y-m-d h:i a',strtotime($msg->created_at))}}</span>
        </div>
    </li>
@endforeach
@if(count($message)==0)
    <p align="center" style="padding-top: 20px;">No Conversation</p>
@endif