<style>
  .finder-button-type, .finder__nav__label, .finder-button-field{color:#003a5d !important;}
  .select-uni .select2-container--default .select2-selection--single .select2-selection__rendered{color:#003a5d;}
  .input__field_placeholder::placeholder{color:#003a5d; }
</style>
@isset($meta['style'])

@if($meta['style'] == 'style1')
<div id="consultant_filter_search">
    <section>
      
  
       <div class="module--white container--relative cr">
          <div class="container--flush-narrow">
             <div class="finder__nav">
                <a style="cursor:pointer;" class="finder__nav__label">Filter By: <span class="finder__nav__label__icon"></span></a>
                <div class="finder__nav__list">
                    <div class="finder__nav__item nav_prog" style="width:200px;">
                      <a style="cursor:pointer;padding:1.6rem 15px;" class="finder-button-type filter-btn">
                         Verification 
                            <i class="fas fa-chevron-down"></i>
                      </a>
                      <div class=" filter-box" style="display:none;">
                         <div class="container--flush-narrow" style="padding:0px 15px;">
                            <ul class="finder__dropdown__list filter__group" style="display: block;padding-bottom: 20px;">
                              
                                <li class="finder__dropdown__item" style="width:90%">
                                  <label class="checkbox__label finder__dropdown__link" @click="filterVerified($event)">
                                     <input type="checkbox" class="checkbox__option search-verified" name="verified[]" value="1" checked="" ><span></span>
                                     <span>Verified</span>
                                  </label>
                                </li>
                                <li class="finder__dropdown__item" style="width:90%">
                                  <label class="checkbox__label finder__dropdown__link" @click="filterVerified($event)">
                                     <input type="checkbox" class="checkbox__option search-verified" name="verified[]" value="0" checked="" ><span></span>
                                     <span>Unverified</span>
                                  </label>
                                </li>

                            </ul>
                         </div>
                      </div>
                    </div>

                    <div class="finder__nav__item nav_type" style="width:150px;">
                      <a style="cursor:pointer;padding:1.6rem 15px;" class="finder-button-field filter-btn">
                         Rating
                            <i class="fas fa-chevron-down"></i>
                      </a>
                      <div class=" filter-box" style="display:none;">
                         <div class="container--flush-narrow" style="padding:0px 15px;">
                            <ul data-filter-group="field-of-study" class="finder__dropdown__list filter__group" style="display: block;padding-bottom: 20px;">
                               <li class="finder__dropdown__item " style="width:90%">
                                  <label class="checkbox__label finder__dropdown__link" @click="filterRating($event)">
                                     <input type="checkbox" class="checkbox__option " name="ratings[]" checked="" value="1">
                                     <span></span>
                                     <span>0-1</span>
                                  </label>
                               </li>
                               <li class="finder__dropdown__item " style="width:90%">
                                  <label class="checkbox__label finder__dropdown__link" @click="filterRating($event)">
                                     <input type="checkbox" class="checkbox__option " name="ratings[]" checked="" value="2">
                                     <span></span>
                                     <span>1-2</span>
                                  </label>
                               </li>
                               <li class="finder__dropdown__item " style="width:90%">
                                  <label class="checkbox__label finder__dropdown__link" @click="filterRating($event)">
                                     <input type="checkbox" class="checkbox__option " name="ratings[]" checked="" value="3">
                                     <span></span>
                                     <span>2-3</span>
                                  </label>
                               </li>
                               <li class="finder__dropdown__item " style="width:90%">
                                  <label class="checkbox__label finder__dropdown__link" @click="filterRating($event)">
                                     <input type="checkbox" class="checkbox__option " name="ratings[]" checked="" value="4">
                                     <span></span>
                                     <span>3-4</span>
                                  </label>
                               </li>
                               <li class="finder__dropdown__item " style="width:90%">
                                  <label class="checkbox__label finder__dropdown__link" @click="filterRating($event)">
                                     <input type="checkbox" class="checkbox__option " name="ratings[]" checked="" value="5">
                                     <span></span>
                                     <span>4-5</span>
                                  </label>
                               </li>
                            </ul>
                         </div>
                      </div>
                    </div>

                    <ul class="finder__checkbox__group location__filters ul-select">
                      <li>
                         <div class="select-uni">
                           <select class="selectUniversity search-country" style="display: none;outline:none;color:black">
                              <option value="0" selected="">All Country</option>
                              @foreach(allCountry() as $country)
                                <option value="{{$country->country}}" @if(isset($_GET['country'])) {{($_GET['country'] == $country->country)?'selected':''}} @endif>{{$country->country}}</option>
                              @endforeach
                            </select>
                            <i class="fas fa-chevron-down"></i>
                          </div>
                      </li>
                      <li>
                        <div class="select-uni" style="color:black">
                          {{-- <div style="background-color: white;width: 60px;height: 31px;font-size: 16px;color: #073a62;font-family: Trade Gothic, Oswald Medium, Oswald, Arial, sans-serif;position: absolute;">Search: </div> --}}
                          <input type="text" class="input__field_placeholder main_search" value="{{($_GET['search'])??''}}" style="color:black;padding-left: 10px;outline:none;" name="search" placeholder="Search Here...">
                            {{-- <i class="fas fa-chevron-down"></i> --}}
                        </div>
                      </li>
                   </ul>

                   
                </div>
      
             </div>
          </div>
       </div>
       
    </section>
    <div class="clearfix"></div>

   

    <section class="{{$meta['class'] or ''}}">
        <div class="container container--narrow nmargin" style="padding-top: 30px;">
            <div class="grid grid--vcenter grid--space">
                <div class="grid__item text-center">
                    <h1>{{$meta['title'] or ''}}</h1>
                    <p>
                        {{$meta['text'] or ''}}
                    </p>
                    <p><b>{{$meta['text1'] or ''}}</b></p>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container--flush-small container--clear" style="min-height: 400px;
">

            <div style="width: 100%;display: flex;" align="center">
                <img src="{{asset('load_t.gif')}}" class="t_loader" style="margin: 0 auto;width: 100px;margin-top: 50px;border:none;">
            </div>
            <div class="card__expand__container" v-if="consultant.data">
                  
                  <span v-if="consultant.data.length>0">
                  <div class="card__expand" v-for="con in consultant.data">
                     <div class="card" style="position: relative;">
                        <img :src="(con.is_verified==1)?baseUrl+'/public/assets_frontend/verification_img/verified2.png':baseUrl+'/public/assets_frontend/verification_img/unverified2.png'" alt="" style="    position: absolute;width: 70px;height: auto;top: 10px;left: 10px;">

                        <a :href="baseUrl+'/consultant/'+con.organization_name+'/'+con.id">
                          
                          <div style="background-color: #30b0c9;width: 100%;height: 250px;text-align: center;font-size: 28px;font-weight: bold;color: #ffffff;text-decoration: underline;text-shadow: 0px 0px 10px #000000;padding-top: 107px;" v-if="con.logo==null">@{{con.organization_name}}</div>
                       
                          <img v-else :src="con.logo" style="width: 100%;height: 250px;object-fit: cover;" alt="Universities Page" >
                          
                        <div class="card__content module--black">
                           <h3 class="card__title" style="margin-bottom: 2px;">@{{con.organization_name}}</h3>
                            <div class="card__program"></div>
                            <p class="card__expand__text" style="margin-bottom: 7px;letter-spacing: 2px;text-transform: capitalize;font-size: 11px;">@{{con.city}}, @{{con.country}}</p>
                            <a :href="baseUrl+'/consultant/'+con.organization_name+'/'+con.id" class="card__expand__button button--link">Send Message</a>
                        </div>
                     </div>
                      <div class="clearfix"></div>
                  </div>

                  <div class="pagination-wrapper" v-if="consultant.data.length>0">
                    <ul class="pagination" v-if="consultant.last_page > 1">
                        <li v-if="consultant.current_page != 1">
                            <a style="cursor:pointer;" @click="fetchData(page--)">
                                <i class="fa fa-angle-left"></i>
                            </a>
                        </li>
                        <li v-for="i in consultant.last_page">
                            <a style="cursor:pointer;" :class="(consultant.current_page == i) ? 'current' : ''" @click="fetchData(page=i) " v-text="i"></a>
                        </li>
                        <li v-if="consultant.current_page != consultant.last_page">
                            <a style="cursor:pointer;" @click="fetchData(page++)">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                  </div>
                  </span>
                  <p v-else align="center" style="padding: 30px 0px;font-size: 21px;color: gray;">CONSULTANT NOT FOUND</p>

            </div>

        </div>
    </section>
    <div class="clearfix"></div>

    @push('scripts')
        <script>

            var consultant_filter = new Vue({
                // Vue.component('pagination', require('laravel-vue-pagination')),
                el: '#consultant_filter_search',
                data: {
                    url: '{{route("getConsultantSearch")}}',
                    baseUrl: '{{url("/")}}',
                    consultant:[],
                    country: "{{($_GET['country'])??''}}",
                    search: "{{($_GET['search'])??''}}",
                    verified: [],
                    ratings: [],
                    page: 1,
                    limit: '{{($meta['paginate'])??12}}',
                },
                created(){
                    this.fetchData(this.page);
                },
                methods: {
                    fetchData(page){
                        var _this = this;
                        var data='?';
                        data+='page='+_this.page;
                        (_this.limit!=='')?data+='&limit='+_this.limit:'';
                        (_this.search!=='')?data+='&search='+_this.search:'';
                        (_this.country!=='')?data+='&country='+_this.country:'';
                        (_this.verified!=='')?data+='&verified='+_this.verified:'';
                        (_this.ratings!=='')?data+='&ratings='+_this.ratings:'';
                        window.history.pushState({path:'{{request()->url()}}'+data},'','{{request()->url()}}'+data);
                        if(!$('.t_loader').is(':visible')){
                            $('.course_lists').fadeOut(200).delay(200);
                            $('.t_loader').delay(200).fadeIn(200)
                        }
                        axios.get(_this.url+data)
                        .then(response => {
                            _this.consultant = response.data.consultant;
                            $(function(){
                                $('.t_loader').fadeOut(200);
                                $('.course_lists').delay(300).fadeIn(200);
                            })
                        }).catch(errror=>{

                        });
                    },
                    filterVerified(event){
                      var _this = this;
                      $(document).ready(function(){
                        var input = $(event.target).parent().find('input');
                        var val = input.val();
                        if(!input.is(':checked')){
                            _this.verified.push(val);
                        }else{
                            _this.verified.splice(_this.verified.indexOf(val), 1);
                        }
                        _this.fetchData(_this.page = 1);
                      });
                    },

                    filterRating(event){
                      var _this = this;
                      $(document).ready(function(){
                        var input = $(event.target).parent().find('input');
                        var val = input.val();
                        if(!input.is(':checked')){
                            _this.ratings.push(val);
                        }else{
                            _this.ratings.splice(_this.ratings.indexOf(val), 1);
                        }
                        _this.fetchData(_this.page = 1);
                      });
                    },
                   
                    rating(rating){
                      var rate = rating.toString().split('.');
                      var html = '';
                      if(rate[0]!==0){
                        for (var i=0; i<(rate[0]*1); i++) {
                          html+='<i class="fa fa-star"></i>';
                        }
                      }
                      if(rate[1] !== undefined && rate[1]>=5){
                        html+='<i class="fa fa-star-half"></i>';
                      }
                      return html
                    },
                },
                mounted(){
                  var _this = this;
                  $(document).ready(function(){

                    $('.main_search').on('keyup', function(){
                      _this.search = $(this).val();
                      _this.fetchData(_this.page = 1);
                    });

                    $('input[name="verified[]"]').each(function(){
                      _this.verified.push($(this).val());
                    });
                    $('input[name="ratings[]"]').each(function(){
                      _this.ratings.push($(this).val());
                    });

                    $('.search-country').on('change', function(){
                      _this.country = $(this).val();
                      (_this.country==0)?_this.country='':'';
                      _this.fetchData(_this.page = 1);
                    });

                    $('.filter-btn').on('click', function(){
                      var box = $(this).next('.filter-box');
                      if(box.is(':visible')){
                        box.slideToggle( "slow", function() {
                          $(this).fadeOut(200)
                        });
                      }else{
                        box.slideToggle( "slow", function() {
                          $(this).fadeIn(200)
                        });
                      }
                    })

                  });
                   
                },

            });
            
        </script>
    @endpush
</div>
@endif
@endisset