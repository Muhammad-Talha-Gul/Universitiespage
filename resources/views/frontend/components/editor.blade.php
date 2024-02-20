<!-- <div class="section paddingbot-clear @if(isset($meta['styled']) && $meta['styled']==1) regular_service_area @endif">
  <div class="@if(isset($meta['full_width']) && $meta['full_width']==1) @else container @endif">
     <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        @isset($slot)<h3>{{$slot or ''}}</h3>@endisset($slot)
      </div>
      @if(isset($meta['columns']))
      @for($i=1;$i<=$meta['columns'];$i++)
      <div class="col-sm-12 col-md-{{12/(int)$meta['columns']}} col-lg-{{12/(int)$meta['columns']}}">
        {!! $meta['content_'.$i] or ''!!}
      </div>
      @endfor
      @else
      <div class="col-sm-12 col-md-12 col-lg-12">
        {!! $meta['content_1'] or ''!!}
      </div>
      @endif
    </div>
  </div>
</div>
<div class="clearfix"></div> -->