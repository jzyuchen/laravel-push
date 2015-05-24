<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/24 0024
 * Time: 下午 9:06
 */

namespace Jzyuchen\Push;


use Illuminate\Support\ServiceProvider;

class PushServiceProvider extends ServiceProvider {

    public function boot(){
        $config     = realpath(__DIR__.'/../config/config.php');

        $this->publishes([
            $config     => config_path('push.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['push'] = $this->app->share(function($app){
            return new Push();
        });
    }
}