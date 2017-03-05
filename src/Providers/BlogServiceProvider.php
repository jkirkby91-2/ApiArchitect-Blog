<?php

namespace ApiArchitect\Blog\Providers;

/**
 * Class BlogServiceProvider
 *
 * @package ApiArchitect\Blog\Providers
 * @author James Kirkby <me@jameskirkby.com>
 */
class BlogServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerServiceProviders();
        $this->registerRoutes();
        $this->registerMiddleware();
        $this->registerControllers();

        $this->app->bind(
            '\Jkirkby91\Boilers\NodeEntityBoiler\EntityContract',
            '\ApiArchitect\Blog\Entities\Blog'
        );

        $this->app->bind(
            '\Jkirkby91\Boilers\NodeEntityBoiler\EntityContract',
            '\ApiArchitect\Blog\Entities\Tags'
        );

        $this->app->bind(
            '\Jkirkby91\Boilers\NodeEntityBoiler\EntityContract',
            '\ApiArchitect\Blog\Entities\Catagory'
        );                
    }

    /**
     * Boot Method
     */
    public function boot(){}

    /**
     * Register dependancy service provider
     */
    public function registerServiceProviders()
    {
        $this->app->register(\ApiArchitect\Blog\Providers\TagsRepositoryServiceProvider::class);
        $this->app->register(\ApiArchitect\Blog\Providers\BlogRepositoryServiceProvider::class);
        $this->app->register(\ApiArchitect\Blog\Providers\CatagoryRepositoryServiceProvider::class);
    }

    /**
     * Register Routes
     */
    public function registerRoutes()
    {
        require __DIR__.'/../Http/routes.php';
    }

    /**
     * Register app Middleware
     */
    public function registerMiddleware()
    {
        $this->app->routeMiddleware(['BlogRequestValidator' => \ApiArchitect\Blog\Http\Middleware\BlogRequestValidationMiddleware::class]);
    }

     /**
      * Register Controllers + inject their transformer
      */
     public function registerControllers()
     {
         $this->app->bind(\ApiArchitect\Blog\Http\Controllers\BlogController::class, function($app) {
             return new \ApiArchitect\Blog\Http\Controllers\BlogController(
                 $app['em']->getRepository(\ApiArchitect\Blog\Entities\Blog::class),
                 new \ApiArchitect\Blog\Http\Transformers\BlogTransformer
             );
         });
     }
}