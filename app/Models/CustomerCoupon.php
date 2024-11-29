<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerCoupon extends Model
{
    use HasFactory;

    protected $table = 'customer_coupons';
    protected $guarded = [];

    public function coupon() : BelongsTo
    {
        return $this->belongsTo(Coupon::class, 'coupon_id', 'id');
    }

    public function customer() : BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

}
