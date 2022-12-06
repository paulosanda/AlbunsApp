<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setup();
        $this->artisan("migrate --seed");
    }
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function createUser(): void
    {
        User::factory()->createOne();
        $this->assertDatabaseCount('users', 2);
    }

    protected function teardown(): void
    {
        //
    }
}
