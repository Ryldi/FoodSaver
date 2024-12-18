<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Coupon extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'coupons';
    protected $guarded = [];
    protected $casts = [
        'end' => 'datetime',
    ];

    public function customer_coupon() : HasMany
    {
        return $this->hasMany(CustomerCoupon::class);
    }

    public function restaurant() : BelongsTo
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }
}
