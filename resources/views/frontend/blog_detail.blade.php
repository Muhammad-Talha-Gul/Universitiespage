@extends('layouts.frontend')

@php
if(isset($data['seo']->meta_title)){
  $meta_title = $data['seo']->meta_title;
}elseif(isset($data['title'])){
  $meta_title = $data['title'];
}elseif(isset($category_page)){
  $meta_title = $category_page->name;
}else{
  $meta_title = 'Ener Natural';
}
@endphp
@section('title',$meta_title)


@section('seo')
  @include('includes.frontend.seo')
@endsection

@section('customStyles')
  <style type="text/css">
    label.error{
      color: #ff6060;
      font-size: smaller;
    }
  </style>
@endsection
@section('content')
    <section class="blog_area section--padding2">
        <div class="container">
            <div class="row" >
                <div class="col-md-8">
                    <div class="single_blog blog--default">
                        <article>
                            <figure>
                                <img src="{{(isset($data->image))? url($data->image) :''}}" alt="{{$data->title or ''}}">
                            </figure>
                            <div class="blog__content">
                                <a style="cursor:pointer" class="blog__title"><h4>{!!$data->title or ''!!}</h4></a>

                                <div class="blog__meta">
                                    <div class="author">
                                        <span class="fa fa-user"></span>
                                        <p>by <a style="cursor:pointer">{{$data->user->first_name}}</a></p>
                                    </div>
                                    <div class="date_time">
                                        <span class="fa fa-clock-o"></span>
                                        <p> {{(isset($data->created_at)) ? date('d M Y', strtotime($data->created_at)) : ''}}</p>
                                    </div>
                                    <div class="comment_view">
                                        <p class="comment"><span class="fa fa-comment-o"></span>{{count($data->comments)}}</p>
                                        <p class="view"><span class="fa fa-eye"></span>{{$data->views or 0}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="single_blog_content">
                              {!! $data->description or '' !!}
                            </div>
                        </article>
                    </div><!-- end /.single_blog -->
                    <div class="comment_area">
                        <div class="comment__title"><h4>{{count($data->approve_comments)}} comments</h4></div>
                        {{-- {{dd($data)}} --}}
                        @if(count($data->approve_comments)>0)
                          <div class="comment___wrapper">
                              <ul class="media-list">
                                @foreach($data->approve_comments as $comment)
                                  <li class="depth-1">
                                      <div class="media">
                                          {{-- <div class="pull-left no-pull-xs">
                                              <a href="#" class="cmnt_avatar">
                                                  <img src="images/comavatar.jpg" class="media-object" alt="Sample Image">
                                              </a>
                                          </div> --}}
                                          <div class="media-body">
                                              <div class="media_top">
                                                  <div class="heading_left pull-left">
                                                      <a style="cursor: pointer"><h4 class="media-heading">{{$comment->name}} <span style="font-size: 11px;position: relative;top: -2px;left: 10px;color: #00b140;">({{$comment->email}})</span></h4></a>
                                                      <span>{{date('M d, Y', strtotime($comment->created_at))}}</span>
                                                  </div>
                                                  
                                              </div>
                                              <p>{{$comment->comment}}</p>
                                          </div>
                                      </div>
                                  </li>
                                @endforeach
                              </ul>
                          </div><!-- end /.comment___wrapper -->
                        @else
                          <p align="center">No Comments</p>
                        @endif
                    </div><!-- end /.col-md-8 -->

                    <div class="comment_area comment--form">
                        <!-- start reply_form -->
                        <div class="comment__title">
                            <h4>Leave a Comment</h4>
                        </div>
                        <div class="commnet_form_wrapper">
                            <div class="row">
                                <!-- start form -->
                                <form class="cmnt_reply_form comment-form validate" method="post" novalidate>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="post_id" value="{{$data->id}}">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="input_field" type="text" name="name" placeholder="Name" required="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="input_field" type="email" name="email" placeholder="Email" required="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="input_field" required="" name="comment" placeholder="Your text here..." rows="10" cols="80" class="form-control"></textarea>
                                        </div>
                                        <div class="alert alert-success" style="display:none;">Thank You, Your Comment is send for appoval :)</div>
                                        <div class="alert alert-danger" style="display:none;">Sorry Something went worng, please try again :(</div>
                                        <button type="submit" class="btn-green-shadow comment-button">Submit Now</button>
                                    </div>
                                </form><!-- end form -->
                            </div>
                        </div><!-- end /.commnet_form_wrapper -->
                    </div><!-- end /.comment_area_wrapper -->
                </div><!-- end /.col-md-8 -->

                <div class="col-md-4">
                    <aside class="sidebar sidebar--blog">

                        <div class="sidebar-card card--blog_sidebar card--tags">
                            <div class="card-title">
                                <h4>Categories</h4>
                            </div>

                            <ul class="tags">
                                @if(count($category)> 0)
                                @for($i=0; $i<count($category); $i++)<li><a href="{{$category[$i]['slug']}}">{{$category[$i]['name']}}</a></li>@endfor
                                @endif
                            </ul><!-- end /.tags -->
                        </div><!-- end /.sidebar-card -->

                        <div class="sidebar-card sidebar--post card--blog_sidebar">
                            <div class="card-title">
                                <!-- Nav tabs -->
                                <ul class="post-tab" role="tablist">
                                   <li role="presentation" class="active"><a href="#latest" aria-controls="latest" role="tab" data-toggle="tab">Latest Posts</a></li>
                                </ul>
                            </div><!-- end /.card-title -->

                            <div class="card_content">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="latest">
                                        <ul class="post-list">
                                          @php $ii=0; @endphp
                                          @foreach(getblog() as $latest_blog)
                                            <li>
                                                <div class="thumbnail_img">
                                                    <img src="{{(isset($latest_blog->image))? url($latest_blog->image) :''}}" alt="{{$latest_blog->title or ''}}" style="height: 80px">
                                                </div>
                                                <div class="title_area">
                                                    <a href="{{(isset($latest_blog->slug))? url($latest_blog->slug) :''}}"><h4 style="margin-bottom: 0px;line-height:20px;">{!!(isset($latest_blog->title)) ? implode(' ', array_slice(str_word_count($latest_blog->title, 2), 0, 3)) : ''!!} ...</h4></a>
                                                    <div class="date_time">
                                                        <span class="fa fa-clock-o"></span>
                                                        <p>{{(isset($latest_blog->created_at)) ? date('d M Y', strtotime($latest_blog->created_at)) : ''}}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            @php $ii++; @endphp
                                            @if($ii>4) @php break; @endphp @endif
                                          @endforeach
                                        </ul><!-- end /.post-list -->
                                    </div><!-- end /.tabpanel -->
                                </div><!-- end /.tab-content -->
                            </div><!-- end /.card_content -->
                        </div><!-- end /.sidebar-card -->

                    </aside><!-- end /.aside -->
                </div><!-- end /.col-md-4 -->

            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>

@endsection


