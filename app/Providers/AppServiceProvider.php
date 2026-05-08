<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Routing\Route;
use Dedoc\Scramble\Scramble;
use App\Models\Product;
use App\Policies\ProductPolicy;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        Product::class => ProductPolicy::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Gate::define('manage-product', function ($user) {
            return $user->role === 'admin';
        });

        Scramble::configure()
            ->routes(function (Route $route) {
                return Str::startsWith($route->uri, 'api/');
            });

        Gate::define('viewApiDocs', function () {
            return true;
        });
    }
}