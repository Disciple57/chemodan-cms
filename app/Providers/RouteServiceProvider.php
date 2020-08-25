<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;
use App\Model\Pages;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * This namespace is applied to your admin controller routes.
     *
     * In addition, it is set as the URL generator's root admin namespace.
     *
     * @var string
     */
    protected $namespace_admin = 'App\Http\Controllers\Admin';
    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */

    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapPagesRoutes();

        $this->mapAdminRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "pages" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapPagesRoutes()
    {
        if (Schema::hasTable('pages')) {
            Pages::all()->map(function ($page) {
                $page->url !== 'index' ?: $page->url = '';
                Route::get($page->url, ['as' => $page->name, function () use ($page) {
                    return $this->app->call('App\Http\Controllers\PagesViewController@show', ['page' => $page]);
                }]);
            });
            Route::get('sitemap.xml', 'PagesViewController@sitemap')->name('sitemap');
        }
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::prefix(DIRECTORY_SEPARATOR . env('ADMIN_PANEL_URI'))
            ->middleware(['web'])
            ->namespace($this->namespace_admin)
            ->group(base_path('routes/admin.php'));
    }
}
