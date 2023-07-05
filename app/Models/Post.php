<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'category',
        'status',
        'published_date'

    ];

  public function comments()
{
           return $this->hasMany(Comment::class);
}



  public function tags()
  {
        return $this->belongsToMany(Tag::class,'post_tags', 'post_id','tag_id');

    }
}
