<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class OTP extends Model
{
    use HasUuids;
    
    protected $table = 'otps';
    protected $guarded = [];
}
