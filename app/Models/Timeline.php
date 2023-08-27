<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Timeline extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'offer_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function offer(): BelongsTo
    {
        return $this->belongsTo(Offers::class, 'offer_id', 'id');
    }
}
