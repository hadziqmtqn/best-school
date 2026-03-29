@use(Illuminate\Support\Str)
@use(Illuminate\Support\Carbon)

<div class="col-lg-4" data-aos="fade-left">
    <div class="d-flex flex-column gap-4">
        <!-- Card Artikel Random (Tanpa Thumbnail) -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden" data-aos="fade-left">
            <div class="card-header bg-secondary text-white p-4 border-0">
                <h5 class="fw-bold mb-0">Artikel Terkait</h5>
            </div>
            <div class="card-body p-4">
                @foreach($relatedPosts as $relatedPost)
                    <div class="mb-2">
                        <a href="{{ route('post.show', $relatedPost->slug) }}" class="text-decoration-none text-primary">
                            {{ Str::limit($relatedPost->title) }}
                        </a>
                    </div>
                    <div class="mb-3 text-muted small">{{ Carbon::parse($relatedPost->created_at)->isoFormat('DD MMM Y') }}</div>

                    @if(!$loop->last)
                        <hr>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Card Promosi -->
        <x-component.widget-cta/>
    </div>
</div>