<section class="sambutan-v2-section py-5">
    <div class="container py-lg-5">
        <div class="row align-items-center g-5">
            <!-- Left: Artistic Image Frame -->
            <div class="col-lg-5" data-aos="fade-right">
                <div class="principal-v2-frame">
                    <div class="frame-decoration-1"></div>
                    <div class="frame-decoration-2"></div>
                    <div class="image-inner-wrapper">
                        <img src="{{ $leadershipGreeting['avatar'] }}" alt="Kepala Sekolah" class="img-fluid">
                        <div class="principal-label-v2">
                            <span class="badge bg-primary rounded-pill px-3 py-2 mb-2">Pilar Pendidikan</span>
                            <h5 class="fw-bold text-white mb-0">{{ $leadershipGreeting['headMaster'] ?? '-' }}</h5>
                            <p class="text-white-50 small mb-0">{{ $leadershipGreeting['personnelDepartment'] ?? '-' }}</p>
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
                        <p class="lead-serif-v2 mb-4">"{{ $leadershipGreeting['firstParagraph'] }}"</p>
                        <p class="text-muted mb-5">{{ $leadershipGreeting['limitedParagraph'] }}</p>
                    </div>

                    <!-- Stats Integration (Horizontal Strip for V2) -->
                    <div class="stats-v2-row d-flex flex-wrap gap-4 mt-5">
                        <div class="stat-v2-box">
                            @php
                                $totalEmployees = $application['totalEmployees'];
                            @endphp
                            <div class="stat-v2-val text-primary">{{ $totalEmployees > 20 ? '20+' : $totalEmployees }}</div>
                            <div class="stat-v2-lbl">Pendidik Berlisensi</div>
                        </div>
                        <div class="stat-v2-box separator-v2"></div>
                        <div class="stat-v2-box">
                            @php
                                $totalStudents = $application['totalStudents'];
                            @endphp
                            <div class="stat-v2-val text-primary">{{ $totalStudents > 200 ? '200+' : $totalStudents }}</div>
                            <div class="stat-v2-lbl">Siswa Berprestasi</div>
                        </div>
                        <div class="stat-v2-box separator-v2"></div>
                        <div class="stat-v2-box">
                            <div class="stat-v2-val text-primary">{{ $application['totalClassrooms'] }}</div>
                            <div class="stat-v2-lbl">Rombel Modern</div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <a href="{{ route('leadership-greeting.index') }}" class="btn btn-primary btn-lg rounded-pill px-5 shadow-primary-sm">
                            Selami Visi Kami <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
