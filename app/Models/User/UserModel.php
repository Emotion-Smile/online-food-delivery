<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Order\OrderModel;
use App\Models\Profile\ProfileModel;
use App\Models\Rating\RatingModel;
use App\Models\Review\ReviewModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";
    protected $fillable = [
        'username',
        'email',
        'password',
        'phone_number',
        'user_type',
        'address',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(OrderModel::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(ReviewModel::class);
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(RatingModel::class);
    }

    public function image(): HasOne
    {
        return $this->hasOne(ProfileModel::class);
    }
}
