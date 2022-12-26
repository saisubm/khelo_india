@include('includes.header')


<div class="athelete-supported pt-4 pt-md-5">
	<div class="container-fluid">
		
        <div class="row align-items-center" style=" font-size: 33px; font-weight:700; padding:5px; border-radius:7px; border: 1px solid #AFAFB4;">
            <div class="col-lg-1 col-md-2 col-3">
                <button type="button" onclick="{history.back()}" class="background-light border-0" style="background-color: transparent !important">
                    <img src="{{ asset('public/front/assets/images/svg/backward-arrow.svg')}}" class="img-fluid backward-arrow d-block mx-auto"
                        alt="" />
                </button>
            </div>
            <div class="col-lg-11 col-md-10 col-9">
              <h2 class="text-center" style="font-size: 33px; font-weight:700; ">Participation in Khelo India Youth Games (255)</h2>
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
                                       <th>#</th>
                                       <th>State Name</th>
                                       <th>Boys KISG 2018</th>
                                       <th>Girls KISG 2018</th>
                                      <th>Total Participation KISG 2018</th>
                                      <th>Boys KIYG 2019</th>
                                       <th>Girls KIYG 2019</th>
                                      <th>Total Participation KIYG 2019</th>
                                      <th>Boys KIYG 2020</th>
                                     <th>Girls KIYG 2020</th>
                                     <th>Total Participation KIYG 2020</th>

                                   </tr>
                               </thead>
                               <tbody>
                               <tr></tr>
																
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
