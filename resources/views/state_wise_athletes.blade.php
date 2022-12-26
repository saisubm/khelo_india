@include('includes.header')

<div class="athelete-supported asc-kiyg pt-4 pt-md-5 mb-lg-4">
    <div class="container">
        <div class="text-center">
            <h1 class="text-uppercase">Athletes Supported In {{$state_name ?? ''}}</h1>
        </div>
        <div class="row charts-row">
            <div class="col-sm-12 col-lg-12 item">

                <div class="box">
					<h3 class="text-uppercase text-center mt-2 pb-3">Scheme Wise Distribution ({{$scheme_data['TotalAthlete'] ?? ''}})</h3>
                    <div class="row">
                        <div class="col-lg-6 pe-xl-4">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Scheme Name</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($scheme_data['schemeSummary']) && count($scheme_data['schemeSummary']))
                                        @php
                                        $male_total = 0;
                                        $female_total = 0;
                                        @endphp
                                        @foreach($scheme_data['schemeSummary'] as $key => $val)
                                        @php $male_total += $val['Mcount']  @endphp
                                        @php $female_total += $val['Fcount']  @endphp
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$val['SchemeName'] ?? ''}}</td>
                                            <td>{{$val['Mcount'] ?? ''}}</td>
                                            <td>{{$val['Fcount'] ?? ''}}</td>
                                            <td>{{$val['Athletecount'] ?? ''}}</td>

                                        </tr>

                                       @endforeach
                                       <tr>
                                           <td colspan="2">Total</td>
                                           <td>{{$male_total}}</td>
                                           <td>{{$female_total}}</td>
                                           <td>{{$scheme_data['TotalAthlete']}}</td>
                                       </tr>
                                       @else
                                       <tr>
                                           <td colspan="5"> No Data Found!!!</td>
                                       </tr>
                                       @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6 border-start border-dark px-xl-4">
                            <div id="kiyg-chart1"></div>
                        </div>
                    </div>
				</div>
            </div>

        </div>
    </div>
</div>


@include('includes.footer')

<script>

    var scheme_category = <?php echo $scheme_category; ?>;
    var scheme_data_json = <?php echo $scheme_data_json; ?>;
    //console.log(financial_data_json);
        Highcharts.chart('kiyg-chart1', {
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
            color: '#000080',
        fontWeight: 'bold',
            y: -25,
            overflow: "none",
            formatter: function() {
              let plotSize = this.series.chart.plotSizeY;

              if (this.point.yBottom !== plotSize) {
                return this.point.stackTotal;
              }
            }
          }
                }
            },
            tooltip: {
        formatter: function() {
          //var stackName = this.series.userOptions.stack;

          return '<b>'+this.series.name + ': </b>' + this.y + '<br/>' +
            '<b>Total: </b>' + this.point.stackTotal;
        }
      },
            series: scheme_data_json,
            exporting: {
            enabled: false
          }
        });


        </script>
