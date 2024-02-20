<ul>
@foreach($childrens as $child)
    <li style="display: none">
        {{ $child->name }}
    @if(count($child->childrens))
            @include('ajax.cats_tree', ['childrens' => $child->childrens])
        @endif
    </li>
@endforeach
</ul>