@use(Illuminate\Support\Carbon)
@use(Illuminate\Support\Str)

<section id="pengumuman bg-main-light" class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h6 class="text-uppercase text-muted fw-bold ls-2 mb-2">Berita</h6>
            <h2 class="section-title mb-0">Berita & Info Sekolah</h2>
            <p class="text-muted mt-3">Dapatkan informasi terbaru seputar kegiatan dan prestasi sekolah.</p>
        </div>

        <div class="row g-4">
            @foreach($posts as $post)
                <div class="col-lg-4 col-md-6">
                    <div class="news-card">
                        <div class="news-img-wrapper">
                            <span class="category-badge" title="{{ $post->postCategory?->name }}">{{ Str::limit($post->postCategory?->name, 10) }}</span>
                            <img src="{{ $post->thumbnail }}" class="news-img" alt="News 2">
                        </div>
                        <div class="card-body">
                            <div class="news-date">
                                <i class="bi bi-calendar3"></i> {{ Carbon::parse($post->created_at)->isoFormat('DD MMM Y') }}
                            </div>
                            <a href="{{ route('post.show', $post->slug) }}" style="text-decoration: none">
                                <h5 class="card-title fw-bold mb-3">{{ Str::limit($post->title, 80) }}</h5>
                            </a>
                            <p class="card-text text-muted">{{ strip_tags(Str::limit($post->content)) }}</p>
                            <a href="{{ route('post.show', $post->slug) }}" class="btn btn-sm btn-outline-primary mt-3 rounded-pill">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<div class="modal fade" id="newsModal1" tabindex="-1" aria-labelledby="newsModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4">
            <div class="modal-header border-0 pb-0">
                <span class="badge bg-primary">Pengumuman</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4">
                <img src="https://picsum.photos/seed/class/800/400" class="img-fluid rounded-3 mb-3 w-100 modal-detail-img" alt="Detail Image">
                <h3 class="fw-bold mb-2 text-primary">Pembukaan Gelombang 1 PPDB Tahun Ajaran 2024/2025</h3>
                <div class="d-flex align-items-center text-muted small mb-3">
                    <span class="me-3"><i class="bi bi-calendar"></i> 15 Mei 2024</span>
                    <span class="me-3"><i class="bi bi-person"></i> Admin</span>
                    <span><i class="bi bi-tag"></i> PPDB, Sekolah</span>
                </div>
                <hr>
                <p class="text-secondary mb-3">
                    Kami dengan bangga mengumumkan bahwa pendaftaran peserta didik baru untuk tahun ajaran 2024/2025 telah resmi dibuka. Pendaftaran ini dibuka untuk calon siswa yang ingin melanjutkan pendidikan di jenjang SMA.
                </p>
                <p class="text-secondary mb-3">
                    Calon siswa diwajibkan untuk mengisi formulir pendaftaran online melalui portal ini sebelum batas waktu yang ditentukan. Pastikan semua dokumen yang diperlukan sudah disiapkan, seperti Ijazah, Kartu Keluarga, dan Akta Kelahiran.
                </p>
                <p class="text-secondary">
                    Jangan lewatkan kesempatan ini untuk bergabung menjadi bagian dari keluarga besar SMA Unggulan Nusantara.
                </p>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
