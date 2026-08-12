<?php

namespace App\Policies;

use App\Models\Author;
use App\Models\User;

class AuthorPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'staff']);
    }

    public function view(User $user, Author $author): bool
    {
        return $user->hasAnyRole(['admin', 'staff']);
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'staff']);
    }

    public function update(User $user, Author $author): bool
    {
        return $user->hasAnyRole(['admin', 'staff']);
    }

    public function delete(User $user, Author $author): bool
    {
        return $user->hasRole('admin');
    }

    public function restore(User $user, Author $author): bool
    {
        return $user->hasRole('admin');
    }

    public function forceDelete(User $user, Author $author): bool
    {
        return $user->hasRole('admin');
    }
}