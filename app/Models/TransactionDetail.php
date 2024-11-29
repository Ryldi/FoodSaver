<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $table = 'transaction_details';
    protected $guarded = [];

    public function transaction_header() : BelongsTo
    {
        return $this->belongsTo(TransactionHeader::class, 'transaction_id', 'id');
    }

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
