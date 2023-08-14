<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */


    public function boot()
    {
        Blade::directive('firstword', function ($expression) {
            return "<?php
                \$titleWords = explode(' ', {$expression});
                \$firstWord = \$titleWords[0];
                \$firstWord = str_replace(\"'\", '', \$firstWord);
                \$firstWord = rtrim(\$firstWord, 's');
                echo \$firstWord;
            ?>";
        });
    }
    
}
