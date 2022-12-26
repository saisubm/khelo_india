@include('includes.header')
<script>
    var data_1 = <?php echo $kisce_json; ?>;
    var data_dis = <?php echo $kisce_discipline; ?>;
    var data_dict = [];

    for (var i = 0; i < data_1.length; i++) {
        var data_dict_kisce = {};
        data_dict_kisce["gender"] = [{
            "name": "Male",
            "y": data_1[i].no_of_athletes_male
        }, {
            "name": "Female",
            "y": data_1[i].no_of_athletes_female
        }];
        data_dict_kisce["age-wise"] = [{
            "name": "No. of Athletes Under 14",
            "y": data_1[i].no_of_athletes_u_14
        }, {
            "name": "No. of Athletes Under 18",
            "y": data_1[i].no_of_athletes_u_18
        }, {
            "name": "No. of Senior Athletes",
            "y": data_1[i].no_of_athletes_senior
        }];
        data_dict[i] = data_dict_kisce;
    }

    var prev_kisce_id = "";
    var iter = 0;
    var data_dict_discpline = [];
    for (var i = 0 ; i < data_dis.length; i++)
    {
        console.log(data_dis[i]);
        if((prev_kisce_id != "") && (prev_kisce_id != data_dis[i].kisce_id))
        {
            data_dict[iter]['discipline-wise'] = data_dict_discpline;
            data_dict_discpline = [{'name':data_dis[i].oscg_discipline,'y':(data_dis[i].no_of_athletes_male*1.0+1.0*data_dis[i].no_of_athletes_female)}];
            iter += 1;
        }
        else if ((prev_kisce_id == "") || (prev_kisce_id == data_dis[i].kisce_id))
        {
            data_dict_discpline.push({'name':data_dis[i].oscg_discipline,'y':(data_dis[i].no_of_athletes_male*1.0+1.0*data_dis[i].no_of_athletes_female)});
        }
        prev_kisce_id = data_dis[i].kisce_id;

    }
    data_dict[iter]['discipline-wise'] = data_dict_discpline;

</script>
<div class="state-level-detail-athlete state-wise-count py-5">
    <div class="container">
        <div class="row align-items-center" style=" font-size: 33px; font-weight:700; padding:5px; border-radius:7px; border: 1px solid #AFAFB4;">
            <div class="col-lg-1 col-md-2 col-3">
                <button type="button" onclick="{history.back()}" class="background-light border-0" style="background-color: transparent !important">
                    <img src="{{ asset('public/front/assets/images/svg/backward-arrow.svg')}}" class="img-fluid backward-arrow d-block mx-auto"
                        alt="" />
                </button>
            </div>
            <div class="col-lg-11 col-md-10 col-9">
                <h2 class="text-center" style="font-size: 33px; font-weight:700; ">State- Level Details for KISCE in <span style="font-size: 33px; font-weight:700; " class="state_name_text"></span></h2>
            </div>
        </div>
        @foreach ($kisce_details as $pkey => $value)
            <div class="row my-5 text-center">
                <div class=" col-12">
                    <div class="row align-items-center  border px-1 py-2 rounded my-2" style="min-height: 85px; display:flex; align-items:center;">
                        {{-- <img src="{{ asset('public/front/assets/images/svg/dm-1.svg') }}" alt=""> --}} 
                        <div class="me-2 athlete-tile-img text-center">  </div>
                        <h4 class="text-center">{{ $value->center_name ?? '' }}</h4>
                        <h6 class="mt-1">
@php $color_style = 0; @endphp
@foreach ($kisce as $key => $val)
    @if ($val->kisce_id == $value->kisce_id)
        @php $color_style = $color_style+1 ; 
        @endphp
        @if($color_style%4 == 0)
        <span class="border text-uppercase p-2 bg-success text-white" style="border-radius: 5px; border:1px solid #DEDEDE;">{{ $val->oscg_discipline}}</span>
        @elseif($color_style%4 == 1)
        <span class="border text-uppercase p-2 bg-primary text-white" style="border-radius: 5px; border:1px solid #DEDEDE;">{{ $val->oscg_discipline}}</span>
        @elseif($color_style%4 == 2)
        <span class="border text-uppercase p-2 bg-info text-white" style="border-radius: 5px; border:1px solid #DEDEDE;">{{ $val->oscg_discipline}}</span>
        @elseif($color_style%4 == 3)
        <span class="border text-uppercase p-2 bg-warning text-white" style="border-radius: 5px; border:1px solid #DEDEDE;">{{ $val->oscg_discipline}}</span>
        @endif

        @if($loop->index != count($kisce)-1)
        {{''}}
        @endif
    @endif
@endforeach
</h6>
                    </div>
                </div>
               
                <div class="col-12">
                    <div class="row mt-5">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="box donutcharts border py-5 px-1 ">
                                <div class="donutchartbox donutchart-1 border-0">
                                    <div id="state-level-1_{{ $pkey }}"></div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="box donutcharts border py-5 px-1 ">
                                <div class="donutchartbox donutchart-1 border-0">
                                    <div id="state-level-2_{{ $pkey }}"></div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="box donutcharts border py-5 px-1 ">
                                <div class="donutchartbox donutchart-1 border-0">
                                    <div id="state-level-3_{{ $pkey }}"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var key_id = "{{ $pkey }}";
                console.log(data_dict);
                //PARTICIPATION LEVEL
                Highcharts.chart('state-level-1_' + key_id, {
                    colors: ['#FF6100', '#492CDE', '#00CED1','#009966'],
                    chart: {
                        type: 'pie'
                    },
                    accessibility: {
                        point: {
                            valueSuffix: '%'
                        }
                    },
                    title: {
                        text: 'Discipline-wise athletes at KISCE'
                    },
                    subtitle: {
                        text: null
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.0f}</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '{point.name}: {y} '
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
                        data: data_dict[key_id]['discipline-wise']
                    }],
                    exporting: {
                        enabled: false
                    }
                });




                //PARTICIPATION LEVEL
                Highcharts.chart('state-level-2_' + key_id, {
                    colors: ['#FF6100', '#492CDE', '#00FF00'],
                    chart: {
                        type: 'pie'
                    },
                    accessibility: {
                        point: {
                            valueSuffix: '%'
                        }
                    },
                    title: {
                        text: 'Age-group-wise athletes at KISCE'
                    },
                    subtitle: {
                        text: null
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.0f}</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '{point.name}: {y} '
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
                        data: data_dict[key_id]['age-wise']
                    }],
                    exporting: {
                        enabled: false
                    }
                });



                //PARTICIPATION LEVEL
                Highcharts.chart('state-level-3_' + key_id, {
                    colors: ['#FF6100', '#492CDE', ],
                    chart: {
                        type: 'pie'
                    },
                    accessibility: {
                        point: {
                            valueSuffix: '%'
                        }
                    },
                    title: {
                        text: 'Gender-wise athletes at KISCE'
                    },
                    subtitle: {
                        text: null
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.0f}</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '{point.name}: {y} '
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
                        data: data_dict[key_id]['gender']
                    }],
                    exporting: {
                        enabled: false
                    }
                });
            </script>
        @endforeach
    </div>
</div>


@include('includes.footer')
<script src="{{asset('public/front/global.js')}}"></script>
<script>
    var sttate_id ="{{$state_id}}";
    $(document).ready(function(){
        $(".state_name_text").text(' '+state_district[sttate_id][0]+'');
    })
    </script>
