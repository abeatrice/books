<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_on = $request->sort_on ? $request->sort_on : 'sort_order';
        $sort_direction = $request->sort_direction ? $request->sort_direction : 'ASC';

        return auth()->user()->books()->orderBy($sort_on, $sort_direction)->paginate(10);
    }

    /**
     * Display single resource
     * 
     * @param  App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return $book;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'author' => 'required|string|max:100',
            'published_on' => 'required|date',
        ]);

        Book::where('sort_order', '>=', '1')->increment('sort_order');
        $book = Book::create([
            'user_id' => auth()->user()->id,
            'sort_order' => 1,
            'title' => $request->title,
            'author' => $request->author,
            'published_on' => (new Carbon($request->published_on))->format('Y-m-d'),
        ]);
        
        return response()->json(['created' => true, 'book' => $book], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'author' => 'required|string|max:100',
            'published_on' => 'required|date',
        ]);

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'published_on' => (new Carbon($request->published_on))->format('Y-m-d'),
        ]);
        
        return response()->json(['updated' => true, 'book' => $book], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        //update sort order for remaining books
        Book::where('sort_order', '>', $book->sort_order)->decrement('sort_order');

        return response()->json(['deleted' => true], 200);
    }
}
