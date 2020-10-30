<?php

namespace App\Http\Controllers;

use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public $loginAfterSignUp = true;

    public function login(Request $request){
        $credentials = $request->only("email","password");
        $token = null;
        $token = JWTAuth::attempt($credentials);
//        dd($credentials);

        if (!$token){
            return response()->json([
                "status"=>false,
                "message"=> 'Unauthorized'
                ]);
        }
        return \response()->json([
            "status"=>true,
            "token"=>$token
        ]);
    }

    public function register(Request $request){
        $this->validate($request,[
           "name"=>"required|string",
           "email"=> "required|email|unique:users",
           "password"=>"required|string|min:6|max:10"
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        if ($this->loginAfterSignUp){
            return $this->login($request);
        }
        return response()->json([
            'status'=>true,
            "user"=>$user
        ]);
    }

    public function logout(Request $request){
        $this->validate($request, [
            "token"=>"required"
        ]);

        try{
            JWTAuth::invalidate($request->token);

            return response()->json([
                "status"=>true,
                "message" =>"User logged out successfully"
            ]);
        } catch (JWTException $exception){
            return response()->json([
                "status"=>false,
                "message"=>"Ops, the user can not be logget out"
            ]);
        }
    }
}
