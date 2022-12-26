<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
   public function login(Request $request){
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|min:4',
    ]);
    if ($validator->fails()) {
        return response()->json(['status' => false,'error'=> $validator->errors()->first()]);
    }
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
        return response()->json(['status' => true,'role_id' => Auth::user()->role_id]);
        
    }else{
        return response()->json(['status' => false,'error'=> 'You have entered wrong credentials.']); 
    }
    return response()->json(['status' => false,'error'=> 'Somthing went wrong!!!']);
 }
 public function logout(Request $request)
  {
      Auth::logout();
      return Redirect('/');
  }
}
