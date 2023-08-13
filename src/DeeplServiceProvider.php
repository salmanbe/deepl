<?php

namespace Salmanbe\Deepl;

use Illuminate\Support\ServiceProvider;
      
class DeeplServiceProvider extends ServiceProvider {

    public function register() {

        $this->app->bind('deepl', function($app) {
            return new Deepl($app);
        });        
    }
}