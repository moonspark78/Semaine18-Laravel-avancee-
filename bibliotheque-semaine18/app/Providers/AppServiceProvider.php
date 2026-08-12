<?php

namespace App\Providers;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use App\Policies\AuthorPolicy;
use App\Policies\BookPolicy;
use Illuminate\Support\Facades\Gate;
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
        Gate::policy(Book::class, BookPolicy::class);
        Gate::policy(Author::class, AuthorPolicy::class);

        Gate::define('manage-books', function (User $user): bool {
            return $user->isStaffOrAdmin();
        });

        Gate::define('manage-authors', function (User $user): bool {
            return $user->isStaffOrAdmin();
        });
    }
}
