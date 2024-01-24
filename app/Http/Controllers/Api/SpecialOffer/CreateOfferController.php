<?php

namespace App\Http\Controllers\Api\SpecialOffer;

use App\Http\Controllers\Controller;
use App\Models\SpecialOffer\OfferModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CreateOfferController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string',
            'discount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            // Add other fields and validation rules as necessary
        ]);

        $offer = OfferModel::create($validated);

        return response()->json($offer, 201);
    }
}
