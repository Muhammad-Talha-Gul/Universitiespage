@if(isset($data))
   @php $page = $data; @endphp
@endif
@if(isset($category_page))
	@php $page = $category_page; @endphp
@endif
@isset($page['seo']->show_meta)
@if($page['seo']->meta_title!=null) 
<meta name="title" content="{!! $page['seo']->meta_title!!}"> 
@else 
<meta name="title" content="Web Development Company in Pakistan, Affordable Website Design Services">
@endif
<meta name="keywords" content="{!!$page['seo']->meta_keywords or ''!!}">
<meta name="description" content="{!!$page['seo']->meta_description or ''!!}">
@endisset