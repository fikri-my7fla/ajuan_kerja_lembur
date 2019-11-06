    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" 
              aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 large">
                  <?php
                  $kalimat = $this->session->userdata('username');
                  $kalimat_new = strtoupper($kalimat);
                  echo '<u><i><b>'.$kalimat_new.'</b></i></u>';
                  ?> 
                  <i class="fas fa-lg fa-fw fa-user-circle"></i></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow tada animated" aria-labelledby="userDropdown">
                <?php

                date_default_timezone_set("Asia/Jakarta");
 
                function tglIndonesia($str){
                    $tr   = trim($str);
                    $str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 
                    'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 
                    'November', 'December'), 
                    array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 
                    'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), 
                    $tr);
                    return $str;
                }
                  
                ?>

                <a class="dropdown-item"><i class="fas fa-calendar-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                <?= tglIndonesia(date('D,')); ?></a>
                <a class="dropdown-item"><i class="fas fa-clock-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                <?= tglIndonesia(date('d F Y')); ?></a>
                
                <!-- <a class="dropdown-item" href="<?php echo site_url('authentication/auth/logout'); ?>" 
                data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a> -->

                <a class="dropdown-item tombol-logout" href="<?php echo site_url('authentication/auth/logout'); ?>">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->