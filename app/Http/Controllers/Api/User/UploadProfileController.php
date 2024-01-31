<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Profile\ProfileModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadProfileController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $image = $request->input('image');
        if($image) {
            $profile = ProfileModel::create([
                'user_id' => Auth::user()->id,
                'url' => $image,
            ]);
            return response()->json($profile);
        }

        return response()->json(Auth::user());
    }
}
