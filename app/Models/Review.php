<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\TransactionHeader;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Review extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'reviews';
    protected $guarded = [];

    public function transaction() : BelongsTo
    {
        return $this->belongsTo(TransactionHeader::class, 'transaction_id', 'id');
    }
}
