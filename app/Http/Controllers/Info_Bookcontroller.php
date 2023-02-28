<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info_Book;

class Info_Bookcontroller extends Controller
{
    public function index(){
        $books = Info_Book::with('id')->get();
        return view('books.index', compact('books'));
    }


}
