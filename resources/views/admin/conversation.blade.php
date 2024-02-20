@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<style type="text/css">
    .mails .mail-select {
        width: 1px;
        min-width: 0px;
        padding: 15px 0px 15px 20px;
    }
    .approve{
        background-color: #6E2789;
        color:white;
        padding: 5px;
        font-size: 12px;
        border-radius: 3px;
    }
    .n_approve{
        background-color:#dc3545;
        color:white;
        padding: 5px;
        font-size: 12px;
        border-radius: 3px;
    }
    hr{
       border: solid 0.5px #78257266;
    }
    .chatlist{
        padding-left: 0px;
        overflow-y: scroll;
        overflow-x: hidden;
        scroll-behavior: smooth;
        max-height:500px;
        border-top: 1px solid #e6e2e2;
        min-height: 500px;
    }
    .chatlist li{
        list-style: none;
    }
    .chatlist .per-box{
        position: relative;
        border-bottom: 1px solid #e6e2e2;
        padding: 12px 14px;
        cursor: pointer;
    }
    .chatlist .per-box p{
        margin-bottom: 0px;
        position: relative;
        color: #782572;
        top: 0px;
        font-weight: 600;
        font-size: 14px;
    }
    .chatlist .per-box i{
        position: relative;
        top: -5px;
        font-size: 14px;
    }
    .chatlist .per-box .created-date{
        position: absolute;
        right: 14px;
        top: 10px;
        font-size: 12px;
        color: #782572;
        font-weight: 600;
    }
    .chatlist .per-box:hover{
        background-color: #dedede;
    }
    .chatlist li p{
        margin-bottom: 0px;
    }
    .chatlist li span{
        font-size: 11px;
    }
    .chat-message li p{
        min-width: 10px;
        max-width:400px;
        display: inline-block;
        background-color: beige;
        padding: 5px 15px;
        border-radius: 5px;
        margin-bottom: 2px;
    }
    .chat-message li span{
        display: block;
        line-height: 10px;
        margin-bottom: 7px;
    }
    .chat-message .msg-box{
        width: 100%;
        padding: 5px;
    }
    .no-con{
        background-color: beige;
        width: 150px;
        padding: 10px;
        border-radius: 5px;
        font-size: 15px;
        text-align: center;
        position: relative;
        top: 25px;
        margin: 0 auto;
    }
    .scroll2{
        overflow-y: scroll;scroll-behavior: smooth;
        max-height: calc(100vh - 332px);
        min-height: calc(100vh - 332px);
        overflow-x: hidden;
    }
    .scroll2::-webkit-scrollbar {
        width: 6px;
    }
   
    .scroll2::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    }
   
    .scroll2::-webkit-scrollbar-thumb {
        background-color: #782572;
        outline: 1px solid white;
        border-radius: 39px;
    }
    .scroll3{
        overflow-y: scroll;scroll-behavior: smooth;
        min-height:calc(100vh - 270px);
        max-height:calc(100vh - 270px);
        overflow-x: hidden;
    }
    .scroll3::-webkit-scrollbar {
        width: 6px;
    }
   
    .scroll3::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    }
   
    .scroll3::-webkit-scrollbar-thumb {
        background-color: #782572;
        outline: 1px solid white;
        border-radius: 39px;
    }
    .send-message{
        position: absolute;
        bottom: -10px;
        background-color: #782572;
        width: calc(100% - 10px);
        height: 60px;
        padding: 6px;
        left: 0px;
    }
    .send-message textarea{
        width: calc(100% - 50px);
        border: none;
        font-size: 12px;
        padding: 7px;
    }
    .set-height{
        min-height:calc(100vh - 270px);
        max-height:calc(100vh - 270px);
    }
    .send-message .chat-btn{
        float: right;
        width: 48px;
        height: 48px;
        color: #ffffff;
        background-color: #782572;
        border: solid 1px white;
    }
    .admin-chat{
        background-color: #782572 !important;
        color: white;
    }
    .unreadmsg{
        position: absolute !important;
        right: 12px;
        top: 35px !important;
        background-color: #782572;
        color: white;
        min-width: 19px;
        height: 19px;
        text-align: center;
        border-radius: 75px;
        font-size: 12px !important;
        font-weight: 600;
        padding:1px;
    }
</style>
@endsection
@section('content')

