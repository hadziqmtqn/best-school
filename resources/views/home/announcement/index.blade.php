<x-home.master :title="$title">

    <x-component.header-search :title="$title"/>

    <section class="bg-white">
        <div class="announcement-container">
            <div class="announcement-breadcrumb">
                <span>Beranda</span> <i class="bi bi-chevron-right mx-1" style="font-size: 0.7rem;"></i> <span>{{ $title }}</span>
            </div>

            <div class="announcement-filter">
                <div class="filter-item active">Semua</div>
                <div class="filter-item">Aktif</div>
                <div class="filter-item">Tidak Aktif</div>
            </div>

            <!-- Announcement List -->
            <div class="announcement-list">
                <!-- Item 1 -->
                <div class="announcement-item">
                    <div class="announcement-date">
                        <span class="day-type">Today</span>
                        <span class="time">03:00</span>
                    </div>
                    <div class="announcement-content">
                        <h5 data-bs-toggle="modal" data-bs-target="#announcementDetailModal"
                            data-title="Welcome to the Era of Zero!"
                            data-text="Kami dengan bangga mengumumkan peluncuran program 'Zero Plastic' di lingkungan sekolah. Program ini bertujuan untuk mengurangi limbah plastik sekali pakai di kantin dan seluruh area sekolah. Mari kita jaga lingkungan bersama-sama."
                            data-day="29" data-month="MAR" data-category="academic" data-category-name="Akademik">
                            Welcome to the Era of Zero!
                        </h5>
                        <p>Kami dengan bangga mengumumkan peluncuran program 'Zero Plastic' di lingkungan sekolah. Program ini bertujuan untuk mengurangi limbah plastik sekali pakai...</p>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="announcement-item">
                    <div class="announcement-date">
                        <span class="day-type">Jun 03</span>
                        <span class="time">2024</span>
                    </div>
                    <div class="announcement-content">
                        <h5 data-bs-toggle="modal" data-bs-target="#announcementDetailModal"
                            data-title="The Era of Zero is Coming!"
                            data-text="Persiapan menyambut tahun ajaran baru dengan sistem digitalisasi penuh. Seluruh administrasi dan materi pembelajaran akan dapat diakses melalui portal baru yang lebih responsif dan intuitif."
                            data-day="03" data-month="JUN" data-category="announcement" data-category-name="Pengumuman">
                            The Era of Zero is Coming!
                        </h5>
                        <p>Persiapan menyambut tahun ajaran baru dengan sistem digitalisasi penuh. Seluruh administrasi dan materi pembelajaran akan dapat diakses melalui portal...</p>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="announcement-item">
                    <div class="announcement-date">
                        <span class="day-type">Jun 02</span>
                        <span class="time">2024</span>
                    </div>
                    <div class="announcement-content">
                        <h5 data-bs-toggle="modal" data-bs-target="#announcementDetailModal"
                            data-title="Trading Ethereum Derivatives"
                            data-text="Pelatihan literasi finansial digital bagi siswa kelas 12. Mengenal dasar-dasar teknologi blockchain dan manajemen keuangan di era digital sebagai bekal di masa depan."
                            data-day="02" data-month="JUN" data-category="activities" data-category-name="Kegiatan">
                            Trading Ethereum Derivatives
                        </h5>
                        <p>Pelatihan literasi finansial digital bagi siswa kelas 12. Mengenal dasar-dasar teknologi blockchain dan manajemen keuangan di era digital sebagai bekal...</p>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="announcement-item">
                    <div class="announcement-date">
                        <span class="day-type">Jun 01</span>
                        <span class="time">2024</span>
                    </div>
                    <div class="announcement-content">
                        <h5 data-bs-toggle="modal" data-bs-target="#announcementDetailModal"
                            data-title="How do I Add Margin to a Position?"
                            data-text="Tutorial penggunaan sistem manajemen nilai baru. Bagaimana cara guru dan siswa memantau perkembangan akademik secara real-time melalui aplikasi sekolah."
                            data-day="01" data-month="JUN" data-category="academic" data-category-name="Akademik">
                            How do I Add Margin to a Position?
                        </h5>
                        <p>Tutorial penggunaan sistem manajemen nilai baru. Bagaimana cara guru dan siswa memantau perkembangan akademik secara real-time melalui aplikasi...</p>
                    </div>
                </div>

                <!-- Item 5 -->
                <div class="announcement-item">
                    <div class="announcement-date">
                        <span class="day-type">May 29</span>
                        <span class="time">2024</span>
                    </div>
                    <div class="announcement-content">
                        <h5 data-bs-toggle="modal" data-bs-target="#announcementDetailModal"
                            data-title="What are Conditional Orders?"
                            data-text="Penjelasan mengenai aturan baru di sekolah terkait dispensasi kegiatan luar sekolah dan jalur koordinasi antara OSIS dan pihak sekolah."
                            data-day="29" data-month="MEI" data-category="announcement" data-category-name="Pengumuman">
                            What are Conditional Orders?
                        </h5>
                        <p>Penjelasan mengenai aturan baru di sekolah terkait dispensasi kegiatan luar sekolah dan jalur koordinasi antara OSIS dan pihak sekolah.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-home.master>