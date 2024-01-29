@include('layouts.sections.header.index')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            
          <!-- Menu -->
            @include('layouts.sections.menu.index')
          <!-- / Menu -->
  
          <!-- Layout container -->
          <div class="layout-page">

            <!-- Navbar -->
            @include('layouts.sections.navbar.index')
            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">

              <!-- Content -->
                @yield('content')
              <!-- / Content -->

              <!-- Footer -->
              @include('layouts.sections.footer.index')
              <!-- / Footer -->
              <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
          </div>
          <!-- / Layout page -->
        </div>
  
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
      </div>
      <!-- / Layout wrapper -->
  
      <!-- Core JS -->
      <!-- build:js assets/vendor/js/core.js -->
  
      <script src="../assets/vendor/libs/jquery/jquery.js"></script>
      <script src="../assets/vendor/libs/popper/popper.js"></script>
      <script src="../assets/vendor/js/bootstrap.js"></script>
      <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
      <script src="../assets/vendor/js/menu.js"></script>
  
      <!-- endbuild -->
  
      <!-- Vendors JS -->
      <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>
  
      <!-- Main JS -->
      <script src="../assets/js/main.js"></script>
  
      <!-- Page JS -->
      <script src="../assets/js/dashboards-analytics.js"></script>
      <script src="../assets/vendor/libs/DataTables/js/jquery.dataTables.min.js"></script>
      <script src="../assets/vendor/libs/DataTables/js/dataTables.bootstrap5.min.js"></script>
      <!-- Place this tag in your head or just before your close body tag. -->
      <script async defer src="https://buttons.github.io/buttons.js"></script>
      @yield('script')
    </body>
  </html>
  