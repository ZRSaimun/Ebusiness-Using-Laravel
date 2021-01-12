@extends('layouts.adminMain')

@section('content')
<style>
    .center {

margin: auto;

width: 60%;



padding: 10px;

}
</style>


<body>
    <input type="hidden" id="pm" value="{{$revv[1]['priviousMonth']}}"> 
        <input type="hidden" id="pm1" value="{{$revv[1]['priviousMonth1']}}"> 
        <input type="hidden" id="pm2" value="{{$revv[1]['priviousMonth2']}}"> 
        <input type="hidden" id="rev" value="{{$revv[0]['month1']}}"> 
        <input type="hidden" id="rev1" value="{{$revv[0]['month2']}}"> 
        <input type="hidden" id="rev2" value="{{$revv[0]['month3']}}"> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    //values

    const pm = $('#pm').val()
    const pm1 = $('#pm1').val()
    const pm2 = $('#pm2').val()
    var rev = $('#rev').val()
    var rev1 = $('#rev1').val()
    var rev2 = $('#rev2').val()

    rev = rev*.01;
    rev1 = rev1*.01;
    rev2 = rev2*.01;
    

    
      google.charts.load('current', {'packages':['corechart']});

      
      google.charts.setOnLoadCallback(drawChart);

     
      function drawChart() {

        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Months');
        data.addColumn('number', 'Revenue');
        data.addRows([
          [pm, rev],
          [pm1, rev1],
          [pm2, rev2]
        
        ]);
       

        // Set chart options
        var options = {'title':'Revenues of Past Three Months',
                       'width':600,
                       'height':400};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
      
    </script>


  
    <!--Div that will hold the pie chart-->
    <div class="center">
        <div id="chart_div" class="center"></div>

    </div>
    <div class="center">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Months</th>
                <th>Revenue</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Months</th>
                <th>Revenue</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td>{{$revv[1]['priviousMonth']}}</td>
                <td>{{$revv[0]['month1']}}</td>
                
            </tr>
            <tr>
                <td>{{$revv[1]['priviousMonth1']}}</td>
                <td>{{$revv[0]['month2']}}</td>
            </tr>
            <tr>
                <td>{{$revv[1]['priviousMonth2']}}</td>
                <td>{{$revv[0]['month3']}}</td>
            </tr>
        </tbody>
    
    </table>
    
    <a href="{{route('revenueGenaratePDF')}}" type="button" id="button" class="btn btn-success">Genarate</a>
    <div>

    
  </body>
  @endSection
