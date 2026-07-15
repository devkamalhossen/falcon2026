<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $guarded = ['id'];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function features(): HasMany
    {
        return $this->hasMany(ServiceFeature::class, 'service_id');
    }

    public function benefits(): HasMany
    {
        return $this->hasMany(ServiceBenefit::class, 'service_id');
    }

    public function usageAreas(): HasMany
    {
        return $this->hasMany(ServiceUsageArea::class, 'service_id');
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class, 'service_id');
    }

    public function descriptions(): HasMany
    {
        return $this->hasMany(ServiceDescription::class, 'service_id');
    }
    public function faqs(): HasMany
    {
        return $this->hasMany(ServiceFAQ::class, 'service_id');
    }

    function scopeDataFilter(Builder $query, string | null $search): Builder
    {
        return $query->where(function ($q) use ($search) {
            if ($search != null) {
                $q->where(function ($q) use ($search) {
                    $q->where('title', 'like', '%' . $search . '%');
                });
            }
        });
    }
}
