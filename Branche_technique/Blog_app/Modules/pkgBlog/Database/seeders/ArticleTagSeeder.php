<?php

namespace Modules\pkgBlog\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Modules\pkgBlog\Models\Article;
use Modules\pkgBlog\Models\Tag;
use Illuminate\Database\Seeder;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = Article::all();
        foreach ($articles as $article) {
            $randomtag = Tag::inRandomOrder()->first();
            $article->tags()->attach($randomtag->id);
        }
    }
}
