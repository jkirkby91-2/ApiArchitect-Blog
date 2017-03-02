<?php

namespace ApiArchitect\Blog\Providers;

/**
 * Class BlogRepositoryServiceprovider
 *
 * @package app\Providers
 * @author James Kirkby <jkirkby91@gmail.com>
 */
class TagsRepositoryServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\ApiArchitect\Blog\Repositories\TagsRepository::class, function($app) {
            // This is what Doctrine's EntityRepository needs in its constructor.
            return new \ApiArchitect\Blog\Repositories\TagsRepository(
                $app['em'],
                $app['em']->getClassMetaData(\ApiArchitect\Blog\Entities\Tags::class)
            );
        });
    }

    /**
     * Get the services provided by the provider since we are deferring load.
     *
     * @return array
     */
    public function provides()
    {
        return ['\ApiArchitect\Blog\Repositories\TagsRepository'];
    }
}