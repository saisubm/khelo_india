@include('includes.header')

<div class="asc-kiyg asc-kiyg-detail py-4 py-md-5">
	<div class="container">
		<div class="text-center">
            <div class="row align-items-center justify-content-center" style=" font-size: 33px; font-weight:700; padding:5px; border-radius:7px; border: 1px solid #AFAFB4;">
                <div class="col-lg-1 col-md-2 col-3">
                    <button type="button" onclick="{history.back()}" class=" border-0 d-flex" style="background-color: transparent !important">
                        <img src="{{ asset('public/front/assets/images/svg/backward-arrow.svg')}}" class="img-fluid backward-arrow d-block mx-auto"
                            alt="" />
                    </button>
                </div>
                <div class="col-lg-11 col-md-10 col-9">
                  <h2 class="text-center m-0" style="font-size: 33px; font-weight:700; ">ASC – KI{{$category ?? ''}} {{$year ?? ''}} Medals</h2>
                </div>
              </div>
			{{-- <div class="toptitle pb-3 pb-md-4">
				<h1 class="text-uppercase">ASC – KI{{$category ?? ''}} {{$year ?? ''}} Medals</h1>
			</div> --}}
		</div>
		<div class="row">
			<div class="col-lg-12 item">
            <h3 class="text-uppercase text-center mb-md-3">OVERALL MEDAL TALLY</h3>
            <div class="table-responsive medal-tally-table">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                           
                            <th>Rank</th>
                           @if($category == 'UG')
                            <th>University Name</th>
                           @endif 
                            <th>State Name</th>
                            <th>Gold</th>
                            <th>Silver</th>
                            <th>Bronze</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($medal_telly->count())
                        @php 
                          $gold_total = 0;
                          $silver_total = 0;
                          $bronze_total = 0;
                          $total = 0;
                        @endphp
                       @foreach ($medal_telly as $key => $val)
                       @php 
                          $gold_total =  $gold_total+$val->gold;
                          $silver_total =  $silver_total+$val->silver;
                          $bronze_total =  $bronze_total+$val->bronze;
                          $total =  $total+$val->total;
                       @endphp
                            <tr>
                                
                                <td>{{ $val->rank ?? '' }}</td>
                                @if(isset($val->university_name))
                                <td>{{ $val->university_name ?? '' }}</td>
                                @endif
                                <td>{{ $val->state->state_name ?? '' }}</td>
                                <td>{{ $val->gold ?? '' }}</td>
                                <td>{{ $val->silver ?? '' }}</td>
                                <td>{{ $val->bronze ?? '' }}</td>
                                <td>{{ $val->total ?? '' }}</td>

                            </tr>
                        @endforeach
                        <tr>
                            <td @if(isset($val->university_name)) colspan="3"  @else colspan="2" @endif><strong>Total</strong></td>
                            <td><strong>{{ $gold_total}}</strong></td>
                            <td><strong>{{ $silver_total}}</strong></td>
                            <td><strong>{{ $bronze_total}}</strong></td>
                            <td><strong>{{ $total}}</strong></td>
                        </tr>
                        @else 
                        <tr>
                            <td colspan="6"> No Data Found!!!</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            {{-- <div id="medal-tally-bar"></div> --}}
			</div>
        
		</div>
	</div>
</div>


@include('includes.footer')
<script>
    var medal_list = <?php echo $medal_list; ?>;
    var medal_state_name = <?php echo $medal_state_name; ?>;

//     Highcharts.chart('medal-tally-bar', {
//       colors: ['#4472c4'],
//     chart: {
//         type: 'column'
//     },
//     title: {
//         text: null //'PARTICIPATION LEVEL'
//     },
//     subtitle: {
//         text: null
//     },
//     xAxis: {
//         categories: medal_state_name,
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
//         name: 'Medals',
//         data: medal_list,
//         borderRadiusTopLeft: '0px',
//          borderRadiusTopRight: '0px',
//         borderRadiusBottomRight: '0px',
//         borderRadiusBottomLeft: '0px'
//     }],
//     exporting: {
//     enabled: false
//   }
// });
//     Highcharts.chart('medal-stake-bar', {
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
//         name: 'Medals',
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