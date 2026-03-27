@php
    use Illuminate\Support\Carbon;
@endphp
<x-home.master :title="$title">

    <x-home.page-breadcrumb :title="$title"/>

    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4 p-md-5">
                            <div class="content lh-relaxed">
                                {!! $post->content !!}

                                <hr class="my-4">

                                <x-component.share-to-social-media/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <x-component.widget-cta/>
                </div>
            </div>
        </div>
    </section>
</x-home.master>
