<?php

namespace App\Providers;

 use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Log;


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
        $this->registerPolicies();
        Gate::define('privilege', function (User $user) {
            Log::info('User ' . $user->id . ' is checking privilege.');

           if($user->usertype==='admin'){
           return true;
           }
           else{
            return false;
        }
        });        
      
    }
}
