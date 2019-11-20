<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Release;
use App\Tag;
use App\Policies\ReleasePolicy;
use Aoo\Policies\TagPolicy;

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

    protected $policies = [
        Release::class => ReleasePolicy::class,
        Tag::class => TagPolicy::class,
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('release.create', ReleasePolicy::class.'@create');
        Gate::define('release.publish', ReleasePolicy::class.'@publish');
        Gate::define('release.draft', ReleasePolicy::class.'@draft');

        Gate::resource('tag', TagPolicy::class);
        
    }
}
