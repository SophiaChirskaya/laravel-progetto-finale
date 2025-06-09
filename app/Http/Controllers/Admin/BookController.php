<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Type;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();

        return view("books.index", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();

        $types = Type::all();

        return view("books.create", compact("genres", "types"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newBook = new Book();

        $newBook->title = $data['title'];
        $newBook->author = $data['author'];
        $newBook->year = $data['year'];
        $newBook->content = $data['content'];
        $newBook->genre_id = $data['genre_id'];

        $newBook->save();

        if($request->has('types')){

            $newBook->types()->attach($data['types']);

        }

        return redirect()->route('books.show', $newBook);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view("books.show", compact("book"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $genres = Genre::all();
        $genres = Type::all();

        return view("books.edit", compact("book", "genres", "types"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $data = $request->all();

        $book->title = $data['title'];
        $book->author = $data['author'];
        $book->year = $data['year'];
        $book->content = $data['content'];
        $book->genre_id = $data['genre_id'];

        $book->update();

        if($request->has('types')) {

            $book->types()->sync($data['types']);

        } else {

            $book->types()->detach();

        }

        return redirect()->route("books.show", $book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route("books.index");
    }
}
