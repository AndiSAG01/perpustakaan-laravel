<?php

namespace App\Providers;

use Carbon\Carbon;
use Storage;
use League\Flysystem\Filesystem;
use Dropbox\Client as DropboxClient;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Dropbox\DropboxAdapter;


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
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');

        

        Storage::extend('dropbox', function ($app, $config) {
            $client = new DropboxClient(
                'secret_key'
            );

            return new Filesystem(new DropboxAdapter($client));
        });
    }
}
