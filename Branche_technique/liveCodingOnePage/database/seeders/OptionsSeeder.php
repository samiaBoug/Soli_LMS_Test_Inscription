<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Option;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Ajouter des options pour chaque question
        Option::create([
            'question_id' => 1, // ID de la question
            'texte_option' => 'JavaScript',
            'est_correcte' => true
        ]);
        
        Option::create([
            'question_id' => 1, // ID de la question
            'texte_option' => 'C#',
            'est_correcte' => false
        ]);
        
        Option::create([
            'question_id' => 1, // ID de la question
            'texte_option' => 'Python',
            'est_correcte' => false
        ]);

        // Options pour la question 2
        Option::create([
            'question_id' => 2,
            'texte_option' => 'Gérer les utilisateurs',
            'est_correcte' => false
        ]);

        Option::create([
            'question_id' => 2,
            'texte_option' => 'Stocker et organiser les données',
            'est_correcte' => true
        ]);

        Option::create([
            'question_id' => 2,
            'texte_option' => 'Créer des sites web',
            'est_correcte' => false
        ]);

        // Options pour la question 3
        Option::create([
            'question_id' => 3,
            'texte_option' => 'Xcode',
            'est_correcte' => false
        ]);

        Option::create([
            'question_id' => 3,
            'texte_option' => 'Android Studio',
            'est_correcte' => true
        ]);

        Option::create([
            'question_id' => 3,
            'texte_option' => 'Flutter',
            'est_correcte' => false
        ]);
    }
}
