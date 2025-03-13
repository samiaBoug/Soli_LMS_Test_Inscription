<?php

namespace Modules\pkgBlog\App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Modules\pkgBlog\Models\Article;

class ArticleExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Article::all();
    }
}
