<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function root_redirects_to_books()
    {
        $this->get('/')->assertStatus(302)->assertSee('Redirecting to /books');
    }
}
