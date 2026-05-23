<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\SecurityAuditService;
use InvalidArgumentException;

class SecurityAuditServiceTest extends TestCase
{
    private SecurityAuditService $service;

    protected function setUp(): void
    {
        parent::setUp();
        // Inicializamos nuestro servicio antes de cada prueba
        $this->service = new SecurityAuditService();
    }

    /** @test */
    public function detecta_un_payload_completamente_seguro(): void
    {
        $payload = [
            'source' => 'FormularioLogin',
            'data' => 'usuario_comun'
        ];

        $result = $this->service->analyzePayload($payload);

        $this->assertEquals('safe', $result['status']);
        $this->assertEquals(0, $result['risk_score']);
    }

    /** @test */
    public function detecta_un_ataque_malicioso_y_eleva_el_riesgo(): void
    {
        $payload = [
            'source' => 'CajaBusqueda',
            'data' => "1' OR '1'='1"
        ];

        $result = $this->service->analyzePayload($payload);

        $this->assertEquals('warning', $result['status']);
        $this->assertContains('Posible intento de SQL Injection', $result['flags']);
    }

    /** @test */
    public function lanza_error_si_faltan_datos_obligatorios(): void
    {
        $this->expectException(InvalidArgumentException::class);
        
        $this->service->analyzePayload([]);
    }
}