<x-home.master :title="$title">

    <section id="identitas-sekolah" class="py-5 mt-5 pt-5 bg-main-light">
        <div class="container py-lg-5">
            <div class="text-center mb-5">
                <h6 class="text-primary fw-bold text-uppercase mb-2 ls-1">Identitas Sekolah</h6>
                <h2 class="fw-bold mb-3">Mengenal Lebih Dekat</h2>
                <p class="text-muted mb-0">Informasi lengkap mengenai profil dan identitas {{ $application['name'] }}.</p>
            </div>

            <div class="row g-4">
                <!-- Kiri: Tabs Identitas Utama -->
                <div class="col-lg-8" data-aos="fade-right">
                    <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">
                        <div class="card-header bg-white p-0 border-bottom">
                            <div class="nav-align-top">
                                <ul class="nav nav-tabs nav-fill nav-tabs-scrollable border-0 px-3 py-3" role="tablist">
                                    @foreach($institutions as $key => $institution)
                                        <li class="nav-item" role="presentation">
                                            <button type="button" class="nav-link fw-bold waves-effect {{ $loop->first ? 'active' : '' }}" role="tab" data-bs-toggle="tab" data-bs-target="#navs-{{ $key }}" aria-controls="navs-{{ $key }}" aria-selected="false" tabindex="-1">
                                                {{ $institution['baseData']['Nama Sekolah'] }}
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content p-0 m-0 border-0">
                                @foreach($institutions as $key => $institution)
                                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="navs-{{ $key }}" role="tabpanel">

                                        <h4 class="mb-3">Data Pokok</h4>

                                        <table class="table table-bordered w-100">
                                            @foreach($institution['baseData'] as $key => $identity)
                                                <tr>
                                                    <th style="width: 35%">{{ $key }}</th>
                                                    <td style="width: 65%">{{ $identity }}</td>
                                                </tr>
                                            @endforeach
                                        </table>

                                        <h4 class="mb-3">Alamat</h4>

                                        <table class="table table-bordered w-100">
                                            @foreach($institution['address'] as $key => $identity)
                                                <tr>
                                                    <th style="width: 35%">{{ $key }}</th>
                                                    <td style="width: 65%">{{ $identity }}</td>
                                                </tr>
                                            @endforeach
                                        </table>

                                        <h4 class="mb-3">Profil</h4>
                                        <div class="alert alert-success" role="alert">
                                            {!! $institution['profile'] !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kanan: Artikel Random & Promosi -->
                <div class="col-lg-4" data-aos="fade-left">
                    <div class="d-flex flex-column h-100 gap-4">
                        <!-- Card Artikel Random (Tanpa Thumbnail) -->
                        <div class="card border-0 shadow-sm rounded-4 flex-grow-1">
                            <div class="card-body p-4">
                                <span class="badge bg-info-soft text-info rounded-pill px-3 py-2 mb-3 fw-bold">Tips & Trik</span>
                                <h5 class="fw-bold mb-3 lh-base">Merancang Strategi Belajar yang Efisien untuk Tes Masuk PTN Sejak Kelas 10</h5>
                                <p class="text-secondary small lh-relaxed mb-4">
                                    Tidak perlu menunggu kelas 12 untuk mulai belajar soal ujian masuk PTN. Membangun pondasi yang kuat sejak dini dengan manajemen waktu, pemetaan jurusan, dan konsistensi harian 30 menit jauh mengatasi metode belajar kilat. Siapkan masa depanmu lebih awal dan rasakan ketenangannya di tingkat akhir!
                                </p>
                                <a href="#" class="text-primary fw-bold text-decoration-none border-bottom border-primary pb-1 d-inline-block">Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i></a>
                            </div>
                        </div>

                        <!-- Card Promosi -->
                        <div class="card bg-primary text-white border-0 shadow-primary rounded-4 overflow-hidden position-relative flex-grow-1">
                            <!-- Background Decor -->
                            <div class="position-absolute end-0 bottom-0 opacity-25" style="transform: translate(20%, 20%); pointer-events: none;">
                                <i class="bi bi-mortarboard-fill" style="font-size: 8rem;"></i>
                            </div>
                            <div class="card-body p-4 position-relative z-1 d-flex flex-column justify-content-center">
                                <h4 class="fw-bold mb-3 mt-1 text-white">Dapatkan Beasiswa Penuh!</h4>
                                <p class="opacity-75 small lh-relaxed mb-4">
                                    Berprestasi di akademik atau memiliki kemampuan ekstrakurikuler luar biasa? Daftar sekarang melalui jalur prestasi dan dapatkan pendidikan bebas biaya hingga lulus!
                                </p>
                                <a href="#" class="btn btn-warning rounded-pill px-4 py-2 text-dark fw-bold w-100">Info Syarat & Daftar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-home.master>