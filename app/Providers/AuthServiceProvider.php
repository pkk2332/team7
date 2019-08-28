<?php

namespace App\Providers;
use App\Product;
use App\Policies\ProductPolicy;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
            'App\Model' => 'App\Policies\ModelPolicy',
             Product::class => ProductPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
         Gate::define('update-post', function ($user, $admin) {
        return $user->admin_id == $admin->id;
    });
}
}