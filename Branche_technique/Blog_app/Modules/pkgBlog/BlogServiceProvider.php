<?php
namespace Modules\pkgBlog ;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider{
    public function register(){

    }
    
    public function boot(){
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');
        $this->loadFactoriesFrom(__DIR__.'/Database/factories');
        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');    
    }
}