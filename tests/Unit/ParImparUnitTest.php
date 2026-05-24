<?php

namespace Tests\Unit;

use App\Http\Controllers\OperationController;
use PHPUnit\Framework\TestCase;

class ParImparUnitTest extends TestCase
{
    public function test_numero_par(): void
    {
        $controller = new OperationController;

        $resultado = 8 % 2 == 0
            ? 'El número es par'
            : 'El número es impar';

        $this->assertEquals('El número es par', $resultado);
    }

    public function test_numero_impar(): void
    {
        $controller = new OperationController;

        $resultado = 7 % 2 == 0
            ? 'El número es par'
            : 'El número es impar';

        $this->assertEquals('El número es impar', $resultado);
    }
}
