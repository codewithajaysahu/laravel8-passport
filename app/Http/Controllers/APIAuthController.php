<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class APIAuthController extends Controller
{
    public function register(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->name)
        ]);

        $token = $user->createToken('Token')->accessToken;
        return response()->json(['token' => $token, 'user' => $user, 200]);
    }
}
