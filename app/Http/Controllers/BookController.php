<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        if (auth()->user()->hasRole('Mahasiswa')) {
            abort(403, 'Unauthorized action.');
        }

        return view('books.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->hasRole('Mahasiswa')) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required',
            'author' => 'required',
        ]);

        Book::create($request->all());
        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        if (auth()->user()->hasRole('Mahasiswa')) {
            abort(403, 'Unauthorized action.');
        }

        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        if (auth()->user()->hasRole('Mahasiswa')) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required',
            'author' => 'required',
        ]);

        $book->update($request->all());
        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        if (!auth()->user()->hasRole('Admin')) {
            abort(403, 'Unauthorized action.');
        }

        $book->delete();
        return redirect()->route('books.index');
    }
}