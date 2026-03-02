@use(Illuminate\Support\Carbon)

<x-home.master :title="$title">

    <x-home.page-breadcrumb :title="$title"/>


    <section class="py-5 bg-light-soft">
        <div class="container py-lg-5">
            <!-- Filter & Search Bar -->
            <div class="agenda-filter-container mb-5" data-aos="fade-up">
                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <form action="{{ route('agenda.index') }}" class="row g-3 align-items-end" method="GET">
                        <div class="col-lg-4 col-md-12">
                            <label class="form-label fw-bold small text-muted text-uppercase" for="search">Cari Agenda</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-success"></i></span>
                                <input type="text" name="search" id="search" class="form-control border-start-0" placeholder="Ketik kata kunci...">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <label class="form-label fw-bold small text-muted text-uppercase" for="months">Bulan</label>
                            <select class="form-select" id="months" name="month">
                                <option value="" @selected(!request('month'))>Semua Bulan</option>
                                @foreach($months as $key => $month)
                                    <option value="{{ $key }}" @selected(request('month') == $key)>{{ $month }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <label class="form-label fw-bold small text-muted text-uppercase" for="years">Bulan</label>
                            <select class="form-select" id="years" name="year">
                                <option value="" @selected(!request('year'))>Semua Bulan</option>
                                @foreach($years as $key => $year)
                                    <option value="{{ $key }}" @selected(request('year') == $key)>{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <button type="submit" class="btn btn-primary w-100 rounded-pill">Filter</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold mb-0">Daftar Agenda</h4>
                        <span class="badge bg-white text-dark border-0 shadow-sm px-3 py-2 rounded-pill small">Menampilkan 4 Agenda</span>
                    </div>

                    <div class="agenda-list-v2">
                        @foreach($agendas as $agenda)
                            @php
                                $startDate = $agenda->start_date;
                                $endDate = $agenda->end_date;
                                $day = Carbon::parse($startDate)->isoFormat('DD');
                                $month = Carbon::parse($startDate)->isoFormat('MMM');

                                $name = $agenda->name;
                                $description = $agenda->description;
                                $location = $agenda->location;
                                $startDateTime = Carbon::parse($startDate)->isoFormat('DD MMM Y HH:mm');
                                $endDateTime = Carbon::parse($endDate)->isoFormat('DD MMM Y HH:mm');
                            @endphp

                            <div class="agenda-v2-card mb-4 p-4 list-style" data-aos="fade-up" data-aos-delay="100">
                                <div class="agenda-v2-header mb-0 align-items-center flex-row gap-4">
                                    <div class="date-badge-v2">
                                        <span class="day">{{ $day }}</span>
                                        <span class="month">{{ $month }}</span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                                            <span class="category-pill-v2 academic">Akademik</span>
                                            <span class="text-muted small"><i class="bi bi-clock me-1"></i> 08:00 - 13:00 WIB</span>
                                        </div>
                                        <h5 class="fw-bold mb-1">{{ $name }}</h5>
                                        <div class="agenda-v2-footer border-0 p-0 m-0">
                                            <i class="bi bi-geo-alt me-2 text-success"></i>{{ $location }}
                                        </div>
                                    </div>
                                    <div class="d-none d-md-block">
                                        <button class="btn btn-detail-v2" data-bs-toggle="modal" data-bs-target="#agendaDetailModal">
                                            <i class="bi bi-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if(count($agendas) === 0)
                            <x-component.empty-state note="Tidak Ada Agenda Ditemukan"/>
                        @endif

                        <!-- Pagination UI -->
                        {{ $agendas->links('vendor.pagination.best-pagination') }}
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden" data-aos="fade-left">
                        <div class="card-header bg-success text-white p-4 border-0">
                            <h5 class="fw-bold mb-0"><i class="bi bi-info-circle me-2"></i>Pengumuman Penting</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="mb-4">
                                <h6 class="fw-bold text-success mb-2">Libur Idul Fitri 1445 H</h6>
                                <p class="small text-muted mb-0">Sekolah akan diliburkan mulai tanggal 5 s/d 15 April
                                    2024. Seluruh layanan administrasi dilakukan secara terbatas.</p>
                                <hr class="my-4 opacity-10">
                            </div>
                            <div>
                                <h6 class="fw-bold text-success mb-2">Pendaftaran PPDB Gelombang 2</h6>
                                <p class="small text-muted mb-0">Pendaftaran Gelombang 2 akan segera dibuka pada tanggal
                                    1 Juni 2024. Siapkan berkas pendaftaran Anda.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 position-relative overflow-hidden mb-4"
                         data-aos="fade-left" data-aos-delay="100">
                        <div class="card-body p-4 py-5 text-center bg-dark text-white">
                            <div class="mb-4">
                                <i class="bi bi-headset display-4 text-success opacity-75"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Butuh Bantuan?</h4>
                            <p class="small mb-4 opacity-75">Jika Anda memiliki pertanyaan terkait jadwal atau kegiatan
                                sekolah, hubungi pusat informasi kami.</p>
                            <a href="https://wa.me/123456789" class="btn btn-success rounded-pill w-100 py-2">
                                <i class="bi bi-whatsapp me-2"></i>Hubungi Sekretariat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-home.master>
