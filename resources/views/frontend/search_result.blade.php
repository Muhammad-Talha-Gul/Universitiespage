@extends('layouts.frontend')
@section('title','Search Results | Changhong Ruba')
@section('customStyles')

@endsection
@section('content')
<section class="banner_area">
  <div class="banner_inner_text">
      <h3 class="line-title">Search Result for "{{$_GET['q'] or ''}}"</h3>
      <ul>
          <li><a href="{{url('/')}}">Home</a></li>
          <li><a href="#">Search Result</a></li>
      </ul>
  </div>
</section>

<section>
    <div class="container-fluid category-contains">
        <div class="row">
            <div class="col-md-push-3 col-sm-12 col-md-9">
                <div class="row">
                  @if(!empty($data))
                  @foreach($data as $key => $value)
                    <div class="col-sm-6 col-md-4">
                        <div class="item item-carousel">
                               <div class="products">
                                  <div class="product">
                                     <div class="product-image">
                                        <div class="image">
                                         <a  href="{{route('product_detail',$value->slug)}}">
                                            <img @if(!empty($value->image)) src="{{url($value->image)}}" @endif  alt="university"></a> 
                                        </div>
                                        <!-- /.image -->
                                     </div>
                                     <!-- /.product-image -->
                                     <div class="product-info text-center">
                                        <h3 class="name"><a href="{{route('product_detail',$value->slug)}}">{{$value->title}}</a></h3>
                                        {{-- <div class="rating rateit-small"></div> --}}
                                        <div class="description"></div>
                                        <div class="product-price"> <span class="price">PKR {{$value->price}}</span>  </div>
                                        <!-- /.product-price --> 
                                     </div>
                                     <!-- /.product-info -->
                                     <div class="cart clearfix animate-effect">
                                        <div class="action">
                                           <ul class="list-unstyled">
                                              <li class="add-cart-button btn-group">
                                                 <button class="btn btn-primary icon addToCart" data-pid="3107" data-price="13500" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                 <button class="btn btn-primary cart-btn addToCart" data-pid="3107" data-price="13500" type="button">Add to cart</button>
                                              </li>
                                              {{-- <li class="lnk wishlist"> <a class="add-to-cart add-to-wishlist" href="javascript:;" data-pid="3107" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li> --}}
                                              <li class="lnk"> <a class="add-to-cart quick-view" href="{{route('product_detail',$value->slug)}}" title="Quick View"> <i class="fa fa-search-plus" aria-hidden="true"></i> </a> </li>
                                           </ul>
                                        </div>
                                        <!-- /.action --> 
                                     </div>
                                     <!-- /.cart --> 
                                  </div>
                                  <!-- /.product --> 
                               </div>
                               <!-- /.products --> 
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>  
                               
            </div><!-- sm-8 -->
            <div class="col-md-pull-9  col-sm-12 col-md-offset-1 col-md-2">
                <div class="side-products">
                <h3>Categories</h3>
                <ul> 
                  @foreach($categories as $value)   
                    <li>
                        <a href="{{route('category_page',$value->slug)}}">{{$value->name}}</a>
                        @if(count($value->childrens->where('is_active',1))>0)
                        <ul>  
                          @foreach($value->childrens->where('is_active',1) as $child)
                            <li><a href="{{route('category_page',$child->slug)}}">{{$child->name}}</a></li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
            </div>
            
        </div>
    </div>
    </section>

@endsection
@section('customScripts')
@endsection