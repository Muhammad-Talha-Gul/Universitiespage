<template>
    <span>
        <div class="sidebar">                            
            <div class="closeSideWRapper">
               <button class="closeSidebar" onclick="closeSidebar();">Close <i class="fa fa-times"></i></button>           
            </div>
            <!-- Start of  Discussions -->
            <div class="chat_tab" id="conversations">
                   <div class="top">
                      <form action="javascript:void(0);">
                         <div class="searchChat">
                            <input type="search" class="form-control list-search" placeholder="Search" >
                            <button type="submit" class="btn prepend" @click="fetchList();">
                              <i class="fa fa-search" style="font-size: 18px;position: relative;top: 4px;"></i>
                            </button>
                         </div>
                      </form>
                      {{-- <ul class="nav chat-nav" role="tablist">
                        <li class="active"><a href="#direct" class="filter-btn active" data-toggle="tab" aria-expanded="false" style="text-transform:capitalize;" v-if="first!==''"> <i class="fa fa-user icon_user"></i>@{{first}}</a></li>
                        <li ><a href="#groups" class="filter-btn" data-toggle="tab" aria-expanded="true" style="text-transform:capitalize;" v-if="second!==''"> <i class="fa fa-group icon_user"></i>@{{second}}</a></li>
                      </ul> --}}
                   </div>
                   <div class="middle">
                     <div id="direct" class="tab-pane fade active in">
                         <ul class="discussions">

                            <span v-if="list.length>0">
                              <span v-for="user in list" v-if="checkUser(user)">
                                <li class="user_list" :data-id="user.id">
                                   <a href="#chata" class="" data-toggle="tab">
                                      <strong style="width: 70px">
                                         <img :src="(user.fuser.image)? baseUrl+'/'+user.fuser.image:baseUrl+'/public/avatar.png'" alt="avatar">
                                         <i class="img-online" v-if="(user.fuser.is_login*1 == 1)?true:false"></i>
                                         <i class="img-offline" v-else></i>
                                      </strong>
                                      <em class="content">
                                         <h5>@{{user.fuser.first_name+' '+user.fuser.last_name}}</h5>
                                         <i class="right-top"><span v-if="user.last_message!=null">@{{moment(user.last_message.created_at).format('MMM Do YY h:mm a')}}</span></i> 
                                         <p><span v-if="user.last_message!=null">@{{user.last_message.message.split(' ').slice(0,10).join(" ")}}</span><span v-else style="color:#bbbaba;">No conversation yet</span></p>
                                         <span class="unread_count" v-if="user.unread.length>0" v-text="user.unread.length"></span>
                                      </em>
                                   </a>
                                </li>
                              </span>
                              <span v-else>
                                <li class="user_list" :data-id="user.id">
                                  <a href="#chata" class="" data-toggle="tab">
                                      <strong style="width: 70px">
                                         <img :src="(user.suser.image)?baseUrl+'/'+user.suser.image:baseUrl+'/public/avatar.png'" alt="avatar">
                                         <i class="img-online" v-if="(user.suser.is_login*1 == 1)?true:false"></i>
                                         <i class="img-offline" v-else></i>
                                      </strong>
                                      <em class="content">
                                         <h5>@{{user.suser.first_name+' '+user.suser.last_name}}</h5>
                                         <i class="right-top"><span v-if="user.last_message!=null">@{{moment(user.last_message.created_at).format('MMM Do YY h:mm a')}}</span></i>         
                                         <p><span v-if="user.last_message!=null">@{{user.last_message.message.split(' ').slice(0,8).join(" ")}}</span><span v-else style="color:#bbbaba;">No conversation yet</span></p>
                                         <span class="unread_count" v-if="user.unread.length>0" v-text="user.unread.length"></span>
                                      </em>
                                  </a>
                                </li>
                              </span>
                              
                              
                            </span>

                         </ul>
                     </div>
                   </div>
            </div>
        </div>
                 
        <div class="chat chat_tab1">
            <div class="ctWrapper">
               <button class='chatbtn' onclick="chatSide();"><i class="fa fa-chevron-left" style="font-size: 14px;"></i> Chatbox</button>
               <div class="clearChat"></div>
            </div>
            <div class="top_contianer">
               <div class="headline" v-if="live.id">
                  <span class="online-c">
                    <img :src="(live.image)?baseUrl+'/'+live.image:baseUrl+'/public/avatar.png'" alt="avatar">
                    <i class="onlinIcon" :style="(live.is_login*1)?'':'background: #f9dc10;'"></i>
                  </span>
                  <div class="content">
                     <h5 v-text="live.first_name+' '+live.last_name"></h5>
                  </div>
               </div>
               <div class="right_search">
                 <form action="javascript:void(0)" class="f_form">
                    <input type="date" name="date" class="dateSearch" @change="fetchMsg(list_id, null)" >
                 </form>
               </div>
              
            </div>
            <div class="scroll-area">
              <div class="tab-content">
                 <!-- Start of Chat Room -->
                    <div class="tab-pane fade show active tab-pane fade in active message_lists" style="min-height: 200px;" id="chata" role="tabpanel" v-if="messages.data">
                      <ul class="ch-ul" v-if="messages.data.length>0">
                        <li v-if="total_msg <= messages.data.length">
                          <div align="center" style="width: 100%;height:70px;">
                          <span class="note-msg">Start Of Conversation</span>
                          </div>
                        </li>
                        <li v-if="total_msg > messages.data.length">
                          <div align="center" style="width: 100%;height:50px;">
                          <a href="javascript:void(0)" style="color: #30b0c9;" @click="showMore(messages.list_id)">show more</a></span>
                          </div>
                        </li>
                        {{-- .slice().reverse() --}}
                         <li v-for="(msg,key) in messages.data.slice().reverse()" :class="(authId==msg.receiver_id)?'':'left_tab'">
                            <img v-if="authId==msg.receiver_id" :src="(msg.sender.image)?baseUrl+'/'+msg.sender.image:baseUrl+'/public/avatar.png'" alt="avatar">
                            <div class="c-content">
                                <div class="message">
                                    <div class="bubble" style="position: relative;">
                                        <p v-text="msg.message"></p>
                                        <span class="delete_btn fa fa-chevron-down"></span>
                                    </div>
                                </div>
                                <span style="color: black;">@{{moment(msg.created_at).calendar()}}</span>
                            </div>
                            <div :class="'to_bottom'+(key+1)" style="visibility:hidden;"></div>
                         </li>
                      </ul>
                      <div v-else align="center">
                        <span class="note-msg">No Conversation</span>
                      </div>
                    </div>
                    <div style="width: 100%;display: flex;" align="center">
                        <img src="{{asset('load_t.gif')}}" class="t_loader" style="margin: 0 auto;width: 100px;margin-top: 50px;border:none;display: none;">
                    </div>
                 <!-- End of Chat Room -->
                 <!-- Start of Chat Room -->
                
                 <!-- End of Chat Room -->
              </div>
           </div>
        </div>

        <div class="bottom">
              <form>
                <div class="bt-area">
                  <textarea class="form-control textarea-1" style="font-size: 14px;" placeholder="Type message..." rows="1"></textarea>
                  <button type="button" @click="sendMessage()" class="btn prepend"><i class="fa fa-paper-plane"></i></button>
                </div>
              </form>
        </div>
    </span>
