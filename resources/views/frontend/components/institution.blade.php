    <?php ini_set('memory_limit', '256M'); ?>

    <div class="container-fluid text-center firstsection">
        <h1>{!! ($meta['title'])??'' !!}</h1>
        <p>{!! ($meta['text'])??'' !!}</p>
        <div class="universities-form-main">
            <form id="search-form" class="mb-1" action="{{url('search')}}" method="GET">
                <div class="universities-form-block">
                    <input type="text" name="search" class="form-control uni-search searchform2" placeholder="Search..." autocomplete="Off">
                    <button class="Searchbtn2"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <div style="position: absolute;" class="is-dropdown w-100 u-maxw-680px bg-white u-boxShadow-light d-none search-uni scroll2"></div>
            @push('scripts')
            <script>
                $(document).ready(function() {
                    $(document).on('keyup', '.uni-search', function() {
                        var val = $(this).val();
                        var baseUrl = '{{url(' / ')}}';
                        if (val !== '') {
                            $.ajax({
                                url: '{{url("get-university-list")}}',
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    'search': val,
                                    _token: '{{csrf_token()}}'
                                },
                                success: function(uni) {
                                    var html = ``;
                                    for (var i = uni.length - 1; i >= 0; i--) {
                                        html += `<a class="d-block c-highlightLink list-uni" href="` + baseUrl + '/university/' + uni[i]['slug'] + `">` + uni[i]['name'] + `</a>`;
                                    }
                                    $('.search-uni').html(html);
                                    $('.search-uni').removeClass('d-none');
                                    if (uni.length == 0) {
                                        $('.search-uni').addClass('d-none');
                                    }
                                }
                            })
                        } else {
                            $('.search-uni').html('');
                            $('.search-uni').addClass('d-none');
                        }
                    });
                });
            </script>
            @endpush
        </div>
    </div>
    <div class=" searchsectionbg">
        <div class="">
            <div class=" textcol1" style="text-align: center;">
                <h4>Search By Country</h4>
            </div>
        </div>
    </div>
    <section class="country-search py-5">
        <div class="container">
            <!-- <h2 class="h2 mb-3 mt-3" style="padding:20px 0px; text-align:center;">Search By Country</h2> -->
            <div class="panel panel-default" style="margin-top: 30px; text-align:center;">
                <div class="panel-heading" style="margin-bottom: 0px;padding: 6px 5px;"> <span style="padding-left: 7px;color:white;font-size:17px; text-transform:capitalize;">select country</span></div>
                <div class="panel-body" style="margin-top: 0px;">
                    <!-- <ul class="column-list countries">
                        @foreach(getSelectedCountries()->sortBy('id')->chunk(3) as $key => $country_chunk)
                        @if ($key < 5) </tr>
                            @foreach($country_chunk as $c)
                            <li itemscope="" itemtype="http://schema.org/Country" class="countries-list-item">
                                <a href="{{url('search?type=university&location='.$c->country)}}" class="countries-link" itemprop="{{url('search?type=university&location='.$c->country)}}">
                                    <img src="{{$c->image}}" alt="{{$c->country}}" data-lazy-src="{{$c->image}}" class="lazyloaded" data-was-processed="true" class="countries-image">
                                    <noscript><img src="{{$c->image}}" alt="{{$c->country}}"></noscript>
                                    <span itemprop="name" class="countries-name-span">{{$c->country}} ({{$c->code}})</span>
                                </a>
                            </li>
                            @endforeach
                            </tr>
                            @else
                            <tr v-if="view_all">
                                @foreach($country_chunk as $c)
                                <li itemscope="" itemtype="http://schema.org/Country" class="countries-list-item">
                                    <a href="{{url('search?type=university&location='.$c->country)}}" class="countries-link" itemprop="{{url('search?type=university&location='.$c->country)}}">
                                        <img src="{{$c->image}}" alt="{{$c->country}}" data-lazy-src="{{$c->image}}" class="lazyloaded" data-was-processed="true" class="countries-image">
                                        <noscript><img src="{{$c->image}}" alt="{{$c->country}}"></noscript>
                                        <span itemprop="name" class="countries-name-span">{{$c->country}} ({{$c->code}})</span>
                                    </a>
                                </li>
                                @endforeach
                            </tr>
                            @endif
                            @endforeach
                    </ul> -->

                    <ul class="column-list countries">
                        @foreach(getSelectedCountries()->sortBy('id')->chunk(3) as $key => $country_chunk)
                            @if ($key < 5)
                                @foreach($country_chunk as $c)
                                    <li itemscope="" itemtype="http://schema.org/Country" class="countries-list-item">
                                        <a href="{{url('search?type=university&location='.$c->country)}}" class="countries-link" itemprop="{{url('search?type=university&location='.$c->country)}}">
                                            <img src="{{$c->image}}" alt="{{$c->country}}" data-lazy-src="{{$c->image}}" class="lazyloaded" data-was-processed="true" class="countries-image">
                                            <noscript><img src="{{$c->image}}" alt="{{$c->country}}"></noscript>
                                            <span itemprop="name" class="countries-name-span">{{$c->country}} ({{$c->code}})</span>
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <tr v-if="view_all">
                                    @foreach($country_chunk as $c)
                                        <li itemscope="" itemtype="http://schema.org/Country" class="countries-list-item">
                                            <a href="{{url('search?type=university&location='.$c->country)}}" class="countries-link" itemprop="{{url('search?type=university&location='.$c->country)}}">
                                                <img src="{{$c->image}}" alt="{{$c->country}}" data-lazy-src="{{$c->image}}" class="lazyloaded" data-was-processed="true" class="countries-image">
                                                <noscript><img src="{{$c->image}}" alt="{{$c->country}}"></noscript>
                                                <span itemprop="name" class="countries-name-span">{{$c->country}} ({{$c->code}})</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </tr>
                            @endif
                        @endforeach
                    </ul>
                </div>
                @if (getSelectedCountries()->count() >15)
                <div align="center" class="view-all-button">
                    <button class="btn btn-primary sub-btn" @click="viewAll" v-if="view_all == false">View All</button>
                </div>
                @endif
            </div>
        </div>
    </section>


    <div class="Browsesection" style="background: #F0F0F0;">
        <div class="container">
            <div class="po_un_col1 mb-4 text-center">
                <h3 class="section-heading ">Search By
                    <span>Course</span>
                </h3>
            </div>
            <div class="accordion" id="accordionExample">
                <?php $count_show_collapse = 1; ?>
                @foreach(subjects() as $sub)
                @if(count($sub->courses)>0)
                <div class="card">
                    <div class="card-header1" data-toggle="collapse" data-target="#collapseOne{{$sub->id}}" aria-expanded="true">
                        <span class="title">{{$sub->name}}</span>
                        <span class="accicon"><i class="fa fa-caret-down"></i></span>
                    </div>
                    <div id="collapseOne{{$sub->id}}" class="collapse <?php if ($count_show_collapse == 1) {
                                                                            echo 'show';
                                                                        }
                                                                        $count_show_collapse++; ?>" data-parent="#accordionExample">
                        <div class="card-body Selectone" style="border: none;">

                            <div class="form1">
                                <div class="row">
                                    @foreach($sub->courses->where('active',1)->where('display',1)->take(10)->chunk(2) as $course)
                                    <!-- <div class="row mb-2"> -->
                                    @foreach($course as $c)
                                    <div class="col-sm-12 col-sm-6 col-md-6 col-lg-6 mb-2 input1">
                                        <a href="{{url('search?type=university&search='.$c->name)}}" target="_blank" class="country-select-link">
                                            {{$c->name}} ({{$c->university->name}})
                                        </a>
                                    </div>
                                    @endforeach
                                    <!-- </div> -->
                                    @endforeach
                                </div>
                                <div align="center" class="view-all-button">
                                    <a href="{{url('search?page=1&limit=18&type=course&subject='.$sub->id)}}" class="btn btn-primary sub-btn">View More</a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>



                @endif
                @endforeach







            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        var content234 = new Vue({
            el: '#search-by-loc',
            data: {
                view_all: false
            },
            methods: {
                viewAll() {
                    this.view_all = true
                }
            }
        })
    </script>
    @endpush