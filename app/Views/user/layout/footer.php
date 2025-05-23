<!-- FOOTER YANG BENAR-BENAR FULL -->
<div class="footer-fullwidth">
    <div class="py-4 px-3 px-md-5 text-center text-white">
        <span>@pariwisatabondowoso2025</span>
    </div>

    <!-- Tombol Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top" title="Kembali ke atas">
        <i class="fa fa-arrow-up"></i>
    </a>
</div>

<style>
        /* Bisa di style.css global */
        body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        }

        .footer-fullwidth {
        margin-top: auto;
        }

.footer-fullwidth {
    width: 100vw; /* Lebar penuh viewport */
    position: relative;
    left: 50%;
    right: 50%;
    margin-left: -50vw; /* Geser ke kiri setengah viewport */
    margin-right: -50vw; /* Geser ke kanan setengah viewport */
    background-color: #212529; /* Bisa disesuaikan warna bg-dark */
}
.back-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 999;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        font-size: 18px;
        border-radius: 5px;
    }

    .back-to-top:hover {
        background-color: #0056b3;
        color: white;
    }
</>

<!-- OPTIONAL SCRIPT SCROLL (JIKA PERLU EFEK SMOOTH) -->
<script>
    document.querySelector('.back-to-top').addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>