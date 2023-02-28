<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class searchcontroller extends Controller
{
    public function search(Request $request){
        $search = $request->input('search');
        $book = DB::table('books')
            ->where('name', 'LIKE', "%{$search}%")
            ->get();
        $info_book=DB::table('info_books')
            ->where('')
            ->get();
        return view('visitorpage', compact('book'));
    }
}
