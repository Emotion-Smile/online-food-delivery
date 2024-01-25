<?php

namespace App\Models\Order;

use App\Models\Delivery\DeliveryModel;
use App\Models\OrderDetail\OrderDetailModel;
use App\Models\Payment\PaymentModel;
use App\Models\User\UserModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderModel extends Model
{
    use HasFactory;

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetailModel::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(PaymentModel::class);
    }

    public function delivery(): HasOne
    {
        return $this->hasOne(DeliveryModel::class);
    }
}
