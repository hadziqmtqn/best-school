<?php

namespace App\Traits;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

trait UnsplashPhotos
{
    /**
     * @throws ConnectionException
     */
    protected function getUnsplashPhotos(string $query, ?string $orientation = 'landscape', ?int $perPage = 20): Collection
    {
        $response = Http::get("https://api.unsplash.com/search/photos", [
            'query' => $query,
            'client_id' => config('services.unsplash.access_key'),
            'per_page' => $perPage,
            'orientation' => $orientation
        ]);

        if ($response->successful()) {
            $data = $response->json()['results'] ?? [];

            return collect($data)->map(function ($item) {
                return [
                    'name' => $item['alt_description'] ?? 'School Photo',
                    'description' => $item['description'] ?? 'Foto kegiatan sekolah',
                    'image' => $item['urls']['regular'],
                    'photographer' => [
                        'name' => $item['user']['name'],
                        'link' => $item['user']['links']['html'] ?? null
                    ],
                    'source' => 'unsplash'
                ];
            });
        }

        return collect(); // Kembalikan koleksi kosong jika gagal
    }
}