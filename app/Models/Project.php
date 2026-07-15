<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $guarded = ['id'];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }


    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class, 'project_id');
    }

    function scopeDataFilter(Builder $query, array $data): void
    {
        $query->where(function ($q) use ($data) {

            if (!empty($data['status'])) {
                if ($data['status'] == 'upcoming') {
                    $q->where('status', 1);
                }
                if ($data['status'] == 'ongoing') {
                    $q->where('status', 2);
                }
                if ($data['status'] == 'completed') {
                    $q->where('status', 3);
                }
            }
        });
    }
}
