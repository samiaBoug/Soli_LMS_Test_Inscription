<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB ;

class QuestionTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Lier les tests aux questions de manière aléatoire
        DB::table('question_test')->insert([
            'test_id' => 3, // ID du test
            'question_id' => 1 // ID de la question
        ]);
        
        DB::table('question_test')->insert([
            'test_id' => 3,
            'question_id' => 2
        ]);
        
        DB::table('question_test')->insert([
            'test_id' => 3,
            'question_id' => 3
        ]);

        DB::table('question_test')->insert([
            'test_id' => 4,
            'question_id' => 1
        ]);
        
        DB::table('question_test')->insert([
            'test_id' => 4,
            'question_id' => 2
        ]);

        DB::table('question_test')->insert([
            'test_id' => 5,
            'question_id' => 3
        ]);
    }
}
