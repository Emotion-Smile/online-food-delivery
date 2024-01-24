<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\User\UserModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetUserDetailController extends Controller
{
    public function __invoke(Request $request, int $id): JsonResponse
    {
        $user = UserModel::find($id);
        return response()->json($user);
    }
}
