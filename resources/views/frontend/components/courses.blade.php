<div class="container-fluid text-center firstsection po_un_col1 mb-5 text-center">
    <h1 class="section-heading ">Find <span>courses</span></h1>
    <p>Here you can search over 10,000 courses by course type or Subject wise.</p>
</div>
<div class=" searchsectionbg">
    <div class="">
        <div class=" textcol1" style="text-align: center;">
            <h4>Courses List</h4>
        </div>
    </div>
</div>

<div class="container-fluid Browsesection">
    <div class="container">
        <div class="container">
            <div class="accordion" id="accordionExample">
                <div class="row">
                    @if(isset($meta['type']))
                    <div class="col-lg-6 mb-3">
                        @php
                        $q_count = count(qualification());
                        $qualification = qualification();
                        @endphp
                        @foreach($qualification->chunk(round($q_count/1)) as $key=>$quali)
                        <div class="card">
                            <div class="card-header1" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true">
                                <span class="title">{{($meta['title1'])??''}}</span>
                                <span class="accicon"><i class="fa fa-caret-down"></i></span>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="">
                                <div class="card-body Selectone select-main-container">
                                    <div class="linksection1" style="margin-top: 15px;">
                                        <ul class="">
                                            @foreach($quali as $q)
                                            <li>
                                                <a target="_blank" href="{{url('search?type=course&qualification='.$q->id)}}">
                                                    <!-- <i class="fa fa-lg fa-fw {{(json_decode($q->attributes)->font_awsome)??''}}"></i> -->
                                                    {{$q->title}}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <!-- <center>
                                            <p><a href="#">View More</a></p>
                                        </center> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif


                    @if(isset($meta['subject']))
                    <div class="col-lg-6 mb-3">
                        @php
                        $s_count = count(subjects());
                        $subjects = subjects();
                        @endphp
                        @foreach($subjects->chunk(round($s_count/1)) as $key=>$subject)
                        <div class="card">
                            <div class="card-header1" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true">
                                <span class="title">{{($meta['title2'])??''}}</span>
                                <span class="accicon"><i class="fa fa-caret-down"></i></span>
                            </div>
                            <div id="collapsetwo" class="collapse show" data-parent="">
                                <div class="card-body Selectone select-main-container">
                                    <div class="linksection1" style="margin-top: 15px;">
                                        <ul>
                                            @foreach($subject as $sub)
                                            <li style="height: 100% !important;"><a target="_blank" href="{{url('search?type=course&subject='.$sub->id)}}">{{($sub->name)??''}}</a>

                                                @if($sub->guide !== null)
                                                <a href="{{url(('guides/'.$sub->guide->slug)??'#.')}}" target="_blank">
                                                    <i style="width: auto; font-size: 15px;" class="fa fa-fw fa-lg fa-leanpub fa-pub">See Guide</i>
                                                </a>
                                                @endif
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>