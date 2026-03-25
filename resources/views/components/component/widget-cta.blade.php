<div class="card bg-primary text-white border-0 shadow-primary rounded-4 overflow-hidden position-relative flex-grow-1">
    <!-- Background Decor -->
    <div class="position-absolute end-0 bottom-0 opacity-25" style="transform: translate(20%, 20%); pointer-events: none;">
        <i class="bi bi-mortarboard-fill" style="font-size: 8rem;"></i>
    </div>
    <div class="card-body p-4 position-relative z-1 d-flex flex-column justify-content-center">
        <h4 class="fw-bold mb-3 mt-1 text-white">{{ $application['ctaTitle'] }}</h4>
        <p class="opacity-75 small lh-relaxed mb-4">{{ $application['ctaDescription'] }}</p>
        <a href="{{ $application['ctaUrl'] }}" class="btn btn-warning rounded-pill px-4 py-2 text-dark fw-bold w-100">{{ $application['ctaBtnLabel'] }}</a>
    </div>
</div>
