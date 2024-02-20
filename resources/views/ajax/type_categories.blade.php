<style type="text/css">
    .loading {
     position: relative;
    background: #fff;
    opacity: 0.3;
    transition: opacity 1;
}
</style>
<div id="load" style="width: 100%; position: relative;">
<div class="form-group">
	<label>Select Categories</label>
	<select class="form-control" name="sec3[cats][]" multiple id="category_selection">
	  @foreach($data as $value)
	  <option value="{{$value->id}}" @if(isset(getHome()['sec3']['cats'])) {{(in_array($value->id, getHome()['sec3']['cats']))?'selected':''}} @endif>{{$value->name}}</option>
	  @endforeach
	</select>
</div>
</div>
                                