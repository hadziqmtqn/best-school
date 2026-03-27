@use(Illuminate\Support\Str)
@use(App\Enums\AchievementLevel)

<x-home.master :title="$title">

    <section id="achievement" class="py-5 mt-5 pt-5 bg-main-light">
        <div class="container py-lg-5">

            <x-home.bread-crumb :title="$title" name="Mengenal Lebih Dekat" description="Informasi lengkap mengenai {{ $title }} {{ $application['name'] }}."/>

            <div class="row g-4">
                <!-- Kiri: Tabs Utama -->
                <div class="col-lg-8" data-aos="fade-right">
                    <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden" data-aos="fade-left">
                        <div class="card-header bg-primary text-white p-4 border-0">
                            <h5 class="fw-bold mb-0">{{ $title }}</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Lembaga</th>
                                        <th>Tahun</th>
                                        <th>Tingkat</th>
                                        <th>Deskripsi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($achievements as $achievement)
                                        <tr>
                                            <td>{{ $achievement->name }}</td>
                                            <td>{{ $achievement->institution?->name }}</td>
                                            <td>{{ $achievement->year }}</td>
                                            <td><span class="badge bg-label-{{ AchievementLevel::tryFrom($achievement->achievement_level)?->getColor() ?? 'secondary' }}">{{ $achievement->achievement_level }}</span></td>
                                            <td>
                                                <div class="d-flex justify-content-between">
                                                    <div class="me-4">{{ Str::limit($achievement->description, 70) }}</div>
                                                    <div data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip-primary" title="{{ $achievement->description }}"><i class="bi bi-info-circle"></i></div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{ $achievements->links() }}
                        </div>
                    </div>
                </div>

                <!-- Kanan: Artikel Random & Promosi -->
                <x-component.sidebar1/>
            </div>
        </div>
    </section>

</x-home.master>