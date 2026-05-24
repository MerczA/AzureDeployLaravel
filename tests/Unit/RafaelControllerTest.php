<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\RafaelController;

class RafaelControllerTest extends TestCase
{
    public function test_calcular_area_triangulo()
    {
        $controller = new RafaelController();
        $resultado = $controller->calcularAreaTriangulo(10, 5);
        
        $this->assertEquals("El área del triángulo es: 25", $resultado);
    }
}
