@include('includes.header')
<div class="overview pt-4 pt-lg-5">
	<div class="container">
		<div class="overview-title">
			<h1 class="text-center"><i class="fas fa-eye me-2"></i>OVERVIEW OF KHELO INDIA</h1>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-3 item">
				<a href="{{url('athletes')}}" class="box d-block">
					<div class="icon"><img src="{{ asset('public/front/assets/images/svg/Athletes.svg')}}" alt=""></div>
					<h3>ATHLETES</h3>
				</a>
			</div>
			<div class="col-sm-6 col-md-3 item">
				<a href="{{url('coaches-support-staff')}}" class="box d-block">
					<div class="icon"><img src="{{ asset('public/front/assets/images/svg/couch.svg')}}" alt=""></div>
					<h3>COACHES & SUPPORT STAFF</h3>
				</a>
			</div>
			<div class="col-sm-6 col-md-3 item">
				<a href="{{url('academic_support')}}" class="box d-block">
					<div class="icon"><img src="{{ asset('public/front/assets/images/svg/Academies.svg')}}" alt=""></div>
					<h3>ACADEMIES</h3>
				</a>
			</div>
			<div class="col-sm-6 col-md-3 item">
				<a href="{{url('expenditure')}}" class="box d-block">
					<div class="icon"><img src="{{ asset('public/front/assets/images/svg/Spending.svg')}}" alt=""></div>
					<h3>EXPENDITURE</h3>
				</a>
			</div>
		</div>
		<div class="backto d-flex justify-content-center mt-3 mt-md-4">
			<a href="{{url('/')}}"><i class="fas fa-arrow-left"></i> Back</a>
		</div>
	</div>
</div>
@include('includes.footer')
