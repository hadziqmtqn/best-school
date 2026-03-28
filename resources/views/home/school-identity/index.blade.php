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
                    <form action="{{ route('school-identity.index') }}" method="get" class="mb-3">
                        <select class="form-select filter-input" id="institutionFilter" name="institution" onchange="this.form.submit()">
                            @foreach($institutions as $institution)
                                <option value="{{ $institution->slug }}" @selected(request('institution') ? request('institution') == $institution->slug : $loop->first)>
                                    {{ $institution->name }}
                                </option>
                            @endforeach
                        </select>
                    </form>

                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="card-header bg-white p-0 border-bottom">
                            <div class="nav-align-top">
                                <ul class="nav nav-tabs nav-fill nav-tabs-scrollable border-0 px-3 py-3" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button type="button" class="nav-link fw-bold waves-effect active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-school-identity" aria-controls="navs-school-identity" aria-selected="false" tabindex="-1">Identitas</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button type="button" class="nav-link fw-bold waves-effect" role="tab" data-bs-toggle="tab" data-bs-target="#navs-vision" aria-controls="navs-vision" aria-selected="false" tabindex="-1">Visi & Misi</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button type="button" class="nav-link fw-bold waves-effect" role="tab" data-bs-toggle="tab" data-bs-target="#navs-extracurricular" aria-controls="navs-extracurricular" aria-selected="false" tabindex="-1">Ekskul</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            {{--==== START SCHOOL IDENTITY ====--}}
                            @include('home.school-identity.identity')
                            {{--==== END SCHOOL IDENTITY ====--}}

                            {{--==== START MISSION ====--}}
                            @include('home.school-identity.vision')
                            {{--==== END MISSION ====--}}

                            {{--==== START EXTRACURRICULAR ====--}}
                            @include('home.extracurricular.index')
                            {{--==== END EXTRACURRICULAR ====--}}
                        </div>
                    </div>
                </div>

                <!-- Kanan: Artikel Random & Promosi -->
                <x-component.sidebar1/>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            document.getElementById('categoryFilter').addEventListener('change', function() {
                this.form.submit();
            });
        </script>
    @endpush

</x-home.master>