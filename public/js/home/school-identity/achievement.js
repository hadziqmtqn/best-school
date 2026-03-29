document.addEventListener('click', function(e) {
    // Cari apakah yang diklik adalah link di dalam pagination kita
    const pageLink = e.target.closest('.ajax-pagination a');

    if (pageLink) {
        e.preventDefault(); // Menghentikan reload secara paksa!

        const targetUrl = new URL(pageLink.href);
        const container = document.getElementById('achievement-table-container');

        if (!container) return;

        // Efek loading
        container.style.opacity = '0.5';

        fetch(targetUrl, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newContent = doc.getElementById('achievement-table-container');

                if (newContent) {
                    // Ganti isi konten
                    container.innerHTML = newContent.innerHTML;

                    // Update URL di address bar browser
                    window.history.pushState({}, '', targetUrl.toString());
                }
                container.style.opacity = '1';
            })
            .catch(error => {
                console.error('Error:', error);
                container.style.opacity = '1';
            });
    }
});