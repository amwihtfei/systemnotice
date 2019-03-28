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

        public function boot()
        {
            //加载路由
            //加载migrations
            $this->publishes([__DIR__ . '/migrations' => base_path('database/migrations'),]);
            //加载views
            $this->publishes([
                __DIR__ . '/views' => base_path('resources/views/vendor/systemnotice'),
            ]);
            //加载models
            $this->publishes([
                __DIR__ . '/models' => base_path('app/Models'),
            ]);
            //加载静态资源
            //加载config
            $this->publishes([
                __DIR__ . '/config' => base_path('config'),
            ]);
        }
    }