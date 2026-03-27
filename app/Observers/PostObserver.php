<?php

namespace App\Observers;

use App\Models\Post;
use App\Traits\UnsplashPhotos;
use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class PostObserver
{
    use UnsplashPhotos;

    public function creating(Post $post): void
    {
        if (!App::runningInConsole()) {
            // 1. Cek apakah thumbnail kosong (baik media maupun URL)
            if (!$post->hasMedia('thumbnail') && empty($post->unsplash_url)) {

                // 2. Ambil keyword dari kategori, fallback ke 'school' jika null
                $query = $post->postCategory?->name ?? 'school life';

                try {
                    $photos = $this->getUnsplashPhotos(query: $query, perPage: 1);

                    if ($photos->isNotEmpty()) {
                        // 3. Cukup set atributnya saja.
                        // Tidak perlu update() atau save() karena ini event 'creating'
                        $post->unsplash_url = $photos->first()['image'];
                    }
                } catch (Exception $e) {
                    // Log jika API Limit atau koneksi gagal agar tidak merusak flow aplikasi
                    Log::warning("Unsplash API Error: " . $e->getMessage());
                }
            }
        }
    }
}
