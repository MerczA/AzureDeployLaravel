<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase; 
use App\Services\SecurityAuditService;
use InvalidArgumentException;

class SecurityAuditServiceTest extends TestCase
{
    /**
     * @test
     */
    public function detecta_un_payload_completamente_seguro(): void
    {
        $service = new SecurityAuditService();
        $payload = [
            'source' => 'FormularioLogin',
            'data' => 'usuario_comun'
        ];

        $result = $service->analyzePayload($payload);

        $this->assertEquals('safe', $result['status']);
        $this->assertEquals(0, $result['risk_score']);
    }

    /**
     * @test
     */
    public function detecta_un_ataque_malicioso_y_eleva_el_riesgo(): void
    {
        $service = new SecurityAuditService();
        $payload = [
            'source' => 'CajaBusqueda',
            'data' => "1' OR '1'='1"
        ];

        $result = $service->analyzePayload($payload);

        $this->assertEquals('warning', $result['status']);
        $this->assertContains('Posible intento de SQL Injection', $result['flags']);
    }

    /**
     * @test
     */
    public function lanza_error_si_faltan_datos_obligatorios(): void
    {
        $service = new SecurityAuditService();
        $this->expectException(InvalidArgumentException::class);
        
        $service->analyzePayload([]);
    }
}