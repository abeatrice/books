<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function guest_cannot_get_books()
    {
        $url = env('APP_URL');
        $this->get('/books')->assertStatus(302)->assertSee("Redirecting to ${url}/login");
    }

    /** @test */
    public function user_can_create_book()
    {
        //logged in user
        $this->actingAs(User::factory()->create());

        $attributes = [
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'published_on' => $this->faker->date,
        ];

        //when post to books with attributes
        $this->post('/books', $attributes);

        //expect database to have book with posted attributes and can see it on page /books
        $this->assertDatabaseHas('books', $attributes);
        $this->get('books')->assertSee($attributes['title']);
    }

    /** @test */
    public function create_book_requires_attributes()
    {
        //login user
        $this->actingAs(User::factory()->create());
        
        //when attempting to create book with blank attributes
        $request = $this->post('/books', [
            'title' => '',
            'author' => '',
            'published_on' => '',
        ]);

        // expect session errors on required attributes and the database is empty
        $request->assertSessionHasErrors(['title', 'author', 'published_on'], null, 'createBag');
        $this->assertEmpty(Book::all());
    }

    /** @test */
    public function user_can_update_book()
    {
        //login user with 1 book
        $user = User::factory()->has(Book::factory())->create();
        $book = $user->books()->first();
        $this->actingAs($user);

        $attributes = [
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'published_on' => $this->faker->date
        ];

        //when user makes put request to book with new attributes
        $this->put($book->path(), $attributes);

        //expect database to have book with new attributes and can see it on the page /books
        $this->assertDatabaseHas('books', $attributes);
        $this->get('books')->assertSee($attributes['title']);
    }

    /** @test */
    public function update_book_requires_attributes()
    {
        //login user with 1 book
        $user = User::factory()->has(Book::factory())->create();
        $book = $user->books()->first();
        $this->actingAs($user);
        
        //when attempting to update book with blank attributes
        $request = $this->put($book->path(), [
            'title' => '',
            'author' => '',
            'published_on' => '',
        ]);

        // expect session errors on required attributes and database has original attributes
        $request->assertSessionHasErrors(['title', 'author', 'published_on'], null, 'updateBag');
        $this->assertDatabaseHas('books', $book->select(['title','author','published_on'])->first()->toArray());
    }

    /** @test */
    public function user_can_delete_book()
    {
        //login user with a book
        $user = User::factory()->has(Book::factory())->create();
        $book = $user->books()->select(['id','user_id','title','author','published_on'])->first();
        $this->actingAs($user);

        //expect database to have original the book
        $this->assertDatabaseHas('books', $book->toArray());

        //when user makes delete request
        $this->delete($book->path());

        //expect database to be missing the book
        $this->assertDatabaseMissing('books', $book->toArray());
    }

    /** @test */
    public function user_can_change_book_sort_order()
    {
        //create user with 2 books
        $user = User::factory()->create();
        $book1 = Book::create([
            'user_id' => $user->id,
            'sort_order' => 1,
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'published_on' => $this->faker->date,
        ]);
        $book2 = Book::create([
            'user_id' => $user->id,
            'sort_order' => 2,
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'published_on' => $this->faker->date,
        ]);
        $this->actingAs($user);

        //moving book 1 sort order down, expect book1 and book2 sort order to swap
        $this->post($book1->path() . '/sort_order/down');
        $this->assertDatabaseHas('books', [
            'title' => $book1->title,
            'sort_order' => $book1->sort_order + 1,
        ]);
        $this->assertDatabaseHas('books', [
            'title' => $book2->title,
            'sort_order' => $book2->sort_order - 1,
        ]);

        //moving book 1 sort order back up, expect original book sort order
        $this->post($book1->path() . '/sort_order/up');
        $this->assertDatabaseHas('books', [
            'title' => $book1->title,
            'sort_order' => $book1->sort_order,
        ]);
        $this->assertDatabaseHas('books', [
            'title' => $book2->title,
            'sort_order' => $book2->sort_order,
        ]);
    }
}
