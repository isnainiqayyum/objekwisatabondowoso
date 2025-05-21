// Tombol "Back to Top"
document.addEventListener('DOMContentLoaded', function () {
    const backToTopBtn = document.querySelector('.back-to-top');

    backToTopBtn.addEventListener('click', function (e) {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Tampilkan tombol jika scroll lebih dari 100px
    window.addEventListener('scroll', function () {
        if (window.scrollY > 100) {
            backToTopBtn.style.display = 'block';
        } else {
            backToTopBtn.style.display = 'none';
        }
    });

    // Sembunyikan tombol saat halaman baru dimuat
    backToTopBtn.style.display = 'none';
});
