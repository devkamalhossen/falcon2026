<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Team extends Model
{
    protected $guarded = ['id'];
    protected $casts = ['is_active' => 'boolean', 'is_director' => 'boolean'];

    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function teamType(): BelongsTo
    {
        return $this->belongsTo(TeamType::class, 'team_type_id');
    }
}
