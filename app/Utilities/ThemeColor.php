<?php

namespace App\Utilities;

class ThemeColor
{
    public static function colors(): array
    {
        return [
            [
                'color' => 'blue',
                'name' => 'Biru',
                'combination' => self::blue()
            ],
            [
                'color' => 'green',
                'name' => 'Hijau',
                'combination' => self::green()
            ],
            [
                'color' => 'light_blue',
                'name' => 'Biru Muda',
                'combination' => self::lightBlue()
            ],
        ];
    }

    private static function blue(): array
    {
        return [
            '--primary-color' => '#0d47a1',
            '--primary-light' => '#1976d2',
            '--accent-color' => '#ffca28',
            '--text-dark' => '#333333',
            '--text-light' => '#666666',
            '--bg-light' => '#f8f9fa',
        ];
    }

    private static function green(): array
    {
        return [
            '--primary-color' => '#1b7d4a',
            '--primary-light' => '#2ca05e',
            '--accent-color' => '#ffca28',
            '--text-dark' => '#333333',
            '--text-light' => '#666666',
            '--bg-light' => '#f8f9fa',
        ];
    }

    private static function lightBlue(): array
    {
        return [
            '--primary-color' => '#0ba6df',
            '--primary-light' => '#2e94B9',
            '--accent-color' => '#ffca28',
            '--text-dark' => '#333333',
            '--text-light' => '#666666',
            '--bg-light' => '#f8f9fa',
        ];
    }

    public static function getCombination(?string $colorKey): array
    {
        // Mencari kombinasi berdasarkan key 'color'
        $theme = collect(self::colors())->firstWhere('color', $colorKey);

        // Jika tidak ketemu, kembalikan default (misal: blue)
        return $theme['combination'] ?? self::blue();
    }
}
