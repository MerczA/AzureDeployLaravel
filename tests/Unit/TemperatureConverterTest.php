<?php

namespace Tests\Unit;

use App\Http\Controllers\OperationController;
use PHPUnit\Framework\TestCase;

class TemperatureConverterTest extends TestCase
{
    public function test_celsius_a_fahrenheit(): void
    {
        $controller = new OperationController;

        $resultado = (20 * 9 / 5) + 32;

        $this->assertEquals(68, $resultado);
    }

    public function test_fahrenheit_a_celsius(): void
    {
        $controller = new OperationController;

        $resultado = (68 - 32) * 5 / 9;

        $this->assertEquals(20, $resultado);
    }
}
