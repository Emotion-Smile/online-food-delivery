<?php

namespace App\Models\SpecialOffer;

use App\Models\Restaurant\RestaurantModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OfferModel extends Model
{
    use HasFactory;

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(RestaurantModel::class);
    }
}
