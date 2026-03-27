@push('styles')
    <link rel="stylesheet" href="{{ 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css' }}">
    <link rel="stylesheet" href="{{ 'https://hadziqmtqn.github.io/new-bs-theme/css/gallery.css' }}">
@endpush

<x-home.master :title="$title">

    <section id="achievement" class="py-5 mt-5 pt-5 bg-main-light">
        <div class="container py-lg-5">

            <x-home.bread-crumb :title="$title" name="Mengenal Lebih Dekat" description="Informasi lengkap mengenai {{ $title }} {{ $application['name'] }}."/>

            <div class="row" id="gallery-grid">
                @foreach($galleries as $gallery)
                    <div class="col-lg-4 col-md-6 gallery-item photo">
                        <a href="{{ $gallery['image'] }}" data-fancybox="gallery" data-caption="Kegiatan Belajar Mengajar di Kelas Modern">
                            <img src="{{ $gallery['image'] }}" alt="Gallery Image">
                            <div class="gallery-icon"><i class="bi bi-zoom-in"></i></div>
                            <div class="gallery-overlay">
                                <div class="gallery-info">
                                    <h5>{{ $gallery['name'] }}</h5>
                                    <p>{{ $gallery['description'] }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            {{ $galleries->links() }}
        </div>
    </section>

@push('scripts')
    <script src="{{ 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js' }}"></script>
    <script src="{{ 'https://hadziqmtqn.github.io/new-bs-theme/js/gallery.js' }}"></script>
@endpush
</x-home.master>

