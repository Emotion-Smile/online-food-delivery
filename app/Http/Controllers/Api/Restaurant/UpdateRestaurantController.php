<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant\RestaurantModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdateRestaurantController extends Controller
{
    public function __invoke(Request $request, int $id): JsonResponse
    {
        $restaurant = RestaurantModel::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'required|string',
            // Add other validations as needed
        ]);

        $restaurant->update($validatedData);

        return response()->json($restaurant);
    }
}
