<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'title'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function allposts()
    {
        return $this->hasMany(Post::class)->withUnPublished();
    }
}
