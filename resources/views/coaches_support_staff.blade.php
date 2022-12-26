@include('includes.header')


<div class="athelete-supported pt-4 pt-md-5">
	<div class="container-fluid">
		<div class="text-center">
			<h1 class="text-center"><img src="" alt="">COACHES & SUPPORT STAFF</h1>
		</div>
		<div class="row charts-row">
			<div class="col-lg-12 item">

            <div class="box mb-3">
               <h5 class="text-center mt-2 pb-3">Coaches & Support Staff Across Various Training Centres ({{$coach_scheme_data['TotalCoach'] + $coach_scheme_data['TotalSupportStaff']}})</h5>
               <div class="row">
                   <div class="col-lg-6 pe-xl-4">
                       <div class="table-responsive">
                           <table class="table table-hover">
                               <thead>
                                   <tr>
                                       <th>#</th>
                                       <th>Scheme</th>
                                       <th>Coaches</th>
                                       <th>Support Staff</th>
                                       <th>Total</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   @php
                                       // $coaches = 0;
                                       // $support_staff = 0;
                                   @endphp
                                   @if(isset($coach_scheme_data['schemeCoachSummary']))
                                   @foreach ($coach_scheme_data['schemeCoachSummary'] as $key => $val)
                                       {{-- @php $coaches += $val['CoachCount']  @endphp
                                       @php $support_staff += $val['SupportStaffCount']  @endphp --}}
                                       <tr>
                                           <td>{{ $key + 1 }}</td>
                                           <td>{{ $val['SchemeName'] ?? '' }}</td>
                                           <td>{{ $val['CoachCount'] ?? '' }}</td>
                                           <td>{{ $val['SupportStaffCount'] ?? '' }}</td>
                                           <td>{{ $val['CoachCount'] + $val['SupportStaffCount'] ?? '' }}</td>

                                       </tr>
                                   @endforeach

                                   <tr>
                                       <td colspan="2">Total</td>
                                       <td>{{ $coach_scheme_data['TotalCoach'] }}</td>
                                       <td>{{ $coach_scheme_data['TotalSupportStaff'] }}</td>
                                       <td>{{ $coach_scheme_data['TotalSupportStaff'] + $coach_scheme_data['TotalCoach']}}</td>
                                   </tr>
                                   @else
                                   <tr>
                                    <td colspan="5">Data Not Found!!! </td>

                                </tr>
                                   @endif
                               </tbody>
                           </table>
                       </div>
                   </div>
                   <div class="col-lg-6 border-start border-dark px-xl-4">
                       <div id="kiyg-chart3"></div>
                   </div>
               </div>
               <hr>
               <div class="row">
                   <p class="col-auto"><small><strong>ABSC : </strong> Army Boys School </small></p>
                   <p class="col-auto"><small><strong>NCOE : </strong> National Centres of Excellence</small></p>
                   <p class="col-auto"><small><strong>NSTC : </strong> National Sports Talent Contest</small></p>
                   <p class="col-auto"><small><strong>SATC : </strong> SAI Training Centres</small></p>
                   <p class="col-auto"><small><strong>KIC : </strong> Khelo India Centres</small></p>
                   <p class="col-auto"><small><strong>KISCE : </strong>Khelo India State Centres of Excellence</small></p>
               </div>
           </div>
           <div class="box mb-3">
            <div id="participationbar"></div>
        </div>
        </div>


		</div>
	</div>
</div>
@include('includes.footer')

<script>
$(document).ready(function(){
   var discipline_wise_count =  <?php echo $discipline_data?>;
   var scheme_data_json =  <?php echo $scheme_data_json?>;
   var scheme_category =  <?php echo $scheme_category?>;
  var total_count = "{{$TotalCoach}}";
  var discipline_name = [];
  var discipline_count = [];
	//
  $.each(discipline_wise_count, function (key, val) {
    discipline_name.push(val.sport_name)
    discipline_count.push(val.coachCount * 1)
  });

	console.log(discipline_name);
		console.log(discipline_count);





     Highcharts.chart('participationbar', {
 		colors: ['#F37022'],
     chart: {
         type: 'column'
     },
     title: {
         text: 'Coaches Across Sport Disciplines'
     },
     subtitle: {
         text: null
     },
     xAxis: {
         categories:discipline_name,
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
         valueSuffix: null
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
         name: 'COACHES',
         data: discipline_count,

     }],
     exporting: {
     enabled: false
   }
 });

 //KIYG Chart 3
 Highcharts.chart('kiyg-chart3', {
            colors: ['#ed7d31', '#4472c4'],
            chart: {
                type: 'column'
            },
            title: {
                text: null
            },

            xAxis: {
                categories: scheme_category,
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
            tooltip: {
                formatter: function() {
                    //var stackName = this.series.userOptions.stack;

                    return this.series.name + ': ' + this.y + '<br/>' +
                        'Total: ' + this.point.stackTotal;
                }
            },
            series: scheme_data_json,
            exporting: {
                enabled: false
            }
        });
      });
</script>
