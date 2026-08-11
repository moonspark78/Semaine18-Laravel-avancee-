<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['user', 'book'])
            ->orderBy('borrowed_at', 'desc')
            ->get();

        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $users = User::all();
        $books = Book::all();

        return view('loans.create', compact('users', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
        ]);

        Loan::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'borrowed_at' => now(),
        ]);

        return redirect()->route('loans.index');
    }

    public function update(Request $request, Loan $loan)
    {
        $loan->update([
            'returned_at' => now(),
        ]);

        return redirect()->route('loans.index');
    }
}