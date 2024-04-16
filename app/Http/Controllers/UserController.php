<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|unique:users',
            'usertype' => 'required',
            'password' => 'required',
            'company_name' => 'required',
            'status' => 'required',
            'is_delete' => 'required',
        ]);

        $user = new User();
        $user->fill($request->all());
        $user->company_idd = uniqid(); // Generate unique company_idd
        $user->password = Hash::make($request->password); // Hash the password
        $user->save();

        return response()->json($user, 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $token = $request->user()->createToken('auth-token')->plainTextToken;

            return response()->json(['token' => $token]);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
