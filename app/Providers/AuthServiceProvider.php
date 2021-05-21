<?php

namespace App\Providers;

use App\Models\Resource;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if(!Schema::hasTable('resources')) return null;

        $resources=Resource::all();

        Gate::before(function($user){
            if( $user->isAdmin()){
                return true;
            }
        });

        foreach ($resources as $resource ) {

            Gate::define($resource->resource,function($user)use ($resource){
                return $resource->roles->contains($user->role);
            });
        }


    }
}
