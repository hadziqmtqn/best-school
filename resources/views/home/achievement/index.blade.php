<x-home.master :title="$title">

    <section id="extracurricular" class="py-5 mt-5 pt-5 bg-main-light">
        <div class="container py-lg-5">
            <div class="text-center mb-5">
                <h6 class="text-primary fw-bold text-uppercase mb-2 ls-1">{{ $title }}</h6>
                <h2 class="fw-bold mb-3">Mengenal Lebih Dekat</h2>
                <p class="text-muted mb-0">Informasi lengkap mengenai {{ $title }} {{ $application['name'] }}.</p>
            </div>

            <div class="row g-4">
                <!-- Kiri: Tabs Utama -->
                <div class="col-lg-8" data-aos="fade-right">
                    <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden" data-aos="fade-left">
                        <div class="card-header bg-primary text-white p-4 border-0">
                            <h5 class="fw-bold mb-0">{{ $title }}</h5>
                        </div>
                        <div class="card-body p-4">

                        </div>
                    </div>
                </div>

                <!-- Kanan: Artikel Random & Promosi -->
                <x-component.sidebar1/>
            </div>
        </div>
    </section>

</x-home.master>