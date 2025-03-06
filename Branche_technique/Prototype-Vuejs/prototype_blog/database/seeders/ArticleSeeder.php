<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles')->insert([
            [
                'title' => 'Introduction à Laravel',
                'content' => 'Laravel est un framework PHP moderne et puissant.',
               
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Vue.js et la réactivité',
                'content' => 'Vue.js est un framework JavaScript progressif.',
                
                'category_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Les bases de MySQL',
                'content' => 'MySQL est un système de gestion de base de données relationnelle.',
                
                'category_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Comment sécuriser son application web',
                'content' => 'Découvrez les bonnes pratiques pour protéger votre site web.',
                
                'category_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Déployer une application Laravel sur un serveur',
                'content' => 'Guide complet pour héberger une application Laravel.',
                
                'category_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
