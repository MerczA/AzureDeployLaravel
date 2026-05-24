<?php

namespace Tests\Unit;

use App\Http\Controllers\OperationController;
use PHPUnit\Framework\TestCase;

class ValidadorLuhnTest extends TestCase
{
    private OperationController $controller;

    protected function setUp(): void
    {
        parent::setUp();
        $this->controller = new OperationController();
    }

    public function test_tarjeta_visa_valida(): void
    {
        $this->assertTrue($this->controller->validarLuhn('4539148803436467'));
    }

    public function test_tarjeta_mastercard_valida(): void
    {
        $this->assertTrue($this->controller->validarLuhn('5500005555555559'));
    }

    public function test_tarjeta_con_espacios_valida(): void
    {
        $this->assertTrue($this->controller->validarLuhn('4539 1488 0343 6467'));
    }

    public function test_tarjeta_invalida_retorna_false(): void
    {
        $this->assertFalse($this->controller->validarLuhn('1234567890123456'));
    }

    public function test_numero_con_letras_es_invalido(): void
    {
        $this->assertFalse($this->controller->validarLuhn('4539abcd0343'));
    }

    public function test_numero_muy_corto_es_invalido(): void
    {
        $this->assertFalse($this->controller->validarLuhn('123456'));
    }
}