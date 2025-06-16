<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Database\Seeders\BooksTableSeeder;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {

        $books = Book::with('genre')->get();

        return response()->json(
            [
                "success" => true,
                "data" => $books
                ]
            );
    }

    public function show(Book $book) {

        $book->load('genre', 'types');

        return response()->json(
            [
                "success" => true,
                "data" => $book
            ]
            );
    }

}