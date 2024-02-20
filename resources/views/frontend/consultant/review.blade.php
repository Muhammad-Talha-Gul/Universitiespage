@if(count($reviews)>0)
	@if(auth()->check())
	@foreach($reviews->where('user_id', auth()->user()->id) as $review)
		<a href="javascript:void(0);" class="o-blockLink">
		  <article class="c-bgLight-hoverDark border rounded p-3 mb-3 p-relative" style="background-color:#ffffff;border: 1px solid #c52228!important;">
		    <header class="pb-2">
		      <span class="text-primary">
		         @for($i=0; $i<$review->stars; $i++)<i class="fa fa-star-o"></i>@endfor
		        <span class="sr-only">{{$review->stars}}/5</span>
		      </span>
		    </header>
		    <div class="text-muted small">By You - {{date("dS M, Y h:i a", strtotime($review->created_at))}}</div>
		    <span class="font-italic read-less">
		      {!!implode(' ', array_slice(str_word_count($review->review, 2), 0, 20))!!}
		    </span>
		    <span class="font-italic read-more" style="display: none;">
		      {{$review->review}}
		    </span>
		    @if(str_word_count($review->review)>=20)
		    <small class="text-primary read-more-btn">... Read more</small>
		    @endif
		    <span class="remove-approval" onclick="deleteReview({{$review->id}}, {{$review->university_id}})"> Remove</span>
		  </article>
		</a>
		<div class="clearfix"></div>
	@endforeach
	@endif
	@foreach($reviews->where('user_id','!=', (auth()->user()->id)??'0') as $review)
		<a href="javascript:void(0);" class="o-blockLink">
		  <article class="c-bgLight-hoverDark border rounded p-3 mb-3 p-relative">
		    <header class="pb-2">
		      <span class="text-primary">
		         @for($i=0; $i<$review->stars; $i++)<i class="fa fa-star-o"></i>@endfor
		        <span class="sr-only">{{$review->stars}}/5</span>
		      </span>
		    </header>
		    <div class="text-muted small">By {{$review->users->students->name}} - {{date("dS M, Y h:i a", strtotime($review->created_at))}}</div>
		    <span class="font-italic read-less">
		      {!!implode(' ', array_slice(str_word_count($review->review, 2), 0, 20))!!}
		    </span>
		    <span class="font-italic read-more" style="display: none;">
		      {{$review->review}}
		    </span>
		    @if(str_word_count($review->review)>=20)
		    <small class="text-primary read-more-btn">... Read more</small>
		    @endif
		  </article>
		</a>
		<div class="clearfix"></div>
	@endforeach
@else
<p class="not-found">No Reviews</p>
@endif