@extends('layouts.backend')
@section('customStyles')
<style type="text/css">
    
</style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-title-box">
                    <h4 class="page-title">Facebook</h4>
                    <ol class="breadcrumb p-0 m-0">
                        <li>
                            <a href="#">Webnet</a>
                        </li>
                        <li class="active">
                            Facebook
                        </li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            @if(isset($user))
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="text-center card-box">
                                <div class="member-card">
                                    <div class="thumb-xl member-thumb m-b-10 center-block">
                                        <img src="{{$user->avatar}}" class="img-circle img-thumbnail" alt="profile-image">
                                        <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                    </div>

                                    <div class="">
                                        <h4 class="m-b-5">{{$user->name}}</h4>
                                        <p class="text-muted">{{'@'.$user->id}}</p>
                                    </div>

                                </div>

                            </div> <!-- end card-box -->

                        </div> <!-- end col -->

                        <div class="col-md-8 col-lg-9">
                            <h4>Select Page</h4>
                            <select class="form-control">
                                <option>Select Page</option>
                            </select>
                        </div>
                        <!-- end col -->

                    </div>
                </div>
            </div>
            @else
            <div class="col-md-12">
                <a href="{{route('facebook_auth')}}" target="_new"><i class="fa fa-facebook m-r-5"></i> Login</a>
            </div>
            @endif
        </div>
    </div>
@endsection
@section('customScripts')
@endsection
