<footer class="c-pageFooter">
   {{-- {{dd(getFooterMeta())}}
   getMenuById($id) --}}
<?php /* ?>
   <div class="container">

         <div class="row">


            <div class="col-md-12" id="complaint">

			<div class="col-md-12" style="text-align: center;">
                 <h4>Complaint/Suggestion Box</h4>
        			<p>If you have any complaint or suggestion please send us message</p>
            </div>
      
      
              <div class="col-md-12">
                  <?php if(isset($_GET['message'])){ ?>
                  
                  <div class="alert alert-success" style="text-align: center;">
                   <strong>Success!</strong> Your Compliant Has Been Send Successfully.
                   </div>
                  
                  <?php } ?>
              </div>

			<form action="{{url('send-mail')}}" method="POST">
				{{csrf_field()}}
                <input type="hidden" name="type" value="complaint">
               <div class="row">
                   <div class="form-group col-md-6 p-relative">
    					<label class="label-control">Name</label>
    					<input type="text" class="form-control" required="" value="{{old('name')}}" name="name" autocomplete="Off">
    				</div>
    				<div class="form-group col-md-6 p-relative">
    					<label class="label-control">Email</label>
    					<input type="email" class="form-control" required="" value="{{old('email')}}" name="email" autocomplete="Off">
    				</div>
               </div>
                <div class="row">
                
                    <div class="form-group col-md-6 p-relative">
                    	<label class="label-control">Subject</label>
                    	<input type="text" class="form-control" required="" value="{{old('subject')}}" name="subject" autocomplete="Off">
                    </div>
                    <div class="form-group col-md-6 p-relative">
                    	<label class="label-control">Phone No.</label>
                    	<input type="number" class="form-control" required="" value="{{old('phone')}}" name="phone" autocomplete="Off">
                    </div>
                
                </div>
                
            	<div class="form-group col-md-12 p-relative">
            		<label class="label-control">Details</label>
            		<textarea class="form-control" name="contact_message" required="" rows="6" autocomplete="Off">{{old('contact_message')}}</textarea>
            	</div>
            		<!-- <p class="terms">By clicking Submit, you agree to our <a href="{{url('terms-and-condition')}}">Terms and Conditions</a>.</p>
            		<p class="terms">After submitting your Complaint, We will contact you as soon as possible.</p>
            		 -->
                <div class="form-group p-relative" style="text-align: center;">
            		<button type="submit" class="btn btn-primary">Submit Complaint</button>
            	</div>
			</form>
	</div>


            </div>


         </div>
<br><br>
<?php */?>
   </div>

   <div class="container">
      <div class="row">
         <div class="col-md-4">
            <section class="mb-4">
               <h5 class="u-o50">{{(getFooterMeta()[0]['title'])??''}}</h5>
               @isset(getFooterMeta()[0]['menu'])
                  @foreach(getMenuById(getFooterMeta()[0]['menu']) as $menu)
                  <div><a href="{{url(($menu->url)??'#.')}}">{{($menu->title)??''}}</a></div>
                  @endforeach
               @endif
            </section>
            <section class="mb-4">
               <h5 class="u-o50">{{(getFooterMeta()[2]['title'])??''}}</h5>
               @isset(getFooterMeta()[2]['menu'])
                  @foreach(getMenuById(getFooterMeta()[2]['menu']) as $menu)
                  <div><a href="{{url(($menu->url)??'#.')}}">{{($menu->title)??''}}</a></div>
                  @endforeach
               @endif
               
               <h5 class="u-o50">Privacy Policy</h5>
               
                  <div><a href="https://universitiespage.com/privacy-policy">Privacy Policy</a></div>
                  
                  
            </section>
         </div>
         <div class="col-md-4">
            <section class="mb-4">
                <!--{!!(getFooterMeta()[1]['email'])??''!!}-->
               <h5 class="u-o50">{{(getFooterMeta()[1]['title'])??''}}</h5>
               
                <p style="font-size: 16px;margin-bottom: 6px;"><b>China Address</b>:Haidian Beijing,China.</a></p>
                 <p style="font-size: 16px;margin-bottom: 6px;"><b>Thailand Address</b>:Bangkok,Thailand. Email:Thailand@universitiespage.com</a></p>
                
                 <p style="font-size: 16px;margin-bottom: 6px;"><b>Pakistan Lahore Address</b>:Universities Page,2nd Floor faisal bank,Raja Market,Garden town,Lahore,Pakistan.<br>Phone:0324 3640038 <br>Phone:0333 0033235 <br>Phone:0310 3162004 </a></p>
        <p style="font-size: 16px;margin-bottom: 6px;"><b>Islamabad Address</b>:Universities Page, Punjab market,Venus Plaza, 1st Floor, Office No. 1, Sector G13/4,Islamabad<br>Phone:0335 9990308 <br>Phone:0334 9990308</a></p>
               <p style="font-size: 16px;margin-bottom: 6px;"><b>Email</b>: <a href="mailto:admission@universitiespage.com">admission@universitiespage.com</a></p>
           
               <p style="font-size: 16px;margin-bottom: 6px;">A project of <a href="https://www.universitiespage.com" target="_blank">www.universitiespage.com</a></p>
            </section>
            {{-- <section class="mb-4">
               <h5 class="u-o50">{{(getFooterMeta()[1]['title'])??''}}</h5>
               <div><a style="cursor: pointer;" data-toggle="modal" data-target="#login_model">Register As Student</a></div>
            </section> --}}
            {{-- <section class="mb-4">
               <h5 class="u-o50">{{(getFooterMeta()[3]['title'])??''}}</h5>
               @isset(getFooterMeta()[3]['menu'])
                  @foreach(getMenuById(getFooterMeta()[3]['menu']) as $menu)
                  <div><a href="{{url(($menu->url)??'#.')}}">{{($menu->title)??''}}</a></div>
                  @endforeach
               @endif
            </section> --}}
         </div>
         <div class="col-md-4">
            <a id="footer_switch_currency_url" href="#" class="d-none" rel="nofollow"></a>
            <section class="mb-4">
               <h5 class="u-o50">All Universities</h5>
               <select class="custom-select w-100 search-university-footer" id="footer_site_menu">
                  <option value="-1">Select Universities</option>
                  @foreach(getAllUniversity() as $nui)
                        <option value="{{$nui->slug}}">{{$nui->name}}</option>
                  @endforeach
               </select>
            </section>
            <section class="mb-4">
               <h5 class="u-o50">Select Subjects</h5>
               <select class="custom-select w-100 search-subject-footer" id="footer_country_menu">
                  <option selected="" disabled="">Select Subjects</option>
                  @foreach(subjects() as $sub)
                        <option value="{{$sub->id}}">{{$sub->name}}</option>
                  @endforeach
               </select>
            </section>
            <section class="c-pageFooter-icons mb-4">
               @foreach(getSocialMeta() as $key => $social)
                  @if($social!==null)
                     <a href="{{($social)??''}}" title="Facebook">
                        <i class="fa fa-2x fa-{{$key}} u-text-{{$key}}"></i>
                     </a>
                  @endif
               @endforeach
            </section>
            <section class="mb-4">
               
               <a href="https://play.google.com/store/apps/details?id=com.universitiespage" target="_blank"><img width="50%" src="{{ url('/public/google-play.png') }}" alt="university page app"></a>

            </section>
         </div>
      </div>
      <section class="text-center small">
         2019 Universities Page
      </section>
   </div>
   <style>
       .wwwa__brand{
           font-size: 0px !important;
       }
       .widget-header {
          background: #0564af !important; 
       }
       .ayoan_whatsapp_chatbox .widget-body .body-content .user-list .ayoan_item.active {
         border-left: 3px solid #0564af !important;
       }
   </style>
   
  
    
  
   
   <div id="example"></div>
   
</footer>
