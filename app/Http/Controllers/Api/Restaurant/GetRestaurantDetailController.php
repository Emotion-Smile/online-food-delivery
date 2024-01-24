<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant\RestaurantModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetRestaurantDetailController extends Controller
{
    public function __invoke(Request $request, int $id): JsonResponse
    {
        $restaurant = RestaurantModel::findOrFail($id);
        return response()->json($restaurant);
    }
}
