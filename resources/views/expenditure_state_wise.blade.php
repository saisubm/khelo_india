@include('includes.header')

<div class="asc-kiyg asc-kiyg-detail py-4 py-md-5">
	<div class="container">
		<div class="text-center">
			<div class="toptitle pb-3 pb-md-4">
				<h1 class="text-uppercase">{{$state_details->state_name ?? ''}} Expenditure Distribution (In Cr.)</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 item">
            <h3 class="text-center">Infra Details</h3>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                           
                            <th>#</th>
                            <th>Sanction Amount</th>
                            <th>Release Amount</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @if ($infra->count())
                        @php 
                         
                          $sanction_total = 0;
                          $release_total = 0;
                         
                        @endphp
                       @foreach ($infra as $key => $val)
                       @php 
                          
                          $sanction_total =  $sanction_total+$val->amt_sanction;
                          $release_total =  $release_total+$val->amt_release;
                          
                       @endphp
                            <tr>
                                
                                <td>{{ $key+1 }}</td>
                                <td>{{ $val->amt_sanction ?? '' }}</td>
                                <td>{{ $val->amt_release ?? '' }}</td>
                                

                            </tr>
                        @endforeach
                        <tr>
                            <td class="text-center"><strong>Total</strong></td>
                            
                            <td><strong>{{ $sanction_total}}</strong></td>
                            <td><strong>{{ $release_total}}</strong></td>
                            
                        </tr>
                        @else 
                        <tr>
                            <td colspan="3" class="text-center"> No Data Found!!!</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            {{-- <div id="medal-tally-bar"></div> --}}
			</div>
			<div class="col-lg-6 item">
            
            <div class="table-responsive">
                <h3 class="text-center">KIC Details</h3>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                           
                            <th>#</th>
                            <th>Financial Year</th>
                            <th>Amount</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @if ($kic->count())
                        @php 
                         
                          $amount = 0;
                         
                        @endphp
                       @foreach ($kic as $key => $val)
                       @php 
                          
                          $amount =  $amount+$val->amount;
                          
                          
                       @endphp
                            <tr>
                                
                                <td>{{ $key+1 }}</td>
                                <td>{{ $val->f_year ?? '' }}</td>
                                <td>{{ $val->amount ?? '' }}</td>
                                

                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" class="text-center"><strong>Total</strong></td>
                            
                            <td><strong>{{ $amount}}</strong></td>
                            
                        </tr>
                        @else 
                        <tr>
                            <td colspan="3" class="text-center"> No Data Found!!!</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            {{-- <div id="medal-tally-bar"></div> --}}
			</div>
			<div class="col-lg-12 item mt-3 mt-md-4">
            
            <div class="table-responsive">
                <h3 class="text-center">KISCE Details</h3>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                           
                            <th>#</th>
                            <th>Financial Year</th>
                            <th>Centre Name</th>
                            <th>Recurring Sanctioned</th>
                            <th>Recurring Released</th>
                            <th>Non-recurring Sanctioned</th>
                            <th>Non-recurring released</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @if ($kisce->count())
                        @php 
                         
                          $recurring_sanctioned = 0;
                          $recurring_released = 0;
                          $non_recurring_sanctioned = 0;
                          $non_recurring_released = 0;
                         
                        @endphp
                       @foreach ($kisce as $key => $val)
                       @php 
                          
                          $recurring_sanctioned =  $recurring_sanctioned+$val->recurring_sanctioned;
                          $recurring_released =  $recurring_released+$val->recurring_released;
                          $non_recurring_sanctioned =  $non_recurring_sanctioned+$val->non_recurring_sanctioned;
                          $non_recurring_released =  $non_recurring_released+$val->non_recurring_released;
                          
                          
                       @endphp
                            <tr>
                                
                                <td>{{ $key+1 }}</td>
                                <td>{{ $val->f_year ?? '' }}</td>
                                <td>{{ $val->centre_name ?? '' }}</td>
                                <td>{{ $val->recurring_sanctioned ?? '' }}</td>
                                <td>{{ $val->recurring_released ?? '' }}</td>
                                <td>{{ $val->non_recurring_sanctioned ?? '' }}</td>
                                <td>{{ $val->non_recurring_released ?? '' }}</td>
                                

                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="text-center"><strong>Total</strong></td>
                            
                            <td><strong>{{ $recurring_sanctioned}}</strong></td>
                            <td><strong>{{ $recurring_released}}</strong></td>
                            <td><strong>{{ $non_recurring_sanctioned}}</strong></td>
                            <td><strong>{{ $non_recurring_released}}</strong></td>
                            
                        </tr>
                        @else 
                        <tr>
                            <td colspan="7" class="text-center"> No Data Found!!!</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            {{-- <div id="medal-tally-bar"></div> --}}
			</div>
            <div class="col-lg-12 item  mt-3 mt-md-4">
            
                <div class="table-responsive">
                    <h3 class="text-center">KIAA Details</h3>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                               
                                <th>#</th>
                                <th>Financial Year</th>
                                <th>Academy</th>
                                <th>Amount</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @if ($kiaa->count())
                            @php 
                             
                              $amount = 0;
                             
                            @endphp
                           @foreach ($kiaa as $key => $val)
                           @php 
                              
                              $amount =  $amount+$val->amount;
                              
                              
                           @endphp
                                <tr>
                                    
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $val->f_year ?? '' }}</td>
                                    <td>{{ $val->academy_name ?? '' }}</td>
                                    <td>{{ $val->amount ?? '' }}</td>
                                    
    
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="text-center"><strong>Total</strong></td>
                                
                                <td class="text-center"><strong>{{ $amount}}</strong></td>
                                
                            </tr>
                            @else 
                            <tr>
                                <td colspan="4" class="text-center"> No Data Found!!!</td>
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
