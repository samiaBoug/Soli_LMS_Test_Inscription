<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscrit extends Model
{
    //
    public $fillable = ['nom', 'prenom', 'email', 'specialisation', 'tel', 'niveau_scolaire', 'date_naiss', 'adresse'];
    public function tests(){
        return $this->hasMany(Test::class);
    }
}
