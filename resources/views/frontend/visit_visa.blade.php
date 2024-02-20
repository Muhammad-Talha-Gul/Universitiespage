@extends('layouts.frontend')
@section('title',(isset($data['seo']->meta_title))?$data['seo']->meta_title:'Visit Visa')
@section('seo')
@isset($data['seo']->show_meta)
<meta name="keywords" content="">
<meta name="description" content="">
@endisset
@endsection
@section('customStyles')
<style type="text/css">
    .c-bgHeader.has-banner-350px {
        height: 305px !important;
        max-height: 350px;
        background-position-x: center;
        background-position-y: top;
        position: relative;
    }

    .row.Countryimg {
        margin-top: 23px;
    }
</style>
@endsection
@section('content')


<div class="bg-light">
    <nav class="container o-breadcrumb top-link-main">
        <a class="o-breadcrumb-item" href="{{url('/')}}">Home</a>
        <a class="o-breadcrumb-item" href="{{url('visit_visa')}}">Visit Visa</a>
    </nav>
</div>



<div class="container-fluid searchsectionbg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 textcol1" style="text-align: center;">
                <h4>Search By Country</h4>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid Browsesection">
    <div class="container">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header1" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true">
                    <span class="title">Available Visit Vise By Country</span>
                    <span class="accicon"><i class="fa fa-caret-down"></i></span>
                </div>
                <div id="collapseOne" class="collapse show" data-parent="">
                    <div class="card-body Selectone" style="border: none;">
                        <div class="row Countryimg">
                            @foreach($datas as $dataz)
                            <?php if (!isset($dataz->slug)) {
                                continue;
                            }  ?>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 flagcol1 mb-4">
                                <a href="{{url('visa/'.$dataz->slug)}}"><img class="img-fluid" src="{{$dataz->country_image}}" alt="{{$dataz->country_name}}">
                                    <p class="visit-block-paragraph">{{$dataz->country_name}}</p>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>





        </div>
    </div>
</div>



<br><br><br>
@endsection