@include('includes.header')

<div class="forgetpassword_page">
<div class="container">
  <div class="card">
    <div class="text-center">
      <h1>Reset Password</h1>
      <p>Enter your fields below to reset password</p>
    </div>
    {{-- <div class="text-danger server_error"></div>
          <div class="text-success server_message"></div> --}}
          @if (session('error'))
                        <div class="text-danger text-center alert alert-danger">
                            {{ session('error') }}
                        </div>
          @endif
          @if (session('message'))
                        <div class="text-success text-center alert alert-success">
                            {{ session('message') }}
                        </div>
          @endif
          <form  id="reset_password_form" action="{{route('reset.password.post')}}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
              <div class="mb-3">
                <label>Email</label>
                  <input type="text" autocomplete="off" class="form-control" placeholder="Email" name="email" value="{{$email}}" readonly id="email">
                  <span class="text-danger">{{ $errors->first('email') }}</span>
              </div>
              <div class="mb-3">
                <label>Password</label>
                <div class="showpassword-wrap">
                  <input type="password" class="form-control hide_password" placeholder="Password" name="password" id="password2">
                  <a href="javascript:void(0)" class="eye-icon eye-iconforget"><i class="fas fa-eye-slash"></i> <i class="fas fa-eye"></i></a>
                </div>                
                <span class="text-danger">{{ $errors->first('password') }}</span>
              </div>
              <div class="mb-3">
                <label>Confirm Password</label>
                <div class="showpassword-wrap">
                  <input type="password" class="form-control hide_password" placeholder="Confirm Password" name="password_confirmation">
                </div>                
                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
              </div>
            <div class="mb-0">
                <button type="submit" class="btn btn-primary reset_password_form_btn w-100">Reset Password</button>
            </div>
          </form>
  </div>
</div>
</div>

@include('includes.footer')
<script>
// $(document).ready(function(){
//    $('#reset_password').modal("show");
// });
  $(document).on('click','.eye-iconforget', function(){
    
    if($('#password2').hasClass('hide_password')){
      $(this).addClass('eyeactive');
      $('#password2').attr('type', 'text');
      $('#password2').removeClass('hide_password');
    }else{
      $('#password2').attr('type', 'password');
      $('#password2').addClass('hide_password');
      $(this).removeClass('eyeactive');
    }

  })

$.LoadingOverlay("show");
$(window).on('load',function() {
  setTimeout(function(){
      $.LoadingOverlay("hide");
  }, 2000);
});
var base_url = "{{url('/')}}";
$(document).on('click','.reset_password_form_btn',function(e){
  e.preventDefault();
  
  $('.server_error').html('');
  $('.server_message').html('');
  $('#reset_password_form').submit();
})
$('#reset_password_form').validate({
            rules: {
                
                email: {
                    required: true,
                    email: true,
                },
                
                password: {
                    required: true,
                    minlength : 5,
                    maxlength : 15,
                },
                password_confirmation : {
                    equalTo : "#password2"
                }
               
             },
            messages: {
              
                email: {
                    required: "Please enter email address",
                    email: "Please enter a vaild email address"
                },
                password: {
                    required: "please enter password.",
                    
                },
                password_confirmation: {
                  equalTo:"Please enter the same password again."
                }
               
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

        });

</script>
