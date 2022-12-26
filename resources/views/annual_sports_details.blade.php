@include('includes.header')


<div class="athelete-supported asc-kiyg pt-4 pt-md-5">
    <div class="container">
        <div class="row align-items-center justify-content-center" style=" font-size: 33px; font-weight:700; padding:5px; border-radius:7px; border: 1px solid #AFAFB4;">
            <div class="col-lg-1 col-md-2 col-3">
                <button type="button" onclick="{history.back()}" class=" border-0 d-flex" style="background-color: transparent !important">
                    <img src="{{ asset('public/front/assets/images/svg/backward-arrow.svg')}}" class="img-fluid backward-arrow d-block mx-auto"
                        alt="" />
                </button>
            </div>
            <div class="col-lg-11 col-md-10 col-9">
              <h2 class="text-center m-0" style="font-size: 33px; font-weight:700; ">ASC - KI{{$category ?? ''}} Overview</h2>
            </div>
          </div>
    </div>
	<div class="container-fluid">
       

		
		<div class="row charts-row">
			<div class="col-sm-6 col-lg-4 item"> 
				<div class="box">
                    <div id="kiyg-chart1"></div>
                   
				</div>
			</div>
            <div class="col-sm-6 col-lg-4 item">
                <div class="box">
                        <div id="kiyg-chart2"></div>
                        <hr>
						<div class="row">
							<p class="col-auto"><small><strong>GV : </strong> General Volunteers </small></p>
							<p class="col-auto"><small><strong>SSV : </strong> Sports Specific Volunteers </small></p>
							<p class="col-auto"><small><strong>TO : </strong> Technical Officials </small></p>
						
						</div>
                </div>
            </div>
			<div class="col-sm-6 col-lg-4 item">
				<div class="box">
					<div id="kiyg-chart3"></div>
                    {{-- <div class="d-flex justify-content-center years-list-chart">
                        <ul class="list-unstyled mt-3 pb-0 mb-0">
                            @foreach(json_decode($years) as $value)
                            <li><a href="#">{{$value}}</a></li>
                            @endforeach
                            
                        </ul>
                    </div> --}}
				</div>
			</div>
            <div class="col-sm-6 col-lg-5 item">
                <div class="box">
                    <div id="kiyg-chart4"></div>
                    <div class="d-flex justify-content-center years-list-chart">
                        <ul class="list-unstyled mt-3 pb-0 mb-0">
                            @foreach(json_decode($years) as $val)
                            <li><a href="{{url('expenditure-year-wise')}}/{{encode5t($category)}}/{{encode5t($val)}}">{{$val}}</a></li>
                           @endforeach
                        </ul>
                    </div>
                </div>
            </div>
			<div class="col-lg-7 item">
				<div class="box">
					<h3 class="text-uppercase text-center mt-2">KI{{$category ?? ''}} Winners</h3>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>KI{{$category ?? ''}} Edition</th>
                                    <th>Winners</th>
                                    <th>Medal Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(json_decode($data) as $val)
                                <tr>
                                    <td><a href="{{url('winners-year-wise')}}/{{encode5t($category)}}/{{encode5t($val->year)}}">{{$val->year ?? ''}}</a></td>
                                    <td>{{$val->winner ?? ''}}</td>
                                    <td>{{$val->winner_medal_count ?? ''}}</td>
                                </tr>
                               @endforeach
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
var viewership_years = <?php echo $years ?>;
var viewership_data = <?php echo $data ?>;
var category = "{{encode5t($category)}}";
var spend_category = "{{$category}}";
var asc_participations = "";

if(category == "UG")
{
    asc_participations = <?php echo $asc_participations_ug ?>;
}
else
{
    asc_participations = <?php echo $asc_participations_yg ?>;
}

var data_dict = {"category":[],"event_edition":[{"name":"Male","data":[]},{"name":"Female","data":[]}]};

for (var i = 0; i < asc_participations.length; i++)
{
    console.log(asc_participations[i].no_of_boys);
    data_dict["category"].push(asc_participations[i].event_year);
    data_dict["event_edition"][0]["data"].push(asc_participations[i].no_of_girls);
    data_dict["event_edition"][1]["data"].push(asc_participations[i].no_of_boys);
}




var viewership_array = [] ;
var participation_official = [];
var participation_athlete = [];
var expenditure = [];
var viewership_name;


$.each(viewership_data, function (key, val) {
    viewership_array.push(val.data);
    viewership_name = val.name;
    var array = [];
    array.push(val.gv * 1);
    array.push(val.ssv * 1);
    array.push(val.to * 1);
    expenditure.push(val.total_expenditure);
    participation_official[key] = {name:val.name+' '+val.year,data:array};
      
  });
