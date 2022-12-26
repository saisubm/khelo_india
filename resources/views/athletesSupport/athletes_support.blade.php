@include('includes.header')

<div class="athelete-supported asc-kiyg pt-4 pt-md-5 mb-lg-4">
    <div class="container">
        <div class="text-center">
            <h1 class="text-uppercase">Supported Athletes Details</h1>
        </div>
        <div class="row charts-row">
            <div class="col-sm-12 col-lg-12 item">

                <div class="box">
                    <h3 class="text-center mt-2 pb-3">Athletes Getting Trained Across Various Training
                        Centres ({{$scheme_data->TotalAthlete ?? '' }})</h3>
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
                                        @if (isset($scheme_data->schemeSummary))
                                            @php
                                                $male_total = 0;
                                                $female_total = 0;
                                            @endphp
                                            @foreach ($scheme_data->schemeSummary as $key => $val)
                                                @php $male_total += $val->Mcount  @endphp
                                                @php $female_total += $val->Fcount  @endphp
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $val->SchemeName ?? '' }}</td>
                                                    <td>{{ $val->Mcount ?? '' }}</td>
                                                    <td>{{ $val->Fcount ?? '' }}</td>
                                                    <td>{{ $val->Athletecount ?? '' }}</td>

                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="2">Total</td>
                                                <td>{{ $male_total }}</td>
                                                <td>{{ $female_total }}</td>
                                                <td>{{ $scheme_data->TotalAthlete ?? '' }}</td>
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
            </div>
            <div class="col-sm-12 col-lg-12 item">
                <div class="box">
                    <h3 class="text-center mt-2 pb-3">Athletes Supported Under Financial Assistance
                        {{-- ({{$financial_data->InTrainingCenterCount ?? '' }} + {{$financial_data->NotInTrainingCenterCount ?? '' }})--}}</h3> 
                    <div class="row">
                        <div class="col-lg-6 pe-xl-4">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Scholarship Type</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($financial_data->financialAssistanceSummary))
                                        @php
                                            $f_male_total = 0;
                                            $f_female_total = 0;
                                        @endphp
                                        @foreach ($financial_data->financialAssistanceSummary as $key => $val)
                                            @php $f_male_total += $val->Mcount  @endphp
                                            @php $f_female_total += $val->Fcount  @endphp
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $val->scholarship_type ?? '' }}</td>
                                                <td>{{ $val->Mcount ?? '' }}</td>
                                                <td>{{ $val->Fcount ?? '' }}</td>
                                                <td>{{ $val->Athletecount ?? '' }}</td>

                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2">Total</td>
                                            <td>{{ $f_male_total }}</td>
                                            <td>{{ $f_female_total }}</td>
                                            <td>{{ $financial_data->TotalAthlete ?? '0'}}</td>
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
                            <div id="kiyg-chart3"></div>
                        </div>
                        <div class="box">
                            <h6>Athletes Recieving Financial Assistance and Training in accredited Academies/ SAI Centers : {{$financial_data->InTrainingCenterCount ?? '' }}</h6>
                            <h6>Athletes only recieving Financial Assistance : {{$financial_data->NotInTrainingCenterCount ?? '' }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('includes.footer')

    <script>
        var financial_category = <?php echo $financial_category; ?>;
        var financial_data_json = <?php echo $financial_data_json; ?>;
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
                }
            },
            tooltip: {
                formatter: function() {
                    //var stackName = this.series.userOptions.stack;

                    return '<b>' + this.series.name + ': </b>' + this.y + '<br/>' +
                        '<b>Total: </b>' + this.point.stackTotal;
                }
            },
            series: scheme_data_json,
            exporting: {
                enabled: false
            }
        });

        // KIYG Chart 3
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
                categories: financial_category,
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
            series: financial_data_json,
            exporting: {
                enabled: false
            }
        });
    </script>
