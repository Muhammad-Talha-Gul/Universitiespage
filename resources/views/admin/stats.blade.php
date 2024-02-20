<i class="loader fa fa-refresh fa-spin"></i>

<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card-box widget-box-one">
        {{-- <i class="mdi mdi-account-convert widget-one-icon"></i> --}}
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow widget-title" title="Orders">Online sessions by Country</p>
        <div class="wigdet-one-content">
            {{-- <p class="text-muted m-0"><b>Last:</b> 1250</p> --}}
            <table class="table">
                @foreach($countries as $key => $value)
                <tr>
                    <td>{{$key}}</td>
                    <td>{{count($value)}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card-box widget-box-one">
        {{-- <i class="mdi mdi-account-convert widget-one-icon"></i> --}}
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow widget-title" title="Orders">Online sessions by Cities</p>
        <div class="wigdet-one-content">
            {{-- <p class="text-muted m-0"><b>Last:</b> 1250</p> --}}
            <table class="table">
                @foreach($cities as $key => $value)
                <tr>
                    <td>{{$key}}</td>
                    <td>{{count($value)}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card-box widget-box-one">
        {{-- <i class="mdi mdi-account-convert widget-one-icon"></i> --}}
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow widget-title" title="Orders">Online sessions by Trafic Sourse</p>
        <div class="wigdet-one-content">
            {{-- <p class="text-muted m-0"><b>Last:</b> 1250</p> --}}
            <table class="table">
                @foreach($referer_types as $key => $value)
                <tr>
                    <td>{{$key}}</td>
                    <td>{{count($value)}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card-box widget-box-one">
        {{-- <i class="mdi mdi-account-convert widget-one-icon"></i> --}}
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow widget-title" title="Orders">Online sessions by Social</p>
        <div class="wigdet-one-content">
            {{-- <p class="text-muted m-0"><b>Last:</b> 1250</p> --}}
            <table class="table">
                @foreach($socials as $key => $value)
                <tr>
                    <td>{{$key}}</td>
                    <td>{{count($value)}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card-box widget-box-one">
        {{-- <i class="mdi mdi-account-convert widget-one-icon"></i> --}}
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow widget-title" title="Orders">Online sessions by Devices</p>
        <div class="wigdet-one-content">
            {{-- <p class="text-muted m-0"><b>Last:</b> 1250</p> --}}
            <table class="table">
                @foreach($devices as $key => $value)
                <tr>
                    <td>{{$key}}</td>
                    <td>{{count($value)}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card-box widget-box-one">
        {{-- <i class="mdi mdi-account-convert widget-one-icon"></i> --}}
        <p class="m-0 text-uppercase font-600 font-secondary text-overflow widget-title" title="Orders">Top visited pages</p>
        <div class="wigdet-one-content">
            {{-- <p class="text-muted m-0"><b>Last:</b> 1250</p> --}}
            <table class="table">
                @foreach($pages as $key => $value)
                <tr>
                    <td><a href="#">{{$key}}</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    @if(isset($sales))
        var record = {!! json_encode(($sales)??'') !!};
    @else
         var record = [];
    @endif
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Sales');
    data.addColumn('number','Periods');
    for(var k in record){
        var v = record[k];
        data.addRow([k,v]);
      }
    var options = {
      title: 'Total Sales',
      curveType: 'function',
      legend: { position: 'bottom' }
    };

    var chart = new google.visualization.LineChart(document.getElementById('total_sales'));

    chart.draw(data, options);
  }
</script>