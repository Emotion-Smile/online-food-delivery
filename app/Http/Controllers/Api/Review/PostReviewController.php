<?php

namespace App\Http\Controllers\Api\Review;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostReviewController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
            // Include other fields like 'restaurant_id' or 'product_id' as needed
        ]);

        $review = Auth::user()->reviews()->create($validatedData);

        return response()->json($review, 201);
    }
}
