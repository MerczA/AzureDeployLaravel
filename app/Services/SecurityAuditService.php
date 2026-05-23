<?php

namespace App\Services;

use InvalidArgumentException;

class SecurityAuditService
{
    /**
     * Analiza un payload de entrada para detectar posibles riesgos de seguridad.
     *
     * @param array<string, mixed> $payload
     * @return array<string, mixed>
     */
    public function analyzePayload(array $payload): array
    {
        // 1. Validar parámetros de entrada (Regra de la práctica)
        if (empty($payload) || !isset($payload['source']) || !isset($payload['data'])) {
            throw new InvalidArgumentException('El payload debe contener "source" y "data".');
        }

        $dataToCheck = is_array($payload['data']) ? json_encode($payload['data']) : (string)$payload['data'];
        $riskScore = 0;
        $flags = [];

        // 2. Procesamiento: Buscar patrones sospechosos (Buenas prácticas de seguridad)
        if (preg_match('/(<script|javascript:|onerror=)/i', $dataToCheck)) {
            $riskScore += 50;
            $flags[] = 'Posible intento de XSS (Cross-Site Scripting)';
        }

        if (preg_match('/(UNION SELECT|SELECT.*FROM|OR 1=1|--)/i', $dataToCheck)) {
            $riskScore += 50;
            $flags[] = 'Posible intento de SQL Injection';
        }

        $status = 'safe';
        if ($riskScore >= 100) {
            $status = 'critical';
        } elseif ($riskScore >= 50) {
            $status = 'warning';
        }

        // 3. Retornar parámetro de salida debidamente procesado
        return [
            'source' => htmlspecialchars(strip_tags($payload['source']), ENT_QUOTES, 'UTF-8'),
            'risk_score' => min($riskScore, 100),
            'status' => $status,
            'flags' => $flags,
            'processed_at' => now()->toIso8601String(),
        ];
    }
}