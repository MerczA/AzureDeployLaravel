<?php

namespace Tests\Feature;

use Tests\TestCase;

class ParImparTest extends TestCase
{
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
