<?php

namespace Tests\Feature\Authentication;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_not_login_user_when_email_or_password_mismatched()
    {
        $user = User::factory()->create();

        $this->json('POST', 'api/login', [
            'email' => $user->email,
            'password' => 'password',
        ])->assertUnauthorized();
    }
    

    /** @test */
    public function it_should_login_user()
    {
        $user = User::factory()->create([
            'password' => 'password',
        ]);

        $response = $this->json('POST', 'api/login', [
            'email' => $user->email,
            'password' => 'password',
        ])
        ->assertOk()
        ->assertJsonStructure([
            'data' => ['id', 'name', 'email'],
        ]);
    }
}
