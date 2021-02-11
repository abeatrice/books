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
        return Inertia::render('Resources/Books', [
            'books' => auth()->user()->books()->paginate(10)
        ]);
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return back();
    }
}
