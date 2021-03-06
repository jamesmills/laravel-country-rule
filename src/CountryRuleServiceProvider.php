<?php

namespace Elbgoods\CountryRule;

use Illuminate\Support\ServiceProvider;
use League\ISO3166\ISO3166;
use League\ISO3166\ISO3166DataProvider;

class CountryRuleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ISO3166::class);
        $this->app->alias(ISO3166::class, ISO3166DataProvider::class);
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/countryRule'),
        ], 'lang');

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang/', 'countryRule');
    }
}
