<div class="mobile-header mobile-haeder4 d-block d-xl-none">
    <div class="container">
        <div class="col-12">
            <div class="mobile-header-elements">
                <div class="mobile-logo">
                    <a href="/"><img src="{{ $application['logo'] }}" alt="" style="max-width: 40px"></a>
                </div>
                <div class="mobile-nav-icon mobile-nav-icon3 dots-menu">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mobile-sidebar mobile-sidebar1">
    <div class="logosicon-area">
        <div class="logos">
            <img src="{{ $application['logo'] }}" alt="" style="max-width: 40px">
        </div>
        <div class="menu-close">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
    <div class="mobile-nav mobile-nav1">
        <ul class="mobile-nav-list nav-list1">
            <x-home.navigation/>
        </ul>

        <div class="allmobilesection">
            <!-- btn -->
            <div class="mobile-btn5">
                <div class="btn5">
                    <a href="{{ auth()->check() ? route('filament.admin.pages.dashboard') : route('filament.admin.auth.login') }}" class="btn-priamry1">{{ auth()->check() ? 'Dasbor' : 'Masuk' }} <span><i class="fa-solid fa-arrow-right"></i></span></a>
                </div>
            </div>

            <div class="vl-mobile-contact1">
                <h3 class="title">Info Kontak</h3>
                <div class="footer1-contact-info">
                    <div class="contact-info-single">
                        <div class="contact-info-icon">
                            <i class="fa-solid fa-phone-volume"></i>
                        </div>
                        <div class="contact-info-text">
                            <a href="https://wa.me/{{ $application['phoneNumber'] }}">{{ $application['phoneNumber'] }}</a>
                        </div>
                    </div>

                    <!-- single footer -->
                    <div class="contact-info-single">
                        <div class="contact-info-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="contact-info-text">
                            <a href="mailto:{{ $application['email'] }}">{{ $application['email'] }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>