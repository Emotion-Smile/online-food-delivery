<?php

namespace App\Http\Controllers\Api\SpecialOffer;

use App\Http\Controllers\Controller;
use App\Models\SpecialOffer\OfferModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetAllOffersController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $offers = OfferModel::all();
        return response()->json($offers);
    }
}
