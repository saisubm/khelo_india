@include('includes.header')
<div class=" state-level-detail-athlete state-wise-count py-5">
    <div class="container">
      <div class="row align-items-center py-4 border" style="border-radius: 10px">
        <div class="col-lg-1 col-md-2 col-2">
          <button type="button" class="background-light border-0" style="background-color: transparent !important">
            <img src="images/svg/backward-arrow.svg" class="img-fluid backward-arrow d-block mx-auto" alt="" />
          </button>
        </div>
        <div class="col-lg-11 col-md-10 col-10">
            <h1 class="text-center ms-3"><img src=" {{ asset('public/front/assets/images/svg/Athletes-support.svg') }}"
              style="font-size: 33px !important; font-weight:700 !important;"  alt=""> Support to National/Regional/State Sports Academies</h1>
        </div>
      </div>


      <div class="row justify-content-center">
        <div class="col-12">
          <div class="recurring-tabs py-5">
            <ul class="nav nav-pills mb-3 justify-content-center " id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                  type="button" role="tab" aria-controls="pills-home" aria-selected="true">2021-22</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                  type="button" role="tab" aria-controls="pills-profile" aria-selected="false">2020-21</button>
              </li>


            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                tabindex="0">
                <div class="col-12 border mt-4">
                  <div class="row align-items-center">
                    <div class="col-md-6 col-12">
                      <div class="py-5 px-1">
                        <figure class="competetion-organised">
                          <div id="recurring-1"></div>

                        </figure>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="table-responsive" id="budget_component">

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                tabindex="0">
                <div class="col-12 border mt-4">
                  <div class="row justify-content-center">
                    <div class="col-md-6 col-12">
                      <div class="py-5 px-1">
                        <figure class="competetion-organised">
                          <div id="recurring-2"></div>

                        </figure>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="table-responsive" id="budget_component_2"></div>
                    </div>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>



@include('includes.footer')
<script>
    Highcharts.chart('recurring-1', {
      colors: ['#290cbe', '#fea50c', '#2cccde'],
      chart: {
        type: 'pie'
      },
      title: {
        text: '',
        align: 'center'
      },
      subtitle: {
        text: '',
        align: ''
      },

      accessibility: {
        announceNewData: {
          enabled: true
        },
        point: {
          valueSuffix: 'in Cr.'
        }
      },

      plotOptions: {
        series: {
          dataLabels: {
            enabled: true,
            format: '{point.name}: {point.y:.1f} Cr'
          },
          cursor: 'pointer',
          point: {
            events: {
              click: function () {

                if (this.name == 'Non-Recurring') {
                  document.getElementById('budget_component').innerHTML = `<table class="table table-bordered">
                      <thead>
          <tr>
            <th colspan="3" class="text-center">Non-Recurring Budget for the Year 2021-2022</th>
          </tr>
        </thead>
                      <thead>
          <tr>
            <th>SN</th>
            <th>Expenditure Head</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
         
          <tr>
            <td>1</td>
            <td>Support to Academies through NSF/ TOPS NCOEs </td>
            <td>14313824</td>
         
            
           
          </tr>
          <tr>
            <td>2</td>
            <td>Support to Academies through NSF/ TOPS NCOEs</td>
            <td>5500000</td>
           
           
          </tr>
          <tr>
            <td>3</td>
            <td>Infrastructure upgradation</td>
            <td>32750000</td>
          </tr>
          <tr>
            <td>4</td>
            <td>Khelo India State Centre of Excellence - NR</td>
            <td>99145787.49</td>
          </tr>
        </tbody>
      </table>`;

                }
                else if (this.name == 'Recurring') {
                  document.getElementById('budget_component').innerHTML = `<div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th colspan="3" class="text-center">Recurring Budget for the Year 2021-2022</th>
          </tr>
        </thead>
        <thead>
          <tr>
            <th>SN</th>
            <th>Expenditure Head</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
         
          <tr>
            <td>1</td>
            <td>Support to Academies through NSF/ TOPS NCOEs</td>
            <td>1498000</td>
         
            
           
          </tr>
          <tr>
            <td>2</td>
            <td>Purchase of Sports Equipment</td>
            <td>22456248</td>
           
           
          </tr>
         
         
        </tbody>
      </table>`
                }
                // alert(this.key);
                // document.getElementById('pills-contact').classList='active';
                //alert('value: ' + this.category);
                // document.getElementById('pills-home-tab').classList.toggle('active')
                // document.getElementById('pills-contact-tab').classList.toggle('active')
                // document.getElementById('pills-contact').classList.toggle('active')
                // document.getElementById('pills-contact').classList.toggle('show')
                // document.getElementById('pills-home').classList.toggle('show')
                // document.getElementById('pills-home').classList.toggle('active')
                // alert(this.name)



              }
            }
          }
        },
        pie: {
          showInLegend: true
        }
      },

      tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
      },
      exporting: {
        enabled: false
      },

      series: [
        {
          innerSize: '50%',
          name: '',
          colorByPoint: true,
          data: [
            {
              key: '2021',
              name: 'Recurring',
              y: 2.395,
              // drilldown: 'Chrome'
            },
            {
              key: '2021',
              name: 'Non-Recurring',
              y: 13.739,
              // drilldown: 'Safari'
            }

          ],
        }
      ],
    });



    Highcharts.chart('recurring-2', {
      colors: ['#290cbe', '#fea50c', '#2cccde'],
      chart: {
        type: 'pie'
      },
      title: {
        text: '',
        align: 'center'
      },
      subtitle: {
        text: '',
        align: ''
      },

      accessibility: {
        announceNewData: {
          enabled: true
        },
        point: {
          valueSuffix: 'in Cr.'
        }
      },

      plotOptions: {
        series: {
          dataLabels: {
            enabled: true,
            format: '{point.name}: {point.y:.1f} Cr'
          },
          cursor: 'pointer',
          point: {
            events: {
              click: function () {
                if (this.name == 'Non-Recurring') {
                  document.getElementById('budget_component_2').innerHTML = `<table class="table table-bordered">
                      <thead>
          <tr>
            <th colspan="3" class="text-center">Non-Recurring Budget for the Year 2020-2021</th>
          </tr>
        </thead>
                      <thead>
          <tr>
            <th>SN</th>
            <th>Expenditure Head</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
         
          <tr>
            <td>1</td>
            <td>Infrastructure Upgradation </td>
            <td>22875000</td>
         
            
           
          </tr>
          <tr>
            <td>2</td>
            <td>Support to Academies through NSF/ TOPS NCOEs</td>
            <td>34693712</td>
          </tr>
        </tbody>
      </table>`;

                }
                else if (this.name == 'Recurring') {
                  document.getElementById('budget_component_2').innerHTML = `<div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th colspan="3" class="text-center">Recurring Budget for the Year 2020-2021</th>
          </tr>
        </thead>
        <thead>
          <tr>
            <th>SN</th>
            <th>Expenditure Head</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
         
          <tr>
            <td colspan="3">No Data available!</td>
           
          </tr>
        </tbody>
      </table>`
                }
              }
            }
          }
          },
          pie: {
            showInLegend: true
          }
        },

        tooltip: {
          headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
          pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
        },
        exporting: {
          enabled: false
        },

        series: [
          {
            innerSize: '50%',
            name: '',
            colorByPoint: true,
            data: [
              {
                key: '2020',
                name: 'Recurring',
                y: 0,
                // drilldown: 'Chrome'
              },
              {
                key: '2020',
                name: 'Non-Recurring',
                y: 5.756,
                // drilldown: 'Safari'
              }

            ],
          }
        ],
      });


  </script>