<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('book.index', ['books' => $books]);
    }
    public function edit(Book $book)
    {
        return view('book.edit', ['book' => $book]);
    }
    public function show($book)
    {
        $result = Book::findOrFail($book);
        return view('book.show', ['book' => $result]);
    }
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')
        ->with('pesan',"Hapus data $book->Author berhasil");
    }
    public function create()
    {
        return view('book.create');
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'Title' => 'required',
            'Author' => 'required',
            'Genre' => 'required',
            'Height' => 'required',
            'Publisher' => 'required',
        ]);
        
        Book::create($validateData);
        
        return redirect()->route('books.index')->with('pesan', "Penambah data {$validateData['Title']} berhasil");
    }

    public function update(Request $request, Book $book)
    {
        $validateData = $request->validate([
            'Title' => 'required',
            'Author' => 'required',
            'Genre' => 'required',
            'Height' => 'required',
            'Publisher' => 'required',
        ]);
        
        $book->update($validateData);

        return redirect()->route('books.show', ['book' => $book->id])->with('pesan', "Update data {$validateData['Title']} berhasil");
    }
}