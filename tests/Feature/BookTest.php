<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function user_can_create_book()
    {
        $this->actingAs(User::factory()->create());

        $attributes = [
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'published_on' => $this->faker->date,
        ];

        $this->post('/books', $attributes);
        $this->assertDatabaseHas('books', $attributes);

        $this->get('books')->assertSee($attributes['title']);
    }

    /** @test */
    public function user_can_update_book()
    {
        $this->actingAs(User::factory()->create());

        //TODO attach book to user
        $book = Book::factory()->create();

        $attributes = [
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'published_on' => $this->faker->date
        ];

        $this->put($book->path(), $attributes);
        $this->assertDatabaseHas('books', $attributes);

        // $this->get('books')->assertSee($attributes['title']);
    }

    // /** @test */
    public function user_can_delete_book()
    {
        $this->actingAs(User::factory()->create());
        
        $book = Book::factory()->create();

        $this->assertDatabaseHas('books', $book->toArray());
        $this->delete($book->path());
        $this->assertDatabaseMissing('books', $book->toArray());
    }

    // /** @test */
    public function user_can_change_book_sort_order()
    {
        $this->actingAs(User::factory()->create());
        
        $book1 = Book::factory()->create();
        $book2 = Book::factory()->create();

        $this->post("/books/{$book1->id}/order/up");
        $this->assertDatabaseHas('books', [
            'title' => $book1->title,
            'sort_order' => $book1->sort_order + 1,
        ]);
        $this->assertDatabaseHas('books', [
            'title' => $book2->title,
            'sort_order' => $book2->sort_order - 1,
        ]);

        $this->post("/posts/{$book1->id}/order/down");
        $this->assertDatabaseHas('books', [
            'title' => $book1->title,
            'sort_order' => $book1->sort_order,
        ]);
        $this->assertDatabaseHas('posts', [
            'title' => $book2->title,
            'sort_order' => $book2->sort_order,
        ]);
    }

    // /** @test */
    public function max_sort_order_moved_up_has_no_change()
    {
        $this->actingAs(User::factory()->create());
        
        $book1 = Book::factory()->create();
        $book2 = Book::factory()->create();

        $this->post("/books/{$book2->id}/order/up");
        
        $this->assertDatabaseHas('books', [
            'title' => $book1->title,
            'sort_order' => $book1->sort_order,
        ]);

        $this->assertDatabaseHas('books', [
            'title' => $book2->title,
            'sort_order' => $book2->sort_order,
        ]);
    }

    // /** @test */
    public function min_sort_order_moved_down_has_no_change()
    {
        $this->actingAs(User::factory()->create());
        
        $book1 = Book::factory()->create();
        $book2 = Book::factory()->create();

        $this->post("/books/{$book1->id}/order/down");
        
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
