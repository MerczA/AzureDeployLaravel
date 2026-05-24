<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_numero_par(): void
    {
        $response = $this->post('/par-impar', [
            'numero' => 8,
        ]);

        $response->assertStatus(200);
        $response->assertSee('El número es par');
    }

    public function test_numero_impar(): void
    {
        $response = $this->post('/par-impar', [
            'numero' => 7,
        ]);

        $response->assertStatus(200);
        $response->assertSee('El número es impar');
    }
}
