<?php

namespace App\Models\Review;

use App\Models\Restaurant\RestaurantModel;
use App\Models\User\UserModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReviewModel extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class);
    }

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(RestaurantModel::class);
    }
}
