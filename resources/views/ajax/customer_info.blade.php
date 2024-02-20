<p class="customer_info"> 
    <input type="hidden" name="user_id" value="{{$customer['id']}}">
    <b>{{$customer['first_name'].' '.$customer['last_name']}}</b><br>
    {{$customer['email']}} <br>
    {{$customer['phone']}} <br>
</p>