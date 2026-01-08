<header>
    <div class="header-area header5 homepage1 header header-sticky d-none d-xl-block " id="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-elements header-elements-1">
                        <div class="site-logo">
                            <a href="/"><img src="{{ $application['logo'] }}" alt="logo" style="max-width: 50px"></a>
                        </div>
                        <div class="main-menu main-menu-5">
                            <ul>
                                <x-home.navigation/>
                            </ul>
                        </div>
                        <div class="btn-area">
                            <div class="btn5">
                                <a href="{{ auth()->check() ? (auth()->user()->hasRole('student') ? route('filament.student.pages.student-dashboard') : route('filament.admin.pages.dashboard')) : route('filament.student.auth.login') }}" class="btn-priamry1">{{ auth()->check() ? 'Dasbor' : 'Masuk' }} <span><i class="fa-solid fa-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>