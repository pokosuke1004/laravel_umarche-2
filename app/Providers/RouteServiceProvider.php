<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *アプリケーションの「ホーム」ルートへのパス。
     * This is used by Laravel authentication to redirect users after login.
     * ログイン後にユーザーをリダイレクトする場所
     *
     * @var string
     */
    public const HOME = '/';
    public const OWNER_HOME = '/owner/dashboard';
    public const ADMIN_HOME = '/admin/dashboard';

    /**
     * The controller namespace for the application.
     *アプリケーションのコントローラー名前空間。
     * When present, controller route declarations will automatically be prefixed with this namespace.
     * 存在する場合、コントローラーのルート宣言にはこの名前空間が自動的に接頭辞として付加されます。
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *ルート モデルバインディング、パターン フィルターなどを定義します。
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::prefix('/')
                ->as('user.')
                ->middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::prefix('/admin')
                ->as('admin.')
                ->middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));  
            
                Route::prefix('/owner')
                ->as('owner.')
                ->middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/owner.php'));        
        });

    }

    /**
     * Configure the rate limiters for the application.
     *アプリケーションのレート リミッタ-(レートリミッターとは、アプリケーションのAPIトラフィックを制限する機能)
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
