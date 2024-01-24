<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant\RestaurantModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AddRestaurantController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'required|string',
            // Add other validations as needed
        ]);

        $restaurant = RestaurantModel::create($validatedData);

        return response()->json($restaurant, 201);
    }
}
