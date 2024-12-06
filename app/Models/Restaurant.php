<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Authenticatable
{
    use HasFactory, HasUuids;

    protected $table = 'restaurants';
    protected $guarded = [];

    public function products() : HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function review() : HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
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