var html = '';
// $.each(asc_participations, function (key, val) {
//     //alert(base_url);
//     if(val.year != null){
//         html += '<li><a href="'+base_url+'/athlete-details-year-wise/'+category+'/'+val.year+'">'+val.year+'</a></li>';
        
//         var array = [];
//         if(val.year == 2018){
//    array.push(val.total_participants_2018 * 1);
//    array.push(val.boys_2018* 1);
//    array.push(val.girls_2018 * 1);
//    participation_athlete[key] = {name:val.year,data:array};  
//         }
//         else if(val.year == 2019){
//    array.push(val.total_participants_2019 * 1);
//    array.push(val.boys_2019* 1);
//    array.push(val.girls_2019 * 1);
//    participation_athlete[key] = {name:val.year,data:array};  
//         }else if(val.year == 2020){
//             array.push(val.total_participants_2020 * 1);
//    array.push(val.boys_2020* 1);
//    array.push(val.girls_2020 * 1);
//    participation_athlete[key] = {name:val.year,data:array}; 
//         }else if(val.year == 2021){
//             array.push(val.total_participants_2021 * 1);
//    array.push(val.boys_2021* 1);
//    array.push(val.girls_2021 * 1);
//    participation_athlete[key] = {name:val.year,data:array};
//         }else if(val.year == 2022){
//   array.push(val.total_participants_2022 * 1);
//    array.push(val.boys_2022* 1);
//    array.push(val.girls_2022 * 1);
//    participation_athlete[key] = {name:val.year,data:array};
//         }else{
//    array.push(val.total_participants_2023 * 1);
//    array.push(val.boys_2023* 1);
//    array.push(val.girls_2023 * 1);
//    participation_athlete[key] = {name:val.year,data:array};
//         }
//     }
//  });
 $('#PARTICIPATION_Athletes').html(html);

console.log(participation_athlete);



//PARTICIPATION Athletes
Highcharts.chart('kiyg-chart1', {
    colors: ['#a6a6a6', '#ed7d31', '#4472c4','#3ea79d'],
    chart: {
        type: 'column'
    },
    title: {
        text: 'Participation Athletes'
    },
    xAxis: {
        categories: data_dict["category"],
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
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        verticalAlign: 'top',
                        y: -25,
                        color: '#000',
                        fontWeight: 'bold',
                        overflow: "none",
                        formatter: function() {
                            let plotSize = this.series.chart.plotSizeY;

                            if (this.point.yBottom !== plotSize) {
                                return this.point.stackTotal;
                            }
                        }
                    }   
                },
                
    },
    series: data_dict["event_edition"],
    exporting: {
    enabled: false
  }
});
//KIYG Chart 2

Highcharts.chart('kiyg-chart2', {
     colors: ['#4472c4', '#ed7d31','#a6a6a6'],
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
    series: participation_official,
    exporting: {
    enabled: false
  }
});

//VIEWERSHIP
Highcharts.chart('kiyg-chart3', {
    colors: ['#4472c4'],
    chart: {
        type: 'column'
    },
    title: {
        text: 'VIEWERSHIP (in millions)'
    },
    xAxis: {
        categories: viewership_years,
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
        column: {
            dataLabels: {
                enabled: true
            }
        },
        series: {
            stacking: 'normal',
            dataLabels: {
                        enabled: true,
                        verticalAlign: 'top',
                        y: -25,
                        color: '#000',
                        fontWeight: 'bold',
                        overflow: "none",
                        formatter: function() {
                            
                                return this.point.y;
                           
                        }
                    }
        }
    },
    series: [{
        name: viewership_name,
        data: viewership_array
    }],
    exporting: {
    enabled: false
  }
});
//SPEND
Highcharts.chart('kiyg-chart4', {
    colors: ['#ed7d31'],
    chart: {
        type: 'column'
    },
    title: {
        text: 'Expenditure (In Cr.)'
    },
    xAxis: {
        categories: viewership_years
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
        column: {
            dataLabels: {
                enabled: true
            }
        },
        series: {
            stacking: 'normal',
            dataLabels: {
                        enabled: true,
                        verticalAlign: 'top',
                        y: -18,
                        color: '#000',
                        fontWeight: 'bold',
                        overflow: "none",
                        formatter: function() {
                            
                                return this.point.y;
                           
                        }
                    }
        }
    },
    series: [{
        name: 'KI'+spend_category,
        data: expenditure
    }],
    exporting: {
    enabled: false
  }
});
</script>
