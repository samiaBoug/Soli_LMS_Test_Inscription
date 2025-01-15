<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscrit extends Model
{
    //
    public function tests(){
        return $this->hasMany(Test::class);
    }
}
