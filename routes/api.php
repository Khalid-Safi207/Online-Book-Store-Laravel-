<?php

use App\Http\Controllers\Api\BooksApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/books/{book_name}', [BooksApiController::class, "searchBook"]);
