<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->get();

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $this->authorize('create', Book::class);

        $authors = Author::all();

        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Book::class);

        $validated = $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'author_id' => ['required', 'exists:authors,id'],
        ]);

        Book::create([
            'title' => $validated['title'],
            'author_id' => $validated['author_id'],
            'created_by' => $request->user()->id,
        ]);

        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        $this->authorize('update', $book);

        $authors = Author::all();

        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
        $this->authorize('update', $book);

        $validated = $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'author_id' => ['required', 'exists:authors,id'],
        ]);

        $book->update($validated);

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);

        $book->delete();

        return redirect()->route('books.index');
    }
}