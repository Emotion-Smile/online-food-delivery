<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant\RestaurantModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetAllRestaurantsController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $restaurants = RestaurantModel::all();
        return response()->json($restaurants);
    }
}
