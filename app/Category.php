<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name', 'category_slug'];
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
