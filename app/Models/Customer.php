<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;
    
    protected $table = 'customers';
    protected $guarded = [];

    public function transaction_header() : HasMany
    {
        return $this->hasMany(TransactionHeader::class);
    }

    public function customer_coupon() : HasMany
    {
        return $this->hasMany(CustomerCoupon::class);
    }

    public function cart() : HasMany
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed'
        ];
    }
}
