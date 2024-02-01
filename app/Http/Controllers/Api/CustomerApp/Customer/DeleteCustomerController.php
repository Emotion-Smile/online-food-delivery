<?php

namespace App\Http\Controllers\Api\CustomerApp\Customer;

use App\Http\Controllers\Controller;
use App\Models\User\UserModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteCustomerController extends Controller
{
    public function __invoke(Request $request, int $id): JsonResponse
    {
        $user = UserModel::find($id);//Auth::user();

        // Optional: Perform any pre-deletion logic, like cleanup

        $user->delete();

        return response()->json(['message' => 'User account deleted successfully']);
    }
}
