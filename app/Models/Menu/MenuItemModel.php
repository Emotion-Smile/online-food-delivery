<?php

namespace App\Models\Menu;

use App\Models\OrderDetail\OrderDetailModel;
use App\Models\Restaurant\RestaurantModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuItemModel extends Model
{
    use HasFactory;

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(RestaurantModel::class);
    }

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetailModel::class);
    }
}
