<?php

namespace App\Providers;

use App\Bookings;
use App\Category;
use App\Policies\CategoryPolicy;
use App\Policies\RevenuePolicy;
use App\Policies\RoomPolicy;
use App\Policies\UserPolicy;
use App\Rooms;
use App\User;
use Illuminate\Support\Facades\Gate;
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
        Category::class => CategoryPolicy::class,
        User::class => UserPolicy::class,
        Bookings::class => RevenuePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
