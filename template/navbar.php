<body>
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
      <div class="container">
        <div class="menu-bg-wrap">
          <div class="site-navigation">
            <a href="?page=dashboard-view" class="logo m-0 float-start">BPPMDDTT</a>
            <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
            <li class="active"><a href="?page=dashboard-view">Home</a></li>
            <li class="has-children">
              <a href="">Tentang</a>
              <ul class="dropdown">
                <li><a href="?page=sejarah-read">Sejarah</a></li>
                <li><a href="?page=susunan-read">Susunan</a></li>
                <li><a href="?page=kepala-read">Kepala</a></li>
              </ul>
            </li>
            <li class="has-children">
              <a href="">Data</a>
              <ul class="dropdown">
                <li><a href="?page=instruktur-read">Instruktur</a></li>
                <li><a href="?page=pelatihan-read">Pelatihan</a></li>
                <li><a href="?page=materi-pelatihan-read">Materi Pelatihan</a></li>
                <li><a href="?page=peserta-read">Peserta</a></li>
                <li><a href="?page=pendaftaran-read">Pendaftaran</a></li>
                <?php if($_SESSION['status'] == 'admin'): ?>
                <li class="has-children">
                  <a href="">Manajemen Data</a>
                  <ul class="dropdown">
                    <li><a href="?page=instruktur-add">Instruktur</a></li>
                    <li><a href="?page=pelatihan-add">Pelatihan</a></li>
                    <li><a href="?page=materi-pelatihan-add">Materi Pelatihan</a></li>
                    <li><a href="?page=peserta-add">Peserta</a></li>
                    <li><a href="?page=pendaftaran-add">Pendaftaran</a></li>
                  </ul>
                </li>
                <?php endif; ?>
              </ul>
            </li>
            <li class="has-children">
              <a href="">Laporan</a>
              <ul class="dropdown">
                <li><a href="laporan-instruktur.php">Instruktur</a></li>
                <li><a href="laporan-pelatihan.php">Pelatihan</a></li>
                <li><a href="laporan-materi-pelatihan.php">Materi Pelatihan</a></li>
                <li><a href="laporan-peserta.php">Peserta</a></li>
                <li><a href="laporan-pendaftaran.php">Pendaftaran</a></li>
              </ul>
            </li>
            <li><a href="?page=sarana-read">Sarana</a></li>
            <li class="has-children">
              <a>Log Out</a>
                <ul class="dropdown">
                  <li><a href="login/login_view.php">Keluar</a></li>
                    <?php if($_SESSION['status'] == 'admin'): ?>
                  <li><a href="?page=pengguna-read">Pengguna</a></li>
                <?php endif; ?>
                </ul>
            </li>

          <a
          href="#"
          class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
          data-toggle="collapse"
          data-target="#main-navbar"
        >
          <span></span>
        </a>
          </div>
        </div>
      </div>
    </nav>