<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_id',
        'label',
        'contract_type',
        'job_type',
        'description',
        'is_published',
        'image',
        'status',
        'company_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public static function boot(): void
    {
        parent::boot();

        static::created(function ($offer) {
            if ($offer->status === 'draft') {
                $offer->timeline()->create([
                    'status' => 'draft',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });

        static::updating(function ($offer) {
            if ($offer->status === 'published') {
                $offer->timeline()->create([
                    'status' => 'published',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                $offer->timeline()->create([
                    'status' => 'updated',
                    'updated_at' => now(),
                ]);
            }
        });
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function timeline(): HasMany
    {
        return $this->hasMany(Timeline::class);
    }
}
