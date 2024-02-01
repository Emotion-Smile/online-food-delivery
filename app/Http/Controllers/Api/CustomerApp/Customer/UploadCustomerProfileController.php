<?php

namespace App\Http\Controllers\Api\CustomerApp\Customer;

use App\Http\Controllers\Controller;
use App\Models\Profile\ProfileModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadCustomerProfileController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $image = $request->input('image');
        $userImage = ProfileModel::where('user_id', Auth::user()->id)->first();
        if($image) {
            if(!$userImage) {
                $profile = ProfileModel::create([
                    'user_id' => Auth::user()->id,
                    'url' => $image,
                ]);
                return response()->json($profile);
            }
            $userImage->update([
                'url' => $image,
            ]);
            return response()->json($userImage);
        }
        return response()->json(['message' => 'Upload Profile Error']);
    }
}
