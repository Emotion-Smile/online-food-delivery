<?php

namespace App\Http\Controllers\Api\CustomerApp\Customer;

use App\Http\Controllers\Controller;
use App\Models\User\UserModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerRegisterController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
//        $validatedData = $request->validate([
//            'username' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users',
//            'phone_number' => 'required|regex:/^\+?[1-9]\d{1,14}$/',
//            'password' => 'required|string|min:6|confirmed',
//            'user_type' => 'required',
//            'address' => 'required|max:255'
//        ]);

//        $user = UserModel::create([
//            'username' => $validatedData['username'],
//            'email' => $validatedData['email'],
//            'phone_number' => $validatedData['phone_number'],
//            'user_type' => $validatedData['user_type'],
//            'address' => $validatedData['address'],
//            'password' => Hash::make($validatedData['password']),
//        ]);

        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => ['required', 'regex:/^(\+855|0)[1-9][0-9]{7,9}$/'],
            'password' => 'required|min:6',
            'user_type' => 'required',
            'address' => 'required|max:255'
        ]);

        $user = UserModel::create([
            'username' => $request->username,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'user_type' => $request->user_type,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $token, 'token_type' => 'Bearer', 'user' => $user]);
    }
}
