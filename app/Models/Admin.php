<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $guarded = ['id'];

    protected $casts = ['is_active' => 'boolean'];

    function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    function check($permission): bool
    {
        return $this->role->permissions()->where('slug', $permission)->exists();
    }

    function createdBy(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
}
