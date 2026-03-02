@use(Carbon\Carbon)

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
                        <h5 class="fw-bold mb-3">Tag Populer</h5>
                        <div>
                            <a href="#" class="badge-tag">#prestasi</a>
                            <a href="#" class="badge-tag">#juara</a>
                            <a href="#" class="badge-tag">#osn</a>
                            <a href="#" class="badge-tag">#matematika</a>
                            <a href="#" class="badge-tag">#siswa</a>
                        </div>
                    </div>

                    <!-- Widget: Berita Terkait -->
                    <div class="card card-sidebar mb-4">
                        <div class="card-header bg-white border-0 pt-4 px-4">
                            <h5 class="fw-bold mb-0">Berita Terkait</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-4 py-3">
                                <a href="berita-3.html" class="related-news-link d-flex align-items-center gap-3">
                                    <img src="https://picsum.photos/seed/library/60/60" class="rounded" alt="Thumb"
                                        width="60">
                                    <div>
                                        <small class="text-muted d-block" style="font-size: 0.75rem;">10 Mei
                                            2024</small>
                                        <span class="fw-bold" style="font-size: 0.9rem;">Peresmian Gedung Perpustakaan
                                            Baru</span>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item px-4 py-3">
                                <a href="berita-2.html" class="related-news-link d-flex align-items-center gap-3">
                                    <img src="https://picsum.photos/seed/class/60/60" class="rounded" alt="Thumb"
                                        width="60">
                                    <div>
                                        <small class="text-muted d-block" style="font-size: 0.75rem;">15 Mei
                                            2024</small>
                                        <span class="fw-bold" style="font-size: 0.9rem;">Pembukaan Gelombang 1
                                            PPDB</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Widget: CTA -->
                    <div class="card bg-light border-0 p-4 text-center rounded-4">
                        <i class="bi bi-pencil-square display-4 text-primary mb-3 d-block"></i>
                        <h5 class="fw-bold mb-2">Ingin Mendaftar?</h5>
                        <p class="small text-muted mb-3">Kuota terbatas! Segera daftarkan diri Anda sekarang juga.</p>
                        <a href="registrasi.html" class="btn btn-primary w-100 rounded-pill">Daftar Sekarang</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-home.master>