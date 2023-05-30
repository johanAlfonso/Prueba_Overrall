<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AwardTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_is_index_working()
    {
        $this->authenticate_user();
        $response = $this->get(route('award.index'));
        $response->assertStatus(200);
        $response->assertSessionHasNoErrors();
        $response->assertSee('Awards');
    }

    public function test_awards_register_is_working()
    {
        $this->authenticate_user();
        $response = $this->post(route('award.store'), [
            'name' => 'Johan',
            'lastname' => 'Alfonso',
            'address' => 'Bogotá',
            'number' => 3143386592,
            'email' => 'johan@correo.com',
            'award' => 'Art',
        ]);
        $response->assertStatus(302);
        $response->assertRedirect(route('award.index'));
        $response->assertSessionHasNoErrors();
    }

    public function authenticate_user()
    {
        Artisan::call('migrate');
        $user = User::create([
            'name' => 'user1',
            'email' => 'user1@correo.com',
            'password' => 'user123'
        ]);
        $this->actingAs($user);
    }
}
