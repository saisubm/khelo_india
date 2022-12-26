<?php 
  
namespace App\Http\Controllers; 
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; 
use App\Models\User; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class ForgotPasswordController extends Controller
{
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showForgetPasswordForm()
      {
         return view('auth.forgetPassword');
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgetPasswordForm(Request $request)
      {
         try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users',
            ],[
              'email.exists' => "this email doesn't exist in our record",
            ]);
            if ($validator->fails()) {
                return response()->json(['status' => false,'error'=> $validator->errors()->first()]);
            }
            $token = Str::random(64);
    
            DB::table('password_resets')->insert([
                'email' => $request->email, 
                'token' => $token, 
                'created_at' => Carbon::now()
              ]);
              $email = $request->email;
              Mail::send('email.forgetPassword', ['token' => $token,'email' => $email], function($message) use($email){
                  $message->to($email);
                  $message->subject('Reset Password Email');
              });
            //SendPasswordResetMail::dispatch($token,$request->email)->delay(Carbon::now()->addSeconds(5));
            return response()->json(['status' => true,'message' => 'We have E-Mailed your password reset link!']);
           

         } catch (\Exception $ex) {
            return response()->json(['status' => false,'error' => 'somthing went wrong, please try after some time.']);
         } 
          
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token,$email) {
          
         return view('auth.forgetPasswordLink1', ['token' => $token,'email' =>decode5t($email)]);
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {

        $request->validate([
          'email' => 'required|email|exists:users',
          'password' => 'required|string|min:5|confirmed',
          'password_confirmation' => 'required'
      ],[
        'email.exists' => "this email doesn't exist in our record",
      ]);

          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])
                              ->first();
  
          if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
            
          }
  
          $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
 
          DB::table('password_resets')->where(['email'=> $request->email])->delete();
          return back()->with('message', 'Congratulations!! Your password has been changed!');
          //return response()->json(['status' => true,'message' => 'Congratulations!! Your password has been changed!']);
          
      }
}