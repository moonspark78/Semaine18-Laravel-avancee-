<?php

namespace App\Policies;

use App\Models\Author;
use App\Models\User;

class AuthorPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isStaffOrAdmin();
    }

    public function view(User $user, Author $author): bool
    {
        return $user->isStaffOrAdmin();
    }

    public function create(User $user): bool
    {
        return $user->isStaffOrAdmin();
    }

    public function update(User $user, Author $author): bool
    {
        return $user->isStaffOrAdmin();
    }

    public function delete(User $user, Author $author): bool
    {
        return $user->role?->name === 'admin';
    }

    public function restore(User $user, Author $author): bool
    {
        return $user->role?->name === 'admin';
    }

    public function forceDelete(User $user, Author $author): bool
    {
        return $user->role?->name === 'admin';
    }
}
