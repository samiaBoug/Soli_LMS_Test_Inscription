<?php

namespace Modules\pkgBlog\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\pkgBlog\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::create([
            'name' => 'Web',
           
        ]);
        Category::create([
            'name' => 'Mobile',
         
        ]);
    }
}
