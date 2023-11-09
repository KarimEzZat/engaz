<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //arabic carbon
        Carbon:: setLocale("ar");
        Schema::defaultStringLength(191);
        Paginator::useBootstrap(); // here we have added code.

        View::share([
            'companies' => Company::all(),
            'services' => Service::latest()->get()
        ]);

    }
}
