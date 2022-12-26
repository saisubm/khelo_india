@include('includes.header')
<div id="khelo-india-centers">
	<div class="container">
		<div class="row ">
			{{-- <div class="col-lg-1 col-md-2 col-3">
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
			  <h2 class="text-center">Khelo India e-Pathshala Dashboard</h2>
			 
			</div> --}}
			<div class="text-center ">
				<h1 class="text-center py-2" style="font-size: 33px; font-weight:700; padding:10px; border-radius:7px; border: 1px solid #AFAFB4;"><img src=" {{ asset('public/front/assets/images/svg/Athletes-support.svg') }}"
					class="me-1"	alt="">Khelo India e-Pathshala Dashboard</h1>
			</div>
		  </div>

		<div class="row">
			<div class="col-lg-4 col-md-6 col-12">
				<div class=" row tiles   justify-content-between align-items-center">
					<div class="col-12">
						<div class="num  d-flex align-items-center">
							<div class="num-box tile-1">300</div>
							<div class="num-text ms-2">
								<div class="text-box fw-light">No. of Users registered</div>
								<div class="vl"></div>
								<div class="text-box fw-bold">PE Teachers with infrastructure available</div>
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
				<div class="row tiles   justify-content-between align-items-center">
					<div class="col-12">
						<div class="num  d-flex align-items-center">
							<div class="num-box tile-2">238</div>
							<div class="num-text ms-2">
								<div class="text-box fw-light">No. of Users who have logged in
								</div>
								<div class="vl"></div>
								<div class="text-box fw-bold">
									PE Teachers logged in and started the course

								</div>
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
				<div class="row tiles   justify-content-between align-items-center">
					<div class="col-12">
						<div class="num  d-flex align-items-center">
							<div class="num-box tile-3">58</div>
							<div class="num-text ms-2">
								<div class="text-box fw-light">No. of modules launched</div>
								<div class="vl"></div>
								<div class="text-box fw-bold">Videos and quizzes uploaded in module package</div>
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
				<div class="row tiles   justify-content-between align-items-center">
					<div class="col-12">
						<div class="num  d-flex align-items-center">
							<div class="num-box tile-4">121</div>
							<div class="num-text ms-2">
								<div class="text-box fw-light">No. of Users who have submitted the videos</div>
								<div class="vl"></div>
								<div class="text-box fw-bold">Users Who have seen the first module of videos and quiz</div>
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
				<div class="row tiles   justify-content-between align-items-center">
					<div class="col-12">
						<div class="num  d-flex align-items-center">
							<div class="num-box tile-5">471</div>
							<div class="num-text ms-2">
								<div class="text-box fw-light">No. of Videos assessed</div>
								<div class="vl"></div>
								<div class="text-box fw-bold">Respective Assessor/ SAI Coach allocated</div>
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
				<div class="row tiles   justify-content-between align-items-center">
					<div class="col-12">
						<div class="num  d-flex align-items-center">
							<div class="num-box tile-3">39</div>
							<div class="num-text ms-2">
								<div class="text-box fw-light">No. of Users who have completed course
								</div>
								<div class="vl"></div>
								<div class="text-box fw-bold">People have completed at least one video assessment</div>
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
		</div>

		<div class="row mt-5">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead >
					  <tr style="background-color: #0e0e0e17;">
						<th >STAGES</th>
						<th >ARCHERY</th>
						<th >BOXING</th>
						<th >TABLE TENNIS</th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>No. of Registered Users</td>
						<td>100</td>
						<td>100</td>
						<td>100</td>
					  </tr>
					  <tr>
						<td>No. of Users who have completed the course</td>
						<td>11</td>
						<td>14</td>
						<td>14</td>
					  </tr>
					  <tr>
						<td>No. of Videos submitted by Users for Assessment</td>
						<td>53</td>
						<td>0<sup>*</sup></td>
						<td>436</td>
					  </tr>
					  <tr>
						<td>No. of Videos assessed by Assessors</td>
						<td>51</td>
						<td>81</td>
						<td>339</td>
					  </tr>
					  <tr>
						<td>No. of Inactive Users</td>
						<td>25</td>
						<td>2</td>
						<td>12</td>
					  </tr>
					  <tr>
						<td colspan="4" class="text-center"><i>*For Boxing, live assessment is conducted and hence video submission not required</i>						</td>
					  </tr>
					  
					</tbody>
				  </table>
			</div>
		</div>
	</div>
</div>
@include('includes.footer')