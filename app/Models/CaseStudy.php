<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
   protected $fillable = ['header', 'title', 'area', 'industry', 'solution', 'timeline', 'outcome', 'order'];
}
