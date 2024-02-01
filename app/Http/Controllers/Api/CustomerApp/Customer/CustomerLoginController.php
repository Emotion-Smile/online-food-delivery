<?php

namespace App\Http\Controllers\Api\CustomerApp\Customer;

use App\Http\Controllers\Controller;
use App\Models\User\UserModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class CustomerLoginController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        if(!$request->email){
            return response()->json(['message' => 'Email is required.'], 401);
        }
        if(!$request->password) {
            return response()->json(['message' => 'Password is required.'], 401);
        }

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

//        if (!Auth::attempt($request->only('email', 'password'))) {
//            return response()->json(['message' => 'Invalid login'], 401);
//        }

//        $user = UserModel::where('email', $request['email'])->firstOrFail();
//        $token = $user->createToken('auth_token')->plainTextToken;
//
//        return response()->json(['access_token' => $token, 'token_type' => 'Bearer', 'user' => $user]);

        $user = UserModel::query()
            ->where('email', $request->email)
            ->first();

        if(!$user) {
            return response()->json(['message' => 'The email is incorrect.'], 401);
        }

        if(!Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'The password is incorrect.'], 401);
        }

//        if (!$user || !Hash::check($request->password, $user->password)) {
//            throw ValidationException::withMessages([
//                'email' => ['The provided credential are incorrect.']
//            ]);
//        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $token, 'token_type' => 'Bearer', 'user' => $user]);
    }
}
