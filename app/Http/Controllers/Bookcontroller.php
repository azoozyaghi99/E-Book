<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class Bookcontroller extends Controller
{
    public function index(){
        $books = Book::with('info_books')->get();
        return view('books.index', compact('books'));
    }}
