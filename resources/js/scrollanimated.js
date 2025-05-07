    // Fungsi untuk mengecek apakah elemen sudah terlihat di viewport
    function isInViewport(el) {
        const rect = el.getBoundingClientRect();
        return rect.top < window.innerHeight && rect.bottom >= 0;
      }

      // Cek dan aktifkan animasi pada tiap elemen
      function checkSections() {
        $('.fade-section').each(function () {
          if (isInViewport(this) && !$(this).hasClass('animate-in')) {
            $(this).addClass('animate-in'); // Menambahkan kelas animasi hanya jika belum ada
          }
        });
      }

      // Jalankan saat scroll atau resize
      $(window).on('scroll resize', checkSections);
      $(document).ready(checkSections); // Cek sekali pada awal loading
