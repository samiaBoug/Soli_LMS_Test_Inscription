<?php

namespace Modules\pkgBlog\App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Modules\pkgBlog\Models\Article;

class ArticleImport implements ToModel
{
    // private function recordExists(array $row){
    //     return Article::where('title', $row['title'])->exists();
    // }
    public function model(array $row)
    {   
        // if($this->recordExists($row)){
        //     return null;
        // }
        return new Article([
            'title'=> $row[1],
            'content'=> $row[2],
            'category_id'=> $row[5],
            'user_id'=> $row[6],

        ]);
    }
}
