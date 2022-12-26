@include('includes.header')

<div class="state-level-detail-athlete state-wise-count py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-1 col-md-2 col-3">
          <button
            type="button"
            class="background-light border-0"
            style="background-color: transparent !important"
          >
            <img
              src="{{asset('public/front/asset/images/svg/backward-arrow.svg')}}"
              class="img-fluid backward-arrow d-block mx-auto"
              alt=""
            />
          </button>
        </div>
        <div class="col-lg-11 col-md-10 col-9">
          <h2 class="text-center">Paralympics Committee of India for PWD</h2>
        </div>
      </div>
      
     
      <div class="row justify-content-center">
        
        

        <div class="col-lg-6 col-md-12 col-12 border mt-4">
          <div class="py-5 px-1">
           <figure class="competetion-organised">
             <div id="paralympics"></div>
            
         </figure>
          </div>
          </div>

          <div class="col-lg-6 col-md-12 col-12 border mt-4">
            <div class="py-5 px-1">
             <figure class="competetion-organised">
               <div id="paralympics-2"></div>
              
           </figure>
            </div>
            </div>
         
      </div>
      </div>
    </div>
  </div>

@include('includes.footer')
<script>
    Highcharts.chart('paralympics', {
colors:['#290cbe','#f37022'],
  chart: {
      type: 'column'
  },
  title: {
      text: 'Fund Disbursement and Utilizations (in INR cr)'
  },
  subtitle: {
      text: ''
  },
  xAxis: {
      categories: [
          '2018-19',
          '2019-20',
          '2020-21'
        
      ],
      crosshair: true
  },
  yAxis: {
      min: 0,
      title: {
          text: ''
      }
  },
  tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
          '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
  },
  plotOptions: {
      column: {
          pointPadding: 0.2,
          borderWidth: 0
      }
  },
  exporting: {
      enabled: false
  },
  series: [{
      name: 'Fund Released',
      data: [6.7, 4, 12]

  }, {
      name: 'Fund Utilzed',
      data: [5, 3.2, 8.5]

  }]
});


Highcharts.chart('paralympics-2', {
colors:['#290cbe','#f37022'],
  chart: {
      type: 'column'
  },
  title: {
      text: 'Fund Disbursement and Utilizations (in INR cr)'
  },
  subtitle: {
      text: ''
  },
  xAxis: {
      categories: [
          'Training',
          'Infrastructure',
          'Event/Competetion',
          'Misc'
        
      ],
      crosshair: true
  },
  yAxis: {
      min: 0,
      title: {
          text: ''
      }
  },
  tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
          '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
  },
  plotOptions: {
      column: {
          pointPadding: 0.2,
          borderWidth: 0
      }
  },
  exporting: {
      enabled: false
  },
  series: [{
      name: 'Released',
      data: [6.7, 4, 12,15]

  }, {
      name: 'Utilzed',
      data: [5, 3.2, 8.5,10]

  }]
});

  </script>