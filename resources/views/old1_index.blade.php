@include('includes.header')







<div class="khelo-india-summary">
	<div class="container">
		<div class="row py-5">
			<div class="col-lg-4 col-md-6 col-12">
				<a href="{{url('participation-khelo-india-games-dasboard')}}" class="text-decoration-none">
					<div class="khelo-summary summary-tile-1">
						<div class="row justify-content-between align-items-center mb-2">
							<div class="col-auto">
								<div class="summary-number summary-number-1">
									<h3>31542</h3>
								</div>
							</div>
							<div class="col-auto">
								<img src="{{asset('public/front/assets/images/s-img-1.png')}}" alt="">
							</div>
						</div>
						<div>
							<p class="m-0 text-uppercase">Participation in Khelo India Games</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
				<a href="https://fitindia.gov.in/schooldashboard" class="text-decoration-none">
					<div class="khelo-summary summary-tile-2">
						<div class="row justify-content-between align-items-center mb-2">
							<div class="col-auto">
								<div class="summary-number summary-number-2">
									<h3>23.68 Cr</h3>
								</div>
							</div>
							<div class="col-auto">
								<img src="{{asset('public/front/assets/images/svg/s-img-2.svg')}}" alt="">
							</div>
						</div>
						<div>
							<p class="m-0 text-uppercase">Fit India events participation</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
				<a href="{{route('GetFinancialAssitanceAthleteSummary')}}" class="text-decoration-none">
					<div class="khelo-summary summary-tile-3">
						<div class="row justify-content-between align-items-center mb-2">
							<div class="col-auto">
								<div class="summary-number summary-number-3">
									<h3>23080</h3>
								</div>
							</div>
							<div class="col-auto">
								<img src="{{asset('public/front/assets/images/svg/s-img-3.svg')}}" alt="">
							</div>
						</div>
						<div>
							<p class="m-0 text-uppercase">Athletes supported</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
			<a href="{{url('coaches-support-staff')}}" class="text-decoration-none">
				<div class="khelo-summary summary-tile-4">
					<div class="row justify-content-between align-items-center mb-2">
						<div class="col-auto">
							<div class="summary-number summary-number-4">
								<h3>1327</h3>
							</div>
						</div>
						<div class="col-auto">
							<img src="{{asset('public/front/assets/images/svg/s-img-2.svg')}}" alt="">
						</div>
					</div>
					<div>
						<p class="m-0 text-uppercase">Coaches and Support Staff</p>
					</div>
				</div>
			</a>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
				<a href="https://fitindia.gov.in/schooldashboard" class="text-decoration-none">
					<div class="khelo-summary summary-tile-5">
						<div class="row justify-content-between align-items-center mb-2">
							<div class="col-auto">
								<div class="summary-number summary-number-5">
									<h3>{{$total_fit_india}}</h3>
								</div>
							</div>
							<div class="col-auto">
								<img src="{{asset('public/front/assets/images/s-img-1.png')}}" alt="">
							</div>
						</div>
						<div>
							<p class="m-0 text-uppercase">Fit India School Flag</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
				<a href="{{url('academic_support')}}" class="text-decoration-none">
					<div class="khelo-summary summary-tile-6">
						<div class="row justify-content-between align-items-center mb-2">
							<div class="col-auto">
								<div class="summary-number summary-number-6">
									<h3>1004</h3>
								</div>
							</div>
							<div class="col-auto">
								<img src="{{asset('public/front/assets/images/svg/s-img-7.svg')}}" alt="">
							</div>
						</div>
						<div>
							<p class="m-0 text-uppercase">Academies supported</p>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>
@include('includes.footer')
