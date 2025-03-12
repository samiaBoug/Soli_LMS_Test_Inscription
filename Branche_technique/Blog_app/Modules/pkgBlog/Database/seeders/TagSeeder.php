<?php

namespace Modules\pkgBlog\Database\Seeders;

use Modules\pkgBlog\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Tag::create([
            'name' => 'tag1',
           
        ]);
        Tag::create([
            'name' => 'tag2',
         
        ]);
    }
}
