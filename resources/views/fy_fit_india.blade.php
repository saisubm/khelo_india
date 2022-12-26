@include('includes.header')


<div class="athelete-supported pt-4 pt-md-5">
	<div class="container-fluid">
		<div class="text-center">
			<h1 class="text-center"><img src="" alt="">Fit India Event Participation</h1>
		</div>
		<div class="row charts-row">
			<div class="col-lg-12 item">

            <div class="box">

               <div class="row">
                   <div class="col-lg-6 pe-xl-4">
                       <div class="table-responsive">
                           <table class="table table-hover">
                               <thead>
                                   <tr>
                                       <th>#</th>

                                       <th>Financial Year</th>
                                       <th>Event Participation (In Lacs.)</th>

                                   </tr>
                               </thead>
                               <tbody>
                               @foreach ($fy_data as $key => $value)

                               <tr>
                               <td>{{ $key + 1 }}</td>
                               <td><a href="{{url('fit-india-year-wise')}}/{{$value->fy_year}}">{{ $value->fy_year ?? '' }}</a></td>
                               <td>{{  number_format((float)$value->event_participation_amt*100, 2, '.', '')}}</td>
                             </tr>
                                @endforeach
                               </tbody>
                           </table>
                       </div>
                   </div>
                   <div class="col-lg-6 border-start border-dark px-xl-4">
                       <div id="kiyg-chart3"></div>
                   </div>
               </div>
           </div>
        </div>


		</div>
	</div>
</div>
@include('includes.footer')

<script>

$(document).ready(function(){
	var fy_year = <?php echo $fy_year ?>;
	var amt = <?php echo $amt ?>;
	Highcharts.chart('kiyg-chart3',  {
 colors: ['#F37022'],
  chart: {
      type: 'column'
  },
  title: {
      text: 'Fit India Participation (In Lacs.)'
  },
  subtitle: {
      text: null
  },
  xAxis: {
      categories:fy_year,
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
			pointFormat: '{series.name}: <b>{point.y:.2f}</b><br/>',
	},
  plotOptions: {
		column: {
			dataLabels: {
						enabled: true,
						format: '{point.name}{point.y:.2f}'
				},
		},
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
      data: amt,

  }],
  exporting: {
  enabled: false
 }
 });

});
</script>
