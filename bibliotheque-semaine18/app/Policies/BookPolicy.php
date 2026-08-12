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
        return $user->isStaffOrAdmin();
    }

    public function update(User $user, Book $book): bool
    {
        return $user->isStaffOrAdmin();
    }

    public function delete(User $user, Book $book): bool
    {
        if ($user->role?->name === 'admin') {
            return true;
        }

        if ($user->role?->name === 'staff') {
            return (int) $book->created_by === (int) $user->id;
        }

        return false;
    }

    public function restore(User $user, Book $book): bool
    {
        return $user->isStaffOrAdmin();
    }

    public function forceDelete(User $user, Book $book): bool
    {
        return $user->role?->name === 'admin';
    }
}
