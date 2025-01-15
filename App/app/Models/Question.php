<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    public function options(){
        return $this->hasMany(Option::class);
    }

    public function tests(){
        return $this->belongsToMany(Test::class, 'question_test');
    }
}
