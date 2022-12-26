@include('includes.header')

<div class="landing-crousel">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="4000">
                <img src="{{asset('public/front/assets/images/pb-1.jpg')}}" class="d-none d-md-block w-100 p-0" alt="...">
                <img src="{{asset('public/front/assets/images/mb-1.jpg')}}" class="d-block d-md-none w-100 p-0" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="4000">
                <img src="{{asset('public/front/assets/images/pb-2.jpg')}}" class="d-none d-md-block w-100 p-0" alt="...">
                <img src="{{asset('public/front/assets/images/mb-2.jpg')}}" class="d-block d-md-none w-100 p-0" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="4000">
                <img src="{{asset('public/front/assets/images/pb-3.jpg')}}" class="d-none d-md-block w-100 p-0" alt="...">
                <img src="{{asset('public/front/assets/images/mb-3.jpg')}}" class="d-block d-md-none w-100 p-0" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="4000">
                <img src="{{asset('public/front/assets/images/pb-4.jpg')}}" class="d-none d-md-block w-100 p-0" alt="...">
                <img src="{{asset('public/front/assets/images/mb-4.jpg')}}" class="d-block d-md-none w-100 p-0" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="4000">
                <img src="{{asset('public/front/assets/images/pb-5.jpg')}}" class="d-none d-md-block w-100 p-0" alt="...">
                <img src="{{asset('public/front/assets/images/mb-5.jpg')}}" class="d-block d-md-none w-100 p-0" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
</div>

<div class="khelo-india-summary landing-tiles">
<div class="container">

<div class="row py-5">
<h2 class="text-center mb-3" style="font-size: 36px; font-weight: 700;">KHELO INDIA AT A GLANCE</h2>
<div class="col-lg-4 col-md-6 col-12">
    <a href="{{url('participation-khelo-india-games-dasboard')}}" class="text-decoration-none">
        <div class="khelo-summary summary-tile-1">
            <div class="row justify-content-between align-items-center mb-2">
                <div class="col-auto">
                    <div class="summary-number summary-number-1">
                        <h3>27073</h3>
                    </div>
                </div>
                <div class="col-auto">
                    <img src="{{asset('public/front/assets/images/s-img-1.png')}}" alt="">
                </div>
            </div>
            <div>
                <p class="m-0">Participation in Khelo India Games</p>
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
            <p class="m-0">FIT India events participation</p>
        </div>
    </div>
   </a>
</div>
<div class="col-lg-4 col-md-6 col-12">
    <a href="javascript::void(0)" class="text-decoration-none">
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
            <p class="m-0">Athletes supported</p>
        </div>
    </div>
    </a>
</div>
<div class="col-lg-4 col-md-6 col-12">
    <a href="javascript::void(0)" class="text-decoration-none">
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
            <p class="m-0">Coaches and Support Staff</p>
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
                    <h3>{{$total_fit_india ?? '0'}}</h3>
                </div>
            </div>
            <div class="col-auto">
                <img src="{{asset('public/front/assets/images/s-img-1.png')}}" alt="">
            </div>
        </div>
        <div>
            <p class="m-0">FIT India School Flag</p>
        </div>
    </div>
</a>
</div>
<div class="col-lg-4 col-md-6 col-12">
    <a href="javascript::void(0)" class="text-decoration-none">
    <div class="khelo-summary summary-tile-6">
        <div class="row justify-content-between align-items-center mb-2">
            <div class="col-auto">
                <div class="summary-number summary-number-6">
                    <h3>1004</h3>
                </div>
            </div>
            <div class="col-auto">
                <img src="{{asset('public/front/assets/images/s-img-1.png')}}" alt="">
            </div>
        </div>
        <div>
            <p class="m-0">Academies supported</p>
        </div>
    </div>
</a>
</div>
</div>
</div>
</div>
</div>

@include('includes.footer')