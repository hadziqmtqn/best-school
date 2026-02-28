<section class="hero-media py-5" style="background-image: url({{ $application['breadcrumbImg'] }}); background-size: cover; background-position: center;">
    <div class="container hero-content py-5">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb breadcrumb-custom mb-0">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
            </ol>
        </nav>
        <h1 class="display-5 fw-bold text-white">{{ $title }}</h1>
    </div>
</section>
