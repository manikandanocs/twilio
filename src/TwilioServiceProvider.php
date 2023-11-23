<?php
namespace Oclock\TwilioMessenger;

use Illuminate\Support\ServiceProvider;

class TwilioServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->registerConfig();
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if ($this->app->runningInConsole()) {
            $this->publishConfigs();
        }
    }

    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/twilio.php', 'twilio');
    }

    protected function publishConfigs(): void
    {
        $this->publishes([
            __DIR__ . '/../config/twilio.php' => config_path('twilio.php'),
        ], 'twilio-config');
       
    }


}



?>