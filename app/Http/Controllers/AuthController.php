<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request$request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed'
        ]);

        $user = new User();
        $user ->name = $request->name;
        $user ->email = $request->email;
        $user ->password = bcrypt($request ->password);

        if($user->save()) {
            return response()->json([
                'message' => 'user created successfully',
                 'status_code' => 201
            ],201);
        } else {
            return response()->json([
                'message' => 'Some error occured, Please try again',
                'status_code' => 500
            ],500);
        }
    }

    public function login (Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return response()->json([
                'message' => 'Unauthorized',
                'status_code' => 401
            ],401);
        }
        $user = $request ->user();

        if($user->role == 'administrator') {
            $tokenData = $user->createToken('Personal Access Token',['do-anything']);
        }else {
            $tokenData = $user->createToken('Personal Access Token',['can-create']);
        }
        $token = $tokenData->token;

        if($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        if($token->save()) {
            return response() -> json([
                'user' => $user,
                'access_token'=> $tokenData ->accessToken,
                'token_type' => 'Bearer',
                'token_scope' => $tokenData->token->scopes[0],
                'expires_at' => Carbon::parse($tokenData->token->expires_at)->toDateTimeString(),
                'status_code' => 401
            ],401);
        }else{
            return response()->json([
                'message' => 'Some error occured, Please try again',
                'status_code' => 500
            ],500);
        }
    }
}
