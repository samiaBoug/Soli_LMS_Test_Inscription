<?php

namespace App\Providers;

use Modules\pkgBlog\Article;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Modules\pkgBlog\Policies\ArticlePolicy;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        Article::class => ArticlePolicy::class
    ];
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::useBootstrap();
    }
}
