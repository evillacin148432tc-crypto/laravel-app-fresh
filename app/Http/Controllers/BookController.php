<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
public function index(Request $request)
{
    $query = Book::query();

    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('title', 'like', '%' . $search . '%')
              ->orWhere('author', 'like', '%' . $search . '%');
        });
    }

    if ($request->filled('genre')) {
        $query->where('genre', $request->genre);
    }

    $books = $query->get();

    if ($request->ajax()) {
        return view('books.partials.table', compact('books'))->render();
    }

    return view('books.index', compact('books'));
}

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'genre' => 'required|string',
            'published_year' => 'required|integer',
            'isbn' => 'required|unique:books,isbn',
            'pages' => 'required|integer',
            'language' => 'required|string',
            'publisher' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $validated['is_available'] = $request->has('is_available');

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'genre' => 'required|string',
            'published_year' => 'required|integer',
            'isbn' => 'required|unique:books,isbn,' . $id,
            'pages' => 'required|integer',
            'language' => 'required|string',
            'publisher' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $validated['is_available'] = $request->has('is_available');

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy($id)
    {
        Book::findOrFail($id)->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}