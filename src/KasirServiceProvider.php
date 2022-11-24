<?php 

namespace Rivan\Kasir;


use Illuminate\Support\ServiceProvider;

class KasirServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views','kasir');
    }
    public function register()
    {

    }
}

?>