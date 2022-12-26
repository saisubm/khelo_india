@include('includes.header')


<div class="athelete-supported pt-4 pt-md-5">
	<div class="container-fluid">
		<div class="text-center">
			<h1 class="text-center"><img src="" alt="">Fit India Event Participation({{$year}})</h1>
		</div>
		<div class="row charts-row">
			<div class="col-lg-12 item">

            <div class="box">

               <div class="row">
                   <div class="col-lg-12 pe-xl-4">
                       <div class="table-responsive">
                           <table class="table table-hover">
                               <thead>
                                   <tr>
                                       <th>#</th>
                                       <th>Event Name</th>
                                       <th>Event Participation (In Lacs.)</th>

                                   </tr>
                               </thead>
                               <tbody>
																 @if(isset($fy_data))
                               @foreach ($fy_data as $key => $value)
                               <tr>
                               <td>{{ $key + 1 }}</td>
                               <td>{{ $value->event ?? '' }}</td>
                               <td>{{  number_format((float)$value->event_participation_amt*100, 3, '.', '')}}</td>
                             </tr>
                                @endforeach
																@else
                                  <tr>No data Available</tr>

																	@endif

                               </tbody>
                           </table>
                       </div>
                   </div>
                   <!-- <div class="col-lg-6 border-start border-dark px-xl-4">
                       <div id="kiyg-chart3"></div>
                   </div> -->
               </div>
           </div>
        </div>


		</div>
	</div>
</div>
@include('includes.footer')

<script>

 $(document).ready(function(){
 	var fy_year = <?php echo $grap_fy_data ?>;
	console.log(fy_year);
var fy_event = [];
var fy_amt = [];
	$.each(fy_year, function (key, val) {
	    fy_event.push(val.event);
			fy_amt.push(val.event_participation_amt);
	  });


	Highcharts.chart('kiyg-chart3',  {
 colors: ['#F37022'],
  chart: {
      type: 'column'
  },
  title: {
      text: 'Fit India'
  },
  subtitle: {
      text: null
  },
  xAxis: {
      categories:fy_event,
      title: {
          text: null
      },
      lineWidth: 0,
      gridLineWidth: 0 //Remove xAxis lines
  },
  yAxis: {
      min: 0,
      title: {
          align: 'high',
          text: null
      },
      labels: {
          overflow: 'justify',
      },

      lineWidth: 0,
      gridLineWidth: 0 //Remove yAxis lines
  },
  tooltip: {
      valueSuffix: null,
			  //pointFormat: '{series.name}: <b>{point.percentage:.55f}%</b>'
  },
  plotOptions: {
      column: {
          dataLabels: {
              enabled: true,
              formatter: function() {
                         return this.point.y;
                      }
          },

      }
  },
  /*legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'top',
      x: -40,
      y: 80,
      floating: true,
      borderWidth: 1,
      backgroundColor:
          Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
      shadow: true
  },*/
  credits: {
      enabled: false
  },
  series: [{
      showInLegend: false,
      name: 'Fit India',
      data: fy_amt,

  }],
  exporting: {
  enabled: false
 }
 });

});
</script>
