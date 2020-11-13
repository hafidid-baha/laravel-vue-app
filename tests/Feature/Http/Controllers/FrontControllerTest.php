<?php

namespace Tests\Feature\Http\Controllers;

use App\Front;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FrontController
 */
class FrontControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $fronts = factory(Front::class, 3)->create();

        $response = $this->get(route('front.index'));

        $response->assertOk();
        $response->assertViewIs('post.index');
        $response->assertViewHas('posts');
    }
}
