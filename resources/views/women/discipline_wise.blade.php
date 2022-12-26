@include('includes.header')
<div class=" state-level-detail-athlete state-wise-count py-5">
    <div class="container">
      {{-- <div class="row align-items-center">
        <div class="col-lg-1 col-md-2 col-3">
          <button
            type="button"
            class="background-light border-0"
            style="background-color: transparent !important"
          >
            <img
              src="images/svg/backward-arrow.svg"
              class="img-fluid backward-arrow d-block mx-auto"
              alt=""
            />
          </button>
        </div>
        <div class="col-lg-11 col-md-10 col-9">
          <h2 class="text-center">Discipline-wise Leagues at a Glance</h2>
        </div>
      </div> --}}

      <div class="row align-items-center" style=" font-size: 33px; font-weight:700; padding:5px; border-radius:7px; border: 1px solid #AFAFB4;">
            <div class="col-lg-1 col-md-2 col-3">
                <button type="button" onclick="{history.back()}" class="background-light border-0" style="background-color: transparent !important">
                    <img src="http://localhost/khelo_india_dashboard/public/front/assets/images/svg/backward-arrow.svg" class="img-fluid backward-arrow d-block mx-auto" alt="">
                </button>
            </div>
            <div class="col-lg-11 col-md-10 col-9">
              <h2 class="text-center" style="font-size: 33px; font-weight:700; ">Sports for Women - Women Leagues</h2>
            </div>
          </div>



      </div>

      <div class="container">
          <div class="row mt-5">
              <div class="col-12">
                <div id="participationbar"></div>
              </div>
          </div>
      </div>
    </div>
  </div>
@include('includes.footer')
<script>
    var dis_data = <?php echo $dis_data; ?>;
    var data_dict = {};
    data_dict["events_planned"] = {"name":"No. of Events Planned","data":[]};;
    data_dict["events_completed"] = {"name":"No. of Events Completed","data":[]};
    data_dict["category"] = [];
    for (var i = 0; i < dis_data.length ; i++)
    {
        data_dict["events_planned"]["data"].push(dis_data[i].events_planned*1.0-dis_data[i].events_completed*1.0);
        data_dict["events_completed"]["data"].push(dis_data[i].events_completed*1.0);
        data_dict["category"].push(dis_data[i].discipline);

    }
    console.log(data_dict);
    Highcharts.chart('participationbar', {
            colors: ['#ed7d31', '#4472c4'],
            chart: {
                type: 'column'
            },
            title: {
                text: 'Discipline wise status of Women Leagues - Planned and Completed'
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

                    return '<b>' + this.series.name + ': </b>' + this.y + '<br/>' +
                        '<b>Total: </b>' + this.point.stackTotal;
                }
            },
            series: [data_dict["events_planned"],data_dict["events_completed"]],
            exporting: {
                enabled: false
            }
        });

</script>