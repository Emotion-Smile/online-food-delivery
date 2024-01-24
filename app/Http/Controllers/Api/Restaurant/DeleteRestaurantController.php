<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant\RestaurantModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeleteRestaurantController extends Controller
{
    public function __invoke(Request $request, int $id): JsonResponse
    {
        $restaurant = RestaurantModel::findOrFail($id);
        $restaurant->delete();
        return response()->json(['message' => 'Restaurant deleted successfully']);
    }
}
