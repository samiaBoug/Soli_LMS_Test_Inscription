<?php
namespace Modules\pkgBlog\Services ;

use Modules\pkgBlog\Models\Comment;

class CommentService{


    //count 
    public function count(){
        return Comment::count();
    }
    
    
}