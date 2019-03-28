<?php

    namespace man30\systemnotice;

    class ServiceProvider extends \Illuminate\Support\ServiceProvider
    {
        protected $defer = TRUE;

        public function register()
        {
            $this->app->singleton(Systemnotice::class, function () {
                return new Systemnotice();
            });
            $this->app->alias(Systemnotice::class, 'weather');
        }

        public function provides()
        {
            return [Systemnotice::class, 'systemnotice'];
        }
    }