<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use  Illuminate\Support\Facades\Hash;
use App\Helpers\Helper;
class ResetPasswordController extends Controller
{
    const TRUE = "true";
    const FALSE= "false";
    public function resetPassword(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => ['required', 'string', 'email', 'max:255'],
        'password' => ['required',   'confirmed'],
    ]);

    if ($validator->fails()) {
        return response()->json([
            "flag" => Self::FALSE,
            "message" => $validator->errors()->first(),
            "error" => 'validation_error',
        ], 422);
    }

    $user = User::where('email',$request->email);
    $user->update([
        'password'=>Hash::make($request->password)
    ]);

    $token= auth()->user()->createToken('Token')->accessToken;


    return response([
        'success' => true,
        'message' => "Your password has been reset",
        'token'=>$token]);
}
}
