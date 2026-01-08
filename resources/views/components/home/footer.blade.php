<footer class="vl-footer-bg-1 cream-bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="vl-footer-widget-1 mb-30">
                    <div class="vl-footer-logo">
                        <a href="/"><img src="{{ $application['logo'] }}" alt="logo" style="max-width: 60px"></a>
                    </div>
                    <div class="vl-footer-content">
                        <p>{{ $application['description'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="vl-footer-widget-2 pl-90 mb-30">
                    <h3 class="title">Akses Cepat</h3>
                    <div class="vl-footer-menu">
                        <ul>
                            <x-home.navigation/>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="vl-footer-widget-3 mb-30">
                    <h3 class="title">Hubungi Kami</h3>
                    <!-- single box -->
                    <div class="vl-footer-icon-list">
                        <div class="vl-footer-icon">
                            <span><img src="https://html.vikinglab.agency/helpy/assets/img/icons/vl-footer-ic-1.1.svg" alt=""></span>
                        </div>
                        <div class="vl-footer-text">
                            <a href="mailto:{{ $application['email'] }}">{{ $application['email'] }}</a>
                        </div>
                    </div>
                    <!-- single box -->
                    <div class="vl-footer-icon-list">
                        <div class="vl-footer-icon">
                            <span><img src="https://html.vikinglab.agency/helpy/assets/img/icons/vl-footer-2.1.svg" alt=""></span>
                        </div>
                        <div class="vl-footer-text">
                            <a href="https://wa.me/{{ $application['whatsappNumber'] }}" target="_blank">{{ $application['whatsappNumber'] }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="vl-copyright copyright-border-1">
            <div class="row">
                <div class="col-md-6">
                    <p class="vl-copyright-text">© {{ date('Y') }} {{ $application['name'] }}. All Rights Reserved.</p>
                </div>
                <div class="col-md-6">
                    <div class="vl-copyright-menu">
                        <ul>
                            <li><a href="https://bkn.my.id" target="_blank" rel="noopener">Developed by Bekenweb</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>