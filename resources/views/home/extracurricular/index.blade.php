<x-home.master :title="$title">

    <section id="extracurricular" class="py-5 mt-5 pt-5 bg-main-light">
        <div class="container py-lg-5">

            <x-home.bread-crumb :title="$title" name="Mengenal Lebih Dekat" description="Informasi lengkap mengenai {{ $title }} {{ $application['name'] }}."/>

            <div class="row g-4">
                <!-- Kiri: Tabs Utama -->
                <div class="col-lg-8" data-aos="fade-right">
                    <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">
                        <div class="card-header bg-white p-0 border-bottom">
                            <div class="nav-align-top">
                                <ul class="nav nav-tabs nav-fill nav-tabs-scrollable border-0 px-3 py-3" role="tablist">
                                    @foreach($institutions as $key => $institution)
                                        <li class="nav-item" role="presentation">
                                            <a href="{{ route('extracurricular.index', ['institution-slug' => $institution->slug]) }}" type="button" class="nav-link fw-bold waves-effect {{ request('institution-slug') == $institution->slug || $loop->first ? 'active' : '' }}">
                                                {{ $institution->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-bordered w-100 custom-table">
                                <thead>
                                <tr>
                                    <th>Ekstrakurikuler</th>
                                    <th>Galeri</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($extracurriculars as $key => $extracurricular)
                                        <tr>
                                            <td>
                                                <p class="mb-1 fw-bold">{{ $extracurricular['name'] }}</p>
                                                <p class="mb-0">{{ $extracurricular['description'] }}</p>
                                            </td>
                                            <td>
                                                @if(count($extracurricular['galleries']) > 0)
                                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#extra-{{ $key }}">Lihat</button>

                                                    <x-component.modal1 id-modal="extra-{{ $key }}" title="Galeri Ekstrakurikuler">
                                                        <div class="row">
                                                            @foreach($extracurricular['galleries'] as $gallery)
                                                                <div class="col-md-6">
                                                                    <a href="{{ $gallery }}" target="_blank">
                                                                        <img src="{{ $gallery }}" alt="Galery" class="w-100">
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </x-component.modal1>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Kanan: Artikel Random & Promosi -->
                <x-component.sidebar1/>
            </div>
        </div>
    </section>

</x-home.master>