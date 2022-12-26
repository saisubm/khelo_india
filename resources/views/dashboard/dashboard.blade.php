@include('includes.header')
<div class="dashboard-main">
    <div class="container">
        <div class="title-dashboard text-center">
            <h1>DASHBOARD</h1>
        </div>
        <div class="row">
            <div class="col-sm-6 item mb-3 mb-sm-0">
                <a href="{{url('dashboard/index/'.encode5t(0))}}" class="card text-center">
                    <div class="icon"><i class="fas fa-university"></i></div>
                    <h3>Public Dashboard</h3>
                    <div class="arrowgo"><i class="fas fa-arrow-right"></i></div>
                </a>
            </div>
            <div class="col-sm-6 item mb-3 mb-sm-0">
                <a href="{{url('dashboard/index/'.encode5t(1))}}" class="card text-center">
                    <div class="icon"><i class="far fa-calendar-check"></i></div>
                    <h3>Attendance Dashboard</h3>
                    <div class="arrowgo"><i class="fas fa-arrow-right"></i></div>
                </a>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')