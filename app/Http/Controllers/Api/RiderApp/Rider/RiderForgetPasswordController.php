<?php

namespace App\Http\Controllers\Api\RiderApp\Rider;

use App\Http\Controllers\Controller;
use App\Models\User\UserModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RiderForgetPasswordController extends Controller
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
    }
}
