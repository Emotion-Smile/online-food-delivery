<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\User\UserModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetUserDetailController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        return response()->json(Auth::user());
    }
}
