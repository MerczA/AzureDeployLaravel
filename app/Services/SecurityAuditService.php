<?php

namespace App\Services;

use InvalidArgumentException;

class SecurityAuditService
{
    /**
     * Analiza un payload de entrada para detectar posibles riesgos de seguridad.
     *
     * @param  array<string, mixed>  $payload
     * @return array<string, mixed>
     */
    public function analyzePayload(array $payload): array
    {
        if (! isset($payload['source']) || ! isset($payload['data'])) {
            throw new InvalidArgumentException('El payload debe contener "source" y "data".');
        }

        $source = is_string($payload['source']) ? $payload['source'] : 'Unknown';
        $dataToCheck = is_array($payload['data']) ? (string) json_encode($payload['data']) : (string) $payload['data'];

        $riskScore = 0;
        $flags = [];

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

        $sanitizedSource = htmlspecialchars(strip_tags($source), ENT_QUOTES, 'UTF-8');

        return [
    'source' => $sanitizedSource,
    'risk_score' => $riskScore, // <-- Cámbialo para que devuelva directamente la variable
    'status' => $status,
    'flags' => $flags,
    'processed_at' => date('c'),
];
    }
}
