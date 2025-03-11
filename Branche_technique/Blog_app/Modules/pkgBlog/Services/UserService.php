<?php
namespace Modules\pkgBlog\Services ;

use Modules\pkgBlog\Models\User;

class UserService{


    //count 
    public function count(){
        return User::count();
    }
    
    
}