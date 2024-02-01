<?php

namespace App\Http\Controllers\Api\CustomerApp\Customer;

use App\Http\Controllers\Controller;
use App\Models\User\UserModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetCustomerDetailController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        return response()->json(Auth::user());
    }
}
