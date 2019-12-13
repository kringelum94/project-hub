<?php

namespace App\Providers;

use App\Project;
use App\Observers\ProjectObserver;

use App\Task;
use App\Observers\TaskObserver;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);
        Project::observe(ProjectObserver::class);
        Task::observe(TaskObserver::class);
    }
}
