<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Product;         // <-- Import model Product
use App\Policies\ProductPolicy;  // <-- Import ProductPolicy
use App\Models\Discount;         // <-- 1. Import Discount model
use App\Policies\DiscountPolicy;  // <-- 2. Import DiscountPolicy


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Product::class => ProductPolicy::class, // <-- Pastikan baris ini ada
        Discount::class => DiscountPolicy::class, // <-- 3. Tambahkan baris ini

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
