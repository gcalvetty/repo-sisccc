<?php

namespace sis_ccc\Providers;

use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
      //  Schema::defaultStringLength(191);
      Blade::withoutDoubleEncoding();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
