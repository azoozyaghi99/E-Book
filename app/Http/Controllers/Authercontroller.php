<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auther;
class Authercontroller extends Controller
{
    public function index(){
        $books = Auther::with('auther_id')->get();
        return view('books.index', compact('books'));
    }
}
