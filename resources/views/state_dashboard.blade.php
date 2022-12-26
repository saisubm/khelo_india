@include('includes.header')

<div class="state-map">
	<div class="container">
		<div class="text-center mb-lg-4"><h1>STATE WISE DISTRIBUTION OF KHELO INDIA CENTRES</h1></div>
		<div class="mb-3 mb-lg-4">
			<h2 class="text-uppercase"><span>{{$count ?? ''}}</span>{{$state_details->state_name ?? ''}}</h2>
		</div>
		<div class="state-mapwraper text-center">
			<div class="statemap-svg">
                @php
                $id = explode('/',url()->current());
                 @endphp
                 {!! file_get_contents('public/front/assets/images/state_svg/'.$state_details->id.'.svg') !!}

					<div class="backto d-flex justify-content-center mt-3 mt-md-4">
						<a href="{{url('/')}}"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="statepopup" id="statepopup">

                        <div class="statepinner ">
                           <span class = "district_name"></span>
                            <hr>
                            Total Number of Centres : <span class="test_count"></span> <br>

                        </div>
                    </div>

					<!-- State Modal Onclick on path -->
					<div class="modal fade" id="statemodal-modal">
					  <div class="modal-dialog modal-lg modal-dialog-centered">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title" id="mod_district_name"></h4>
					        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					      </div>
					      <div class="modal-body">
					        <div class="table-responsive">
					        	<table class="table text-start" id="table_data">
					        		<tr>
					        			<th>Discipline</th>
					        			<th>Athletes</th>
					        		</tr>
					        		<tr>
					        			<td>Hockey</td>
					        			<td>25</td>
					        		</tr>
					        		
					        	</table>
					        </div>
					      </div>
					    </div>
					  </div>
					</div>

				</div>
			</div>
	</div>
</div>

@include('includes.footer')
<script>
   
    var district_id;
    
   var map_data = <?php echo $map_data ?>;
    $('path').mouseover(function(event) {
    var parentOffset = $(this).parent().offset();
    var relX = event.pageX - parentOffset.left;
    var relY = event.pageY - parentOffset.top + 80;
    $('.statepopup').css({top: relY,left: relX}).show();
    var current_state_id =  $(this).attr('id');
    $('.district_name').text(map_data[current_state_id * 1 ]['district_name']);
    district_id = map_data[current_state_id * 1 ]['id']
    $('.test_count').text(map_data[current_state_id * 1 ]['total'])

   });


   $('path').mouseout(function(event) {

      $('.statepopup').hide();
   });

   $('.statemap-svg path').on('click', function() {
    //$('#statemodal-modal').modal("show");
    
    $('#table_data').html('');
    $('#mod_district_name').html('');
    var token = $("#csrf").attr('content');
     $.ajax({
        method: "POST",
        url: "{{url('getCenterNameDistrictWise')}}",
      beforeSend: function() {
        
       },
       complete: function() {
      
       },
       type: 'POST',
            data: {
                _token: token,
                district_id: district_id,
                
            },
            success: function(response) {
                if (response.success == true) { 
                    $('#table_data').html(response.html);
                    $('#mod_district_name').html(response.district_details.district_name);
                    $('#statemodal-modal').modal("show");
                }
            }
     });

    
   });
</script>