@use(Illuminate\Support\Carbon)
@use(Illuminate\Support\Str)

<x-home.master :title="$title">

    <section class="news-list-header">
        <div class="container text-center">
            <h6 class="text-uppercase fw-bold ls-2 opacity-0-9 mb-2">News & Updates</h6>
            <h1 class="fw-bold mb-3">Daftar Berita & Informasi</h1>
            <p class="lead opacity-75 mb-0 text-white">Temukan berita terbaru seputar kegiatan, prestasi, dan pengumuman sekolah</p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-5 bg-main-light">
        <div class="container">

            <!-- Filter Section -->
            <div class="filter-section">
                <form id="filterForm" action="{{ route('post.index') }}" method="get">
                    <div class="row g-3 align-items-end">
                        <div class="col-lg-4">
                            <label class="form-label fw-bold text-muted small mb-2" for="categoryFilter">
                                <i class="bi bi-tag me-1"></i> Kategori Berita
                            </label>
                            <select class="form-select filter-input" id="categoryFilter" name="post-category">
                                <option value="">Semua Kategori</option>
                                @foreach($postCategories as $postCategory)
                                    <option value="{{ $postCategory->slug }}" @selected(request('post-category') == $postCategory->slug)>{{ $postCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-5">
                            <label class="form-label fw-bold text-muted small mb-2" for="searchInput">
                                <i class="bi bi-search me-1"></i> Cari Berita
                            </label>
                            <input type="search" class="form-control filter-input" name="search" id="searchInput" placeholder="Masukkan judul berita..." value="{{ request('search') }}">
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-search flex-grow-1">
                                    <i class="bi bi-search me-1"></i> Cari
                                </button>
                                <a href="{{ url()->current() }}" class="btn btn-reset" id="resetBtn">
                                    <i class="bi bi-arrow-clockwise"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Results Info -->
            <div class="results-info">
                Menampilkan <strong id="resultCount">{{ $posts->count() }}</strong> berita dari <strong id="totalCount">{{ $posts->total() }}</strong> total berita
            </div>

            <!-- News Grid -->
            <div class="row g-4" id="newsGrid">
                <!-- News items will be inserted here by JavaScript -->
                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="news-card h-100 d-flex flex-column">
                            <span class="category-badge" data-bs-toggle="tooltip" title="{{ $post->postCategory?->name }}">{{ Str::limit($post->postCategory?->name, 10) }}</span>
                            <img src="{{ $post->thumbnail }}" class="news-img" alt="Thumbnail">
                            <div class="card-body p-4 d-flex flex-column">
                                <div class="news-date mb-2">{{ Carbon::parse($post->created_at)->isoFormat('DD MMM Y') }}</div>
                                <h5 class="card-title fw-bold mb-3">{{ Str::limit($post->title, 50) }}</h5>
                                <p class="card-text text-muted flex-grow-1">{{ strip_tags(Str::limit($post->content)) }}</p>
                                <a href="{{ route('post.show', $post->slug) }}" class="btn btn-sm btn-outline-primary mt-3 align-self-start rounded-pill">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Empty State (hidden by default) -->
            @if($posts->count() == 0)
                <div class="empty-state" id="emptyState">
                    <i class="bi bi-inbox"></i>
                    <h4>Tidak Ada Berita Ditemukan</h4>
                    <p>Coba ubah filter atau kata kunci pencarian Anda</p>
                </div>
            @endif

            <!-- Pagination -->
            {{ $posts->links() }}
        </div>
    </section>
</x-home.master>