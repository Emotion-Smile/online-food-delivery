<?php

namespace App\Models\Profile;

use App\Models\User\UserModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfileModel extends Model
{
    use HasFactory;

    protected $table = "images";

    protected $fillable = [
        'user_id',
        'url',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class);
    }
}
