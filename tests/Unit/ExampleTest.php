<?php

namespace Tests\Unit;

use App\Http\Controllers\OperationController;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A good practice test to check if true is true.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    /**
     * A good practice test to check percentage result.
     */
    public function test_percentage_result(): void
    {
        $result = 10 * 10;
        $this->assertEquals(100, $result);
    }

    /**
     * @test
     */
    public function detecta_un_payload_completamente_seguro(): void
    {
        $controller = new OperationController;
        $result = $controller->analyzePayload('FormularioLogin', 'usuario_comun');

        $this->assertEquals('safe', $result['status']);
        $this->assertEquals(0, $result['risk_score']);
    }

    /**
     * @test
     */
    public function detecta_un_ataque_malicioso_y_eleva_el_riesgo(): void
    {
        $controller = new OperationController;
        $result = $controller->analyzePayload('CajaBusqueda', "1' OR '1'='1");

        $this->assertEquals('warning', $result['status']);
        $this->assertContains('Posible intento de SQL Injection', $result['flags']);
    }
}
