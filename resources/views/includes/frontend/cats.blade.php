<ul class="{{$class}}">
  @foreach($childs->where('is_active',1)->take(13) as $child)
    <li class=""><a href="{{route('category_page',$child->slug)}}"><span>{{$child->name}}</span></a>
        @if(count($child->childrens->where('is_active',1))>0)
        @component('includes.frontend.cats',['class'=>'mlevel3','childs'=>$child->childrens])
        @endcomponent
        @endif
    </li>
    @endforeach
</ul>