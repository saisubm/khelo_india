@include('includes.header')
<div class="cardlist verticals-dashboard" style="min-height: calc(100vh - 300px)">
    <div class="container">
        <div class="row gx-3 ">
            <div class="col-md-4">
                <ul class="nav nav-tabs border-0">
                    @foreach ($vertical as $key => $value)
                        <li class="item w-100">
                            <a href="javascript::void(0)" data-bs-toggle="tab" class="card vertiacl_parent " id = "{{$value->id}}">
                                <div class="icon"><img
                                        src="{{ asset('public/front/assets/images/svg') . '/' . $value->image }} " alt="">
                                </div>
                                <div class="icon-desc text-uppercase">
                                    <p class="mb-0">{{ $value->name }}</p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-8" >
                <div class="tab-content">
                    <div class="tab-pane container active">
                        <h3 class="text-center mb-3 mb-lg-4 mt-4 mt-md-0" id ="sub_vertical_parent"></h3>
                        <div class="row" id="sub_vertical_tab">


                        </div>
                    </div>

                </div>

                <!-- Tab panes -->

            </div>
        </div>
    </div>
</div>
@include('includes.footer')
<script>
  var base_url_vertiacl = "{{url('/')}}/";
  $(document).ready(function(){
      $('.vertiacl_parent').on('click',function(){
        var id = $(this).attr('id');
        getSubVertical(id);
     });
    // getSubVertical(1);
  });

  function getSubVertical(id = 1){
    var html = '';
    $('#sub_vertical_parent').text('');
    $.ajax({
      method: "GET",
      url:"{{url('get-seb-vertical')}}/"+id,
      beforeSend: function() {
        $.LoadingOverlay("show");
       },
       complete: function() {
        $.LoadingOverlay("hide");
       },
      success: function (response) {
        if (response.success == true) {
          $('#sub_vertical_parent').text(response.vertical_details.name);

          for(var i=0; i<response.sub_vertical.length;i++ ){
              if(response.sub_vertical[i].url == null){
                  var url ='javascript:void(0)';
                  var attr = '';
              }else if(response.sub_vertical[i].id == 6 ){
                var url =    'https://mdsd.kheloindia.gov.in/';
                var attr = 'target="_blank"';
              
              }
              else if(response.sub_vertical[i].id == 7 ){
                var url =    'https://dashboard.kheloindia.gov.in/';
                var attr = 'target="_blank"';
              }
              else if(response.sub_vertical[i].id == 18 ){
                var url =    'https://fitindia.gov.in/schooldashboard';
                var attr = 'target="_blank"';
              }
              else{
                var url = base_url_vertiacl+response.sub_vertical[i].url;
                var attr = '';
              }
            html += `<div class="col-6 item">
                                <a href="${url}" ${attr} class="card">
                                    <div class="icon"><img
                                            src="${base_url_vertiacl}public/front/assets/images/svg/${response.sub_vertical[i].image}"
                                            alt=""></div>
                                    <div class="icon-desc">
                                        <p class="mb-0 text-uppercase">${response.sub_vertical[i].name}</p>
                                    </div>
                                </a>
                            </div>`;
          }
          $('#sub_vertical_tab').html(html);

        }else{
          console.log('somthing went wrong');


        }
      }
        });
  }
</script>
