<?php

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Spatie\Permission\Models\Role;

it('restricts management routes to admin and staff', function () {
    Role::create([
        'name' => 'user',
        'guard_name' => 'web',
    ]);

    $user = User::factory()->create();
    $user->assignRole('user');

    $this->actingAs($user)
        ->get('/books/create')
        ->assertForbidden();

    $this->actingAs($user)
        ->get('/authors/create')
        ->assertForbidden();
});


it('applies the delete policy rules for books and authors', function () {
    Role::create([
        'name' => 'admin',
        'guard_name' => 'web',
    ]);

    Role::create([
        'name' => 'staff',
        'guard_name' => 'web',
    ]);

    Role::create([
        'name' => 'user',
        'guard_name' => 'web',
    ]);

    $admin = User::factory()->create();
    $admin->assignRole('admin');

    $staff = User::factory()->create();
    $staff->assignRole('staff');

    $user = User::factory()->create();
    $user->assignRole('user');

    $author = Author::factory()->create();

    $bookCreatedByStaff = Book::factory()->create([
        'author_id' => $author->id,
        'created_by' => $staff->id,
    ]);

    $bookCreatedByAdmin = Book::factory()->create([
        'author_id' => $author->id,
        'created_by' => $admin->id,
    ]);

    expect($admin->can('delete', $bookCreatedByStaff))->toBeTrue()
        ->and($staff->can('delete', $bookCreatedByStaff))->toBeTrue()
        ->and($staff->can('delete', $bookCreatedByAdmin))->toBeFalse()
        ->and($user->can('delete', $bookCreatedByStaff))->toBeFalse()
        ->and($admin->can('delete', $author))->toBeTrue()
        ->and($staff->can('delete', $author))->toBeFalse();
});