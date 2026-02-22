<x-home.master :title="$title">

    <!-- Hero Section -->
    <section id="beranda" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <span class="hero-badge">
                        <span class="registration-status">
                            <span class="status-dot status-dot-active"></span>
                            <span class="status-text">Pendaftaran TA. 2025/2026 <strong>dibuka</strong></span>
                        </span>
                    </span>
                    <h1 class="hero-title">Wujudkan Masa Depan Gemilang Bersama Kami</h1>
                    <p class="lead text-muted mb-4">
                        Raih prestasi akademik terbaik dan kembangkan potensi diri melalui sistem pembelajaran modern yang inovatif dan berkualitas.
                    </p>
                    <div class="d-flex gap-3 flex-wrap justify-content-lg-start justify-content-center">
                        <a href="#" class="btn btn-primary btn-lg px-4 py-3 rounded-4 shadow-sm">
                            <i class="bi bi-pencil-square me-2"></i> Daftar Sekarang
                        </a>
                        <a href="#informasi" class="btn btn-outline-primary btn-lg px-4 py-3 rounded-4">
                            <i class="bi bi-info-circle me-2"></i> Lihat Program
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <!-- Hero Image with Floating Badges -->
                    <div class="hero-image-wrapper position-relative">
                        <img src="{{ 'https://hadziqmtqn.github.io/new-bs-theme/assets/hero-1.png' }}" alt="Siswa Berprestasi" class="hero-img img-fluid rounded-4">

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
                        <div class="floating-badge badge-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="badge-icon">
                                    <i class="bi bi-shield-fill-check"></i>
                                </div>
                                <div>
                                    <div class="badge-title">Akreditasi A</div>
                                    <div class="badge-subtitle">Terakreditasi Unggul</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Principal's Greeting Section (V2: High Impact) -->
    <section class="sambutan-v2-section py-5">
        <div class="container py-lg-5">
            <div class="row align-items-center g-5">
                <!-- Left: Artistic Image Frame -->
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="principal-v2-frame">
                        <div class="frame-decoration-1"></div>
                        <div class="frame-decoration-2"></div>
                        <div class="image-inner-wrapper">
                            <img src="https://picsum.photos/seed/principal-v2/600/750" alt="Kepala Sekolah"
                                 class="img-fluid">
                            <div class="principal-label-v2">
                                <span class="badge bg-primary rounded-pill px-3 py-2 mb-2">Pilar Pendidikan</span>
                                <h5 class="fw-bold text-white mb-0">Ahmad Hidayat Ali, M.Pd</h5>
                                <p class="text-white-50 small mb-0">Kepala Sekolah</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Middle: Message Area -->
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="sambutan-v2-content position-relative">
                        <div class="quote-icon-v2">
                            <i class="bi bi-quote"></i>
                        </div>
                        <h6 class="text-primary fw-bold text-uppercase mb-3 ls-2">Pesan Kepemimpinan</h6>
                        <h2 class="display-6 fw-bold mb-4">Membentuk Karakter & <span class="text-primary">Cetak Juara</span></h2>

                        <div class="message-v2-text pe-lg-5">
                            <p class="lead-serif-v2 mb-4">
                                "Selamat datang di lingkungan belajar yang dinamis. Kami tidak hanya mentransfer pengetahuan, tetapi juga menumbuhkan integritas dan kreativitas di setiap langkah siswa kami."
                            </p>
                            <p class="text-muted mb-5">
                                Di SMA Unggulan Nusantara, setiap potensi dikembangkan melalui pendekatan personal yang inovatif. Kami percaya bahwa kolaborasi antara sekolah, siswa, dan orang tua adalah kunci keberhasilan pendidikan masa depan yang gemilang.
                            </p>
                        </div>

                        <!-- Stats Integration (Horizontal Strip for V2) -->
                        <div class="stats-v2-row d-flex flex-wrap gap-4 mt-5">
                            <div class="stat-v2-box">
                                <div class="stat-v2-val text-primary">75+</div>
                                <div class="stat-v2-lbl">Pendidik Berlisensi</div>
                            </div>
                            <div class="stat-v2-box separator-v2"></div>
                            <div class="stat-v2-box">
                                <div class="stat-v2-val text-primary">1.2k</div>
                                <div class="stat-v2-lbl">Siswa Berprestasi</div>
                            </div>
                            <div class="stat-v2-box separator-v2"></div>
                            <div class="stat-v2-box">
                                <div class="stat-v2-val text-primary">45</div>
                                <div class="stat-v2-lbl">Rombel Modern</div>
                            </div>
                        </div>

                        <div class="mt-5">
                            <a href="#" class="btn btn-primary btn-lg rounded-pill px-5 shadow-primary-sm">
                                Selami Visi Kami <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Agenda Section (V2: Friendly & Modern) -->
    <section id="agenda" class="py-5 bg-white">
        <div class="container py-lg-5">
            <div class="row align-items-end mb-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <h6 class="text-primary fw-bold text-uppercase mb-2 ls-1">Timeline Kami</h6>
                    <h2 class="fw-bold mb-3">Agenda Terdekat</h2>
                    <p class="text-muted mb-0 pe-lg-5">Ikuti terus perkembangan kegiatan dan jadwal penting sekolah agar
                        tidak ketinggalan momen berharga.</p>
                </div>
                <div class="col-lg-6 text-lg-end mt-4 mt-lg-0" data-aos="fade-left">
                    <a href="#" class="btn btn-outline-primary rounded-pill px-4 btn-lg">
                        Lihat Semua Jadwal <i class="bi bi-calendar3 ms-2"></i>
                    </a>
                </div>
            </div>

            <div class="row g-4">
                <!-- Agenda item 1 -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="agenda-v2-card">
                        <div class="agenda-v2-header">
                            <div class="date-badge-v2">
                                <span class="day">10</span>
                                <span class="month">JUN</span>
                            </div>
                            <span class="category-pill-v2 academic">Akademik</span>
                        </div>
                        <div class="agenda-v2-body">
                            <h5 class="fw-bold mb-3">Kelulusan Siswa Kelas 12 TA 2023/2024</h5>
                            <p class="text-muted small mb-0">Rapat pleno dan pengumuman hasil kelulusan siswa tingkat akhir melalui portal resmi.</p>
                        </div>
                        <div class="agenda-v2-footer d-flex justify-content-between align-items-center">
                            <div>
                                <i class="bi bi-geo-alt me-2 text-primary"></i>Aula Utama Sekolah
                            </div>
                            <button class="btn btn-detail-v2 btn-sm" style="width: 35px; height: 35px; font-size: 0.9rem;" data-bs-toggle="modal" data-bs-target="#agendaDetailModal">
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Agenda item 2 -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="agenda-v2-card">
                        <div class="agenda-v2-header">
                            <div class="date-badge-v2">
                                <span class="day">11</span>
                                <span class="month">MEI</span>
                            </div>
                            <span class="category-pill-v2 event">Kegiatan</span>
                        </div>
                        <div class="agenda-v2-body">
                            <h5 class="fw-bold mb-3">Rapat Orang Tua & Komite Sekolah</h5>
                            <p class="text-muted small mb-0">Koordinasi persiapan program akhir tahun dan diskusi perkembangan fasilitas belajar.</p>
                        </div>
                        <div class="agenda-v2-footer d-flex justify-content-between align-items-center">
                            <div>
                                <i class="bi bi-geo-alt me-2 text-primary"></i>Ruang Multimedia
                            </div>
                            <button class="btn btn-detail-v2 btn-sm" style="width: 35px; height: 35px; font-size: 0.9rem;" data-bs-toggle="modal" data-bs-target="#agendaDetailModal">
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Agenda item 3 -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="agenda-v2-card">
                        <div class="agenda-v2-header">
                            <div class="date-badge-v2">
                                <span class="day">19</span>
                                <span class="month">JUL</span>
                            </div>
                            <span class="category-pill-v2 holiday">Libur</span>
                        </div>
                        <div class="agenda-v2-body">
                            <h5 class="fw-bold mb-3">Libur Umum (Tahun Baru Islam 1445 H)</h5>
                            <p class="text-muted small mb-0">Pemberitahuan hari libur nasional sesuai ketetapan pemerintah bagi seluruh civitas.</p>
                        </div>
                        <div class="agenda-v2-footer d-flex justify-content-between align-items-center">
                            <div>
                                <i class="bi bi-geo-alt me-2 text-primary"></i>Seluruh Unit
                            </div>
                            <button class="btn btn-detail-v2 btn-sm" style="width: 35px; height: 35px; font-size: 0.9rem;" data-bs-toggle="modal" data-bs-target="#agendaDetailModal">
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Access / Features -->
    <section id="informasi" class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h6 class="text-uppercase text-muted fw-bold ls-1 mb-2" style="letter-spacing: 2px;">Services</h6>
                <h2 class="section-title mb-0" style="margin-bottom: 0;">Layanan & Informasi PPDB</h2>
                <p class="text-muted mt-3">Langkah mudah memulai pendaftaran siswa baru.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="quick-access-card">
                        <div class="icon-box">
                            <i class="bi bi-file-earmark-person"></i>
                        </div>
                        <h5>Isi Formulir</h5>
                        <p class="text-muted small">Lengkapi data diri dan berkas pendaftaran secara online.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="quick-access-card">
                        <div class="icon-box">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <h5>Cek Kuota</h5>
                        <p class="text-muted small">Lihat ketersediaan daya tampung per jurusan dan zonasi.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="quick-access-card">
                        <div class="icon-box">
                            <i class="bi bi-signpost-split"></i>
                        </div>
                        <h5>Jalur Masuk</h5>
                        <p class="text-muted small">Informasi jalur prestasi, zonasi, dan afirmasi.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="quick-access-card">
                        <div class="icon-box">
                            <i class="bi bi-megaphone"></i>
                        </div>
                        <h5>Hasil Seleksi</h5>
                        <p class="text-muted small">Cek status kelulusan dan pengumuman final.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News -->
    <section id="pengumuman" class="py-5" style="background-color: var(--bg-light);">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h6 class="text-uppercase text-muted fw-bold ls-1 mb-2" style="letter-spacing: 2px;">Berita</h6>
                <h2 class="section-title mb-0" style="margin-bottom: 0;">Berita & Info Sekolah</h2>
                <p class="text-muted mt-3">Dapatkan informasi terbaru seputar kegiatan dan prestasi sekolah.</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="news-card">
                        <div class="news-img-wrapper">
                            <span class="category-badge">Pengumuman</span>
                            <img src="https://picsum.photos/seed/class/400/250" class="news-img" alt="News 1">
                        </div>
                        <div class="card-body">
                            <div class="news-date"><i class="bi bi-calendar3"></i> 15 Mei 2024</div>
                            <h5 class="card-title fw-bold mb-3">Pembukaan Gelombang 1 PPDB Tahun Ajaran 2024/2025</h5>
                            <p class="card-text text-muted">Panitia PPDB resmi membuka pendaftaran gelombang pertama mulai tanggal 20 Mei. Segera siapkan berkas.</p>
                            <button type="button" class="btn btn-sm btn-outline-primary mt-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#newsModal1">Baca Selengkapnya</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="news-card">
                        <div class="news-img-wrapper">
                            <span class="category-badge">Prestasi</span>
                            <img src="https://picsum.photos/seed/award/400/250" class="news-img" alt="News 2">
                        </div>
                        <div class="card-body">
                            <div class="news-date"><i class="bi bi-calendar3"></i> 12 Mei 2024</div>
                            <h5 class="card-title fw-bold mb-3">Siswa Kami Raih Medali Emas Olimpiade Sains</h5>
                            <p class="card-text text-muted">Selamat kepada tim Olimpiade Matematika yang berhasil membawa pulang medali emas tingkat nasional.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary mt-3 rounded-pill">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="news-card">
                        <div class="news-img-wrapper">
                            <span class="category-badge">Fasilitas</span>
                            <img src="https://picsum.photos/seed/library/400/250" class="news-img" alt="News 3">
                        </div>
                        <div class="card-body">
                            <div class="news-date"><i class="bi bi-calendar3"></i> 10 Mei 2024</div>
                            <h5 class="card-title fw-bold mb-3">Peresmian Gedung Perpustakaan Baru Berbasis Digital</h5>
                            <p class="card-text text-muted">Fasilitas pembelajaran kini semakin lengkap dengan hadirnya perpustakaan digital modern.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary mt-3 rounded-pill">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="bantuan" class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h6 class="text-uppercase text-muted fw-bold ls-1 mb-2" style="letter-spacing: 2px;">Help Center</h6>
                <h2 class="section-title mb-0" style="margin-bottom: 0;">Pertanyaan Sering Diajukan (FAQ)</h2>
                <p class="text-muted mt-3">Temukan jawaban dari pertanyaan umum seputar pendaftaran.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                            <h2 class="accordion-header">
                                <button class="accordion-button fw-bold rounded" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true" style="color: var(--primary-color);">
                                    Apa saja syarat pendaftaran siswa baru?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Persyaratan umum meliputi: Ijazah/SKL/SKHUN asli, Kartu Keluarga, Akta Kelahiran, Pas Foto terbaru, dan sertifikat prestasi (jika jalur prestasi).
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold rounded" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" style="color: var(--primary-color);">
                                    Bagaimana sistem zonasi bekerja?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Sistem zonasi didasarkan pada domisili peserta didik. Prioritas diberikan kepada
                                    siswa yang rumahnya berjarak terdekat dengan sekolah sesuai peta zonasi yang
                                    ditentukan Dinas Pendidikan.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold rounded" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" style="color: var(--primary-color);">
                                    Apakah ada biaya pendaftaran?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Tidak, pendaftaran PPDB ini sepenuhnya gratis. Biaya hanya dikenakan setelah dinyatakan lulus berupa sumbangan pembangunan pendidikan (SPP) bulanan.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination (Design Only) -->
                    <div class="pagination-custom mt-4">
                        <a href="#" class="page-link-custom disabled" aria-disabled="true">
                            <i class="bi bi-chevron-left"></i>
                        </a>
                        <a href="#" class="page-link-custom active">1</a>
                        <a href="#" class="page-link-custom">2</a>
                        <a href="#" class="page-link-custom">3</a>
                        <a href="#" class="page-link-custom">
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </div>
                </div>
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
                    <img src="https://picsum.photos/seed/class/800/400" class="img-fluid rounded-3 mb-3 w-100"
                         style="max-height: 300px; object-fit: cover;" alt="Detail Image">
                    <h3 class="fw-bold mb-2" style="color: var(--primary-color);">Pembukaan Gelombang 1 PPDB Tahun
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
