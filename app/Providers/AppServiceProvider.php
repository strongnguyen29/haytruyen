<?php

namespace App\Providers;

use App\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton(
            \App\Repositories\Contracts\BookInterface::class,
            \App\Repositories\BookRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Contracts\CategoryInterface::class,
            \App\Repositories\CategoryRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Contracts\AuthorInterface::class,
            \App\Repositories\AuthorRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Contracts\TagInterface::class,
            \App\Repositories\TagRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Contracts\ChapterInterface::class,
            \App\Repositories\ChapterRepository::class
        );
        /** GENERATOR_REPOSITORY_BINDER **/

        $this->app->singleton(Setting::class, function () {
            return Setting::make(storage_path('app/settings.json'));
        });

        foreach (glob(app_path().'/Helpers/*.php') as $filename) {
            require_once($filename);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
