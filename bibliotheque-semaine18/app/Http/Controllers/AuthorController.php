<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required|email|unique:authors',
            'phone' => 'nullable',
        ]);

        Author::create($request->all());

        return redirect()->route('authors.index');
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required|email|unique:authors,email,' . $author->id,
            'phone' => 'nullable',
        ]);

        $author->update($request->all());

        return redirect()->route('authors.index');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index');
    }
}