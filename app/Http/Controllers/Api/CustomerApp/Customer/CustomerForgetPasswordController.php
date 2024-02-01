<?php

namespace App\Http\Controllers\Api\CustomerApp\Customer;

use App\Http\Controllers\Controller;
use App\Models\User\UserModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class CustomerForgetPasswordController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate(['email' => 'required|email']);

        $user = UserModel::query()->where('email', $request->email)->first();

        if($user) {
            $token = Hash::make($request->email);
            return response()->json(['message' => 'success .', 'token' => $token], 200);
        }

        return response()->json(['message' => 'Your email is not found.'], 400);

//        $request->validate(['email' => 'required|email']);
//
//        $response = Password::sendResetLink(
//            $request->only('email')
//        );
//
//        return $response == Password::RESET_LINK_SENT
//            ? response()->json(['message' => 'Reset link sent to your email.'])
//            : response()->json(['message' => 'Unable to send reset link.'], 500);
    }
}
