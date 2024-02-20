<section class="">
   <div class="container">
      <div class="grid-nwith">
         <div class="col-s2">
            <form class="form contact-form" autocomplete="off">
               {{csrf_field()}}
               <div class="alert alert-success" style="display:none;">Thank You, Successfully Send.</div>
               <div class="alert alert-danger" style="display:none;">Sorry!, Something Went Worg.</div>
               <div class="form-group">
                  <label class="form__label">Name<span class="label__required">*</span>
                  </label>
                     <input type="text" name="name" placeholder="" class="form__input" required="">
               </div>
               
               <div class="form-group">
                  <label class="form__label">Email Address<span class="label__required">*</span></label>
                  <input type="email" name="email" placeholder="" class="form__input" required="">
               </div>

               <div class="form-group">
                  <label class="form__label">Your Message<span class="label__required"></span></label>
                  <textarea row="3" name="contact_message" class="form__input"></textarea>
               </div>
               
               <button type="submit" class="button form__button contact-button"> Submit </button>&nbsp; 
            </form>
         </div>
         <div class="col-s2 is2">
               <h2 class="callout-full-width__title text-black smtext">
                  {{($meta['title'])??''}}
               </h2>
               <p>{{($meta['text'])??''}}
               </p>
               <span>Call Us: <strong>{{($meta['phone'])??''}}</strong></span>
               <span>Email Us: <a class="button--link" href="mailTo:{{($meta['email'])??''}}">{{($meta['email'])??''}}</a></span>
         </div>
      </div>
   </div>
</section>