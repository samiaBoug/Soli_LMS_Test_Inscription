<?php
namespace App\Services ;

use App\Models\Comment;

class CommentService{


    //count 
    public function count(){
        return Comment::count();
    }
    
    
}