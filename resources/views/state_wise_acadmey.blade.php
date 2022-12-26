@include('includes.header')


<div class="athelete-supported pt-4 pt-md-5">
	<div class="container-fluid">
		<div class="text-center">
			<h1 class="text-center"><img src="" alt="">{{$state_name}} Wise Academies </h1>
		</div>
		<div class="row charts-row">
			<div class="col-lg-12 item">
            <div class="box mb-3">
					<div id="participationbar"></div>
				</div>
            <div class="box">
               <!-- //<h5 class="text-center mt-2 pb-3">Financial Year</h5> -->
               <div class="row">
                   <div class="col-lg-6 pe-xl-4">
                       <div class="table-responsive">
                           <table class="table table-hover">
                               <thead>
                                   <tr>
                                       <th>#</th>
                                       <th>Academy</th>
                                       <th>Academy total</th>
                                   </tr>
                               </thead>
                               <tbody>
                               @foreach ($scheme_data['schemeAcademySummary'] as $key => $value)
                               <tr>
                               <td>{{ $key + 1 }}</td>
                               <td>{{ $value['SchemeName'] ?? '' }}</td>
                               <td>{{ $value['AcademyCount'] ?? '' }}</td>
                             </tr>
                                @endforeach
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
        </div>


		</div>
	</div>
</div>
@include('includes.footer')

<script>
$(document).ready(function(){

  var scheme_name = <?php echo $scheme_name ?>;
  var scheme_count = <?php echo $scheme_count ?>;
  var total_count = <?php echo $total_count ?>;



 //KIYG Chart 3
 Highcharts.chart('kiyg-chart3',  {
colors: ['#F37022'],
 chart: {
     type: 'column'
 },
 title: {
     text: 'Academy ('+ total_count +')'
 },
 subtitle: {
     text: null
 },
 xAxis: {
     categories:scheme_name,
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
     name: 'Academy',
     data: scheme_count,

 }],
 exporting: {
 enabled: false
}
});
    });

</script>
