<ul class="{{$class}}">
	@foreach($childs->where('is_active',1)->take(7) as $child)
    <li class=""><a href="{{route('category_page',$child->slug)}}"><span>{{$child->name}}</span></a>
        @if(count($child->childrens)>0)
        @component('includes.frontend.cats',['class'=>'level1','childs'=>$child->childrens])
        @endcomponent
        @endif
    </li>
    @endforeach
</ul>