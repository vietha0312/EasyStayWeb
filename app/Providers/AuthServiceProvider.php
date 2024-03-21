<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\Banner;
use App\Models\User;
use App\Models\VaiTro;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Livewire\Attributes\Validate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        Gate::define('update', function (User $user) {
            return $user->id_vai_tro === 2;
        });
        Gate::define('delete', function (User $user) {
            return $user->id_vai_tro === 2;
        });
        Gate::define('create', function (User $user) {
            return $user->id_vai_tro === 2;
        });
        Gate::define('view', function (User $user) {
            return $user->id_vai_tro === 2;
        });
        // Gate::define('update-', function (User $user) {
        //     return $user->id_vai_tro === 2 || $user->id_vai_tro === 3;
        // });
        Gate::define('update-A&NV', function (User $user) {
            return $user->id_vai_tro === 2 || $user->id_vai_tro === 3;
        });
        Gate::define('view-A&NV', function (User $user) {
            return $user->id_vai_tro === 2 || $user->id_vai_tro === 3;
        });
        Gate::define('delete-A&NV', function (User $user) {
            return $user->id_vai_tro === 2 || $user->id_vai_tro === 3;
        });
        Gate::define('create-A&NV', function (User $user) {
            return $user->id_vai_tro === 2 || $user->id_vai_tro === 3;
        });
    }
}
