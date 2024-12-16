<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;


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
        view()->composer('partials.languageSwitcher', function($view){
            $view->with('current_locale', app()->getLocale());
            $view->with('available_locales', config('app.available_locales'));
        });



        view()->composer('*', function ($view) {
            $notifications = Notification::where('user_id', auth()->id())
                ->where('is_read', false)
                ->orderBy('created_at', 'desc')
                ->get();
            $view->with('notifications', $notifications);
        });



        Blade::directive('captcha', function () {
            return "<?php echo app('captcha')->display(); ?>";
        });

        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
