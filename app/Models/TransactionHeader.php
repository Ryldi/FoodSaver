<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class TransactionHeader extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'transaction_headers';
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function transaction_detail() : HasMany
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function reviews() : HasOne
    {
        return $this->hasOne(Review::class);
    }
}
