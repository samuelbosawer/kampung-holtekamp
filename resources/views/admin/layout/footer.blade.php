  </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

   

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('/assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


     @if(session('alert.config'))
        @include('sweetalert::alert')

        @php
            session()->forget('alert.config');
        @endphp
    @endif

<script>
(function () {

    // Fungsi hapus semua sisa SweetAlert
    function removeSweetAlert() {
        const containers = document.querySelectorAll('.swal2-container');

        containers.forEach(function (el) {
            el.remove();
        });

        // Bersihkan class di body
        document.body.classList.remove('swal2-shown');
        document.body.style.overflow = '';
        document.body.style.paddingRight = '';
    }

    // Jalankan setelah klik OK
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('swal2-confirm') ||
            e.target.classList.contains('swal2-cancel') ||
            e.target.classList.contains('swal2-deny')) {

            if (window.Swal) {
                Swal.close();
            }

            // Delay kecil lalu hapus container
            setTimeout(removeSweetAlert, 50);
        }
    });

    // Observer: kalau ada swal2-backdrop-hide → langsung hapus
    const observer = new MutationObserver(function () {
        const hidden = document.querySelector('.swal2-container.swal2-backdrop-hide');

        if (hidden) {
            setTimeout(removeSweetAlert, 50);
        }
    });

    observer.observe(document.body, { childList: true, subtree: true });

})();
</script>



  </body>
</html>
