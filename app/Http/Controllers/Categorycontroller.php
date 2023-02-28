<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class Categorycontroller extends Controller
{
    public function index(){
        $books = Category::with('category_id')->get();
        return view('books.index', compact('books'));
    }}
