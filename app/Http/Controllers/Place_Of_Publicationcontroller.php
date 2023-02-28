<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place_Of_Publication;

class Place_Of_Publicationcontroller extends Controller
{
    public function index(){
        $books = Place_Of_Publication::with('place_of_publication_id')->get();
        return view('books.index', compact('books'));

}}
