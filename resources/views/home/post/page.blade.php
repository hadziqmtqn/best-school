@php
    use Illuminate\Support\Carbon;
@endphp
<x-home.master :title="$title">

    <x-home.page-breadcrumb :title="$title"/>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <!-- Kolom Kiri: Artikel Utama -->
                <div class="col-lg-8">
                    <!-- Isi Artikel -->
                    <div class="article-content">
                        {!! $post->content !!}
                    </div>

                    <hr class="my-4">

                    <!-- Bagikan Berita -->
                    <x-component.share-to-social-media/>
                </div>

                <!-- Kolom Kanan: Sidebar -->
                <div class="col-lg-4 ps-lg-4 mt-5 mt-lg-0">
                    <!-- Widget: CTA -->
                    <x-component.widget-cta/>
                </div>
            </div>
        </div>
    </section>
</x-home.master>
