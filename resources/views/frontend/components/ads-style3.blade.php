<div class="promo-banner-section container wow bounceInUp animated">
	<div class="row">
	@isset($meta->meta)
    @php $data = json_decode($meta->meta,true); @endphp
	  <div class="col-lg-12"> <a href="{{$data['link'] or '#'}}"> @if(isset($data['image'])) <img alt="promo-banner3" src="{{url($data['image'])}}">@endif</a></div>
  	@endisset
	</div>
</div>