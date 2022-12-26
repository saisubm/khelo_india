@include('includes.header')


<div class="athelete-supported pt-4 pt-md-5">
	<div class="container-fluid">
		<div class="text-center">
			<h1 class="text-center"><img src="" alt="">Participation in KI{{$category}}</h1>
		</div>
		<div class="row charts-row">
			<div class="col-lg-12 item">
            <div class="box">
               <div class="row">
                   <div class="col-lg-12 pe-xl-4">
                       <div class="table-responsive khelo-indiagame-table">
                           <table class="table table-hover">
                               <thead>
                                   <tr>
                                       <th>#</th>
                                       <th>State Name</th>
                                       <th>No. of Athletes</th>
                                       <th>Girls</th>
                                       <th>Boys</th>
                                      

                                   </tr>
                               </thead>
                               <tbody>
                               
							@if(isset($data))
                               @foreach ($data as $key => $value)
                               <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$value->state}}</td>
                                <td>{{$value->no_of_athletes}}</td>
                                <td>{{$value->no_of_girls}}</td>
                                <td>{{$value->no_of_boys}}</td>
                               </tr>
                                @endforeach
                               
                                @else 
                                <tr>
                                    <td colspan="5"> No Data Found!!!</td>
                                </tr>
                                @endif
																
                               </tbody>
                           </table>
                       </div>
                   </div>
                   <!-- <div class="col-lg-6 border-start border-dark px-xl-4">
                       <div id="kiyg-chart3"></div>
                   </div> -->
               </div>
           </div>
        </div>


		</div>
	</div>
</div>
@include('includes.footer')
