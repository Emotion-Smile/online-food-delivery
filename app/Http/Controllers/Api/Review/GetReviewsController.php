<?php

namespace App\Http\Controllers\Api\Review;

use App\Http\Controllers\Controller;
use App\Models\Review\ReviewModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetReviewsController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $reviews = ReviewModel::all(); // You might want to paginate this
        return response()->json($reviews);
    }
}
