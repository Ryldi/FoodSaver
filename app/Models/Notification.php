<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Notification extends Model
{
    use HasUuids;

    protected $table = 'notifications';
    protected $guarded = [];

    public function transaction() : BelongsTo
    {
        return $this->belongsTo(TransactionHeader::class, 'transaction_id', 'id');
    }
}
