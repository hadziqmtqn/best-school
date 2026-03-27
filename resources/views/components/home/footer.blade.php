<footer>
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
                <h5 class="fw-bold mb-4 text-warning">{{ $application['name'] }}</h5>
                <p class="small opacity-75 mb-4">{{ $application['description'] }}</p>
                <div class="social-icons">
                    <a href="#" class="me-3"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="me-3"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="me-3"><i class="bi bi-youtube"></i></a>
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <h5 class="fw-bold mb-4">Navigasi</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="/" class="footer-link">Beranda</a></li>
                    <li class="mb-2"><a href="{{ route('post.index') }}" class="footer-link">Berita Sekolah</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-12" data-aos="fade-up" data-aos-delay="200">
                <h5 class="fw-bold mb-4">Kontak Kami</h5>
                <div class="d-flex align-items-start mb-3">
                    <div class="footer-contact-icon me-3">
                        <i class="bi bi-geo-alt-fill text-warning"></i>
                    </div>
                    <span class="small opacity-75">{{ $application['address'] }}</span>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <div class="footer-contact-icon me-3">
                        <i class="bi bi-telephone-fill text-warning"></i>
                    </div>
                    <span class="small opacity-75">{{ $application['phoneNumber'] }}</span>
                </div>
                <div class="d-flex align-items-center">
                    <div class="footer-contact-icon me-3">
                        <i class="bi bi-envelope-fill text-warning"></i>
                    </div>
                    <span class="small opacity-75">{{ $application['email'] }}</span>
                </div>
            </div>
        </div>
        <div class="text-center mt-4 pt-3 border-top border-secondary">
            <p class="small mb-0">&copy; {{ date('Y') }} {{ $application['name'] }}. All Rights Reserved.</p>
        </div>
    </div>
</footer>
