<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('required_if_filled', function ($attribute, $value, $parameters, $validator) {
            // Check if the 'video' field is filled and not empty
            $videoField = $validator->getData()['video'] ?? null;
            return !empty($videoField) ? !empty($value) : true;
        });
    }
}