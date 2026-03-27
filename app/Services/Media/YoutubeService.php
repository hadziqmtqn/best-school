<?php

namespace App\Services\Media;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class YoutubeService
{
    public function search(): array
    {
        $query = 'Ekstrakurikuler Madrasah';

        $cacheKey = 'yt_search_' . Str::slug($query);

        return Cache::remember($cacheKey, now()->addHours(24), function () use ($query) {
            $response = Http::get("https://www.googleapis.com/youtube/v3/search", [
                'part'  => 'snippet',
                'q' => $query,
                'maxResults' => 20,
                'type' => 'video',
                'key' => config('services.youtube.key'),
            ]);

            if ($response->failed()) {
                return [];
            }

            $items = $response->json('items') ?? [];

            return collect($items)->map(function ($item) {
                return [
                    'video_id' => $item['id']['videoId'],
                    'title' => $item['snippet']['title'],
                    'description' => $item['snippet']['description'],
                    'thumbnail' => $item['snippet']['thumbnails']['high']['url'] ?? $item['snippet']['thumbnails']['default']['url'],
                    'publish_time' => $item['snippet']['publishTime'] ?? '',
                    'video_url' => "https://www.youtube.com/watch?v=" . $item['id']['videoId'],
                    'source' => 'youtube'
                ];
            })->all();
        });
    }
}
