<?php

namespace App\Models;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Timeline extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'offer_id',
    ];

    public function offer(): BelongsTo
    {
        return $this->belongsTo(Offer::class, 'offer_id', 'id');
    }
}
