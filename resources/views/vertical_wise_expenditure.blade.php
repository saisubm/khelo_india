@include('includes.header')
<div class="athelete-supported pt-4 pt-md-5">
	<div class="container-fluid">
		<div class="text-center">
			<!-- <h1><img src="{{ asset('public/front/assets/images/svg/Athletes-support.svg')}}" alt="">VERTICAL WISE EXPENDITURE DETAILS</h1> -->
            <h1>{{$main_vertical->name ?? ''}} ({{sprintf('%0.2f', $total) ?? '0'}} ₹)</h1>
		</div>
		<div class="row charts-row">
			<div class="col-lg-12 item singlebox">
				<div class="box donutcharts">
					<div class="donutchartbox donutchart-1">
						<div id="participation-donut"></div>
					</div>
				</div>
			</div>
        </div>
	</div>
</div>
@include('includes.footer')

<script>
      var vertical = <?php echo $vertical ?>;
$(document).ready(function(){

  //PARTICIPATION PIE
  Highcharts.chart('participation-donut', {
      colors: ['#f37022', '#2f4b7c', '#ffb41a','#a05195','#7054ff'],
      chart: {
          type: 'pie'
      },
      accessibility: {
          point: {
              valueSuffix: '%'
          }
      },
      title: {
          text: 'Vertical Wise Expenditure Details (In Cr.)'
      },
      subtitle: {
          text: null
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.2f} (₹)</b>'
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: true,

                  format: '{point.name}  {point.y:.2f} (₹)'
              },
              showInLegend: true
          }
      },
      credits: {
          enabled: false
      },
      series: [{
          name: 'EXPENDITURE',
          colorByPoint: true,
          innerSize: '50%',
          data: vertical
      }],
      exporting: {
      enabled: false
    }
  });

});





</script>
