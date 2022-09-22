<?php

namespace App\Http\Controllers;
use App\Helpers\Helper;
use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;

class UserController extends Controller
{
    const TRUE = "true";
    const FALSE= "false";
public function register(Request $request)
        {
            if($request->input('social_id')){
                $validator =  Validator::make($request->all(), [
                    'email' => 'required|unique:users',

                ]);
                if ($validator->fails()) {
                    return response()->json([
                        "flag" => Self::FALSE,
                        "message" => $validator->errors()->first(),
                        "error" => 'validation_error',
                    ], 422);
                }
                $user = User::create([
                    'name' => $request->name,
                    'email' =>$request->email,
                    'password' => Hash::make($request->password),
                    'type'=>$request->type,
                    'social_id'=>$request->social_id,
                ]);
                $images = $request->file('image');
                if ($images) {
                    $filename = rand() . '.' . $images->getClientOriginalExtension();
                    $images->move(storage_path('app/public/profile'), $filename);
                    $user->image = $filename;
                    $user->save();
                }
                $token = $user->createToken('Token')->accessToken;
                return response([ 'token' => $token,'user' => $user,],200);
            }else{
                $validator =  Validator::make($request->all(), [
                    'email' => 'required|unique:users',

                ]);
                if ($validator->fails()) {
                    return response()->json([
                        "flag" => Self::FALSE,
                        "message" => $validator->errors()->first(),
                        "error" => 'validation_error',
                    ], 422);
                }
                $user = User::create([
                    'name' => $request->name,
                    'email' =>$request->email,
                    'password' => Hash::make($request->password),
                    'type'=>$request->type,
                    'social_id'=>$request->social_id,
                ]);
                $images = $request->file('image');
                if ($images) {
                    $filename = rand() . '.' . $images->getClientOriginalExtension();
                    $images->move(storage_path('app/public/profile'), $filename);
                    $user->image = $filename;
                    $user->save();
                }
                $token = $user->createToken('Token')->accessToken;
                return response([ 'token' => $token,'user' => $user,],200);
            }

        }
    public function login(Request $request)
   {
        if ($request->input('type') == "0") {
            $loginData = $request->validate([
                'email' => 'email|required',
                'password' => 'required',
                'type' => 'required',
            ]);
        if(auth()->attempt($loginData)){
            $token= auth()->user()->createToken('Token')->accessToken;
            return response([ 'token' => $token,'data' => $loginData, ]);
        }
        else{

            return  Helper::setresponse(Self::FALSE, "", "No record found.",404);
        }
        }
    else{
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

    if(auth()->attempt($loginData)){
        $token= auth()->user()->createToken('Token')->accessToken;
        return response([ 'token' => $token,'data' => $loginData, ]);
        }
        else{
            return  Helper::setresponse(Self::FALSE, "", "No record found.",404);
        }
    }

}
public function profile(Request $request,$id)
{
    // $user= User::find($id);
    // $images = $request->file('image');
    //     if ($images) {
    //         $filename = rand() . '.' . $images->getClientOriginalExtension();
    //         $images->move(storage_path('app/public/profile'), $filename);
    //         $user->image = $filename;
    //         $user->update();
    //     }
    $user =auth('api')->user();
    $user = User::where("id",$user->id)->get();
        if ($user) {
            return  Helper::setresponse(Self::TRUE, $user, "false",200);
        } else {
            return Helper::setresponse(Self::FALSE, "", "no data found ",404);
        }
}
public function changepassword(Request $request)
{

    $validator =  Validator::make($request->all(), [
        'old_password' => 'required',
        'password'=>'required|min:6|max:100',
        'confirm_password'=>'required|same:password',

    ]);
    if ($validator->fails()) {
        return response()->json([
            "flag" => Self::FALSE,
            "message" => $validator->errors()->first(),
            "error" => 'validation_error',
        ], 422);
    }
    $user=$request->user();
    if(Hash::check($request->old_password,$user->password)){
    $user->update([
    'password'=>Hash::make($request->password)
]);
return response()->json([
    "flag" => Self::FALSE,
    "message" => 'paassword updated successfully.',
], 200);
    }else{
        return response()->json([
            "flag" => Self::FALSE,
            "message" => 'old password does not matched',
        ], 400);
    }
}

public function verifyPin(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => ['required', 'string', 'email', 'max:255'],
        'token' => ['required'],
    ]);

    if ($validator->fails()) {
        return  Helper::setresponse(Self::FALSE, "", "",200);
    }

    $check =  PasswordReset::where([
        ['email', $request->all()['email']],
        ['token', $request->all()['token']],
    ]);

    if ($check->exists()) {
        $difference = Carbon::now()->diffInSeconds($check->first()->created_at);
        if ($difference > 3600) {
            return  Helper::setresponse(Self::FALSE, "", "No record found.",404);
        }

        $delete = PasswordReset::where([
            ['email', $request->all()['email']],
            ['token', $request->all()['token']],
        ])->delete();

        return  Helper::setresponse(Self::FALSE, "", "You can now reset your password",404);
    } else {
        return  Helper::setresponse(Self::FALSE, "", "Inavalid token",404);
    }
}
public function forgotPassword(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => ['required', 'string', 'email', 'max:255'],
    ]);

    if ($validator->fails()) {
        return response()->json([
            "flag" => Self::FALSE,
            "message" => $validator->errors()->first(),
            "error" => 'validation_error',
        ], 422);
    }
    $verify = User::where('email', $request->all()['email'])->exists();

    if ($verify) {
        $verify2 =  PasswordReset::where([
            ['email', $request->all()['email']]
        ]);

        if ($verify2->exists()) {
            $verify2->delete();
        }

        $token = random_int(100000, 999999);
        $password_reset =  PasswordReset::insert([
            'email' => $request->all()['email'],
            'token' =>  $token,
            'created_at' => Carbon::now()
        ]);

        if ($verify) {
            Mail::to($request->all()['email'])->send(new ResetPassword($token));
            return  Helper::setresponse(Self::FALSE, "", "Please check your email for a 6 digit pin.",200);

        }
    } else {
        return  Helper::setresponse(Self::FALSE, "", "this email does not exist.",404);
    }
}

}
