<!DOCTYPE html>
<html lang="en">
<title>SIM-RT</title>

<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicons -->
  <link href="https://upload.wikimedia.org/wikipedia/commons/d/d7/Coat_of_arms_of_Bekasi.png" rel="icon">
  <link href="<?php echo base_url('./style-main/assets/img/apple-touch-icon.png'); ?>" rel="apple-touch-icon">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('./style-main/assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('./style-main/assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('./style-main/assets/vendor/aos/aos.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('./style-main/assets/vendor/glightbox/css/glightbox.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('./style-main/assets/vendor/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?php echo base_url('./style-main/assets/css/main.css'); ?>" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="" class="logo d-flex align-items-center me-auto">
        <img src="https://upload.wikimedia.org/wikipedia/commons/d/d7/Coat_of_arms_of_Bekasi.png">
        <h1 class="sitename">SIM-RT</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php#hero" class="active">Home</a></li>
          <li><a href="index.php#featured-services">Layanan</a></li>
          <li><a href="index.php#about">Visi & Misi</a></li>
          <li><a href="index.php#features">Program</a></li>
          <li><a href="index.php#footer">Kontak</a></li>
          <!-- <li><a href="index.html#pricing">Pricing</a></li> -->
          <li class="dropdown"><a href=""><span>Profil</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">AD/ART</a></li>
              <!-- <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Tata Tertib RT/RW</a></li>
                  <li><a href="#">Struktur Organisasi</a></li>
                  <li><a href="#">Daftar RT</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul> -->
          </li>
          <li><a href="#">Tata Tertib RT/RW</a></li>
          <li><a href="#">Struktur Organisasi</a></li>
          <li><a href="#">Daftar RT</a></li>
        </ul>
        </li>
        <!-- <li><a href="index.html#contact">Contact</a></li> -->
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="<?php echo base_url('auth'); ?>">Login Warga</a>

    </div>

    <style>
  /* Custom CSS for the carousel */
  .custom-carousel .carousel-inner .carousel-item {
    max-height: 500px;
    overflow: hidden;
    position: relative;
  }

  .custom-carousel .carousel-inner .carousel-item .img-overlay {
    position: relative;
  }

  .custom-carousel .carousel-inner .carousel-item .img-overlay::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.25);
    z-index: 1;
  }

  .custom-carousel .carousel-inner .carousel-item .img-custom {
    width: 100%;
    height: auto;
    display: block;
    margin-left: auto;
    margin-right: auto;
  }

  .custom-carousel .carousel-caption {
    position: absolute;
    bottom: 20px;
    left: 20px;
    z-index: 2;
    text-align: left;
  }

  .custom-carousel .carousel-caption h5,
  .custom-carousel .carousel-caption p,
  .custom-carousel .carousel-caption small {
    color: #fff;
    text-shadow: 1px 1px 2px black;
  }

  .custom-carousel .carousel-control-prev,
  .custom-carousel .carousel-control-next {
    filter: invert(100%);
  }

  .custom-carousel .carousel-indicators button {
    background-color: #333;
  }

  .custom-carousel .carousel-indicators .active {
    background-color: #fff;
  }

  @media (max-width: 767px) {
    .custom-carousel .carousel-caption {
      font-size: 12px;
      padding: 5px;
      text-align: left;
    }

    .custom-carousel .carousel-caption h5 {
      font-size: 16px;
    }

    .custom-carousel .carousel-caption p,
    .custom-carousel .carousel-caption small {
      font-size: 12px;
    }
  }
</style>

  </header>

  <main class="main">

	<section id="hero" class="hero d-flex align-items-center">
      <div class="container section-title" data-aos="fade-up">
        <?= $this->session->flashdata('msg'); ?>
        <h2>Pengumuman</h2>
        <div id="announcementCarousel" class="carousel slide" data-bs-ride="carousel">
          <!-- Carousel Indicators -->
          <div class="carousel-indicators">
            <?php foreach ($pengumuman as $index => $item) : ?>
              <button type="button" data-bs-target="#announcementCarousel" data-bs-slide-to="<?= $index ?>" class="<?= $index == 0 ? 'active' : '' ?>" aria-current="<?= $index == 0 ? 'true' : 'false' ?>" aria-label="Slide <?= $index + 1 ?>"></button>
            <?php endforeach; ?>
          </div>
          <!-- Carousel Items -->
          <div class="carousel-inner">
            <?php foreach ($pengumuman as $index => $item) : $tanggal = date('d-m-Y', strtotime($item['tanggal'])); ?>
              <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>">
                <div class="card h-100">
                  <img src="<?php echo base_url('uploads/' . $item['gambar']); ?>" class="card-img-top" alt="<?php echo $item['judul']; ?>">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $item['judul']; ?></h5>
                    <p class="card-text"><?php echo $item['isi']; ?></p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">Publisher: <?php echo $item['nama']; ?> | Dibuat: <?= $tanggal; ?></small>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <!-- Carousel Controls -->
          <button class="carousel-control-prev" type="button" data-bs-target="#announcementCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#announcementCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section>
    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">

      <div class="container">

        <div class="row gy-4"> <a align="center"></a>
          <h2 align="center">Layanan Unggulan</h2>
          <p align="center">Periksa layanan hebat yang kami tawarkan</p>
          <br>

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-pen"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Buat Pengaduan</a></h4>
                <p class="description">Ajukan pengaduan mengenai masalah di lingkungan RT.</p>
              </div>
            </div>
          </div>
          <!-- End Service Item -->

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-file-earmark"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Buat Permohonan</a></h4>
                <p class="description">Ajukan permohonan administrasi dengan mudah.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-bell"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Pemberitahuan Pengumuman</a></h4>
                <p class="description">Dapatkan pengumuman terbaru dari pengurus RT.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-check-circle"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Status Permohonan dan Pengaduan</a></h4>
                <p class="description">Cek status permohonan dan pengaduan Anda.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="500">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-person"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Pencatatan Data Warga</a></h4>
                <p class="description">Data warga RT tercatat dengan rapi dan aman.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Featured Services Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p class="who-we-are">Visi dan Misi</p>
            <h3>Visi</h3>
            <p class="fst-italic">
              Membentuk kerukunan warga RT.003/008 dan memelihara lingkungan yang aman,nyaman,tentram,bersih,sehat,cerdas dan kreatif serta membangun kerjasama lingkungan yang harmonis dengan pelaksanaanya yang bertanggung jawab
            </p>
            <h3>Misi</h3>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>Menjaga kerukunan warga dengan kegiatan yg positif dan membangun</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Melayani dan memberikan pelayanan administrasi yg jujur dan transparan</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Memberikan wadah fasilitas sebagai bagian dari pengembangan bakat warga</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Bersama-sama menjaga keamanan, ketertiban dan kebersihan lingkungan</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Menjalin kerjasama yang bermanfaat dengan berbagai lembaga eksternal</span></li>
            </ul>
            <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>

          <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">
              <div class="col-lg-6">
                <img src="https://desagaprang.com/wp-content/uploads/2023/02/Arisan-Dusun.jpeg" class="img-fluid" alt="">
              </div>
              <div class="col-lg-6">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhQR2tpLokpBlJciaInPTH2eIUtVqzS0TXWC4Q-NXJwh7m91MISwm06Kzsn0pXAHufeslPuZblfcbgNe0JUS1xH1eE0xMLRnY6jwgZDf2k2r7vWz-7-Av_ApI6L41rWhCFj8cN3Y3wgkYc/s1280/WhatsApp+Image+2021-03-13+at+21.00.10%25281%2529.jpeg" class="img-fluid" alt="">
              </div>
              <div class="col-lg-6">
                <img src="https://sidomoyosid.slemankab.go.id/assets/files/artikel/sedang_1667803074WhatsApp%20Image%202022-11-07%20at%2013.36.55.jpeg" class="img-fluid" alt="">
              </div>
              <div class="col-lg-6">
                <div class="row gy-4">
                  <div class="col-lg-12">
                    <img src="https://warta.jogjakota.go.id/assets/instansi/warta/article/goid33.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="col-lg-12">
                    <img src="https://noyontaansari.pekalongankota.go.id/upload/berita/berita_20240513103436.jpeg" class="img-fluid" alt="">
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section><!-- /About Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Program dan Dokumentasi</h2>
        <p>Berikut ini adalah program kerja di lingkungan RT.003/008 Kelurahan Bantar Gebang</p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="row justify-content-between">

          <div class="col-lg-5 d-flex align-items-center">

            <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                  <i class="bi bi-people-fill"></i>
                  <div>
                    <h4 class="d-none d-lg-block">Gotong Royong</h4>
                    <p>
                      Giat Gotong Royong Bersama di RT, RW dan Kelurahan
                    </p>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                  <i class="bi bi-trash"></i>
                  <div>
                    <h4 class="d-none d-lg-block">Pengelolaan Sampah</h4>
                    <p>
                      program pembangunan Tempat Pengolahan Sampah yang menggunakan sistem reduce, reuse, recycle atau dikenal TPS-3R, program ini diharapkan dapat mengurangi angka pengangguran.
                    </p>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                  <i class="bi bi-hospital"></i>
                  <div>
                    <h4 class="d-none d-lg-block">Posyandu dan Kesehatan</h4>
                    <p>
                      acara Posyandu untuk mengetahui tumbuh kembang si kecil, sedangkan para lansia datang ke Posyandu guna mengecek kesehatan.
                    </p>
                  </div>
                </a>
              </li>
            </ul><!-- End Tab Nav -->

          </div>

          <div class="col-lg-6">

            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

              <div class="tab-pane fade active show" id="features-tab-1">
                <img src="https://silimapunggapungga.dairikab.go.id/wp-content/uploads/sites/18/2023/03/WhatsApp-Image-2023-03-17-at-15.03.591.jpeg" alt="" class="img-fluid">
              </div><!-- End Tab Content Item -->

              <div class="tab-pane fade" id="features-tab-2">
                <img src="https://visitingjogja.jogjaprov.go.id/webdinas/wp-content/uploads/2022/05/IMG_20220512_153912_642.jpg" alt="" class="img-fluid">
              </div><!-- End Tab Content Item -->

              <div class="tab-pane fade" id="features-tab-3">
                <img src="https://stkippgriponorogo.ac.id/wp-content/uploads/2022/02/WhatsApp-Image-2022-02-19-at-16.02.32-1.jpeg" alt="" class="img-fluid">
              </div><!-- End Tab Content Item -->
            </div>

          </div>

        </div>

      </div>

    </section><!-- /Features Section -->

    <!-- Footer Section -->
    <footer id="footer" class="footer section">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 col-md-6 footer-info">
            <h3>Sistem Informasi dan Manajemen RT</h3>
            <p>Kami menyediakan layanan terbaik untuk warga RT.003/008 dalam berbagai aspek kehidupan sehari-hari.</p>
          </div>
          <div class="col-lg-6 col-md-6 footer-contact">
            <h4>Hubungi Kami</h4>
            <p>
              RT.003/008 Kelurahan Bantar Gebang<br>
              Kecamatan Bantar Gebang - Kota Bekasi<br>
              <strong>Phone:</strong> +62 856-0433-1248<br>
              <strong>Email:</strong> rtbtg@gmail.com<br>
            </p>
          </div>
        </div>
      </div>
      <div class="container py-4">
        <div class="copyright">
          &copy; Copyright <strong><span>Sistem Informasi dan Manajemen RT</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="#">Kelompok 8 - PWL TI22A</a>
        </div>
      </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

  <!-- Vendor JS Files -->
<script src="<?php echo base_url('style-main/assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('style-main/assets/vendor/php-email-form/validate.js'); ?>"></script>
<script src="<?php echo base_url('style-main/assets/vendor/aos/aos.js'); ?>"></script>
<script src="<?php echo base_url('style-main/assets/vendor/glightbox/js/glightbox.min.js'); ?>"></script>
<script src="<?php echo base_url('style-main/assets/vendor/swiper/swiper-bundle.min.js'); ?>"></script>

<!-- Main JS File -->
<script src="<?php echo base_url('style-main/assets/js/main.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>
