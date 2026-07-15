<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TeamType extends Model
{
    protected $guarded = ['id'];

    protected $casts = ['is_active' => 'boolean',];

    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function teams(): HasMany
    {
         return $this->hasMany(Team::class, 'team_type_id');
    }
}
