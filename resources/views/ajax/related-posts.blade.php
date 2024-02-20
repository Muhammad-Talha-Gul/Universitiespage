<div class="form-group">
    <select class="form-control multiselect" name="related[]" multiple>
    	@foreach($posts as $value)
        <option value="{{$value->id}}" {{(in_array($value->id, $already))?'selected':''}}>{{$value->title}}</option>
        @endforeach
    </select>
</div>