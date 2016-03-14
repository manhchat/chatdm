<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    	Validator::extend('tag_a', function($attribute, $value, $parameters, $validator) {
    		if (strip_tags($value, '<a>') != strip_tags($value)) {
    			return false;
    		}
    		return true;
    	});
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
