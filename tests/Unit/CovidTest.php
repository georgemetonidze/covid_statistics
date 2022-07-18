<?php

namespace Tests\Unit;


use App\Models\User;
use Laravel\Sanctum\Sanctum;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class CovidTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_country_list_api_test()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->getJson('/api/covid_statistics');
        $response->assertOk();
    }
    public function test_user_signup_api_test()
    {
//        $user = User::factory()->create();

        $response = $this
            ->postJson('/api/signup', [
                'name' => 'mark',
                'email' => 'meta38@gmail.com',
                'password' => '123456',
                'password_confirmation' => '123456']);
        $response
            ->assertStatus(201);
    }

    public function test_action_authentication()
    {
        $response = $this
            ->postJson('/api/login', [
                'email' => 'meta37@gmail.com',
                'password' => '123456',
                ]);
        $response
            ->assertStatus(201);

    }
}
