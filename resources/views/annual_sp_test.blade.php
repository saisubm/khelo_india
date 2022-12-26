Skip to content
Search or jump to…
Pull requests
Issues
Marketplace
Explore
 
@akshaynetprophets 
mokshendra12
/
khelo_india_dashboard
Private
Code
Issues
Pull requests
Actions
Projects
Security
Insights
khelo_india_dashboard/resources/views/annual_sports_details.blade.php
@akshaynetprophets
akshaynetprophets annual-report-details
Latest commit 6d49180 20 hours ago
 History
 1 contributor
329 lines (325 sloc)  8.7 KB
   
@include('includes.header')


<div class="athelete-supported asc-kiyg pt-4 pt-md-5">
	<div class="container-fluid">
		<div class="text-center">
			<h1 class="text-uppercase">ASC - KIYG Overview</h1>
		</div>
		<div class="row charts-row">
			<div class="col-sm-6 col-lg-4 item">
				<div class="box">
                    <div id="kiyg-chart1"></div>
                    <div class="d-flex justify-content-center years-list-chart">
                        <ul class="list-unstyled mt-3 pb-0 mb-0">
                            <li><a href="#">2018</a></li>
                            <li><a href="#">2019</a></li>
                            <li><a href="#">2020</a></li>
                        </ul>
                    </div>
				</div>
			</div>
            <div class="col-sm-6 col-lg-4 item">
                <div class="box">
                        <div id="kiyg-chart2"></div>
                </div>
            </div>
			<div class="col-sm-6 col-lg-4 item">
				<div class="box">
					<div id="kiyg-chart3"></div>
                    <div class="d-flex justify-content-center years-list-chart">
                        <ul class="list-unstyled mt-3 pb-0 mb-0">
                            <li><a href="#">2018</a></li>
                            <li><a href="#">2019</a></li>
                            <li><a href="#">2020</a></li>
                        </ul>
                    </div>
				</div>
			</div>
            <div class="col-sm-6 col-lg-5 item">
                <div class="box">
                    <div id="kiyg-chart4"></div>
                    <div class="d-flex justify-content-center years-list-chart">
                        <ul class="list-unstyled mt-3 pb-0 mb-0">
                            <li><a href="#">2018</a></li>
                            <li><a href="#">2019</a></li>
                            <li><a href="#">2020</a></li>
                        </ul>
                    </div>
                </div>
            </div>
			<div class="col-lg-7 item">
				<div class="box">
					<h3 class="text-uppercase text-center mt-2">KIYG Winners</h3>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>KIYG Edition</th>
                                    <th>Winners</th>
                                    <th>Medal Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="#">2018</a></td>
                                    <td>Delhi</td>
                                    <td>112</td>
                                </tr>
                                <tr>
                                    <td><a href="#">2019</a></td>
                                    <td>Haryana</td>
                                    <td>154</td>
                                </tr>
                                <tr>
                                    <td><a href="#">2020</a></td>
                                    <td>Maharashtra</td>
                                    <td>200</td>
                                </tr>
                                <tr>
                                    <td><a href="#">2018</a></td>
                                    <td>Delhi</td>
                                    <td>112</td>
                                </tr>
                                <tr>
                                    <td><a href="#">2019</a></td>
                                    <td>Haryana</td>
                                    <td>110</td>
                                </tr>
                                <tr>
                                    <td><a href="#">2020</a></td>
                                    <td>Maharashtra</td>
                                    <td>104</td>
                                </tr>
                                <tr>
                                    <td><a href="#">2018</a></td>
                                    <td>Delhi</td>
                                    <td>99</td>
                                </tr>
                                <tr>
                                    <td><a href="#">2019</a></td>
                                    <td>Haryana</td>
                                    <td>85</td>
                                </tr>
                                <tr>
                                    <td><a href="#">2020</a></td>
                                    <td>Maharashtra</td>
                                    <td>250</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>					
				</div>
			</div>
		</div>
	</div>
</div>
@include('includes.footer')
<script>
//KIYG Chart 1
Highcharts.chart('kiyg-chart1', {
    colors: ['#a6a6a6', '#ed7d31', '#4472c4'],
    chart: {
        type: 'column'
    },
    title: {
        text: 'PARTICIPATION Athletes'
    },
    xAxis: {
        categories: ['Athletes', 'Boys', 'Girls'],
    },
    yAxis: {
        min: 0,
        title: {
            text: null
        },
        lineWidth: 0,
        gridLineWidth: 0 //Remove xAxis lines
    },
    legend: {
        reversed: true
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        series: {
            stacking: 'normal'
        }
    },
    series: [{
        name: 'KIYG 2018',
        data: [600, 850, 1100]
    }, {
        name: 'KIYG 2019',
        data: [450, 550, 600]
    }, {
        name: 'KIYG 2020',
        data: [150, 300, 500]
    }],
    exporting: {
    enabled: false
  }
});
//KIYG Chart 2
Highcharts.chart('kiyg-chart2', {
     colors: ['#a6a6a6', '#ed7d31', '#4472c4'],
    chart: {
        type: 'bar'
    },
    title: {
        text: 'PARTICIPATION - Officials & Volunteers',
        style: {
          fontSize: '16px',
       }
    },
    subtitle: {
        //text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
    },
    xAxis: {
        categories: ['GV', 'SSV', 'TO'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: null,
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        },
        lineWidth: 0,
        gridLineWidth: 0 //Remove xAxis lines
    },
    tooltip: {
        valueSuffix: ' Athletes'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        // layout: 'horizontal',
        // align: 'right',
        verticalAlign: 'bottom',
        //x: -40,
        //y: 80,
        floating: false,
        //borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        //shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'KIYG 2020',
        data: [80, 55, 110]
    }, {
        name: 'KIYG 2019',
        data: [45, 25, 75]
    }, {
        name: 'KIYG 2018',
        data: [25, 25, 50]
    }],
    exporting: {
    enabled: false
  }
});
//KIYG Chart 3
Highcharts.chart('kiyg-chart3', {
    colors: ['#4472c4'],
    chart: {
        type: 'column'
    },
    title: {
        text: 'VIEWERSHIP (in millions)'
    },
    xAxis: {
        categories: ['2018', '2019', '2020']
    },
    yAxis: {
        min: 0,
        title: {
            text: null
        },
        lineWidth: 0,
        gridLineWidth: 0 //Remove xAxis lines
    },
    legend: {
        reversed: true
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        series: {
            stacking: 'normal'
        }
    },
    series: [{
        name: 'KIYG',
        data: [25, 35, 49.9]
    }],
    exporting: {
    enabled: false
  }
});
//KIYG Chart 4
Highcharts.chart('kiyg-chart4', {
    colors: ['#4472c4'],
    chart: {
        type: 'column'
    },
    title: {
        text: 'SPENDS (in INR cr.)'
    },
    xAxis: {
        categories: ['2018', '2019', '2020']
    },
    yAxis: {
        min: 0,
        title: {
            text: null
        },
        lineWidth: 0,
        gridLineWidth: 0 //Remove xAxis lines
    },
    legend: {
        reversed: true
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        series: {
            stacking: 'normal'
        }
    },
    series: [{
        name: 'KIYG',
        data: [
        {
            y:102,
            color: '#4472c4'
        }, 
        {
            y:99,
            color: '#ffc000'
        }, 
        {
            y:85,
            color: '#bfbfbf'
        }
        ]
    }],
    exporting: {
    enabled: false
  }
});
</script>
© 2022 GitHub, Inc.
Terms
Privacy
Security
Status
Docs
Contact GitHub
Pricing
API
Training
Blog
About
