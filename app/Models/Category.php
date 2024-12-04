<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Category extends Model
{
    use HasUuids;

    protected $table = 'categories';
    protected $guarded = [];

    public function restaurants() : HasMany
    {
        return $this->hasMany(Restaurant::class);
    }

}
