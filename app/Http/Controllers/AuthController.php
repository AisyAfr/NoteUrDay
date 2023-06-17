<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller

{

    public function __construct(){
        $this->middleware(['auth:sanctum'])->only('logout');
    }

    public function login(Request $request){
        $request -> validate([
            "email" => "required",
            "password" => "required"
        ]);

        $user = User::where('email',$request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
    }

    return $user->createToken($user->email)->plainTextToken;

}

public function logout(Request $request){
    if($request->user()->currentAccessToken()->delete()){
        return response()->json([
            "message" => "You've Log Out"
        ]);
    } else {
        return response()->json([
            "message" => "There's An Error!"
        ]);
    }
}

public function register(Request $request){
    
    $request->validate([
        'name' => "required|min:2",
        'email' => "required|email|unique:user",
        'password' => "required|min:1"
    ]);

    User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password'))
    ]);

    return response()->json([
        "message" => "Your Account Has Listed"
    ]);
}
}
