<?php
namespace App\Services ;

use App\Models\User;

class UserService{


    //count 
    public function count(){
        return User::count();
    }
    
    
}