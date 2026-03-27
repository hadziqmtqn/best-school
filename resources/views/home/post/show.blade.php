@use(Carbon\Carbon)
@use(Illuminate\Support\Str)

<x-home.master :title="$title">

    <section class="hero-media" style="background-image: url({{ $application['breadcrumbImg'] }});">
        <div class="container hero-content">
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb breadcrumb-custom mb-0">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">{{ $post->postCategory?->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Artikel</li>
                </ol>
            </nav>
            <h1 class="display-4 fw-bold mb-3">{{ $post->title }}</h1>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <!-- Kolom Kiri: Artikel Utama -->
                <div class="col-lg-8">
                    <a href="{{ route('post.index', ['post-category' => $post->postCategory?->slug]) }}" class="btn btn-primary badge-detail-post mb-3">{{ $post->postCategory?->name }}</a>

                    <h1 class="text-primary mb-4">{{ $post->title }}</h1>

                    <!-- Metadata (Penulis & Tanggal) -->
                    <div class="detail-meta-row">
                        <img src="{{ $post->user?->avatar }}" class="author-avatar me-2" alt="Author">
                        <div>
                            <div class="fw-bold text-dark">{{ $post->user?->name ?? 'N/A' }}</div>
                            <div class="text-muted">Created At: {{ Carbon::parse($post->created_at)->isoFormat('DD MMM Y') }}</div>
                        </div>
                    </div>

                    <hr>

                    <!-- Gambar Utama Artikel -->
                    <img src="{{ $post->thumbnail }}" alt="Thumbnail" class="detail-header-img">

                    <!-- Isi Artikel -->
                    <div class="article-content">{!! $post->content !!}</div>

                    <hr class="my-4">

                    <!-- Bagikan Berita -->
                    <x-component.share-to-social-media/>
                </div>

                <!-- Kolom Kanan: Sidebar -->
                <div class="col-lg-4 ps-lg-4 mt-5 mt-lg-0">

                    <!-- Widget: Tags -->
                    <div class="card card-sidebar p-4 mb-4">
                        <h5 class="fw-bold mb-3">Tag</h5>
                        <div>
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('post.index', ['tag' => $tag]) }}" class="badge-tag">#{{ $tag }}</a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Widget: Berita Terkait -->
                    <div class="card card-sidebar mb-4">
                        <div class="card-header bg-white border-0 pt-4 px-4">
                            <h5 class="fw-bold mb-0">Berita Terkait</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($relatedPosts as $relatedPost)
                                <li class="list-group-item px-4 py-3">
                                    <a href="{{ route('post.show', $relatedPost->slug) }}" class="related-news-link d-flex align-items-center gap-3">
                                        <img src="{{ $relatedPost->thumbnail }}" class="rounded" alt="Thumb" width="60">
                                        <div>
                                            <small class="text-muted d-block">{{ Carbon::parse($relatedPost->created_at)->isoFormat('DD MMM Y') }}</small>
                                            <span class="fw-bold">{{ Str::limit($relatedPost->title, 60) }}</span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-home.master>