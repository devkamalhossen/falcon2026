<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryCategory extends Model
{
     protected $guarded = ['id'];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'category_id');
    }
}
