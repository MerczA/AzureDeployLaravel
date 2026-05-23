<?php

namespace App\Services;

use InvalidArgumentException;

class SecurityAuditService
{
    /**
     * 
     *
     * @param array<mixed> $payload
     * @return array<string, mixed>
     */
    public function analyzePayload(array $payload): array
    {
        if (!isset($payload['source']) || !isset($payload['data'])) {
            throw new InvalidArgumentException('El payload debe contener "source" y "data".');
        }

        // Forzamos la conversión estricta a strings para que PHPStan no dude del tipo
        $source = (string) $payload['source'];
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
            'risk_score' => $riskScore > 100 ? 100 : $riskScore,
            'status' => $status,
            'flags' => $flags,
            'processed_at' => date('c'), 
        ];
    }
}