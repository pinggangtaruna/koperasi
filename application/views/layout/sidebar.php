  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="<?= base_url('assets/template/AdminLTE/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">E-Lgalisir</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="<?= base_url('assets/template/AdminLTE/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block"></a>
              </div>
          </div>
          <?php if (strtolower($this->session->userdata('role')) == 'user') : ?>
              <!-- ================= SIDEBAR MENU UNTUK USER =============================== -->
              <!-- Sidebar Menu -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                      <li class="nav-item">
                          <a href="<?= base_url('user') ?>" class="nav-link">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>Dashboard</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('user/keuangan') ?>" class="nav-link">
                              <i class="nav-icon fas fa-receipt"></i>
                              <p>
                                  Catatan Keuangan
                              </p>
                          </a>
                      </li>
                  </ul>
              </nav>
              <!-- /.sidebar-menu -->
              <!-- ================= END SIDEBAR MENU UNTUK USER =============================== -->
          <?php elseif (strtolower($this->session->userdata('role')) == 'admin' && strtolower($this->session->userdata('divisi')) == 'master') : ?>
              <!-- ================= SIDEBAR MENU UNTUK ADMIN =============================== -->
              <!-- Sidebar Menu -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                      <li class="nav-item">
                          <a href="<?= base_url('master') ?>" class="nav-link">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>Dashboard</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('master/data-users') ?>" class="nav-link">
                              <i class="nav-icon fas fa-users"></i>
                              <p>Data Users</p>
                          </a>
                      </li>
                  </ul>
              </nav>
              <!-- /.sidebar-menu -->
              <!-- ================= END SIDEBAR MENU UNTUK ADMIN =============================== -->
          <?php elseif (strtolower($this->session->userdata('role')) == 'petugas' && strtolower($this->session->userdata('divisi')) == 'armada penangkapan ikan') : ?>
              <!-- ================= SIDEBAR MENU UNTUK ARMADA =============================== -->
              <!-- Sidebar Menu -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                      <li class="nav-item">
                          <a href="<?= base_url('armada') ?>" class="nav-link">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>Dashboard</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('armada/data-ikan') ?>" class="nav-link">
                              <i class="nav-icon fas fa-fish"></i>
                              <p>Data Ikan</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('armada/pencatatan-ikan') ?>" class="nav-link">
                              <i class="nav-icon fas fa-book"></i>
                              <p>Pencatatan Ikan</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('armada/kirim-ikan') ?>" class="nav-link">
                              <i class="nav-icon fas fa-truck"></i>
                              <p>Kirim Ikan</p>
                          </a>
                      </li>
                  </ul>
              </nav>
              <!-- /.sidebar-menu -->
              <!-- ================= END SIDEBAR MENU UNTUK ARMADA =============================== -->

          <?php elseif (strtolower($this->session->userdata('role')) == 'petugas' && strtolower($this->session->userdata('divisi')) == 'gudang') : ?>
              <!-- ================= SIDEBAR MENU UNTUK GUDANG =============================== -->
              <!-- Sidebar Menu -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                      <li class="nav-item">
                          <a href="<?= base_url('gudang') ?>" class="nav-link">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>Dashboard</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('gudang/data-gudang') ?>" class="nav-link">
                              <i class="nav-icon fas fa-truck-loading"></i>
                              <p>Data Ikan Masuk</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('gudang/data-kirim') ?>" class="nav-link">
                              <i class="nav-icon fas fa-shipping-fast"></i>
                              <p>Delivery Ikan</p>
                          </a>
                      </li>
                  </ul>
              </nav>
              <!-- /.sidebar-menu -->
              <!-- ================= END SIDEBAR MENU UNTUK GUDANG =============================== -->

          <?php elseif (strtolower($this->session->userdata('role')) == 'petugas' && strtolower($this->session->userdata('divisi')) == 'waserda') : ?>
              <!-- ================= SIDEBAR MENU UNTUK WASERDA =============================== -->
              <!-- Sidebar Menu -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                      <li class="nav-item">
                          <a href="<?= base_url('waserda') ?>" class="nav-link">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>Dashboard</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('waserda/pembelian') ?>" class="nav-link">
                              <i class="nav-icon fas fa-file-invoice-dollar"></i>
                              <p>Data Pembelian</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('waserda/keuangan') ?>" class="nav-link">
                              <i class="nav-icon fas fa-receipt"></i>
                              <p>
                                  Catatan Keuangan
                              </p>
                          </a>
                      </li>
                  </ul>
              </nav>
              <!-- /.sidebar-menu -->
              <!-- ================= END SIDEBAR MENU UNTUK WASERDA =============================== -->

          <?php elseif (strtolower($this->session->userdata('role')) == 'petugas' && strtolower($this->session->userdata('divisi')) == 'bengkel') : ?>
              <!-- ================= SIDEBAR MENU UNTUK BENGKEL =============================== -->
              <!-- Sidebar Menu -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                      <li class="nav-item">
                          <a href="<?= base_url('bengkel') ?>" class="nav-link">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>Dashboard</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('bengkel/pembelian') ?>" class="nav-link">
                              <i class="nav-icon fas fa-file-invoice-dollar"></i>
                              <p>Data Pembelian</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('bengkel/keuangan') ?>" class="nav-link">
                              <i class="nav-icon fas fa-receipt"></i>
                              <p>
                                  Catatan Keuangan
                              </p>
                          </a>
                      </li>
                  </ul>
              </nav>
              <!-- /.sidebar-menu -->
              <!-- ================= END SIDEBAR MENU UNTUK BENGKEL =============================== -->
          <?php elseif (strtolower($this->session->userdata('role')) == 'petugas' && strtolower($this->session->userdata('divisi')) == 'kios') : ?>
              <!-- ================= SIDEBAR MENU UNTUK KIOS =============================== -->
              <!-- Sidebar Menu -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                      <li class="nav-item">
                          <a href="<?= base_url('kios') ?>" class="nav-link">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>Dashboard</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('kios/penjualan') ?>" class="nav-link">
                              <i class="nav-icon fas fa-file-invoice"></i>
                              <p>Data Penjualan</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('kios/pendapatan') ?>" class="nav-link">
                              <i class="nav-icon fas fa-funnel-dollar"></i>
                              <p>Pendapatan</p>
                          </a>
                      </li>
                  </ul>
              </nav>
              <!-- /.sidebar-menu -->
              <!-- ================= END SIDEBAR MENU UNTUK KIOS =============================== -->
          <?php elseif (strtolower($this->session->userdata('role')) == 'petugas' && strtolower($this->session->userdata('divisi')) == 'rumah pengolahan') : ?>
              <!-- ================= SIDEBAR MENU UNTUK RUMAH PENGOLAHAN =============================== -->
              <!-- Sidebar Menu -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                      <li class="nav-item">
                          <a href="<?= base_url('pengolahan') ?>" class="nav-link">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>Dashboard</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('pengolahan/data-kiriman') ?>" class="nav-link">
                              <i class="nav-icon fas fa-truck-loading"></i>
                              <p>Data Ikan Masuk</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('pengolahan/data-pengolahan') ?>" class="nav-link">
                              <i class="nav-icon fas fa-drumstick-bite"></i>
                              <p>Data Pengolahan</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('pengolahan/data-kirim') ?>" class="nav-link">
                              <i class="nav-icon fas fa-shipping-fast"></i>
                              <p>Delivery Ikan</p>
                          </a>
                      </li>
                  </ul>
              </nav>
              <!-- /.sidebar-menu -->
              <!-- ================= END SIDEBAR MENU UNTUK RUMAH PENGOLAHAN =============================== -->
          <?php elseif (strtolower($this->session->userdata('role')) == 'petugas' && strtolower($this->session->userdata('divisi')) == 'sentra kuliner') : ?>
              <!-- ================= SIDEBAR MENU UNTUK SENTRA KULINER =============================== -->
              <!-- Sidebar Menu -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                      <li class="nav-item">
                          <a href="<?= base_url('sentra') ?>" class="nav-link">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>Dashboard</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('sentra/penjualan') ?>" class="nav-link">
                              <i class="nav-icon fas fa-file-invoice"></i>
                              <p>Data Penjualan</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url('sentra/pendapatan') ?>" class="nav-link">
                              <i class="nav-icon fas fa-funnel-dollar"></i>
                              <p>Pendapatan</p>
                          </a>
                      </li>
                  </ul>
              </nav>
              <!-- /.sidebar-menu -->
              <!-- ================= END SIDEBAR MENU UNTUK SENTRA KULINER =============================== -->
          <?php endif; ?>
      </div>
      <!-- /.sidebar -->
  </aside>