<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Ajouter des questions
        Question::create([
            'enonce' => 'Quel est le langage de programmation utilisé pour créer des sites web dynamiques ?'
        ]);

        Question::create([
            'enonce' => 'Quel est le rôle d’un système de gestion de base de données ?'
        ]);

        Question::create([
            'enonce' => 'Quel framework est utilisé pour le développement mobile natif sur Android ?'
        ]);
    }
}
