<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = auth()->user()->books()->orderBy('sort_order')->paginate(10);

        return Inertia::render('Resources/Books', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make([
            'title' => $request->title,
            'author' => $request->author,
            'published_on' => $request->published_on,
        ], [
            'title' => ['required', 'string', 'max:100'],
            'author' => ['required', 'string', 'max:100'],
            'published_on' => ['required', 'date'],
        ])->validateWithBag('createBag');

        $book = Book::create([
            'user_id' => auth()->user()->id,
            'sort_order' => Book::max('sort_order') + 1 ,
            'title' => $request->title,
            'author' => $request->author,
            'published_on' => (new Carbon($request->published_on))->format('Y-m-d'),
        ]);

        return back()->with('flash', ['book' => $book]);
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
        Validator::make([
            'title' => $request->title,
            'author' => $request->author,
            'published_on' => $request->published_on,
        ], [
            'title' => ['required', 'string', 'max:100'],
            'author' => ['required', 'string', 'max:100'],
            'published_on' => ['required', 'date'],
        ])->validateWithBag('updateBag');

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'published_on' => (new Carbon($request->published_on))->format('Y-m-d'),
        ]);

        return back();
    }

    /** 
     * Change sort order of a post with the one above or below it 
     * 
     * @param  \App\Book  $book
     * @param  string  $direction
     * @return \Illuminate\Http\Response
    */
    public function changeSortOrder(Book $book, $direction)
    {
        //ignore request to move max book up
        $lowestBook = Book::where('sort_order', Book::min('sort_order'))->first();
        if($direction == 'up' and $book == $lowestBook) {
            return back();
        }
        
        //ignore request to move last book down
        $highestBook = Book::where('sort_order', Book::max('sort_order'))->first();
        if($direction == 'down' and $book == $highestBook) {
            return back();
        }

        if($direction == 'down') {
            Book::where('sort_order', $book->sort_order + 1)->decrement('sort_order');
            $book->increment('sort_order');
        } else {
            Book::where('sort_order', $book->sort_order - 1)->increment('sort_order');
            $book->decrement('sort_order');
        }

        return back();
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

        return back();
    }
}
