<table id="datatable" class="table table-striped">
    <thead>
    <tr>
        <th>Item</th>
        <th>Purchased Quantity</th>
        <th>Purchased Price</th>
        <th>Sold Quantity</th>
        <th>Sold Price</th>
        <th>Profit/Loss</th>
    </tr>
    </thead>

    <tbody>
    @foreach($report as $key => $value)
    <tr>
        <td>{{$value['title']}}</td>
        <td>{{$value['buy_qty']}}</td>
        <td>{{number_format($value['buy_amount'],2)}}</td>
        <td>{{$value['sell_qty']}}</td>
        <td>{{number_format($value['sell_amount'],2)}}</td>
        <td>{{number_format($value['calculated'],2)}}</td>
    </tr>
    @endforeach
    </tbody>
</table>