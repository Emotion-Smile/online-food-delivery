<?php

namespace App\Http\Controllers\Api\SpecialOffer;

use App\Http\Controllers\Controller;
use App\Models\SpecialOffer\OfferModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdateOfferController extends Controller
{
    public function __invoke(Request $request, int $id): JsonResponse
    {
        $offer = OfferModel::findOrFail($id);

        $validated = $request->validate([
            'title' => 'string|max:255',
            'description' => 'string',
            'discount' => 'numeric',
            'start_date' => 'date',
            'end_date' => 'date|after:start_date',
            // Add other fields and validation rules as necessary
        ]);

        $offer->update($validated);

        return response()->json($offer);
    }
}
