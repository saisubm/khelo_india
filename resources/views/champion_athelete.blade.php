@include('includes.header')
<div class="athelete-supported pt-4 pt-md-5 champion-athlete">
	<div class="container-fluid">
		<div class="text-center">
			<h1 class="border-0">
                <img src="images/svg/Athletes-support.svg" alt="">
                KIC – Past Champion Athletes - Status</h1>
		</div>
		<div class="row charts-row align-items-center">
			<div class="col-md-6 col-12 item">
				<div class="box donutcharts ">
					<div class="donutchartbox donutchart-1 border-0">
						<div id="champion-donut"></div>
					</div>
					
				</div>
			</div>
            <div class="col-md-6 col-12">
                <div class="box-ryt text-center border p-5 my-4">
                    <h6>No. of KICs</h6>
                    <h3>591</h3>
                </div>
                <div class="box-ryt text-center border p-5 my-4">
                    <h6>No. of Trainers to be engaged</h6>
                    <h3>650</h3>
                </div>
            </div>
			
			
		</div>
	</div>
</div>
@include('includes.footer')
<script>
    Highcharts.chart('champion-donut', {
    colors: [ '#FF6100','#492CDE',],
    chart: {
        type: 'pie'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    title: {
        text: ''
    },
    subtitle: {
        text: null
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.0f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '{point.name}: {y} %'
            },
            showInLegend: true
        }
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'PARTICIPATION LEVEL',
        colorByPoint: true,
        innerSize: '50%',
        data: [{
            name: 'Trainers engaged',
            y:102
        }, {
            name: 'Trainers yet to be engaged',
            y: 548
        }]
    }],
    exporting: {
    enabled: false
  }
});

</script>
