<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Release;
use App\Tag;
use App\Policies\ReleasePolicy;
use App\Policies\TagPolicy;
use App\Policies\CompanyPolicy;
use Illuminate\Support\Facades\View;


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

        //authenticate
        Gate::define('release.create', ReleasePolicy::class.'@create');
        Gate::define('release.publish', ReleasePolicy::class.'@publish');
        Gate::define('release.draft', ReleasePolicy::class.'@draft');
        Gate::before(function ($user, $ability) {
            return$user->hasAccess(['admin']) ? true : null;
        });


        //pass data to views
        View::composer(['home.lasted_box', 'sidebar.lasted_box'], function ($view) {
            $view->with('lasted_news', Release::lasted());
        });

        View::composer(['home.featured_box', 'home.main_news_box', 'sidebar.featured_box'], function ($view) {
            $view->with('featured_news', Release::featured());
        });

        View::composer(['home.articles_box'], function ($view) {
            $view->with('news', Release::news());
        });

        View::composer(['home.most_category_views_box'], function ($view) {
            $view->with('politic', Release::politic()->first());
            $view->with('business', Release::business()->first());
            $view->with('tech', Release::tech()->first());
            $view->with('education', Release::education()->first());
            $view->with('lifestyle', Release::lifestyle()->first());
            $view->with('sport', Release::sport()->first());
        });

        View::composer(['shared.navbar-politic'], function ($view) {
            $view->with('politics', Release::politic()->take(4)->get());
        });
        View::composer(['shared.navbar-sport'], function ($view) {
            $view->with('sports', Release::sport()->take(4)->get());
        });
        View::composer(['shared.navbar-tech'], function ($view) {
            $view->with('techs', Release::tech()->take(4)->get());
        });
        View::composer(['shared.navbar-education'], function ($view) {
            $view->with('educations', Release::education()->take(4)->get());
        });
        View::composer(['shared.navbar-lifestyle'], function ($view) {
            $view->with('lifestyles', Release::lifestyle()->take(4)->get());
        });
        View::composer(['shared.navbar-business'], function ($view) {
            $view->with('businesses', Release::business()->take(4)->get());
        });
        View::composer(['shared.navbar-features'], function ($view) {
            $view->with('features', Release::featured());
        });

        View::composer(['shared.navbar-politic'], function ($view) {
            $view->with('politics', Release::politic()->take(4)->get());
        });

        View::composer(['shared.navbar-sport'], function ($view) {
            $view->with('sports', Release::sport()->take(4)->get());
        });
        View::composer(['shared.navbar-tech'], function ($view) {
            $view->with('techs', Release::tech()->take(4)->get());
        });
        View::composer(['shared.navbar-education'], function ($view) {
            $view->with('educations', Release::education()->take(4)->get());
        });
        View::composer(['shared.navbar-lifestyle'], function ($view) {
            $view->with('lifestyles', Release::lifestyle()->take(4)->get());
        });
        View::composer(['shared.navbar-business'], function ($view) {
            $view->with('businesses', Release::business()->take(4)->get());
        });
        View::composer(['shared.navbar-features'], function ($view) {
            $view->with('features', Release::featured());
        });

        View::composer(['home.combined_box'], function ($view) {
            $view->with('news', Release::combined());
        });     

        View::composer(['home.weekly_news'], function ($view) {
            $view->with('news', Release::weekly());
        });

        View::composer(['sidebar.tags_box'], function ($view) {
            $view->with('tags', Tag::paginate(20));
        });

        View::composer(['sidebar.todayfeatured_box'], function ($view) {
            $view->with('news', Release::featuredToday());
        });
        
        View::composer(['sidebar.widget_box'], function ($view) {
            $view->with('popular_news', Release::popular());
            $view->with('recent_news', Release::popular());
            $view->with('news', Release::popular());
        });
    }
}
