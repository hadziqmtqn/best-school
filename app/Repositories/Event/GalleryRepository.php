<?php

namespace App\Repositories\Event;

use App\Models\Gallery;
use App\Services\Media\YoutubeService;
use App\Traits\UnsplashPhotos;
use Cache;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Request;

class GalleryRepository
{
    use UnsplashPhotos;

    protected YoutubeService $youtubeService;

    /**
     * @param YoutubeService $youtubeService
     */
    public function __construct(YoutubeService $youtubeService)
    {
        $this->youtubeService = $youtubeService;
    }

    public function photo(): LengthAwarePaginator
    {
        $perPage = 12;
        $currentPage = (int) Request::input('page', 1);

        // 1. Ambil semua data gallery yang punya media
        // Note: Jika data sangat besar, gunakan limit atau filter tertentu
        $galleryModels = Gallery::with(['institution', 'media'])
            ->filterByType('photo')
            ->get();

        // 2. Pecah data per-media (Flat Mapping)
        $flatGalleries = $galleryModels->flatMap(function (Gallery $item) {
            // Ambil semua media dari collection 'images' (Spatie)
            return $item->getMedia('images')->map(function ($media) use ($item) {
                return [
                    'name' => $item->name,
                    'description' => $item->description,
                    'image' => $media->getFullUrl(), // Ambil URL dari Spatie Media
                    'photographer' => [
                        'name' => 'Admin',
                        'link' => null
                    ],
                    'source' => 'internal_assets'
                ];
            });
        });

        // 3. Jika DB ternyata kosong (tidak ada media sama sekali)
        if ($flatGalleries->isEmpty()) {
            //Cache::clear();
            $unsplashData = Cache::remember('unsplash_school_data', 3600, function() {
                return $this->getUnsplashPhotos(query: 'indonesia-young-students', perPage: 48);
            });

            $total = $unsplashData->count();
            $items = $unsplashData->slice(($currentPage - 1) * $perPage, $perPage)->values();
        } else {
            // Jika ada data DB, gunakan hasil flatMap tadi
            $total = $flatGalleries->count();
            $items = $flatGalleries->slice(($currentPage - 1) * $perPage, $perPage)->values();
        }

        // 4. Kembalikan Paginator Tunggal
        return new LengthAwarePaginator(
            $items,
            $total,
            $perPage,
            $currentPage,
            [
                'path' => Request::url(),
                'query' => Request::query()
            ]
        );
    }

    public function video(Request $request): LengthAwarePaginator
    {
        $perPage = 6;
        $currentPage = (int) $request->input('page', 1);

        // 1. Cek data di Database Internal terlebih dahulu
        $galleryModels = Gallery::with(['institution', 'media'])
            ->filterByType('video')
            ->get();

        if ($galleryModels->isNotEmpty()) {
            // Jika ADA data di DB, gunakan data internal
            $allVideos = $galleryModels->map(function (Gallery $item) {
                return [
                    'video_id' => $item->youtube_id,
                    'title' => $item->name,
                    'description' => $item->description,
                    'thumbnail' => $item->thumbnail,
                    'publish_time' => $item->created_at->format('Y-m-d H:i:s'),
                    'video_url' => "https://www.youtube.com/watch?v=" . $item->youtube_id,
                    'source' => 'internal_assets'
                ];
            });
        } else {
            // Jika DB KOSONG, baru panggil YouTube Service
            $allVideos = collect($this->youtubeService->search());
        }

        // 2. Eksekusi Paginasi Manual dari Koleksi yang terpilih
        $total = $allVideos->count();
        $currentItems = $allVideos->slice(($currentPage - 1) * $perPage, $perPage)->values();

        return new LengthAwarePaginator(
            $currentItems,
            $total,
            $perPage,
            $currentPage,
            [
                'path'  => $request->url(),
                'query' => $request->query(),
            ]
        );
    }
}