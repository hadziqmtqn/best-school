<?php

namespace Database\Seeders\Posts;

use App\Models\Post;
use App\Traits\UnsplashPhotos;
use Illuminate\Database\Seeder;
use Illuminate\Http\Client\ConnectionException;

class PostSeeder extends Seeder
{
    use UnsplashPhotos;

    /**
     * @throws ConnectionException
     */
    public function run(): void
    {
        // 1. Ambil 20 foto sekaligus (Hanya memakan 1 kuota API!)
        $unsplashPhotos = $this->getUnsplashPhotos(query: 'indonesia-young-students');

        // 2. Buat factory tetapi jangan langsung di-save ke DB (use make)
        $posts = Post::factory(20)->make();

        // 3. Pasangkan foto ke post
        $posts->each(function ($post, $index) use ($unsplashPhotos) {
            // Ambil foto berdasarkan index, jika foto habis gunakan foto pertama (fallback)
            $photo = $unsplashPhotos[$index] ?? $unsplashPhotos->first();

            if ($photo) {
                $post->unsplash_url = $photo['image'];
            }

            $post->save();
        });
    }
}
