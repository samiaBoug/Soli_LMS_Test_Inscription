<?php
namespace Modules\pkgBlog\Services ;

use Modules\pkgBlog\Models\Tag;

class TagService{


    //count 
    public function count(){
        return Tag::count();
    }
    public function all(){
        return Tag::all();
    }
    
    
}