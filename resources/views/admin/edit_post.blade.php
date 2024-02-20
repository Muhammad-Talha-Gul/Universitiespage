@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('plugins/summernote/summernote.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
<link href="{{asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
<link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset("plugins/select2/css/select2.min.css")}}" rel="stylesheet" type="text/css" />
<link href="{{asset("plugins/multiselect/css/multi-select.css")}}"  rel="stylesheet" type="text/css" />
<style>
    .products-form ul#product_tabs {border: 1px solid #f3f3f3;}
    .removeThis {margin: 5px auto !important; width: 100% !important;}
    .loader { position: absolute;width: 100%;height: 100%;z-index: 9999;text-align: center;background: #f7f7f7;opacity: 0.6;}
    .loader img {width: 50px;height: 50px;margin: auto;z-index: 99999999; }
    .ms-container {max-width: 100% !important;}
    /* Components Styling*/
    .ui-state-default {padding: 10px;margin-bottom: 10px;border-radius: 10px;}
    ul.components_list { width: 100%;list-style: none;display: inline-block;overflow: auto; white-space: nowrap; padding: 0px;margin: 0px;  }
    ul.components_list li { /*float: left;*/ display: inline-block; padding-right: 20px; margin: 0px;  }
    ul.components_list li a { text-align: center; padding: 0px; display: block; text-decoration: none;  }
    ul.components_list li a img { margin-bottom: 3px; }
    ul.components_list li a span { display: block; }
    .methods-list .row:nth-child(even) {margin-top: 5px;background: #f7f7f7;padding: 5px;border: 1px solid #ccc;}
    .methods-list .row:nth-child(odd) {margin-top: 5px;padding: 5px;border: 1px solid #ccc;}
    .deleteMethod {position: absolute;text-align: center;font-size: 25px;right: -7px;z-index: 99;top: -21px;} 
    ul.components_list::-webkit-scrollbar-track {-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);background-color: #F5F5F5;}
    ul.components_list::-webkit-scrollbar{height: 5px;background-color: #F5F5F5; cursor: pointer;}
    ul.components_list::-webkit-scrollbar-thumb {background-color: #782572;}
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit {{$type['name']}} </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li>
                        <a href="{{route('posts_lists',$type['slug'])}}">{{$type['name']}}</a>
                    </li>
                    <li class="active">
                        Edit {{$type['name']}}
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('update_post',['slug'=>$type['slug'],'id'=>$data['id']])}}" method="POST" enctype="multipart/form-data"> 
                {{csrf_field()}}
                <div class="card-box table-responsive">
                    <div class="tabs-vertical-env products-form">
                        <ul class="nav tabs-vertical" id="product_tabs">
                            <li class="active">
                                <a href="#t-basic" data-toggle="tab" aria-expanded="false">Basic Details</a>
                            </li>
                            @if(count($type->customAttribute)>0)
                            <li class="">
                                <a href="#t-attributes" data-toggle="tab" aria-expanded="false">Attributes</a>
                            </li>
                            @endif
                            @if($type['has_image_gallery']==1)
                            <li class="">
                                <a href="#v-gallery" data-toggle="tab" aria-expanded="false">Gallery</a>
                            </li>
                            @endif
                            {{-- <li class="">
                                <a href="#v-components" data-toggle="tab" aria-expanded="false">Components</a>
                            </li> --}}
                            @if($type['has_related']==1)
                            <li class="">
                                <a href="#v-related" id="related-tab" data-toggle="tab" aria-expanded="false">Related</a>
                            </li>
                            @endif
                            @if($type['has_post_seo']==1)
                            <li class="">
                                <a href="#t-seo" data-toggle="tab" aria-expanded="false">SEO</a>
                            </li>
                            @endif
                        </ul>
                        <div class="tab-content" style="width: 100%">
                            <div class="tab-pane active" id="t-basic">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="">
                                                <div class="form-group m-b-20">
                                                    <label>Post Title</label>
                                                    <input type="text" class="form-control" name="title" placeholder="Enter title" required value="{{$data['title']}}">
                                                    <input type="hidden" name="custom_post_type" value="{{$type['id']}}">
                                                </div>
                                                @if($type['is_category_enable']==1)
                                                <div class="form-group m-b-20">
                                                    <label>Category</label>
                                                    <select class="form-control select2" name="category_id">
                                                        <option value="">Select Category</option>
                                                        @foreach($categories as $cat)
                                                            <option value="{{$cat->id}}" {{($data['category_id']==$cat->id)?'selected':''}}>{{$cat->name}}</option>
                                                            @if(count($cat->childrens)>0)
                                                            <optgroup label="{{$cat->name}}">
                                                                @include('admin.cats', ['childrens' => $cat->childrens])
                                                            </optgroup>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @endif
                                                @if($type['has_brands']==1)
                                                <select class="form-control select2" name="brand_id">
                                                    <option value="">Select Brand</option>
                                                    @foreach($brands as $value)
                                                    <option value="{{$value->id}}" {{($value->id==$data['brand_id'])?'selected':''}}>{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                                @endif
                                                @if($type['has_desc']==1)
                                                <div class="form-group m-b-20">
                                                    <label>Short Description</label>
                                                    <textarea class="form-control" name="short_description">{{$data['short_description']}}</textarea>
                                                </div>
                                                @endif
                                                @if($type['has_long_desc']==1)
                                                <div class="form-group m-b-20">
                                                    <label>Description</label>
                                                    <textarea class="summernote" name="description">{!!$data['description']!!}</textarea>
                                                </div>
                                                @endif
                                                @if($type['has_author']==1)
                                                <div class="form-group m-b-20">
                                                    <label>Select Author</label>
                                                    <select class="form-control" name="user_id">
                                                        <option value="{{Auth::user()->id}}">Me ({{Auth::user()->first_name}})</option>
                                                        @foreach(showAuthors() as $value)
                                                        <option value="{{$value->id}}" {{($data['user_id']==$value->id)?'selected':''}}>{{$value->first_name.' '.$value->last_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @endif
                                                @if($type['has_featured_image']==1)
                                                @if(filter_var($data['image'], FILTER_VALIDATE_URL))
                                                <div class="form-group m-b-20">
                                                    <label>Featured Image</label>
                                                    <div class="image-placeholder" id="wfm" data-input="f-hidden" data-preview="f-holder">
                                                        <img src="{{$data['image']}}" id="f-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                                    </div>
                                                    <a href="javascript:void(0)" class="removeImage" data-hidden="f-hidden" data-holder="f-holder" style="display: none">Remove Image</a>
                                                    <input type="hidden" name="image" id="f-hidden" value="{{$data['image']}}">
                                                </div>
                                                @elseif(empty($data['image']))
                                                    <div class="form-group m-b-20">
                                                        <label>Featured Image</label>
                                                        <div class="image-placeholder" id="wfm" data-input="f-hidden" data-preview="f-holder">
                                                            <img src="{{asset("placeholder.jpg")}}" id="f-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                                        </div>
                                                        <a href="javascript:void(0)" class="removeImage" data-hidden="f-hidden" data-holder="f-holder" style="display: none">Remove Image</a>
                                                        <input type="hidden" name="image" id="f-hidden">
                                                    </div>
                                                    @else
                                                    <div class="form-group m-b-20">
                                                        <label>Featured Image</label>
                                                        <div class="image-placeholder" id="wfm" data-input="f-hidden" data-preview="f-holder">
                                                            <img src="{{url($data['image'])}}" id="f-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                                        </div>
                                                        <a href="javascript:void(0)" class="removeImage" data-hidden="f-hidden" data-holder="f-holder" style="display: none">Remove Image</a>
                                                        <input type="hidden" name="image" id="f-hidden" value="{{$data['image']}}">
                                                    </div>
                                                    @endif
                                                @endif
                                                @if($type['show_sku']==1)
                                                <div class="form-group m-b-20">
                                                    <label>SKU</label>
                                                    <input type="text" name="sku" class="form-control" placeholder="SKU" value="{{$data['sku']}}">
                                                </div>
                                                @endif
                                                @if($type['show_unit']==1)
                                                <div class="form-group m-b-20">
                                                    <label>Unit</label>
                                                    <input type="text" name="unit" class="form-control" placeholder="ex kg, pcs etc" value="{{$data['unit']}}">
                                                </div>
                                                @endif
                                                {{-- @if($type['show_quantity']==1)
                                                <div class="form-group m-b-20">
                                                    <label>Quantity</label>
                                                    <input type="number" name="quantity" class="form-control" min="0" value="{{$data['quantity']}}" required>
                                                </div>
                                                @endif --}}
                                                @if($type['show_price']==1)
                                                <div class="form-group m-b-20">
                                                    <label>Price</label>
                                                    <input type="number" id="regular-price" class="form-control" name="price" min="0" value="{{$data['price']}}" required>
                                                </div>
                                                <div class="form-group m-b-20">
                                                    <label>Discounted Price</label>
                                                    <input type="number" id="discounted-price" class="form-control" name="discounted_price" min="0" value="{{$data['discounted_price']}}">
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(count($type->customAttribute)>0)
                            <div class="tab-pane" id="t-attributes">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="">
                                                @foreach($type->customAttribute as $k => $attr)
                                                    @if($attr->input_type=='text')
                                                    <div class="form-group m-b-20">
                                                        <label>{{$attr->attribute_name}}</label>
                                                        <input type="text" class="form-control" name="attributes[{{$attr->attribute_slug}}]" value="{{(isset($attributes[$attr->attribute_slug])?$attributes[$attr->attribute_slug]:'')}}" placeholder="{{$attr->attribute_name}}">
                                                    </div>
                                                    @elseif($attr->input_type=='textarea')
                                                    <div class="form-group m-b-20">
                                                        <label>{{$attr->attribute_name}}</label>
                                                        <textarea class="form-control" name="attributes[{{$attr->attribute_slug}}]" placeholder="{{$attr->attribute_name}}">{{(isset($attributes[$attr->attribute_slug])?$attributes[$attr->attribute_slug]:'')}}</textarea>
                                                    </div>
                                                    @elseif($attr->input_type=='select')
                                                    <div class="form-group m-b-20">
                                                        <label>{{$attr->attribute_name}}</label>
                                                        <select class="form-control" name="attributes[{{$attr->attribute_slug}}]">
                                                            @foreach(explode(",", $attr->attribute_data) as $value)
                                                            <option value="{{$value}}" {{($attributes[$attr->attribute_slug]==$value)?'selected':''}}>{{$value}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @elseif($attr->input_type=='radio')
                                                    <div class="form-group m-b-20">
                                                        <label>{{$attr->attribute_name}}</label>
                                                        @foreach(explode(",", $attr->attribute_data) as $value)
                                                        <div class="radio radio-primary">
                                                            <input type="radio" name="attributes[{{$attr->attribute_slug}}]" value="{{$value}}" {{($attributes[$attr->attribute_slug]==$value)?'checked':''}}>
                                                            <label>{{$value}}</label>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    @elseif($attr->input_type=='checkbox')
                                                    <div class="form-group m-b-20">
                                                        <label>{{$attr->attribute_name}}</label>
                                                        @foreach(explode(",", $attr->attribute_data) as $value)
                                                        <div class="checkbox checkbox-primary">
                                                            <input type="checkbox" name="attributes[{{$attr->attribute_slug}}][]" value="{{$value}}" {{(in_array($value, $attributes[$attr->attribute_slug]))?'checked':''}}>
                                                            <label>{{$value}}</label>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    @elseif($attr->input_type=='editor')
                                                    <label>{{$attr->attribute_name}}</label>
                                                    <textarea class="summernote" name="attributes[{{$attr->attribute_slug}}]">{!!(isset($attributes[$attr->attribute_slug]))?$attributes[$attr->attribute_slug]:''!!}</textarea>
                                                    @elseif($attr->input_type=='date')
                                                    <label>{{$attr->attribute_name}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control datepicker-autoclose" name="attributes[{{$attr->attribute_slug}}]" id="datepicker-autoclose" value="{{(isset($attributes[$attr->attribute_slug])?$attributes[$attr->attribute_slug]:'')}}">
                                                        <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                                    </div>
                                                    @elseif($attr->input_type=='email')
                                                    <div class="form-group m-b-20">
                                                        <label>{{$attr->attribute_name}}</label>
                                                        <input type="email" class="form-control" name="attributes[{{$attr->attribute_slug}}]" value="{{(isset($attributes[$attr->attribute_slug])?$attributes[$attr->attribute_slug]:'')}}">
                                                    </div>
                                                    @elseif($attr->input_type=='number')
                                                    <div class="form-group m-b-20">
                                                        <label>{{$attr->attribute_name}}</label>
                                                        <input type="number" class="form-control" name="attributes[{{$attr->attribute_slug}}]" value="{{(isset($attributes[$attr->attribute_slug])?$attributes[$attr->attribute_slug]:'')}}">
                                                    </div>
                                                    @elseif($attr->input_type=='color')
                                                    <div class="form-group m-b-20">
                                                        <label>{{$attr->attribute_name}}</label>
                                                        <input type="text" class="colorpicker-default form-control" name="attributes[{{$attr->attribute_slug}}]" value="{{(isset($attributes[$attr->attribute_slug])?$attributes[$attr->attribute_slug]:'')}}">
                                                    </div>
                                                    @elseif($attr->input_type=='tags')
                                                    <div class="form-group m-b-20">
                                                        <label>{{$attr->attribute_name}} <small>(comma seperated)</small></label>
                                                        <input type="text" data-role="tagsinput" placeholder="add {{$attr->attribute_name}}" name="attributes[{{$attr->attribute_slug}}]" value="{{(isset($attributes[$attr->attribute_slug])?$attributes[$attr->attribute_slug]:'')}}">
                                                    </div>
                                                    @elseif($attr->input_type=='questions')
                                                    <label>{{$attr->attribute_name}}</label>
                                                    <div id="{{$attr->attribute_slug}}">
                                                        @if(isset($attributes[$attr->attribute_slug]['questions']))
                                                        @foreach($attributes[$attr->attribute_slug]['questions'] as $key => $value)
                                                        <div class="row" id="attr_{{$key}}">
                                                            <div class="col-md-5">
                                                              <div class="form-group m-b-20">
                                                                <input type="text" class="form-control" placeholder="Title" name="attributes[{{$attr->attribute_slug}}][questions][]" value="{{$value}}">
                                                              </div>  
                                                            </div>
                                                            <div class="col-md-5">
                                                              <div class="form-group m-b-20">
                                                                <input type="text" class="form-control" placeholder="Value" name="attributes[{{$attr->attribute_slug}}][answers][]" value="{{(isset($attributes[$attr->attribute_slug]['answers'][$key])?$attributes[$attr->attribute_slug]['answers'][$key]:'')}}">
                                                              </div>  
                                                            </div>
                                                            <div class="col-md-2"><a href="javascript:void(0)" onclick="delete_attr({{$key}})" class="btn btn-danger btn-sm">Delete</a></div>
                                                        </div>
                                                        @endforeach
                                                        @endif
                                                    </div>
                                                    <a href="javascript:void(0)" class="btn btn-success add-attrs" data-id="{{$attr->attribute_slug}}">Add</a> 
                                                    <hr>
                                                    @elseif($attr->input_type=='file')
                                                    @if(isset($attributes[$attr->attribute_slug]))
                                                    <div class="form-group m-b-20">
                                                        <label>{{$attr->attribute_name}}</label>
                                                        <div class="image-placeholder" id="wfm" data-input="f{{$k}}-hidden" data-preview="f{{$k}}-holder">
                                                            <img src="{{url($attributes[$attr->attribute_slug])}}" id="f{{$k}}-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                                        </div>
                                                        <a href="javascript:void(0)" class="removeImage" data-hidden="f{{$k}}-hidden" data-holder="f{{$k}}-holder" style="display: none">Remove Image</a>
                                                        <input type="hidden" name="attributes[{{$attr->attribute_slug}}]" id="f{{$k}}-hidden" value="{{$attributes[$attr->attribute_slug]}}">
                                                    </div>
                                                    @else
                                                    <div class="form-group m-b-20">
                                                        <label>{{$attr->attribute_name}}</label>
                                                        <div class="image-placeholder" id="wfm" data-input="f{{$k}}-hidden" data-preview="f{{$k}}-holder">
                                                            <img src="{{asset('placeholder.jpg')}}" id="f{{$k}}-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                                        </div>
                                                        <a href="javascript:void(0)" class="removeImage" data-hidden="f{{$k}}-hidden" data-holder="f{{$k}}-holder" style="display: none">Remove Image</a>
                                                        <input type="hidden" name="attributes[{{$attr->attribute_slug}}]" id="f{{$k}}-hidden">
                                                    </div>
                                                    @endif
                                                    @endif
                                                @endforeach                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($type['has_image_gallery']==1)
                            <div class="tab-pane" id="v-gallery">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="">
                                                {{-- <div class="form-group m-b-20">
                                                    <label>Select Images</label>
                                                    <input type="file" name="images[]" id="filer_input2">
                                                </div> --}}
                                                <div class="form-group">
                                                    <select id="noofdivs" class="form-control" style="max-width: 10%; display: inline;">
                                                        @for($i=1; $i<=5; $i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                    <a href="javascript:void" id="addDivs" class="btn btn-sm btn-info">Add</a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="row" id="g-divs">
                                                    @if(isset($gallery['image']))
                                                    @foreach($gallery['image'] as $key => $value)
                                                    <div class="col-md-3">
                                                        <div class="image-placeholder" id="wfm" data-input="g{{$key}}-hidden" data-preview="g{{$key}}-holder">
                                                            <img src="{{url("$value")}}" id="g{{$key}}-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                                                        </div>
                                                        <input type="text" name="gallery[sort_order][]" class="form-control" value="{{$gallery['sort_order'][$key] or 0}}">
                                                        <a href="javascript:void(0)" class="removeThis btn-danger btn-xs text-center" data-hidden="g{{$key}}-hidden" data-holder="g{{$key}}-holder"><i class="fa fa-trash-o"></i> Remove</a>
                                                        <input type="hidden" name="gallery[image][]" id="g{{$key}}-hidden" value="{{$value}}">
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($type['has_related']==1)
                            <div class="tab-pane" id="v-related">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="" id="related-posts" style="position: relative;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            {{-- <div class="tab-pane" id="v-components">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-box table-responsive" style="padding: 0px 20px;">
                                            <ul class="components_list">
                                                <li>
                                                    <a href="javascript:void(0)" class="component" data-comp="ads">
                                                    <img class="icon-colored" src="{{asset("assets_backend/images/icons/stack_of_photos.svg")}}">
                                                    <span>Ads/Banners</span></a>
                                                </li>                                                
                                                <li>
                                                    <a href="javascript:void(0)" class="component" data-comp="editor">
                                                        <img class="icon-colored" src="{{asset("assets_backend/images/icons/survey.svg")}}">
                                                        <span>Editor</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="component" data-comp="banners">
                                                        <img class="icon-colored" src="{{asset("assets_backend/images/icons/template.svg")}}">
                                                        <span>Dual Images</span>
                                                    </a>
                                                </li>
                                              </ul>
                                        </div>
                                        <div class="card-box table-responsive">
                                            <div class="row" id="components">
                                                @foreach($components as $key => $value)
                                                @if($value->type=="ads")
                                                @component('admin.components.ads',['rand'=>$key,'banners'=>$banners,'meta'=>$value['meta']]) {{$value->title}} @endcomponent

                                                @elseif($value->type=="editor")
                                                @component('admin.components.editor',['rand'=>$key,'meta'=>$value['meta']]) {{$value->title}} @endcomponent

                                                @elseif($value->type=="banners")
                                                @component('admin.components.banners',['rand'=>$key,'meta'=>$value['meta']]) {{$value->title}} @endcomponent

                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            @if($type['has_post_seo']==1)
                            <div class="tab-pane" id="t-seo">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="p-20">
                                            <div class="">
                                                <div class="form-group m-b-20">
                                                    <label>Meta Title</label>
                                                    <input type="text" name="meta_title" class="form-control" maxlength="60" placeholder="Meta Title" value="{{$data['meta_title']}}">
                                                </div>
                                                <div class="form-group m-b-20">
                                                    <label>Meta Description</label>
                                                    <textarea type="text" name="meta_description" class="form-control" maxlength="255" placeholder="Meta Description">{{$data['meta_description']}}</textarea>
                                                </div>
                                                <div class="form-group m-b-20">
                                                    <label>Meta Keywords <small>(comma seperated)</small></label>
                                                    <input type="text" name="meta_keywords" data-role="tagsinput" placeholder="add tag" value="{{$data['meta_keywords']}}">
                                                </div>
                                                <div class="form-group m-b-20">
                                                    <label>Link Canonical</label>
                                                    <input type="text" name="link_canonical" class="form-control" placeholder="Link Canonical" value="{{$data['link_canonical']}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <div class="checkbox checkbox-primary">
                                <input type="checkbox" name="is_active" value="1" {{($data['is_active']==1)?'checked':''}}>
                                <label>Active</label>
                            </div>
                        </div>
                        {{-- <div class="form-group col-md-3">
                            <div class="checkbox checkbox-primary">
                                <input type="checkbox" name="best_seller" value="1" {{($data['best_seller']==1)?'checked':''}}>
                                <label>Best Seller</label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="checkbox checkbox-primary">
                                <input type="checkbox" name="top_rated" value="1" {{($data['top_rated']==1)?'checked':''}}>
                                <label>Top Rated</label>
                            </div>
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Save">
                            <a href="javascript:void(0)" class="btn btn-danger" onclick="deleteit()">Delete</a>
                            <a href="{{route('posts_lists',$type['slug'])}}" class="btn btn-success">Back</a>
                        </div>
                    </div>
                </div>
            </form>
            <form action="{{route('delete_post',$data['id'])}}" method="POST" id="delete-form">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="type" value="{{$type['slug']}}">
                {{csrf_field()}}
            </form>
        </div>
    </div>

</div>
@endsection
@section('customScripts')
<script src="{{asset('plugins/summernote/summernote.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset("plugins/select2/js/select2.min.js")}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset("plugins/multiselect/js/jquery.multi-select.js")}}"></script>
<script type="text/javascript" src="{{asset("plugins/jquery-quicksearch/jquery.quicksearch.js")}}"></script>
<script type="text/javascript">
jQuery('.datepicker-autoclose').datepicker({
    autoclose: true,
    todayHighlight: true,
});
jQuery(document).ready(function(){
    $(".select2").select2();
    $('.colorpicker-default').colorpicker({
        format: 'hex'
    });
    $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});

    $(document).on('click',".add-attrs",function(){
        var id = $(this).data('id');
        count = Math.floor(Math.random() * 100);
        var _html = `<div class="row" id="attr_`+count+`">
                        <div class="col-md-5">
                          <div class="form-group m-b-20">
                            <input type="text" class="form-control" placeholder="Title" name="attributes[`+id+`][questions][]">
                          </div>  
                        </div>
                        <div class="col-md-5">
                          <div class="form-group m-b-20">
                            <input type="text" class="form-control" placeholder="Value" name="attributes[`+id+`][answers][]">
                          </div>  
                        </div>
                        <div class="col-md-2"><a href="javascript:void(0)" onclick="delete_attr(`+count+`)" class="btn btn-danger btn-sm">Delete</a></div>
                    </div>`;
        $("#"+id).append(_html);
    });
    $("#delete-feature").on('click',function(){
        $('#features .f-item:last').fadeOut().remove();
        if($(".f-item").length>0){
            $(this).show(300);
        } else {
            $(this).hide(300);
        }
    });
});
function delete_attr(key){
        $("#attr_"+key).hide(300).remove();
    }
    $("#addDivs").on('click',function(){
        var $num = $("#noofdivs").val();
        for (var i=1; i<=$num; i++) {
          var $count = Math.floor(Math.random() * 10);
          $("#g-divs").append(`<div class="col-md-3">
                        <div class="image-placeholder" id="wfm" data-input="g`+$count+`-hidden" data-preview="g`+$count+`-holder">
                            <img src="{{asset('placeholder.jpg')}}" id="g`+$count+`-holder" class="img-responsive img-selection img-thumbnail" style="max-height:300px">
                        </div>
                        <input type="text" name="gallery[sort_order][]" class="form-control" placeholder="Sort Order">
                        <a href="javascript:void(0)" class="removeThis btn-danger btn-xs text-center" data-hidden="g`+$count+`-hidden" data-holder="g`+$count+`-holder"><i class="fa fa-trash-o"></i> Remove</a>
                        <input type="hidden" name="gallery[image][]" id="g`+$count+`-hidden">
                    </div>`);
        }
        $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});
    });
    $(document).on('click',".removeThis",function(){
        $(this).parent().remove();
    });
</script>
<script>
    // Define function to open filemanager window
    var lfm = function(options, cb) {
        var route_prefix = (options && options.prefix) ? options.prefix : '{{url('/filemanager')}}';
        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = cb;
    };
    
    // Define LFM summernote button
    var LFMButton = function(context) {
        var ui = $.summernote.ui;
        var button = ui.button({
            contents: '<i class="note-icon-picture"></i> ',
            tooltip: 'Insert image with filemanager',
            click: function() {
        
                lfm({type: 'image', prefix: '{{url('/filemanager')}}'}, function(url, path) {
                    context.invoke('insertImage', url);
                });

            }
        });
        return button.render();
    };
$(document).ready(function(){
    
    // Initialize summernote with LFM button in the popover button group
    // Please note that you can add this button to any other button group you'd like
    $('.summernote').summernote({
        height: 240,
        minHeight: null,
        maxHeight: null,
        focus: false,
        toolbar: [
            ['popovers', ['lfm']],
            ['style', ['style']],
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['misc',['codeview']]
        ],
        buttons: {
            lfm: LFMButton
        }
    })
   
});
function deleteit() {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this!",
        type: "error",
        showCancelButton: true,
        cancelButtonClass: 'btn-default btn-md waves-effect',
        confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
        confirmButtonText: 'Delete!',
    },function() {
          $("#delete-form").submit();
    });
}
$(document).on('click',"#related-tab",function(){
        $("#related-posts").html(`<div class="loader"><img src="{{asset("loading.gif")}}"></div>`);
        var data = { "_token":"{{csrf_token()}}",'id':{{$data['id']}} };
        $.ajax({
            url: "{{route('getRelatedPosts',$type['slug'])}}",
            type:'POST',
            data:data,
            success: function(data)
            {
                $("#related-posts").html(data);
                $("#related-tab").removeAttr('id');
                $('.multiselect').multiSelect({
                    selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    afterInit: function (ms) {
                        var that = this,
                            $selectableSearch = that.$selectableUl.prev(),
                            $selectionSearch = that.$selectionUl.prev(),
                            selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                            selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                        that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                            .on('keydown', function (e) {
                                if (e.which === 40) {
                                    that.$selectableUl.focus();
                                    return false;
                                }
                            });

                        that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                            .on('keydown', function (e) {
                                if (e.which == 40) {
                                    that.$selectionUl.focus();
                                    return false;
                                }
                            });
                    },
                    afterSelect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    },
                    afterDeselect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    }
                });
            }
        });
    });
    $(document).on('focusout','#discounted-price',function(){
        if($(this).val()>=$("#regular-price").val()){
            alert("Discounted can't be equal or greater than Regular Price");
            $(this).val("");
        }
    });

    /* Components Scripts */
jQuery(document).ready(function(){
    $(".select2").select2();
    $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});
    $("#components").sortable({
      handle: ".handle",
      axis: 'y'
    });
    $('.summernote').summernote({
            height: 240,
            minHeight: null,
            maxHeight: null,
            focus: false,
            toolbar: [
                ['popovers', ['lfm']],
                ['style', ['style']],
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['link', ['linkDialogShow', 'unlink']],
                ['misc',['codeview']]
            ],
            buttons: {
                lfm: LFMButton
            }
        });
    $(".component").click(function(){
        var data = { '_token':"{{csrf_token()}}", 'comp':$(this).data('comp') };
        jQuery.ajax({
            url:'{{route("getPostComponent")}}',
            type: 'post',
            dataType: 'html',
            data: data,
            success: function( data ){
                $("#components").append(data);
                $(".select2").select2();
                $('.summernote').summernote({
                    height: 240,
                    minHeight: null,
                    maxHeight: null,
                    focus: false,
                    toolbar: [
                        ['popovers', ['lfm']],
                        ['style', ['style']],
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        ['link', ['linkDialogShow', 'unlink']],
                        ['misc',['codeview']]
                    ],
                    buttons: {
                        lfm: LFMButton
                    }
                });
                $('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});
            }
        });
    });
});
$(document).on('change','.columns_selection',function(){
    var i; var html = ""; var rand = $(this).data('rand'); var placement = $(this).data('placement');
    for (i = 1; i <= $(this).val(); i++) { 
        html+=`<div class="form-group col-md-12"><textarea class="summernote" name="components[`+rand+`][editor][content_`+i+`]">Column `+i+`</textarea></div>`;
    }
    $("#"+placement).html(html);
    $('.summernote').summernote({
        height: 240,
        minHeight: null,
        maxHeight: null,
        focus: false,
        toolbar: [
            ['popovers', ['lfm']],
            ['style', ['style']],
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['link', ['linkDialogShow', 'unlink']],
            ['misc',['codeview']]
        ],
        buttons: {
            lfm: LFMButton
        }
    });
});
</script>
@endsection