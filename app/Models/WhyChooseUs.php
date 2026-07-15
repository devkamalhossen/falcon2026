<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    protected $guarded = ['id'];
    protected $casts = ['is_active' => 'boolean'];

    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
}
