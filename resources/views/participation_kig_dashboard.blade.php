@include('includes.header')
<div class="cardlist my-3 my-xl-4" style="min-height: calc(100vh - 340px);">
	<div class="khelo-india-summary">
		<div class="container">
		
			<div class="row justify-content-center">
				<div class="col-md-6 col-12">
					<a href="{{url('participation-khelo-india-games/'.encode5t('YG'))}}" class="text-decoration-none">
						<div class="khelo-summary summary-tile-6">
							<div class="row justify-content-between align-items-center mb-2">
								<div class="col-auto">
									<div class="summary-number summary-number-6">
										<h3>{{$yg_participation_data ?? ''}}</h3>
									</div>
								</div>
								<div class="col-auto">
									<img src="{{asset('public/front/assets/images/svg/s-img-7.svg')}}" alt="">
								</div>
							</div>
							<div>
								<p class="m-0 text-uppercase">KHELO INDIA YOUTH GAMES</p>
							</div>
						</div>
					</a>
	
				</div>
				<div class="col-md-6 col-12">
	
					<a href="{{url('participation-khelo-india-games/'.encode5t('UG'))}}" class="text-decoration-none">
						<div class="khelo-summary summary-tile-5">
							<div class="row justify-content-between align-items-center mb-2">
								<div class="col-auto">
									<div class="summary-number summary-number-5">
										<h3>{{$ug_participation_data ?? ''}}</h3>
									</div>
								</div>
								<div class="col-auto">
									<img src="{{asset('public/front/assets/images/s-img-1.png')}}" alt="">
								</div>
							</div>
							<div>
								<p class="m-0 text-uppercase">KHELO INDIA UNIVERSITY GAMES</p>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
@include('includes.footer')
