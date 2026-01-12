<!--=====HEADER START=======-->
<header>
    <div class="header-area homepage1 header header-sticky d-none d-xl-block mt-16" id="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-elements header-elements-1">
                        <div class="site-logo">
                            <a href="/"><img src="{{ $application['logo'] }}" alt="logo" style="max-height: 50px"></a>
                        </div>
                        <div class="main-menu">
                            <ul>
                                <x-home.navigation/>
                            </ul>
                        </div>
                        <div class="btn-area">
                            <a href="{{ auth()->check() ? route('filament.admin.pages.dashboard') : route('filament.admin.auth.login') }}" class="header-btn1">{{ auth()->check() ? 'Dasbor' : 'Masuk' }} <span><i class="fa-solid fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--=====HEADER END =======-->