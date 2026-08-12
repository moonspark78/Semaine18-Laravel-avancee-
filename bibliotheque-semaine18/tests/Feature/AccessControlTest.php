<?php

use App\Models\Author;
use App\Models\Book;
use App\Models\Role;
use App\Models\User;

it('restricts management routes to admin and staff', function () {
    $userRole = Role::create(['name' => 'user']);
    $user = User::factory()->create(['role_id' => $userRole->id]);

    $this->actingAs($user)
        ->get('/books/create')
        ->assertForbidden();

    $this->actingAs($user)
        ->get('/authors/create')
        ->assertForbidden();
});

it('applies the delete policy rules for books and authors', function () {
    $adminRole = Role::create(['name' => 'admin']);
    $staffRole = Role::create(['name' => 'staff']);
    $userRole = Role::create(['name' => 'user']);

    $admin = User::factory()->create(['role_id' => $adminRole->id]);
    $staff = User::factory()->create(['role_id' => $staffRole->id]);
    $user = User::factory()->create(['role_id' => $userRole->id]);

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
