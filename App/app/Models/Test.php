<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //
    public function inscrits(){
        return $this->belongsTo(Inscrit::class);
    }

    public function questions(){
        return $this->belongsToMany(Question::class, 'question_test') ;
    }
}
