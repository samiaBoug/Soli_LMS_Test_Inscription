<?php
namespace App\Services;

use App\Models\Inscrit;

class InscritService{
    // get all inscrits
    public function getAll(){
        return Inscrit::all();
    }
    // get one inscrit
    public function getInscrit(Inscrit $inscrit){

    }
    //delete
    public function delete(Inscrit $inscrit){

    }
    // 

}