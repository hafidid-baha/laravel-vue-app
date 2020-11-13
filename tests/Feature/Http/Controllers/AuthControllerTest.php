<?php

namespace Tests\Feature\Http\Controllers;

use App\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AuthController
 */
class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $auths = factory(Auth::class, 3)->create();

        $response = $this->get(route('auth.index'));

        $response->assertOk();
        $response->assertViewIs('post.index');
        $response->assertViewHas('posts');
    }
}
