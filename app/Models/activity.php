<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','category_id', 'title', 'description', 'date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

   // app/Models/Activity.php
public function category()
{
    return $this->belongsTo(Category::class, 'category_id');
}


}
