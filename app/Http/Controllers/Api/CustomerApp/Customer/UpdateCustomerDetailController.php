<?php

namespace App\Http\Controllers\Api\CustomerApp\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateCustomerDetailController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
//        $user = Auth::user();
//
//        $validatedData = $request->validate([
//            'name' => 'string|max:255',
//            'email' => 'string|email|max:255|unique:users,email,' . $user->id,
//            'password' => 'sometimes|required|string|min:6|confirmed',
//        ]);
//
//        if ($request->has('password')) {
//            $validatedData['password'] = Hash::make($validatedData['password']);
//        }
//
//        $user->update($validatedData);
//
//        return response()->json(['message' => 'User updated successfully', 'user' => $user]);

        $user = Auth::user();
        $request->validate([
            'username' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users,email,'. $user->id],
            'phone_number' => ['string', 'regex:/^(\+855|0)[1-9][0-9]{7,9}$/'],
            'address' => 'string'
        ]);
        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return response()->json(['message' => 'User updated successfully', 'user' => $user]);
    }
}
