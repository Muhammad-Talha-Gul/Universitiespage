<ul>
@foreach($childrens as $child)
    <li style="display: none">
        <span class="menu-item" data-id="{{$child->id}}">{{ $child->title }}</span>
    @if(count($child->childrens))
            @include('ajax.menu_tree', ['childrens' => $child->childrens])
        @endif
    </li>
@endforeach
</ul>