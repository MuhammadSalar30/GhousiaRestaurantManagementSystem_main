<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\MenuSection;

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
        // Share dynamic menu sections with navbar for mega menu
        View::composer('layouts.shared.navbar', function ($view) {
            $sections = MenuSection::with(['items' => function ($q) {
                $q->orderBy('name');
            }])->orderBy('name')->get();
            $view->with('menuSections', $sections);
        });
    }
}
