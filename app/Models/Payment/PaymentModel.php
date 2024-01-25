<?php

namespace App\Models\Payment;

use App\Models\Order\OrderModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentModel extends Model
{
    use HasFactory;

    public function order(): BelongsTo
    {
        return $this->belongsTo(OrderModel::class);
    }
}
