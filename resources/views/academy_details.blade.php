@include('includes.header')

<div class="athelete-supported py-4 py-md-5 academic-details">
    <div class="container">
        <div class="text-center mb-3 mb-md-4">
			<h1 class="text-center">{{decode5t($scheme_name)}}</h1>
		</div>
        <div class="card box-shadow p-3 bg-white shadow border-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover"  id="data_table">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th style="width: 40%">Name</th>
                            <th>State Name</th>
                            <th>Male</th>
                            <th>Female</th>
                            <th>Total</th>
                            <th>View Attendance</th>
                        </tr>
                    </thead>
                    <tbody>
                       @if(count($data))
                            @foreach($data as $key => $value)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$value['academy_name'] ?? ''}}</td>
                                <td>{{$value['state_name'] ?? ''}}</td>
                                <td>{{$value['M'] ?? ''}}</td>
                                <td>{{$value['F'] ?? ''}}</td>
                                <td>{{$value['M'] + $value['F'] ?? ''}}</td>
                                <td><button class="btn pop_up" data-id="{{$value['academy_type_id']}}" data-name = "{{$value['academy_name'] ?? ''}}"> <i class="fas fa-eye"></i></button></td>
                            </tr>
                            @endforeach
                        @else 
                        <tr>
                            <td colspan="7" align="center">
                                {{__('No Data Found')}}
                            </td>
                        </tr>
                       
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal">
            <div class="modal-dialog modal-xl  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Attendance Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="javascript:void(0)">
                    <div class="row justify-content-center">
                        <div class="col-md-6 mb-3 d-flex">
                            <input type="hidden" name="academy_type_id" class="academy_type_id" value="">
                            <input type="text" name="date" class="form-control date" placeholder="dd-mm-yyyy" autocomplete="off">
                            <button class="btn btn-primary  ms-2 btn_search" disabled>Search</button>
                        </div>
                    </div>
                </form>
                <table class="table table-striped table-hover mt-lg-4">
                    <thead>
                        <tr>
                            <th>Academy Name</th>                            
                            <th>Present</th>
                            {{-- <th>Absent</th>
                            <th>Failed</th>
                            <th>Not Marked</th> --}}
                            <th>Total</th>                                 
                        </tr>
                    </thead>
                    <tbody id="table_data">
                        <tr>
                            <td colspan="6" align="center">No Data Available!</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
        

    </div>
</div>
@include('includes.footer')
<script>
    $(".date").datepicker({
                dateFormat: "dd-mm-yy",
                changeMonth: true,
                changeYear: true,
                maxDate:'0'
            });

    $(document).ready(function(){
        $('.date').on('change',function(){
           if($('.date').val() != ''){
           
            $('.btn_search').removeAttr('disabled');
           }
        });

$('.pop_up').on('click',function(){
$('.academy_type_id').val($(this).data("id"));
$('.date').val('');
$('.btn_search').attr('disabled',true);
$('#table_data').html(`<tr><td colspan="6" align="center">No Data Available!</td></tr>`);
$('.modal-title').text('Attendance Details ('+$(this).data("name")+')');
        $('#exampleModal').modal('show');
      });

        $('.btn_search').on('click',function(){
           var token = $("#csrf").attr('content'); 
            
            $.ajax({
            //     crossDomain: true,
            // dataType: 'jsonp',
            // contentType:"application/json", 
            // url: 'https://nsrsapi.kheloindia.gov.in/api/NSRS/Attendance_Summary_report', //"{{url('attendance_summary_report')}}",
            // method: 'POST',  
            url: "{{url('attendance_summary_report')}}",
            type: 'POST',
            beforeSend: function() {
                $.LoadingOverlay("show");
    },
            complete: function() {
                $.LoadingOverlay("hide");
    },
            data: {
                _token :token,
                Sports_training_centre: $('.academy_type_id').val(),
                entity: 'Academy',
                Type: "{{$role_id}}",
                date: $('.date').val(),
                IsKIA: 'no',
            },
            success: function(response) {
                if (response.success == true) {
                  
                    // <td>${response.data.Academy Name}</td>
                    //<td>${response.data.Not Marked}</td>
                    html = `<tr>
                            
                         
                        <td>${response.data.AcademyName}</td>                            
                            <td>${response.data.Present}</td>
                            <td>${response.data.Total}</td>
                            
                           </tr>`;
                  $('#table_data').html(html);
                }else{
                    console.log(response.message);
                }
 // <td>${response.data.Absent}</td>
                            // <td>${response.data.Failed}</td>
                            // <td>${response.data.NotMarked}</td>
            }
        });
        })
    });

    $(document).ready(function(){
        $('#data_table').DataTable({
       
            lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'All'],
        ],
            // dom: 'Blfrtip',    
              
    //             buttons: [
    //     'excel', 'pdf'
    // ]
        });
    });
</script>