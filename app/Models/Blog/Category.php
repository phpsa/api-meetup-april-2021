<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'id',
        'title'
    ];
}
