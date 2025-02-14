<?php
namespace App\Services;

use App\Models\Test;

class TestService{
    public function all(){
        return Test::with(['inscrit', 'questions']);
    }

}