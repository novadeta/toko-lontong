<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="index.html" class="app-brand-link">
        <span class="app-brand-text demo menu-text fw-bold ms-2">Toko fariz</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Kelola Toko</span>
      </li>
      <li class="menu-item">
        <a
          href="{{ '/' }}"
          class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Dashboard">Dashboard</div>
        </a>
      </li>
      <li class="menu-item">
        <a
          href="{{ route('buying.index') }}"
          class="menu-link">
          <i class="menu-icon tf-icons bx bx-coin-stack"></i>
          <div data-i18n="Dashboard">Penjualan</div>
        </a>
      </li>
      <li class="menu-item">
        <a
          href="{{ route('product.index') }}"
          class="menu-link">
          <i class="menu-icon tf-icons bx bx-package"></i>
          <div data-i18n="Dashboard">Produk</div>
        </a>
      </li>
      <li class="menu-item">
        <a
          href="{{ route('shopping.index') }}"
          class="menu-link">
          <i class="menu-icon tf-icons bx bx-shopping-bag"></i>
          <div data-i18n="Dashboard">Belanja</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bxs-report"></i>
          <div data-i18n="Account Settings">Laporan</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('report.income') }}" class="menu-link">
              <div data-i18n="Account">Pemasukan</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('report.expense') }}" class="menu-link">
              <div data-i18n="Notifications">Pengeluaran</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- Pengaturan Akun -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bxs-user-account"></i>
          <div data-i18n="Account Settings">Pengaturan Akun</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="pages-account-settings-account.html" class="menu-link">
              <div data-i18n="Account">Akun</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="pages-account-settings-notifications.html" class="menu-link">
              <div data-i18n="Notifications">Notifications</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="pages-account-settings-connections.html" class="menu-link">
              <div data-i18n="Connections">Connections</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item">
        <a
          href="{{ '/' }}"
          class="menu-link">
          <i class="menu-icon tf-icons bx bx-log-out"></i>
          <div data-i18n="Dashboard">Logout</div>
        </a>
      </li>
    </ul>
  </aside>
  <!-- / Menu -->