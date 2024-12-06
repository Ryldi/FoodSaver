<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $guarded = [];

    public function transaction() : BelongsTo
    {
        return $this->belongsTo(TransactionHeaders::class, 'transaction_id', 'id');
    }
}
