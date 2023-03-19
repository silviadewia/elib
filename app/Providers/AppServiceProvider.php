<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        $this->register();

        Gate::define('buku', function($user){
            if ($user->level == 0) {
                return true;
            }
            return false;
        });

        Gate::define('kategori', function($user){
            if ($user->level == 0) {
                return true;
            }
            return false;
        });

        Gate::define('buku-populer', function($user){
            return true;
        });

        Gate::define('pengguna', function($user){
            if ($user->level == 0) {
                return true;
            }
            return false;
        });

        Gate::define('transaksi', function($user){
            if ($user->level == 0) {
                return true;
            }
            return false;
        });

        Gate::define('denda', function($user){
            if ($user->level == 0) {
                return true;
            }
            return false;
        });

        Gate::define('laporan', function($user){
            if ($user->level == 0) {
                return true;
            }
            return false;
        });
    }
}