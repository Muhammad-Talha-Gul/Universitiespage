@extends('layouts.frontend')
@section('title',(isset($data['seo']->meta_title))?$data['seo']->meta_title:$data['title'])
@section('seo')
  @isset($data['seo']->show_meta)
  <meta name="keywords" content="{!!$data['seo']->meta_keywords or ''!!}">
  <meta name="description" content="{!!$data['seo']->meta_description or ''!!}">
  @endisset
@endsection
@section('customStyles')
<style type="text/css">
  {!! (isset($data['custom_css']))?$data['custom_css']:'' !!}
</style>
@endsection
@section('content')


    <div class="bg-light">
      @if(request()->path()!=='/' && request()->path()!==null)
      <nav class="container o-breadcrumb top-link-main">
        <a class="o-breadcrumb-item top-link" href="{{url('/')}}">Home</a>
        <a class="o-breadcrumb-item top-link" href="{{url($data->slug)}}">{{$data->title}}</a>
      </nav>
      @endif
        
      @foreach($components as $key => $value) 

        @if($value->type=='search')

          @component('frontend.components.search',['meta'=>$value->meta]) {{$value->title}} @endcomponent

        @elseif($value->type=="buttons")

          @component('frontend.components.buttons',['meta'=>$value->meta]) {{$value->title}} @endcomponent
        
        @elseif($value->type=="programs")
          @component('frontend.components.programs',['meta'=>$value->meta]) {{$value->title}} @endcomponent

        @elseif($value->type=="editor")
          @component('frontend.components.editor',['class'=>$key,'meta'=>$value->meta]) {{$value->title}} @endcomponent

        @elseif($value->type=="banner")

          @component('frontend.components.banner',['class'=>$key,'meta'=>$value->meta,'blog'=>(isset($blog))?$blog:null]) {{$value->title}} @endcomponent

        @elseif($value->type=="blog")
          @component('frontend.components.blog',['class'=>$key,'meta'=>$value->meta,'blog'=>(isset($blog))?$blog:null]) {{$value->title}} @endcomponent
        @elseif($value->type=="guide")
          @component('frontend.components.guide',['class'=>$key,'meta'=>$value->meta,'blog'=>(isset($blog))?$blog:null]) {{$value->title}} @endcomponent

        @elseif($value->type=="popular")
          @component('frontend.components.popular',['class'=>$key,'meta'=>$value->meta]) {{$value->title}} @endcomponent

        @elseif($value->type=="consultant")
          @component('frontend.components.consultant',['class'=>$key,'meta'=>$value->meta]) {{$value->title}} @endcomponent

        @elseif($value->type=="institution")
          @component('frontend.components.institution',['class'=>$key,'meta'=>$value->meta]) {{$value->title}} @endcomponent

        @elseif($value->type=="contact")
          @component('frontend.components.contact',['class'=>$key,'meta'=>$value->meta]) {{$value->title}} @endcomponent

        @elseif($value->type=="login")
          @component('frontend.components.login',['class'=>$key,'meta'=>$value->meta]) {{$value->title}} @endcomponent

        @elseif($value->type=="register")
          @component('frontend.components.register',['class'=>$key,'meta'=>$value->meta]) {{$value->title}} @endcomponent

        @elseif($value->type=="courses")
          @component('frontend.components.courses',['class'=>$key,'meta'=>$value->meta]) {{$value->title}} @endcomponent

        @elseif($value->type=="spacer")
          @if(isset($value->meta['style']) && $value->meta['style']==2)
          <hr style="clear: both; margin-top: {{$value->meta['space'] or 0}}px;">
          @else
          <div class="spacer" style="display: block; clear: both; margin-top: {{$value->meta['space'] or 0}}px "></div>
          @endif

        @endif
      @endforeach

      
    </div>


@endsection