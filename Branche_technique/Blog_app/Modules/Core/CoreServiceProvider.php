<?php
namespace Modules\Core ;

use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider{
    public function register(){

    }
    
    public function boot(){
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');

    }
}