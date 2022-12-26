@include('includes.header')

<script src="{{asset('public/front/global.js')}}"></script>

<div class="athelete-supported pt-4 pt-md-5">
	<div class="container-fluid">
		{{-- <div class="text-center">
			<h1 class="text-center"><img src="" alt="">KISCE Finance-2022</h1>
		</div> --}}
        <div class="container">
            <div class="row align-items-center" style=" font-size: 33px; font-weight:700; padding:5px; border-radius:7px; border: 1px solid #AFAFB4;">
              <div class="col-lg-1 col-md-2 col-3">
                <button
                onclick="{history.back()}"
                  type="button"
                  class="background-light border-0"
                  style="background-color: transparent !important"
                >
                  <img
                  src="{{ asset('public/front/assets/images/svg/backward-arrow.svg')}}"
                    class="img-fluid backward-arrow d-block mx-auto"
                    alt=""
                  />
                </button>
              </div>
              <div class="col-lg-11 col-md-10 col-9">
                <h2 class="text-center" style="font-size: 33px; font-weight:700; ">KIC Finance</h2>
              </div>
            </div>
            
           
          
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
                                       <th rowspan="2">#</th>
                                       <th rowspan="2">Name of State</th>
                                       <th colspan="2">2022-23</th>
                                       <th colspan="2">2021-22</th>
                                       <th colspan="2">2020-21</th>
                                       <th colspan="2">Grand Total</th>
                                    </tr>
                                    <tr>
                                       <th>Released Amount</th>
                                       <th>UC Amount</th>
                                       <th>Released Amount</th>
                                       <th>UC Amount</th>
                                       <th>Released Amount</th>
                                       <th>UC Amount</th>
                                       <th>Released Amount</th>
                                       <th>UC Amount</th>
                                   </tr>
                               </thead>
                               <tbody>
                                @foreach($data as $key => $value)
                               <tr>
                               <td>{{$key+1}}</td>
                               <td>{{$value->state ?? ''}}</td>
                               <td>{{$value->release_amt_2022_23 ?? ''}}</td>
                               <td>{{$value->uc_2022_23 ?? ''}}</td>
                               <td>{{$value->release_amt_2021_22 ?? ''}}</td>
                               <td>{{$value->uc_2021_22 ?? ''}}</td>
                               <td>{{$value->release_amt_2020_21 ?? ''}}</td>
                               <td>{{$value->uc_2020_21 ?? ''}}</td>
                               <td>{{$value->release_amt_grant_total ?? ''}}</td>
                               <td>{{$value->uc_grant_total ?? ''}}</td>
                               </tr>
								@endforeach								
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

