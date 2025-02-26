<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    //
    public $fillable = ['question_id','texte_option', 'est_correcte'];
    
    public function question(){
    return $this->belongsTo(Question::class) ;
    }
}
