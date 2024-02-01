<?php

namespace App\Http\Controllers\Api\CustomerApp\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomerLogoutController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
// Revoke the token that was used to authenticate the current request...
        if ($token = $request->user()->currentAccessToken()) {
            $token->delete();
        }

        return response()->json(['message' => 'User successfully logged out']);
    }
}
