@php
    use Illuminate\Support\Carbon;
@endphp
<x-home.master :title="$title">

    <x-home.page-breadcrumb :title="$title"/>

    {{--<section class="vl-about5 sp2">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="vl-about-content">
                        <div class="vl-section-title-1 mb-50">
                            <h5 class="subtitle">{{ $post->title }}</h5>
                            <h2 class="title">{{ $post->title }}</h2>
                            <p>{!! $post->content !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="vl-about-content2 ml-20">
                        <div class="large-thumb mb-30">
                            <img class="w-100" src="https://html.vikinglab.agency/helpy/assets/img/about/vl-about-thum-inner-large-1.3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}
</x-home.master>
