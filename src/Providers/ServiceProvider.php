<?php

namespace Rainsens\QMap\Providers;

use Rainsens\QMap\QMap;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
	protected $defer = true;
    
    public function register()
    {
        $this->app->singleton('q_map', function () {
        	return new QMap(config('services.q_map.key'));
        });
    }
    
    public function provides()
    {
	    return [QMap::class, 'q_map'];
    }
}
