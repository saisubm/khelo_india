@include('includes.header')

<div class="center-tile-box">
	<div class="container">
		<div class="row justify-content-center ">
			<div class="col-md-5 col-12">
				<div class="center-tiles center-tile-1 text-center py-4">
					<h3 class="mb-3">Khelo India State Centres of Excellence (KISCE)</h2>
					<div class="d-flex justify-content-center">
						{{-- <a href="{{url('kisce-finance')}}" class="me-2 text-decoration-none rounded rounded-pill"><button type="button" class="btn btn-primary rounded rounded-pill"><img class="me-2" src="{{asset('public/front/assets/images/svg/Financial Status.svg')}}" alt="">Finance</button></a> --}}
						<a href="{{url('state-wise-kisce')}}" class="ms-2 text-decoration-none rounded rounded-pill"><button type="button" class="btn btn-primary rounded rounded-pill"><img class="me-2" src="{{asset('public/front/assets/images/svg/Operational Status.svg')}}" alt="">Operations</button></a>
					</div>
				</div>
			</div>
			<div class="col-md-5 col-12">
				<div class="center-tiles center-tile-2 text-center py-4">
					<h3 class="mb-3">Khelo India Centres <br/> (KIC)</h2>
					<div class="d-flex justify-content-center">
						{{-- <a href="{{url('kic-finance')}}" class="me-2 text-decoration-none rounded rounded-pill"><button type="button" class="btn btn-primary rounded rounded-pill"><img class="me-2" src="{{asset('public/front/assets/images/svg/Financial Status.svg')}}" alt="">Finance</button></a> --}}
						<a href="{{url('state-wise-khelo-india-centers')}}"  class="ms-2 text-decoration-none rounded rounded-pill"><button type="button" class="btn btn-primary rounded rounded-pill"><img class="me-2" src="{{asset('public/front/assets/images/svg/Operational Status.svg')}}" alt="">Operations</button></a>
					</div>
				</div>
			</div>
			{{-- <div class="col-md-5 col-12">
				<div class="center-tiles center-tile-3 text-center py-4">
					<h3 class="mb-3">E-Pathshala</h2>
					<div class="d-flex justify-content-center">
						<a href="javascript::void(0)" class="me-2"><img src="{{asset('public/front/assets/images/svg/Financial Status.svg')}}" alt=""></a>
						<a href="javascript::void(0)" class="ms-2"><img src="{{asset('public/front/assets/images/svg/Operational Status.svg')}}" alt=""></a>
					</div>
				</div>
			</div> --}}
			<div class="col-md-5 col-12">
				<div class="center-tiles center-tile-4 text-center py-4">
					<h3 class="mb-3">Army Boys Sports Company <br/>(ABSC)</h2>
					<div class="d-flex justify-content-center">
						{{-- <a href="{{url('absc-finance')}}" class="me-2 text-decoration-none rounded rounded-pill"><button type="button" class="btn btn-primary rounded rounded-pill"><img class="me-2" src="{{asset('public/front/assets/images/svg/Financial Status.svg')}}" alt="">Finance</button></a> --}}
						<a href="{{url('absc-details')}}"  class="ms-2 text-decoration-none rounded rounded-pill"><button type="button" class="btn btn-primary rounded rounded-pill"><img class="me-2" src="{{asset('public/front/assets/images/svg/Operational Status.svg')}}" alt="">Operations</button></a>
					</div>
				</div>
			</div>
			<div class="col-md-5 col-12">
				<div class="center-tiles center-tile-5 text-center py-4">
					<h3 class="mb-3">Sports School <br/> (SS)</h2>
					<div class="d-flex justify-content-center">
						{{-- <a href="{{url('ss-finance')}}" class="me-2 text-decoration-none rounded rounded-pill"><button type="button" class="btn btn-primary rounded rounded-pill"><img class="me-2" src="{{asset('public/front/assets/images/svg/Financial Status.svg')}}" alt="">Finance</button></a> --}}
						<a href="{{url('ss-details')}}"  class="ms-2 text-decoration-none rounded rounded-pill"><button type="button" class="btn btn-primary rounded rounded-pill"><img class="me-2" src="{{asset('public/front/assets/images/svg/Operational Status.svg')}}" alt="">Operations</button></a>
					</div>
				</div>
			</div>
		</div>
		{{-- <div class="row justify-content-center text-center py-2">

			<div class="col-auto">
				<a href="javascript::void(0)" class="me-1 text-decoration-none text-dark " ><img src="{{asset('public/front/assets/images/svg/settings-3-fill.svg')}}" class="mx-1" alt="">OPERATIONAL STATUS</a>
			</div>
			<div class="col-auto">
				<a href="javascript::void(0)" class="ms-1 text-decoration-none text-dark"><img src="{{asset('public/front/assets/images/svg/Spending-2.svg')}}" class="mx-1" alt="">FINANCIAL STATUS</a>
			</div>

		</div> --}}
	</div>
</div>
@include('includes.footer')

