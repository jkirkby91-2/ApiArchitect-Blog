<?php


$this->app->group(['middleware' => ['before' => 'psr7adapter']], function ($app)
{
    $app->get('blog'.'/{id}', 'ApiArchitect\Blog\Http\Controllers\BlogController@show');
});

$this->app->group(['middleware' => ['before' => 'psr7adapter'], 'requestValidator'], function ($app)
{
    $app->post('blog', 'ApiArchitect\Blog\Http\Controllers\BlogController@store');
});
