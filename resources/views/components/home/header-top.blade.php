<div class="vl-header-top d-none d-lg-block">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="vl-header-top-content">
                    <p>Butuh bantuan atas layanan kami? </p>
                    <a href="#" class="top-contact">Hubungi Kami</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="vl-header-top-icon">
                    <div class="vl-header-top-icbox">
                        <div class="top-icon">
                            <span><img src="https://html.vikinglab.agency/helpy/assets/img/icons/vl-top-ic-1.1.svg" alt=""></span>
                        </div>
                        <div class="top-content">
                            @if($application['email'])
                                <a href="mailto:{{ $application['email'] }}">{{ $application['email'] }}</a>
                            @endif
                        </div>
                    </div>
                    <div class="vl-header-top-icbox">
                        <div class="top-icon">
                            <span><img src="https://html.vikinglab.agency/helpy/assets/img/icons/vl-top-ic-1.2.svg" alt=""></span>
                        </div>
                        <div class="top-content">
                            @if($application['phoneNumber'])
                                <a href="tel:{{ $application['phoneNumber'] }}">{{ $application['phoneNumber'] }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>