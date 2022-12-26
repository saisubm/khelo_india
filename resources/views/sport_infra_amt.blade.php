@include('includes.header')

<div class="asc-kiyg asc-kiyg-detail py-4 py-md-5">
	<div class="container">
		<div class="text-center">
			<div class="toptitle pb-3 pb-md-4">
				<h1 class="text-uppercase">State Wise Sport Infrastructure Sanction‌ Amount (In Cr.)</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 item">
            
            <div class="table-responsive medal-tally-table">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                           
                            <th>#</th>
                            <th>State Name</th>
                            <th>No. of Projects</th>
                            <th>Sanction Amount</th>
                            <th>Release Amount</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data->count())
                        @php 
                          $project = 0;
                          $sanction_total = 0;
                          $release_total = 0;
                         
                        @endphp
                       @foreach ($data as $key => $val)
                       @php 
                          $project =  $project + $val->no_of_project;
                          $sanction_total =  $sanction_total+$val->amt_sanction;
                          $release_total =  $release_total+$val->amt_release;
                          
                       @endphp
                            <tr>
                                
                                <td>{{ $key+1 }}</td>
                                <td>{{ $val->state->state_name ?? '' }}</td>
                                <td>{{ $val->no_of_project ?? '' }}</td>
                                <td>{{ $val->amt_sanction ?? '' }}</td>
                                <td>{{ $val->amt_release ?? '' }}</td>
                                

                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2"><strong>Total</strong></td>
                            <td><strong>{{ $project}}</strong></td>
                            <td><strong>{{ $sanction_total}}</strong></td>
                            <td><strong>{{ $release_total}}</strong></td>
                            
                        </tr>
                        @else 
                        <tr>
                            <td colspan="5"> No Data Found!!!</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            {{-- <div id="medal-tally-bar"></div> --}}
			</div>
        
		</div>
	</div>
</div>


@include('includes.footer')
