<?php

namespace Modules\pkgBlog\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    //
    protected $fillable = ['text', 'commentable_id', 'commentable_type'];

    public function commentable(){
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
