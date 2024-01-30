<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\User\UserModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'current_password' => 'required',
//            'new_password' => 'required|string|min:8|confirmed',
            'new_password' => 'required|min:6',
        ]);

        $user = Auth::user();

        // Check if current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['message' => 'Current password does not match'], 401);
        }

        // Update to new password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json(['message' => 'Password successfully changed']);
    }
}
