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
                        @if($application['totalStudents'] > 0)
                            <div class="floating-badge badge-1">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="badge-icon">
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                    <div>
                                        <div class="badge-title">{{ $application['totalStudents'] }} Siswa Aktif</div>
                                        <div class="badge-subtitle">Terdaftar Tahun Ini</div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Floating Badge 2: Prestasi Nasional -->
                        @if($application['totalAchievement'] > 0)
                            <div class="floating-badge badge-2">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="badge-icon">
                                        <i class="bi bi-trophy-fill"></i>
                                    </div>
                                    <div>
                                        <div class="badge-title">Prestasi Nasional</div>
                                        <div class="badge-subtitle">{{ $application['totalAchievement'] }} Penghargaan</div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Floating Badge 3: Akreditasi A -->
                        @if($application['accreditationScore'] && $application['accreditationName'])
                            <div class="floating-badge badge-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="badge-icon">
                                        <i class="bi bi-shield-fill-check"></i>
                                    </div>
                                    <div>
                                        <div class="badge-title">Akreditasi {{ $application['accreditationScore'] }}</div>
                                        <div class="badge-subtitle">{{ $application['accreditationName'] }}</div>
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

    <!-- Latest News -->
    <x-sections.latest-news/>

</x-home.master>
