<!--===== HERO AREA STARTS =======-->
<div class="vl-banner p-relative fix">
    <div class="slider-active-1">
        <!-- single slider -->
        @foreach($sliders as $slider)
            <div class="vl-hero-slider vl-hero-bg" style="background-image: url({{ $slider['asset'] }});">
                <div class="vl-hero-shape shape-1">
                    <img src="https://raw.githubusercontent.com/Bekenweb/best-assets/refs/heads/main/shapes/vl-hero-shape-1.1.webp" alt="">
                </div>
                <div class="vl-hero-shape shape-2">
                    <img src="https://raw.githubusercontent.com/Bekenweb/best-assets/refs/heads/main/shapes/vl-hero-shape-1.2.webp" alt="">
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-7">
                            <div class="vl-hero-section-title">
                                <h1 class="vl-title text-anime-style-3">{{ $slider['title'] }}</h1>
                                <p>{{ $slider['description'] }}</p>
                                <div class="vl-hero-btn">
                                    <a href="{{ $slider['action_url'] }}" class="header-btn1">{{ $slider['action_name'] }} <span><i class="fa-solid fa-arrow-right"></i></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5"></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="vl-arrow">
        <span class="prev-arow"><i class="fa-solid fa-angle-right"></i></span>
        <span class="next-arow"><i class="fa-solid fa-angle-left"></i></span>
    </div>
</div>
<!--===== HERO AREA ENDS =======-->