@use(Illuminate\Support\Carbon)
@use(Illuminate\Support\Str)

<section id="agenda" class="py-5 bg-white">
    <div class="container py-lg-5">
        <div class="row align-items-end mb-5">
            <div class="col-lg-6" data-aos="fade-right">
                <h6 class="text-primary fw-bold text-uppercase mb-2 ls-1">Timeline Kami</h6>
                <h2 class="fw-bold mb-3">Agenda Terdekat</h2>
                <p class="text-muted mb-0 pe-lg-5">Ikuti terus perkembangan kegiatan dan jadwal penting sekolah agar tidak ketinggalan momen berharga.</p>
            </div>
            <div class="col-lg-6 text-lg-end mt-4 mt-lg-0" data-aos="fade-left">
                <a href="{{ route('agenda.index') }}" class="btn btn-outline-primary rounded-pill px-4 btn-lg">
                    Lihat Semua Jadwal <i class="bi bi-calendar3 ms-2"></i>
                </a>
            </div>
        </div>

        <div class="row g-4">
            @foreach($agendas as $agenda)
                @php
                    $startDate = $agenda->start_date;
                    $day = Carbon::parse($startDate)->isoFormat('DD');
                    $month = Carbon::parse($startDate)->isoFormat('MMM');

                    $name = $agenda->name;
                    $description = $agenda->description;
                    $location = $agenda->location;
                @endphp

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="agenda-v2-card">
                        <div class="agenda-v2-header">
                            <div class="date-badge-v2">
                                <span class="day">{{ $day }}</span>
                                <span class="month">{{ $month }}</span>
                            </div>
                            <span class="category-pill-v2 academic">{{ $agenda->institution?->name }}</span>
                        </div>
                        <div class="agenda-v2-body">
                            <h5 class="fw-bold mb-3">{{ $name }}</h5>
                            <p class="text-muted small mb-0">{{ Str::limit($description) }}</p>
                        </div>
                        <div class="agenda-v2-footer d-flex justify-content-between align-items-center">
                            <div>
                                <i class="bi bi-geo-alt me-2 text-primary"></i>{{ $location }}
                            </div>
                            <button class="btn btn-detail-v2 btn-sm" data-bs-toggle="modal" data-bs-target="#agendaDetailModal">
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>


                <!-- Agenda Detail Modal -->
                <div class="modal fade modal-premium" id="agendaDetailModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <h5 class="modal-title fw-bold mb-0" id="agendaModalLabel">Detail Agenda Sekolah</h5>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-4">
                                    <div class="col-lg-7">
                                        <div class="agenda-detail-badge-group">
                                            <div class="agenda-detail-date">
                                                <div class="day-xl">{{ $day }}</div>
                                                <div class="month-sm">{{ $month }}</div>
                                            </div>
                                            <div>
                                                <div class="mb-2">
                                                    <span class="category-pill-v2 academic">Akademik</span>
                                                </div>
                                                <h2 class="fw-bold mb-0 ls-tight lh-sm fs-4">{{ $name }}</h2>
                                            </div>
                                        </div>

                                        <p class="text-secondary mb-0 lh-relaxed">{{ $description }}</p>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="info-grid-v2">
                                            <div class="info-item-v2">
                                                <div class="info-icon-wrapper">
                                                    <i class="bi bi-geo-alt"></i>
                                                </div>
                                                <div>
                                                    <div class="small text-muted fw-bold text-uppercase ls-1">Lokasi</div>
                                                    <div class="fw-bold">{{ $location }}</div>
                                                </div>
                                            </div>
                                            <div class="info-item-v2">
                                                <div class="info-icon-wrapper">
                                                    <i class="bi bi-clock"></i>
                                                </div>
                                                <div>
                                                    <div class="small text-muted fw-bold text-uppercase ls-1">Waktu</div>
                                                    <div class="fw-bold">
                                                        <ul class="ps-3">
                                                            <li>{{ Carbon::parse($startDate)->isoFormat('DD MMM Y HH:mm') }}</li>
                                                            <li>{{ Carbon::parse($agenda->end_date)->isoFormat('DD MMM Y HH:mm') }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
