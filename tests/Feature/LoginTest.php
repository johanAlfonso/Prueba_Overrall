<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_is_index_working()
    {
        Artisan::call('migrate');
        $response = $this->get(route('login'));
        $response->assertStatus(200);
        $response->assertSessionHasNoErrors();
        $response->assertSee('Login');
    }

    public function test_is_login_fail_working()
    {
        Artisan::call('migrate');
        User::create([
            'name' => 'user1',
            'email' => 'user1@correo.com',
            'password' => 'user123'
        ]);
        $response = $this->post(route('login.login'), [
            'email' => 'user@correo.com',
            'password' => 'user123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors();
    }

    public function test_is_login_working()
    {
        Artisan::call('migrate');
        User::create([
            'name' => 'user1',
            'email' => 'user1@correo.com',
            'password' => 'user123'
        ]);
        $response = $this->post(route('login.login'), [
            'email' => 'user1@correo.com',
            'password' => 'user123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect(route('home'));
        $response->assertSessionHasNoErrors();
    }

}
