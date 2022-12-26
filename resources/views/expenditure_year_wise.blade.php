@include('includes.header')

<div class="asc-kiyg-detail py-4 py-md-5">
	<div class="container">
		<div class="text-center">
			<div class="toptitle pb-3 pb-md-4">
				<h1 class="text-uppercase">ASC – KI{{$category ?? ''}} {{$year ?? ''}} Athletes</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 item">
            <h3 class=" text-center mb-md-3">Fund Distribution By Stakeholder (In Cr.)</h3>
            <div id="fund-distribution-pie"></div>
			</div>
         {{-- <div class="col-lg-6 item">
            <h3 class="text-uppercase text-center mb-md-3">Fund distribution by Functional Area (in INR cr)</h3>
            <div id="fund-distribution-bar"></div>
         </div> --}}
		</div>
	</div>
</div>

@include('includes.footer')
<script>
    var host_exp = <?php echo $host_exp; ?>;
    var sai_exp = <?php echo $sai_exp; ?>;
    var additional_exp = <?php echo $additional_exp; ?>;
    // console.log(host_exp);
    // console.log(sai_exp);
//Fund distribution by stakeholder (in INR cr)
Highcharts.chart('fund-distribution-pie', {
    colors: ['#ed7d31', '#4472c4','#4db748'],
    chart: {
        type: 'pie'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    title: {
        text: null //'PARTICIPATION LEVEL'
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
                format: '{point.name}: {y} (₹)'
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
        innerSize: '0',
        data: [{
            name: 'Host State Expenditure',
            y: host_exp
        }, {
            name: 'SAI Expenditure',
            y: sai_exp
        },{
            name: 'Additional Expenditure By State',
            y: sai_exp
        }]
    }],
    exporting: {
    enabled: false
  }
});

//Fund distribution by Functional Area (in INR cr)

// Highcharts.chart('fund-distribution-bar', {
//       colors: ['#4472c4'],
//     chart: {
//         type: 'bar'
//     },
//     title: {
//         text: null //'PARTICIPATION LEVEL'
//     },
//     subtitle: {
//         text: null
//     },
//     xAxis: {
//         categories: ['Archery', 'Athletics', 'Badminton', 'Boxing', 'Cycling', 'Fencing', 'Hockey', 'Judo', 'Rowing', 'Shooting', 'Swimming', 'Table Tennis', 'Weightlifting', 'Wrestling', 'Others', 'Para', 'Sports', 'Indigenous'],
//         title: {
//             text: null
//         },
//         lineWidth: 0,
//         gridLineWidth: 0 //Remove xAxis lines
//     },
//     yAxis: {
//         min: 0,
//         title: {
//             align: 'high',
//             text: null
//         },
//         labels: {
//             overflow: 'justify',
//         },
//         lineWidth: 0,
//         gridLineWidth: 0 //Remove yAxis lines
//     },
//     tooltip: {
//         valueSuffix: null
//     },
//     plotOptions: {
//         bar: {
//             dataLabels: {
//                 enabled: true
//             }
//         }
//     },
//     /*legend: {
//         layout: 'vertical',
//         align: 'right',
//         verticalAlign: 'top',
//         x: -40,
//         y: 80,
//         floating: true,
//         borderWidth: 1,
//         backgroundColor:
//             Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
//         shadow: true
//     },*/
//     credits: {
//         enabled: false
//     },
//     series: [{
//         name: 'Athletes',
//         data: [200, 500, 250, 250, 75, 75, 450, 100, 75, 225, 100, 150, 150, 250, 1500],
//         borderRadiusTopLeft: '0px',
//          borderRadiusTopRight: '0px',
//         borderRadiusBottomRight: '0px',
//         borderRadiusBottomLeft: '0px'
//     }],
//     exporting: {
//     enabled: false
//   }
// });

</script>
