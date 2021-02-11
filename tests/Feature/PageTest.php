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

    /** @test */
    public function guest_redirects_to_login()
    {
        $url = env('APP_URL');
        $this->get('/books')->assertStatus(302)->assertSee("Redirecting to ${url}/login");
    }
}
