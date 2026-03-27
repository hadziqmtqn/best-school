<x-home.master :title="$title">

    <section id="identitas-sekolah" class="py-5 mt-5 pt-5 bg-main-light">
        <div class="container py-lg-5">
            <div class="text-center mb-5">
                <h6 class="text-primary fw-bold text-uppercase mb-2 ls-1">{{ $title }}</h6>
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
                <x-component.sidebar1/>
            </div>
        </div>
    </section>

</x-home.master>