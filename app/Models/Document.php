<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'category_id',
        'file_name',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
