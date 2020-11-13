<?php

namespace Tests\Feature\Http\Controllers;

use App\Back;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BackController
 */
class BackControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $backs = factory(Back::class, 3)->create();

        $response = $this->get(route('back.index'));

        $response->assertOk();
        $response->assertViewIs('post.index');
        $response->assertViewHas('posts');
    }
}
