<?php
namespace Modules\pkgBlog\Services ;


use Modules\pkgBlog\Models\Category ;

class CategoryService{

    // query
    public function query(){
        return Category::query() ;
    }
    //count 
    public function count(){
        return Category::count();
    }
    //all
    public function all(){
        return Category::all();
    }
    //create 
    public function create(){
        
    }
    
  

}