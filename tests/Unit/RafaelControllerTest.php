<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\RafaelController;

class RafaelControllerTest extends TestCase
{
    // Agregamos : void para cumplir con el estándar
    public function test_calcular_area_triangulo(): void
    {
        $controller = new RafaelController();
        $resultado = $controller->calcularAreaTriangulo(10.0, 5.0);
        
        $this->assertEquals("El área del triángulo es: 25", $resultado);
    }
}
