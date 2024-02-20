<p class="supplier_info"> 
    <input type="hidden" name="supplier_id" value="{{$supplier['id']}}">
    <b>{{$supplier['supplier']}}</b><br>
    {{$supplier['first_name'].' '.$supplier['last_name']}} <br>
    {{$supplier['email']}} <br>
    {{$supplier['phone']}} <br>
    {{$supplier['country']}}
</p>