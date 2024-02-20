	
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/chat.vue'));
// import moment from "moment-js";
const app = new Vue({
    el: '#chat-conversations',
	data: {
	    baseUrl: document.getElementById('baseUrl').value,
	    authId: 0,
	    authType: '',
	    // permit: document.getElementById('permit').value,
	    authCheck: document.getElementById('authCheck').value,
	    list: {},
	    list_id:0,
	    messages: {},
	    live: {},
	    total_msg:0,
	    limit: 10,
	    students:{},
	    unread:0,
	    // first: '{{$first}}',
	    // second: '{{($second)??''}}',
	    // third: '{{($third)??''}}',
	    moment: moment,
	},
  	created(){
  		var _this = this;
  		if(_this.authCheck*1 == 1){
  			_this.authType = document.getElementById('authType').value;
  			if(_this.authType == 'admin'){
  				_this.fetchList();
  			}else if(_this.authType == 'student'){
  				_this.unreadMsg();
  			}
  		}
  	},
  	methods: {
      	fetchList(){
	        var _this = this;
	        var search = $('.list-search').val();
	        axios.post( _this.baseUrl+'/fetch-chatList', {'search':search})
	        .then(response => {
	            _this.list = response.data.data;
	            _this.students = response.data.students;
	            
	        }).catch(errors=>{
	        	//
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
      	canChat(){
      		var _this = this;
      		if(['university', 'admin', 'student'].includes(_this.authType)){
      			return 1;
      		}else{
      			if(_this.live){
      				if(_this.live.user_type=='university' || _this.live.user_type=='consultant' || _this.live.user_type=='admin'){
      					return 1;
      				}else{
      					if(_this.permit){
      						return 1;
      					}else{
      						return 0;
      					}
      				}
      			}else{
      				return 0;
      			}
      		}
      	},
      	fetchMsg(id=null){
	        var _this = this;
      		if(id !== null){
      			$('.fa-spin').fadeIn(200);
      			axios.post(_this.baseUrl+'/fetch-message', {id:id})
		        .then(response=>{
		          	_this.messages = response.data.messages;
		           	_this.list = response.data.data;
		           	_this.students = response.data.students;
		           	_this.live = response.data.live;
      				$('.fa-spin').fadeOut(200);
      				setTimeout(()=>{
		            	$("body .scroll2").animate({ scrollTop: $('body .scroll2').prop("scrollHeight")}, 500);
      				},200)
	          	}).catch(errors=>{
	          		//
	        	})
      		}else{
      			axios.post(_this.baseUrl+'/fetch-message')
		        .then(response=>{
		          	_this.messages = response.data.messages;
		           	_this.unread = response.data.unread;
		          	setTimeout(()=>{
            		$('body').find(".scroll3").animate({ scrollTop: $('body').find('.scroll3').prop("scrollHeight")}, 500);
      				},200)

	          	}).catch(errors=>{
		          //
		        })
      		}
      	},
      	checkkeyCod(e){
      		if (e.which == 13 || e.keyCode == 13) {
      			if(e.shiftKey == false){
		        	this.sendMessage();
      			}
		    }
      	},
      	sendMessage(){
	          var _this = this;
	          if(_this.authCheck==0){
	            return false;
	          }
	          var msg = ''
	          $(document).ready(function(){
	            msg = $('.ask_consult_textarea').val();
              	$('.ask_consult_textarea').val('');
	          });
	          if(msg === ''){
	            return false;
	          }
	          if(_this.authType == 'admin'){
	          	if(_this.list_id==0){
	          		return false;
	          	}
          		axios.post(_this.baseUrl+'/send-message', {'message':msg,'id':_this.list_id})
	          	.then(response => {
		            _this.messages.push(response.data);
		            _this.unread++;
		            _this.fetchList();
	            	$("body .scroll2").animate({ scrollTop: $('body .scroll2').prop("scrollHeight")}, 500);
	         		$('body').find(".scroll3").animate({ scrollTop: $('body').find('.scroll3').prop("scrollHeight")},500);
            	}).catch(errror=>{
            		//
	          	});
	          }else if(_this.authType == 'student'){
          		axios.post(_this.baseUrl+'/send-message', {'message':msg})
	          	.then(response => {
		            _this.messages.push(response.data);
	            	$('body').find(".scroll3").animate({ scrollTop: $('body').find('.scroll3').prop("scrollHeight")}, 500);
	          	}).catch(errror=>{

	          	});	
	          }  
      	},
      	unreadMsg(){
      		var _this = this;
      		axios.post(_this.baseUrl+'/get-unread-chat-messages')
          	.then(response => {
	            _this.unread = response.data;
          	}).catch(errror=>{

          	});	
      	},
      	textAbstract(text, length) {
		    if (text == null) {
		        return "";
		    }
		    if (text.length <= length) {
		        return text;
		    }
		    text = text.substring(0, length);
		    last = text.lastIndexOf(" ");
		    text = text.substring(0, last);
		    return text + "...";
		},
  	},
  	mounted(){
	    var _this = this;

	    setTimeout(()=>{
	    	// console.log($('.discussions .user_list'))
	    	// $('.discussions .user_list').each(function(index ){
	    	// 	if(index==0){
			   //  	$(this).trigger('click');
	    	// 	}
	    	// })
	    },2000);

		if(_this.authCheck){
		   	_this.authId = document.getElementById('authId').value
		   	_this.authType = document.getElementById('authType').value
	    	Echo.private('privateChat.'+_this.authId)
	      	.listen('MessageSent', (data) => {
	         	var msg = JSON.parse(data.msg);
	         	if(_this.authId*1 === msg.receiver_id*1){
	         		if(_this.messages && _this.messages.length>0){
		         		_this.messages.push(msg);
		         		
		         		$(".scroll2").animate({ scrollTop: $('.scroll2').prop("scrollHeight")}, 500);
		         		$('body').find(".scroll3").animate({ scrollTop: $('body').find('.scroll3').prop("scrollHeight")}, 500);
		         	}
		         	if(_this.authType=='student'){
	         			_this.unreadMsg();
	         		}else if(_this.authType=='admin'){
		         		_this.fetchList();
	         		}
	         	}
	    // 		if(_this.authId*1 === msg.receiver_id*1){
	          		
					// if(_this.list_id*1 !== msg.list_id*1){
		   //          	_this.fetchList();
	    //       		}else{
	    //       			var k;
			  //           var user = _this.list.filter(function(val, key) {
			  //             if(val.id*1 == msg.list_id*1){
			  //               k = key;
			                
			  //             }
			  //             return val.id*1 === msg.list_id*1;
			  //           });
		   //          	_this.list[k].last_message = msg;

	    //       			if(_this.messages.data && _this.messages.data.length>0){
				 //            _this.messages.data.reverse();
				 //            _this.messages.data.push(msg);
				 //            _this.messages.data.reverse();
					// 	}

					// 	 if(_this.list[k].id*1 != _this.list_id*1){
			  //             _this.list[k].unread.push(msg);
			  //           }
			            
			  //           if(_this.checkUser(_this.list[k])){
			  //             _this.list[k].fuser.is_login = 1;
			  //             if(_this.live.id == _this.list[k].fuser.id){
			  //               _this.live.is_login = 1;
			  //             }
			  //           }else{
			  //             _this.list[k].suser.is_login = 1;
			  //             if(_this.live.id == _this.list[k].suser.id){
			  //               _this.live.is_login = 1;
			  //             }
			  //           }
	    //       		}

		   //          setTimeout(()=>{
		   //            $(".sidebar, .scroll-area").mCustomScrollbar("scrollTo", "bottom");
		   //          },500);
		   //          $('body .to_bottom').trigger('click');
		   //          // $(".scroll-area").animate({ scrollTop: $(".to_bottom").offset().top }, 0);
	    // 		}
	      	});
     	}

	    $(document).ready(function(){
	    	$(document).on('click', '.per-box', function(){
	    		var id = $(this).attr('data-id');
	    		_this.list_id = id;
	    		_this.fetchMsg(id);
	    	});

	      // $('.message_lists').hide();
	      // $('.discussions').on('click', '.user_list', function(){
	      //   var sid = $('.user_list.active').attr('data-id');
	      //   sid = (sid==undefined)?0:sid;
	      //   $('.discussions').find('.user_list').removeClass('active');
	      //   $(this).addClass('active');
	      //   var id = $(this).data('id');
	      //   _this.fetchMsg(id ,sid);
	      // });

	    });     
  	},
});

