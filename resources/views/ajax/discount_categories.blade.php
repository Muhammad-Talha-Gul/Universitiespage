<div class="form-group pull-right" style="margin-bottom: 10px;">
    <form action="#" method="POST" id="category_form" form="category_form">{{csrf_field()}}</form>
    @if(isset($discount['id'])) <input type="hidden" name="discount_id" form="category_form" value="{{$discount['id']}}"> @endif
    <input type="hidden" name="div" form="category_form" value="{{$div}}">
    <input type="hidden" name="name" form="category_form" value="{{$name}}">
    <a class="btn btn-primary btn-sm" id="addCategories">Add (<span id="catsCount">0</span>)</a>
</div>
<div class="clearfix"></div>
<table class="table fetchedCategories">
    <thead>
        <tr>
            <th><input type="checkbox" id="check_cats"></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $value)
        <tr>
            <td><input type="checkbox" class="catItem" name="ids[]" form="category_form" value="{{$value->id}}" {{(in_array($value->id, $already))?'disabled':''}}></td>
            <td>{{$value->name}}</td>
            <td>{{(isset($value->posts))?count($value->posts):''}}</td>
        </tr>
        @endforeach
    </tbody>
</table>