@if(isset($meta['style']) && $meta['style']==1)
<section>
    <div class="container mb40">
        <ul class="product-cat-list">
            @isset($meta['image'])
            @foreach($meta['image'] as $key => $value)
            <li>
                <img @if(!empty($value)) src="{{url($value)}}" @endif>
                <div class="cs-title"><h3>{{$meta['text'][$key] or ''}}</h3></div>
                @isset($meta['btntext'][$key])
                <a href="{{$meta['btnlink'][$key] or '#'}}" class="s-btn-encased">{{$meta['btntext'][$key]}}</a>
                @endisset
            </li>
            @endforeach
            @endisset            
        </ul>
    </div>
</section>
@else
@endif