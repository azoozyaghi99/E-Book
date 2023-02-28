<?php

namespace App\Http\Controllers;


use App\Models\Book;
use App\Models\Info_Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class resoursecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $books=Book::with('info_Books')
    ->with('info_Books.categories')
    ->with('info_Books.authers')
    ->with('info_Books.place_of_publications')
    ->get();
    dd($books->toArray());
    return view('projectfollder.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=DB::table('categories')->select('name');
        $auther=DB::table('authers')->select('name');
        $place_of_publication=DB::table('place_of_publications')->select('name');


        return view('books.insert')->with('category',$category)->with('auther',$auther)->with('place_of_publication',$place_of_publication);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request['name'];
        $issue_Number= $request['issue_Number'];
        $release_Date= $request['release_Date'] ;
        $img_book= $request['img_book'];
        $category=$request['category'];
        $auther=$request['auther'];
        $place_of_publication=$request['place_of_publication'];
        $q=DB::table('books')->select('name,issue_number');
        if($q->name != $name || $q->issue_number != $issue_Number){
        $book = new Book();
        $info_book=new Info_Book();
        $book->name=$name;
        $book->issue_Number= $issue_Number ;
        $book->release_Date= $release_Date ;
        $book->img_book= $img_book;
        $info_book->category_id->name= $category;
        $info_book->auther_id->name =$auther ;
        $info_book->place_of_publication_id->name=$place_of_publication;
        $book->save();
        $info_book->save();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $book=Book::where('id','=',$id)->first();
    return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request['name'];
        $issue_Number= $request['issue_Number'];
        $release_Date= $request['release_Date'] ;
        $img_book= $request['img_book'];
        $category=$request['category'];
        $auther=$request['auther'];
        $place_of_publication=$request['place_of_publication'];
        $book=Book::where('id','=',$id)->first();
        $info_book=Info_Book::where('book_id','=',$id)->first();
        $book->name=$name;
        $book->issue_Number= $issue_Number ;
        $book->release_Date= $release_Date ;
        $book->img_book= $img_book;
        $info_book->category_id->name= $category;
        $info_book->auther_id->name =$auther ;
        $info_book->place_of_publication_id->name=$place_of_publication;

        $book->save();
        $info_book->save();
        return redirect()->route('re.update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $book=Book::where('id',$id)->delete();
    $info_book=Info_Book::where('book_id',$id)->delete();
    return redirect()->back();
    }
}
