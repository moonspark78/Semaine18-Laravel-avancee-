<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;

class BookPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Book $book): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'staff']);
    }

    public function update(User $user, Book $book): bool
    {
        return $user->hasAnyRole(['admin', 'staff']);
    }

    public function delete(User $user, Book $book): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        if ($user->hasRole('staff')) {
            return (int) $book->created_by === (int) $user->id;
        }

        return false;
    }

    public function restore(User $user, Book $book): bool
    {
        return $user->hasAnyRole(['admin', 'staff']);
    }

    public function forceDelete(User $user, Book $book): bool
    {
        return $user->hasRole('admin');
    }
}