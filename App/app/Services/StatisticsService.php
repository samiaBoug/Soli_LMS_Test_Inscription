<?php
namespace App\Services;

use App\Models\Inscrit;
use App\Models\Question;
use App\Models\Test;

class StatisticsService{
    public function countInscrits(){
        return Inscrit::count();
    }
    public function countQcm(){
        return Question::count();
    }
    public function countWeb(){
        return Inscrit::where('specialisation', 'Web')->count();
    }
    public function countMobile(){
        return Inscrit::where('specialisation', 'Mobile')->count();
    }
    public function sumResult(){
        return Test::sum('resultat');
    }
    public function countResult(){
        return Test::count('resultat');
    }
    public function getResultsDistribution()
    {
        return Test::selectRaw("
            SUM(CASE WHEN resultat BETWEEN 0 AND 20 THEN 1 ELSE 0 END) AS interval_0_20,
            SUM(CASE WHEN resultat BETWEEN 21 AND 40 THEN 1 ELSE 0 END) AS interval_21_40,
            SUM(CASE WHEN resultat BETWEEN 41 AND 60 THEN 1 ELSE 0 END) AS interval_41_60,
            SUM(CASE WHEN resultat BETWEEN 61 AND 80 THEN 1 ELSE 0 END) AS interval_61_80,
            SUM(CASE WHEN resultat BETWEEN 81 AND 100 THEN 1 ELSE 0 END) AS interval_81_100
        ")->first();
    }

}