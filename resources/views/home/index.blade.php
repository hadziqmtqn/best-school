<x-home.master :title="$title">

    <!-- Hero Section -->
    <section id="beranda" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="hero-title">{{ $application['motto'] }}</h1>
                    <p class="lead text-muted mb-4">{{ $application['description'] }}</p>
                    <div class="d-flex gap-3 flex-wrap justify-content-lg-start justify-content-center">
                        <a href="/#informasi" class="btn btn-primary btn-lg px-4 py-3 rounded-4 shadow-sm">
                            <i class="bi bi-pencil-square me-2"></i> Lihat Program
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <!-- Hero Image with Floating Badges -->
                    <div class="hero-image-wrapper position-relative">
                        <img src="{{ $application['bannerImg'] }}" alt="Siswa Berprestasi" class="hero-img img-fluid rounded-4">

                        <!-- Floating Badge 1: Total Siswa -->
                        <div class="floating-badge badge-1">
                            <div class="d-flex align-items-center gap-2">
                                <div class="badge-icon">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <div>
                                    <div class="badge-title">1000+ Siswa Aktif</div>
                                    <div class="badge-subtitle">Terdaftar Tahun Ini</div>
                                </div>
                            </div>
                        </div>

                        <!-- Floating Badge 2: Prestasi Nasional -->
                        <div class="floating-badge badge-2">
                            <div class="d-flex align-items-center gap-2">
                                <div class="badge-icon">
                                    <i class="bi bi-trophy-fill"></i>
                                </div>
                                <div>
                                    <div class="badge-title">Prestasi Nasional</div>
                                    <div class="badge-subtitle">23+ Penghargaan</div>
                                </div>
                            </div>
                        </div>

                        <!-- Floating Badge 3: Akreditasi A -->
                        @if($application['accreditation_score'] && $application['accreditation_name'])
                            <div class="floating-badge badge-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="badge-icon">
                                        <i class="bi bi-shield-fill-check"></i>
                                    </div>
                                    <div>
                                        <div class="badge-title">Akreditasi {{ $application['accreditation_score'] }}</div>
                                        <div class="badge-subtitle">{{ $application['accreditation_name'] }}</div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Principal's Greeting Section (V2: High Impact) -->
    <x-sections.principal-greeting/>

    <!-- Agenda Section (V2: Friendly & Modern) -->
    <x-sections.agenda/>

    <!-- Quick Access / Features -->
    <x-sections.feature/>

    <!-- Latest News -->
    <x-sections.latest-news/>

    <!-- FAQ Section -->
    <x-sections.faq/>

    <div class="modal fade" id="newsModal1" tabindex="-1" aria-labelledby="newsModal1Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4">
                <div class="modal-header border-0 pb-0">
                    <span class="badge bg-primary">Pengumuman</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4">
                    <img src="https://picsum.photos/seed/class/800/400" class="img-fluid rounded-3 mb-3 w-100"
                         style="max-height: 300px; object-fit: cover;" alt="Detail Image">
                    <h3 class="fw-bold mb-2 text-primary">Pembukaan Gelombang 1 PPDB Tahun
                        Ajaran 2024/2025</h3>
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

    <!-- Agenda Detail Modal -->
    <div class="modal fade modal-premium" id="agendaDetailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-white rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                            <i class="bi bi-calendar-event text-primary fs-5"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0" id="agendaModalLabel">Detail Agenda Sekolah</h5>
                            <span class="small opacity-75">Informasi lengkap jadwal & kegiatan</span>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-4">
                        <div class="col-lg-7">
                            <div class="agenda-detail-badge-group">
                                <div class="agenda-detail-date">
                                    <div class="day-xl">10</div>
                                    <div class="month-sm">JUN</div>
                                </div>
                                <div>
                                    <div class="mb-2">
                                        <span class="category-pill-v2 academic">Akademik</span>
                                    </div>
                                    <h2 class="fw-bold mb-0 ls-tight lh-sm fs-4">Kelulusan Siswa Kelas 12 TA 2023/2024</h2>
                                </div>
                            </div>

                            <p class="text-secondary mb-0 lh-relaxed">
                                Detail informasi mengenai agenda ini akan ditampilkan di sini. Seluruh siswa dan orang tua diharapkan memperhatikan konten acara serta waktu pelaksanaan yang telah ditentukan. Untuk informasi lebih lanjut, silakan hubungi bagian sekretariat sekolah.
                            </p>
                        </div>
                        <div class="col-lg-5">
                            <div class="info-grid-v2">
                                <div class="info-item-v2">
                                    <div class="info-icon-wrapper">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <div>
                                        <div class="small text-muted fw-bold text-uppercase ls-1">Lokasi</div>
                                        <div class="fw-bold">Sekolah / Lokasi Terkait</div>
                                    </div>
                                </div>
                                <div class="info-item-v2">
                                    <div class="info-icon-wrapper">
                                        <i class="bi bi-clock"></i>
                                    </div>
                                    <div>
                                        <div class="small text-muted fw-bold text-uppercase ls-1">Waktu</div>
                                        <div class="fw-bold">Sesuai Jadwal</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary rounded-pill px-4 fw-bold">
                        <i class="bi bi-calendar-plus me-2"></i>Ingatkan Saya
                    </button>
                </div>
            </div>
        </div>
    </div>

</x-home.master>
