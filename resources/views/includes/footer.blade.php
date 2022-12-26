<footer class="footer">
    <div class="container">
        <h3>Website Content is managed by Sports Authority of India. Khelo India @ 2018</h3>
        <p>For further information, please visit the Khelo India Website <a href="https://kheloindia.gov.in/" target="_blank">https://kheloindia.gov.in/</a></p>
        <p class="email-phone"><i class="fa fa-envelope" aria-hidden="true"></i> Email ID: <a href="mailto: kheloindia@gov.in">kheloindia@gov.in</a></p>
        <span class="text-white d-none d-md-inline-block">|</span>
        <p class="email-phone"><i class="fa fa-phone fa-rotate-90" aria-hidden="true"></i> Phone Number: 011 2338 3336</p>
        <div class="social_icon">
            <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
            <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
            <a href="javascript:void(0)"><i class="fab fa-whatsapp"></i></a>
            <a href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>
</footer>

<!-- The Modal -->
<div class="modal fade common-modal" id="login">
    <div class="modal-dialog modal-md modal-dialog-centered">
      <div class="modal-content">
        {{-- <div class="modal-header">
          <h4 class="modal-title">LogIn</h4>
          
        </div> --}}
        <div class="modal-body">
          <div class="login-logo mb-3 mb-lg-4">
            <span class="border d-block rounded p-2">
              <img src="{{ asset('public/front/assets/images/group-logo.svg')}}" alt="" class="img-fluid">
            </span>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
          <div class="text-danger server_error"></div>
          <form  id="user_login">
            @csrf
              <div class="mb-3">
                  <input type="text" autocomplete="off" class="form-control" placeholder="Email" name="email" id="email">
                  
              </div>
              <div class="mb-3">
                <div class="showpassword-wrap">
                  <input type="password" class="form-control hide_password" placeholder="Password" name="password" id="password">
                  <a href="javascript:void(0)" class="eye-icon"><i class="fas fa-eye-slash"></i> <i class="fas fa-eye"></i></a>
                </div>                
                
                <a href="javascript:void(0)" class="d-block forgetpassword" data-bs-toggle="modal" data-bs-target="#forgetPassword">Forget Password?</a>
            </div>
            <div class="mb-0">
                <button type="submit" class="btn btn-primary login_form_btn w-100">LogIn</button>
            </div>
          </form>
        </div>
  
      </div>
    </div>
  </div>
<div class="modal fade common-modal" id="forgetPassword">
    <div class="modal-dialog modal-md modal-dialog-centered">
      <div class="modal-content">
        {{-- <div class="modal-header">
          <h4 class="modal-title">LogIn</h4>
          
        </div> --}}
        <div class="modal-body">
          <div class="login-logo mb-3 mb-lg-4">
            <span class="border d-block rounded p-2">
              <img src="{{ asset('public/front/assets/images/group-logo.svg')}}" alt="" class="img-fluid">
            </span>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
          <div class="text-danger server_error_forget"></div>
          <div class="text-success server_success_forget"></div>
          <form  id="forget_password">
            @csrf
              <div class="mb-3">
                  <input type="text" autocomplete="off" class="form-control" placeholder="Email" name="email" id="reset_email">
              </div>
              
            <div class="mb-0 text-end">
                <button type="submit" class="btn btn-primary forget_password_btn w-100">Send Password Reset Link</button>
            </div>
          </form>
        </div>
  
      </div>
    </div>
  </div>

<script src="{{asset('public/front/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('public/front/assets/js/jquery.validate.min.js')}}"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://rawgit.com/highcharts/rounded-corners/master/rounded-corners.js"></script>
<script src="{{ asset('public/front/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('public/front/assets/js/owl.carousel.js')}}"></script>
<script src="{{ asset('public/front/assets/js/jquery.fancybox.pack.js')}}"></script>
<script src="{{ asset('public/front/assets/js/aos.js')}}"></script>
<script src="{{ asset('public/front/assets/js/custom.js')}}"></script>
<script src="{{ asset('public/front/assets/js/jquery-ui.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
</body>
</html>
<script>
  $(document).on('click','.eye-icon', function(){
    $(this).toggleClass('eyeactive');
    if($('#password').hasClass('hide_password')){
      $('#password').attr('type', 'text');
      $('#password').removeClass('hide_password');
    }else{
      $('#password').attr('type', 'password');
      $('#password').addClass('hide_password');
    }

  })

$.LoadingOverlay("show");
$(window).on('load',function() {
  setTimeout(function(){
      $.LoadingOverlay("hide");
  }, 2000);
});
var base_url = "{{url('/')}}";
$(document).on('click','.login_form_btn',function(e){
  e.preventDefault();
  
  $('.server_error').html('');
  $('.server_error_forget').html('');
  $('.server_success_forget').html('');
  $('#user_login').submit();
})
$('#user_login').validate({
            rules: {
                
                email: {
                    required: true,
                    email: true,
                },
                
                password: {
                    required: true,
                },
             },
            messages: {
              
                email: {
                    required: "Please enter email address",
                    email: "Please enter a vaild email address"
                },
                password: {
                    required: "please enter password."
                }
               
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-control').after(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function (form) {
        var form = $('#user_login')[0];
        var data = new FormData(form);
        $.ajax({
          type: "POST",
          url: "{{route('user.login')}}",
          data: data,
          processData: false,
          contentType: false,
          cache: false,
          beforeSend: function() {
            $.LoadingOverlay("show");
        },
        complete: function() {
          $.LoadingOverlay("hide");
      },
          success: function (response) {
            if (response.status == true) {
            window.location.href = "{{route('admin.dashboard')}}";
            }else {
              $.LoadingOverlay("hide");
              $('.server_error').html(`<div class="alert alert-danger">${response.error}</div>`);
            
            }
          },
        });
      }
        });
$(document).on('click','.forget_password_btn',function(e){
  e.preventDefault();
  
  $('.server_error').html('');
  $('.server_error_forget').html('');
  $('.server_success_forget').html('');
  $('#forget_password').submit();
})
$('#forget_password').validate({
            rules: {
                
                email: {
                    required: true,
                    email: true,
                }
             },
            messages: {
              
                email: {
                    required: "Please enter email address",
                    email: "Please enter a vaild email address"
                },
               
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.mb-3').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function (form) {
        var form = $('#forget_password')[0];
        var data = new FormData(form);
        $.ajax({
          type: "POST",
          url: "{{route('user.forget.password')}}",
          data: data,
          processData: false,
          contentType: false,
          cache: false,
          beforeSend: function() {
            $.LoadingOverlay("show");
        },
        complete: function() {
          $.LoadingOverlay("hide");
      },
          success: function (response) {
            if (response.status == true) {
              $.LoadingOverlay("hide");
              $('.server_success_forget').html(`<div class="alert alert-success">${response.message}</div>`);
              $('#forget_password')[0].reset();
            }else {
              $.LoadingOverlay("hide");
              $('.server_error_forget').html(`<div class="alert alert-danger">${response.error}</div>`);
            
            }
          },
        });
      }
        });
        $('#forgetPassword').on('hidden.bs.modal', function () {
          $('#reset_email').removeClass('is-invalid');
          $('.server_success_forget').html('');
          $('.server_error_forget').html('');
          $('#forget_password')[0].reset();
          
        })
        $('#login').on('hidden.bs.modal', function () {
          $('#email').removeClass('is-invalid');
          $('#password').removeClass('is-invalid');
          $('#user_login')[0].reset();
          $('.server_error').html('');
         
        })
</script>