</template>

<script>
    export default {
        data() {
            return{
                baseUrl: '{{url("/")}}',
                authId: '{{Auth::user()->id}}',
                authType: '{{Auth::user()->user_type}}',
                list: {},
                list_id:0,
                messages: {},
                live: {},
                total_msg:0,
                limit: 10,
                first: '{{$first}}',
                second: '{{($second)??''}}',
                third: '{{($third)??''}}',
                moment: moment,
            }
        },
        created(){
          this.fetchList();
        },
        methods: {
              fetchList(){
                  var _this = this;
                  var search = $('.list-search').val();
                  axios.post('{{url('fetch-chatList')}}', {'search':search, '_token':'{{csrf_token()}}'})
                  .then(response => {
                      _this.list = response.data;
                      // $(function(){
                      //     $('.t_loader').fadeOut(200);
                      //     $('.course_lists').delay(300).fadeIn(200);
                      // })
                  }).catch(errors=>{

                  });
              },
              checkUser(user){
                var _this = this;
                if((user.fuser.id*1) !== (_this.authId*1)){
                    return 1;
                }else{
                    return 0;
                }
              },
              checkType(user, type){
                var _this = this;
                if(user.user_type == type){
                    return 1;
                }else{
                    return 0;
                }
              },
              showMore(){
                var _this = this;
                var id = _this.list_id;
                _this.limit = +_this.limit + 10;
                _this.fetchMsg(id ,1);
              },
              fetchMsg(id, noScroll=null){
                if(id == 0){
                  return false;
                }
                var _this = this;
                $('.message_lists').fadeOut(200);
                $('.t_loader').delay(300).fadeIn(200);
                _this.list_id = id;
                var search = $('.dateSearch').val();
                axios.post('{{url("fetch-message")}}', {id:id, limit:_this.limit, 'search':search, '_token':'{{csrf_token()}}'})
                .then(response=>{
                  _this.messages = response.data.messages;
                  _this.total_msg = response.data.total_msg;
                  _this.live = response.data.live;

                  var k;
                  var user = _this.list.filter(function(val, key) {
                    if(val.id == response.data.list.id){
                      k = key;
                      return key;
                    }
                  });
                  _this.list[k] = response.data.list;


                  if(noScroll===null){
                    $('.t_loader').fadeOut(200);
                    $('.message_lists').delay(300).fadeIn(200);
                    setTimeout(()=>{
                      $(".sidebar, .scroll-area").mCustomScrollbar("scrollTo", "bottom");
                    },1000);
                  }
                  else
                  {
                      $('.t_loader').fadeOut(200);
                      $('.message_lists').delay(300).fadeIn(200); 
                  }
                }).catch(errors=>{
                  //
                })
              },
              sendMessage(){
                  var _this = this;
                  if(_this.list_id==0){
                    return false;
                  }
                  var msg = ''
                  $(document).ready(function(){
                    msg = $('.textarea-1').val();
                  });
                  if(msg === ''){
                    return false;
                  }
                  axios.post('{{url("send-message")}}', {'id':_this.list_id ,'message':msg, '_token':'{{csrf_token()}}'})
                  .then(response => {
                      _this.messages.data.reverse();
                      _this.messages.data.push(response.data);
                      _this.messages.data.reverse();

                      setTimeout(()=>{
                        $(".sidebar, .scroll-area").mCustomScrollbar("scrollTo", "bottom");
                      },500);
                      $('body .to_bottom').trigger('click');
                      // $(".scroll-area").animate({ scrollTop: $(".to_bottom").offset().top }, 0);
                      $('.textarea-1').val('');
                  }).catch(errror=>{

                  });
              },
        },
        mounted(){
          var _this = this;
          $(document).ready(function(){

            

              var channel = Echo.private('privateChat_'+_this.authId);
              channel.listen('sendMessage', function(data) {
                 var msg = JSON.parse(data.msg);
                  if(_this.authId*1 !== msg.sender_id*1){
                    _this.messages.data.reverse();
                    _this.messages.data.push(msg);
                    _this.messages.data.reverse();
                    var k;
                    var user = _this.list.filter(function(val, key) {
                      if(val.id == msg.list_id){
                        k = key;
                        return key;
                      }
                    });
                    _this.list[k].last_message.message = msg.message;
                    if(_this.list[k].id !== _this.list_id){
                      _this.list[k].unread.push(msg);
                    }

                    if(_this.checkUser(_this.list[k])){
                      _this.list[k].fuser.is_login = 1;
                      if(_this.live.id == _this.list[k].fuser.id){
                        _this.live.is_login = 1;
                      }
                    }else{
                      _this.list[k].suser.is_login = 1;
                      if(_this.live.id == _this.list[k].suser.id){
                        _this.live.is_login = 1;
                      }
                    }
                    setTimeout(()=>{
                      $(".sidebar, .scroll-area").mCustomScrollbar("scrollTo", "bottom");
                    },500);
                    $('body .to_bottom').trigger('click');
                    // $(".scroll-area").animate({ scrollTop: $(".to_bottom").offset().top }, 0);
                  }
              });

              $('.message_lists').hide();
              $('.discussions').on('click', '.user_list', function(){
                $('.discussions').find('.user_list').removeClass('active');
                $(this).addClass('active');
                var id = $(this).data('id');
                _this.fetchMsg(id);
              });
    
          });
           
        },

    }
</script>
