<?php

namespace App\Services\Reference;

use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class IndonesiaLocationService
{
    public static function search(
        string $endpoint,
        string $search,
        array $params = [],
        string $labelKey = 'name',
        bool $notifyOnError = true
    ): array {
        try {
            $response = Http::timeout(5)->get($endpoint, array_merge(
                $params,
                ['q' => $search]
            ));

            if (! $response->successful()) {
                return [];
            }

            return collect($response->json())
                ->pluck($labelKey, $labelKey)
                ->toArray();

        } catch (Throwable $e) {
            Log::warning('Location API error', [
                'endpoint' => $endpoint,
                'params'   => $params,
                'message'  => $e->getMessage(),
            ]);

            if ($notifyOnError) {
                Notification::make()
                    ->title('Gagal memuat data lokasi')
                    ->body('Periksa koneksi atau coba beberapa saat lagi.')
                    ->warning()
                    ->send();
            }

            return [];
        }
    }
}
