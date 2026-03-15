<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use App\Models\Blog;
use App\Models\Post;
use App\Models\Setting;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\Http;

class AppServiceProvider extends ServiceProvider
{


    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        if (env('VERCEL_DEPLOYMENT_OR_LOCAL') == 'vercel') {
        $this->app->bind('path.public', function () {
            return base_path('public');
        });
    }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    if (app()->environment('local')) {
        Http::macro('cloudinary', function () {
            return Http::withOptions([
                'verify' => false,
            ]);
        });
    }

        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }


        config(['cloudinary.cloud' => [
        'cloud_name' => 'daqcfthk1',
        'api_key'    => '276479617617579',
        'api_secret' => 'BkJ7V97sMEPGqHokWi3eIXF-Brc',
         ]]);

         config(['cloudinary.guzzle_options' => [
                'verify' => false,
            ]]);

        //
        view()->share('latestBlogs', Post::where('is_published', true)->latest()->take(3)->get());
        view()->share('setting', Setting::find(1));
        view()->share('sosmeds', SocialMedia::where('is_active', true)->get());
    }
}
