<?php

namespace Tests\Unit;

use App\Services\PalindromeService;
use PHPUnit\Framework\TestCase;

class PalindromeServiceTest extends TestCase
{
    private PalindromeService $service;

    protected function setUp(): void
    {
        parent::setUp();

        $this->service = new PalindromeService;
    }

    public function test_palabra_palindroma(): void
    {
        $this->assertTrue($this->service->isPalindrome(''));
    }

    public function test_palabra_no_palindroma(): void
    {
        $this->assertFalse($this->service->isPalindrome('laravel'));
    }

    public function test_frase_palindroma(): void
    {
        $this->assertTrue($this->service->isPalindrome('Anita lava la tina'));
    }

    public function test_texto_con_mayusculas(): void
    {
        $this->assertTrue($this->service->isPalindrome('Radar'));
    }

    public function test_texto_con_espacios(): void
    {
        $this->assertTrue($this->service->isPalindrome('a n i t a l a v a l a t i n a'));
    }

    public function test_texto_con_signos_de_puntuacion(): void
    {
        $this->assertTrue($this->service->isPalindrome('Anita, lava la tina!'));
    }

    public function test_texto_con_acentos(): void
    {
        $this->assertTrue($this->service->isPalindrome('A mamá Roma le aviva el amor a papá y a papá Roma le aviva el amor a mamá'));
    }

    public function test_texto_vacio(): void
    {
        $this->assertFalse($this->service->isPalindrome(''));
    }

    public function test_texto_que_solo_tiene_signos_o_espacios(): void
    {
        $this->assertFalse($this->service->isPalindrome('   ... --- !!!   '));
    }
}
