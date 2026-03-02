@use(Illuminate\Support\Carbon)

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
                                    <span class="category-pill-v2 academic">{{ $institution }}</span>
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
