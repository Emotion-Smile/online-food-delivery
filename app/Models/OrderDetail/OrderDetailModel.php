<?php

namespace App\Models\OrderDetail;

use App\Models\Menu\MenuItemModel;
use App\Models\Order\OrderModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetailModel extends Model
{
    use HasFactory;

    public function order(): BelongsTo
    {
        return $this->belongsTo(OrderModel::class);
    }

    public function menuItem(): BelongsTo
    {
        return $this->belongsTo(MenuItemModel::class);
    }
}
