<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    use HasFactory;

    protected $casts = [
      'details' => 'json',
      'long_description' => 'json'
    ];

    public function category() : BelongsTo
    {
        return $this->belongsTo(CourseCategory::class, 'category_id','id');
    }
}
