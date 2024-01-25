<?php

namespace App\Models\Restaurant;

use App\Models\Menu\MenuItemModel;
use App\Models\Rating\RatingModel;
use App\Models\Review\ReviewModel;
use App\Models\SpecialOffer\OfferModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RestaurantModel extends Model
{
    use HasFactory;

    public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItemModel::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(ReviewModel::class);
    }

    public function specialOffers(): HasMany
    {
        return $this->hasMany(OfferModel::class);
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(RatingModel::class);
    }
}
