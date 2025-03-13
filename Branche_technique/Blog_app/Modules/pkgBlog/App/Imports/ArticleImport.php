<?php

namespace Modules\pkgBlog\App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Modules\pkgBlog\Models\Article;

class ArticleImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Article([
            'id'=> $row[0],
            'title'=> $row[1],
            'category'=> $row[2],
            'date de creaction'=> $row[3],

        ]);
    }
}
