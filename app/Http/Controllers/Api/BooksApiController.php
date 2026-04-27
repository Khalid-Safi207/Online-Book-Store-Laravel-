<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksApiController extends Controller
{
    public function searchBook($book_name){
        $books = Book::where('book_name', 'like', "%$book_name%")->get();
        return response()->json($books);
        
    }
}
