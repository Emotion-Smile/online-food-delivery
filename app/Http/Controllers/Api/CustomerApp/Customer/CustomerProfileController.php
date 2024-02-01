<?php

namespace App\Http\Controllers\Api\CustomerApp\Customer;

use App\Http\Controllers\Controller;
use App\Models\Profile\ProfileModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerProfileController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
//        return response()->json(Auth::user());
        return response()->json(ProfileModel::where('user_id', Auth::user()->id)->first());
    }
}
