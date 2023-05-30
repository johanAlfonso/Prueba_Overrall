<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_is_index_working()
    {
        Artisan::call('migrate');
        $response = $this->get(route('register.show'));
        $response->assertStatus(200);
        $response->assertSee('Create Account');
    }

    public function test_is_register_fail_working()
    {
        Artisan::call('migrate');
        $response = $this->post(route('register.register'), [
            'name' => 'Name1',
            'password' => '1',
            'password_confirmation' => '2'
        ]);
        $response->assertStatus(302);
        $response->assertSessionHasErrors();
    }

    public function test_is_register_working()
    {
        Artisan::call('migrate');
        $response = $this->post(route('register.register'), [
            'name' => 'Name1',
            'email' => 'Name@correo.com',
            'password' => 'Name123',
            'password_confirmation' => 'Name123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('users', [
            'name' => 'Name1',
            'email' => 'Name@correo.com'
        ]);
    }
}
