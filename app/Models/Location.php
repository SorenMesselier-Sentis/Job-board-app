<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'contry',
        'city',
        'zipcode',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function offer(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function company(): HasMany
    {
        return $this->hasMany(Company::class);
    }
}
