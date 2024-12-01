<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OTP extends Model
{
    public $primaryKey = null;
    protected $table = 'otps';
    protected $guarded = [];
}
