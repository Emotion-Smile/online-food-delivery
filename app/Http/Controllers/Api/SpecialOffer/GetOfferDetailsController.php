<?php

namespace App\Http\Controllers\Api\SpecialOffer;

use App\Http\Controllers\Controller;
use App\Models\SpecialOffer\OfferModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetOfferDetailsController extends Controller
{
    public function __invoke(Request $request, int $id): JsonResponse
    {
        $offer = OfferModel::findOrFail($id);
        return response()->json($offer);
    }
}
