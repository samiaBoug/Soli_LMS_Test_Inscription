<?php
namespace App\Services ;

use App\Models\Tag;

class TagService{


    //count 
    public function count(){
        return Tag::count();
    }
    public function all(){
        return Tag::all();
    }
    
    
}