<?php

namespace App\Services;

class PalindromeService
{
    public function isPalindrome(string $text): bool
    {
        $normalized = mb_strtolower($text);
        $normalized = $this->removeAccents($normalized);
        $normalized = preg_replace('/[^a-z0-9]/', '', $normalized) ?? '';

        if ($normalized === '') {
            return false;
        }

        return $normalized === strrev($normalized);
    }

    private function removeAccents(string $text): string
    {
        $transliterated = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);

        return $transliterated !== false ? $transliterated : $text;
    }
}
