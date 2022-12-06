<?php

namespace Tests\Feature;

use App\Models\Album;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AlbumModelTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function albumModel()
    {
        Album::factory()->count(10)->create();

        $this->assertDatabaseCount('albuns', 10);
    }
}
