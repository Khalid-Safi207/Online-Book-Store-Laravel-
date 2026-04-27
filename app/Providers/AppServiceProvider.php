<?php

namespace App\Providers;

use App\Models\Book;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('layout.layout', function ($view) {
        $categories = Book::get( 'category' )->groupBy( 'category' )->toArray();
        $authors = Book::get( 'author' )->groupBy( 'author' )->toArray();
        $view->with(["categories"=>array_keys($categories), "authors"=>array_keys($authors)]);
    });
    }
}
