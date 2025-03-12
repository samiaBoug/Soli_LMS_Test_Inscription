<?php

namespace Modules\pkgBlog\Database\Seeders;
use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Article::factory()->count(4)->create();
        Article::create([
            
                //
                'title' =>" titre 1",
                'content' => "content 1",
                'category_id' => 1,
                'user_id'=> 1 
           
        ]);
        Article::create([
            
            //
            'title' =>" titre 2",
            'content' => "content 2",
            'category_id' => 2,
            'user_id'=> 2 
       
    ]);
    }
}
