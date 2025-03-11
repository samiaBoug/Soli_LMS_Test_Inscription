<?php

namespace Modules\pkgBlog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use  Modules\pkgBlog\Models\User;
;

class Article extends Model
{
  //
  use HasFactory;


  protected $fillable = ['title', 'content', 'category_id', 'user_id'];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
  public function tags()
  {
    return $this->belongsToMany(Tag::class);
  }

  public function comments()
  {
    return $this->morphMany(Comment::class, 'commentable');
  }
  public function users(){
    return $this->belongsTo(User::class);
  }
}