<input type="hidden" id="baseUrl" value="{{ url('/') }}">
<input type="hidden" id="authCheck" value="{{ Auth::check() }}">
<input type="hidden" id="chat_key" value="{{(getContactMeta()['pusher']['key'])??''}}">
<input type="hidden" id="cluster" value="{{(getContactMeta()['pusher']['cluster'])??''}}">
@if(Auth::check())
  <input type="hidden" id="authId" value="{{ Auth::user()->id }}">
  <input type="hidden" id="authType" value="{{ Auth::user()->user_type }}">
@endif

<div class="container">
    <div class="row">
        <div class="col-xs-12">

            <div class="table-box" id="chat-conversations">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box m-t-20">
                                <div style="font-size: 16px;">
                                    <div class="row">
                                        <div class="col-sm-4" style="border-right:solid 1px gray">
                                            <h5>Student List</h5>
                                            <ul class="chatlist scroll3">
                                                <span v-if="list && list.length>0">
                                                <li class="new-list" v-for="student in list">
                                                    <div class="per-box" :data-id="student.user_id">
                                                        <p v-text="student.user.first_name+' '+student.user.last_name"></p>
                                                        <i v-if="student.last_message" v-text="student.last_message.message"></i>
                                                        <i class="created-date" v-if="student.last_message" v-text="moment(student.last_message.created_at).calendar()"></i>
                                                        <i class="unreadmsg" v-if="student.unread && student.unread.length>0" v-text="student.unread.length"></i>
                                                    </div>
                                                </li>
                                                </span>
                                                <span v-if="students && students.length>0">
                                                <li class="new-list" v-for="student in students">
                                                    <div class="per-box" :data-id="student.user_id">
                                                        <p v-text="student.name"></p>
                                                    </div>
                                                </li>
                                                </span>
                                            </ul>
                                        </div>
                                        <div class="col-sm-8">
                                            <h5><span v-text="(live)?live.first_name:'Conversation'"></span> <i class="fa fa-spin fa fa-refresh" style="display:none;"></i></h5>
                                            <div class="set-height">
                                                <ul class="chatlist chat-message scroll2" v-if="messages && messages.length>0">
                                                    <li v-for="msg in messages">
                                                        <div class="msg-box" :align="(msg.is_student)?'left':'right'">
                                                            <p :class="(msg.is_student==0)?'admin-chat':''">
                                                                <span style="font-size: 15px;line-height: 16px;" v-text="msg.message"></span>
                                                                <span v-text="'('+msg.sender.first_name+')'"></span>
                                                            </p>
                                                            <span v-text="moment(msg.created_at).calendar()"></span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <p v-else class="no-con" align="center">No Converstation</p>
                                                <div v-if="messages" class="send-message">
                                                    <textarea class="ask_consult_textarea" @keyup="checkkeyCod($event)" placeholder="Type Your Consult Here."></textarea>
                                                    <button type="button" class="btn btn-secondary chat-btn" @click="sendMessage();"><i class="fa fa-send-o"></i></button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        

                                    </div>
                                </div>
                            </div>
                            <!-- card-box -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                    <!-- End row -->

                </div> <!-- table detail -->
            </div>

        </div>
    </div>
</div>
@endsection
@section('customScripts')
<script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>
<script src="{{asset('assets_frontend/js/moment.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script type="text/javascript">
    $("#deleteIt").click(function(){
        swal({
                title: "Are you sure?",
                // text: "",
                type: "warning",
                showCancelButton: true,
                cancelButtonClass: 'btn-default btn-md waves-effect',
                confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
                confirmButtonText: 'Yes!',
            },function() {
                  $("#del_form").submit();
            });
    });
    // $(document).ready(function(){
    //     $('.new-list').on('click', function(){
    //         var id = $(this).attr('data-id');
    //         $('.chat-message').html('');
    //         $('.fa-spin').fadeIn(200);
    //         $.ajax({
    //             url: '{{url("get-all-list-message")}}',
    //             type: 'post',
    //             dataType: 'html',
    //             data: {'id':id, '_token':'{{csrf_token()}}'},
    //             success: function(data){
    //                 $('.chat-message').html(data);
    //                 $('.fa-spin').fadeOut(200);
    //             },
    //         })
    //     });
    // });
</script>
@endsection