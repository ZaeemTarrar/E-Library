<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\Language;
use App\Grade;

class FlipbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book  = Book::orderBy('id','desc')->get();
        return view('dashboard.flipbook.index')->with('book',$book);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.flipbook.create')
        ->with('Category',Category::where('active',1)->get())
        ->with('Language',Language::where('active',1)->get())
        ->with('Grade',Grade::where('active',1)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'book'=>'required|mimes:pdf,doc,txt,mp3,mp4',
            'name'=>'required',
            'category'=>'required',
            'language'=>'required',
            'grade'=>'required',
            'recommendation'=>'required',
            'author'=>'required',
        ]);

        $ext =$request->book->getClientOriginalExtension();
        $book = new Book();
        $book->name = $request->name;
        $book->author = $request->author;
        $book->recommendation = $request->recommendation;
        $book->language_id = $request->language;
        $book->category_id = $request->category;
        $book->pages =$request->pages;
        $book->grade_id = $request->grade;
        $book->active = $request->active=='on'?1:0;
        $book->file = $this->uploadfile($request,'book');


        $book->save();
        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return view('dashboard.flipbook.show')->with('book',Book::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.flipbook.edit')
        ->with('book',Book::find($id))
        ->with('Category',Category::where('active',1)->get())
        ->with('Language',Language::where('active',1)->get())
        ->with('Grade',Grade::where('active',1)->get());
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

        $this->validate($request,[
            'book'=>'mimes:pdf,doc,txt,mp3,mp4',
            'name'=>'required',
            'category'=>'required',
            'language'=>'required',
            'grade'=>'required',
            'recommendation'=>'required',
            'author'=>'required',
        ]);


        $book = Book::find($id);
        $book->name = $request->name;
        $book->author = $request->author;
        $book->recommendation = $request->recommendation;
        $book->language_id = $request->language;
        $book->category_id = $request->category;
        $book->pages =$request->pages;
        $book->grade_id = $request->grade;
        $book->file = $this->updatefile($request,$book->file,'book');
        $book->active= $request->active=='on'?1:0;


        $book->save();
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('book.index');
    }
}
