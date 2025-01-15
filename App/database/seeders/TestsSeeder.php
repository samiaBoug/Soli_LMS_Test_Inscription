<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Test ;

class TestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Ajouter des tests pour les inscrits
        Test::create([
            'inscrit_id' => 1, // ID de l'inscrit
            'date_passation' => '2025-01-10',
            'duree' => 60, // Durée en minutes
            'resultat' => 85 // Résultat en pourcentage
        ]);

        Test::create([
            'inscrit_id' => 2, // ID de l'inscrit
            'date_passation' => '2025-01-12',
            'duree' => 90, // Durée en minutes
            'resultat' => 75 // Résultat en pourcentage
        ]);

        Test::create([
            'inscrit_id' => 3, // ID de l'inscrit
            'date_passation' => '2025-01-14',
            'duree' => 120, // Durée en minutes
            'resultat' => 95 // Résultat en pourcentage
        ]);
    }
}
