<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Product;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
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
    public function boot(): void
    {
        Gate::define('manage-product', function (User $user, Product $product) {
            return $user->id === $product->user_id;
        });

        Gate::define('view-product', function (User $user, Product $product) {
            return $user->id === $product->user_id || $product->is_public;
        });
    }
}
