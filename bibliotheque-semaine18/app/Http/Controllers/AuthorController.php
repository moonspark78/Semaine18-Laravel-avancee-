<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Author::class);

        $authors = Author::all();

        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        $this->authorize('create', Author::class);

        return view('authors.create');
    }

    public function store(StoreAuthorRequest $request)
    {
        $this->authorize('create', Author::class);

        Author::create($request->validated());

        return redirect()->route('authors.index');
    }

    public function edit(Author $author)
    {
        $this->authorize('update', $author);

        return view('authors.edit', compact('author'));
    }

    public function update(StoreAuthorRequest $request, Author $author)
    {
        $this->authorize('update', $author);

        $author->update($request->validated());

        return redirect()->route('authors.index');
    }

    public function destroy(Author $author)
    {
        $this->authorize('delete', $author);

        $author->delete();

        return redirect()->route('authors.index');
    }
}