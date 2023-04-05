<!--
* APCV 498 Senior Capstone - Spring 2023
* Virtual Tour: Historic Places & Structures
* Team: Virtoural Solutions
* Members: Ryan Bandrowski, Emerald Bismaputra, Pedro Briceno-Villegas, Carlos Gastelum
* Professor: Henry Werchan
-->
<?php

$hood = $_REQUEST["hood"];
$site = $_REQUEST["site"];
$hood_dir = "hoods/" . $hood;
$hoods = array_diff(scandir("hoods/"), array('.', '..'));
$site_dir = $hood_dir . "/sites";

$fh = fopen($site_dir . "/" . $site . ".txt", "r");
if ($fh) {
  $name = explode(":",trim(fgets($fh)),2)[1];
  $desc = explode(":",trim(fgets($fh)),2)[1];
  $sig = explode(":",trim(fgets($fh)),2)[1];
  $phys = explode(":",trim(fgets($fh)),2)[1];
  $loc = explode(":",trim(fgets($fh)),2)[1];
  $own = explode(":",trim(fgets($fh)),2)[1];
  $style = explode(":",trim(fgets($fh)),2)[1];
  $map = explode(":",trim(fgets($fh)),2)[1];
}
fclose($fh);

$sites = array_diff(scandir($site_dir), array('.', '..'));

$fh = fopen($hood_dir . "/info.txt", "r");
if ($fh) {
  $hood_name = explode(":",trim(fgets($fh)),2)[1];
}
fclose($fh);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Virtual Tour: Historic Places & Structures</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.html">Virtual Tour: Historic Places & Structures</a></h1>
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.html">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li class="nav-item dropdown">            
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Neighborhoods
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <?php
              foreach($hoods as $h) {
                
                $fh = fopen("hoods/".$h."/info.txt", "r");

                if ($fh) {
                  $h_name = trim(explode(":",trim(fgets($fh)),2)[1]);
                }
              ?>
                <a class="dropdown-item" href=<?= "neighborhoods.php?hood=".$h ?>><?= ucwords($h_name) ?></a>
              <?php
              }
              ?>
              <!-- <a class="dropdown-item" href="neighborhoods.php?hood=wu">West University</a> -->
              <!-- <a class="dropdown-item" href="neighborhoods.php?hood=jp">Jefferson Park</a> -->
            </div>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <h1><a href=<?= "neighborhoods.php?hood=".$hood ?>><?= strtoupper($hood_name) ?></a></h1>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Single Neighborhood Section ======= -->
    <section id="neighborhood" class="neighborhood">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src=<?= "assets/img/properties/property-".$hood."-".$site.".jpg" ?> alt="" class="img-fluid">
              </div>

              <h2 class="entry-title"><?= $name ?></h2>

              <div class="entry-content">
                <h6>Description:</h6>
                <p><?= $desc ?></p>

                <h6>Statement of Significance:</h6>
                <p><?= $sig ?></p>

                <h6>Physical Description:</h6>
                <p><?= $phys ?></p>

                <h6>Location:</h6>
                <p>
                  <?= $loc ?><br>
                  <a href=<?= "'" . $map . "'" ?> target="_blank">Open in Maps</a>
                </p>

                <h6>Owner:</h6>
                <p><?= $own ?></p>

                <h6>Style or Cultural Period:</h6>
                <p><?= $style ?></p>

                <div class="read-more mb-4">
                  <a href=<?= "neighborhoods.php?hood=" . $hood ?>><?= "Back to ".ucwords($hood_name) ?></a>
                </div>
              </div>

              <div class="entry-footer">
              </div>

            </article><!-- End of Single Neighborhood Entry -->

          </div>

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Historic Places & Structures</h3>
              <div class="sidebar-item recent-posts">
                <?php
                foreach($sites as $file) {

                  $fh = fopen($site_dir . "/" . $file, "r");

                  if ($fh) {
                    $site_name = explode(":",trim(fgets($fh)),2)[1];
                  }

                  $site_var = explode(".", $file, 2)[0];
                  $site_img = "assets/img/properties/property-" . $hood . "-" . $site_var . ".jpg";
                  $site_link = "sites.php?hood=" . $hood . "&site=" . $site_var;
                  ?>
                  <div class="post-item clearfix">
                    <img src=<?= $site_img ?> alt="">
                    <h4><a href=<?= $site_link ?>><?= $site_name ?></a></h4>
                  </div>
                <?php
                }
                ?>

              </div><!-- End sidebar recent posts-->

            </div><!-- End sidebar -->

          </div><!-- End neighborhood sidebar -->

        </div>

      </div>
    </section><!-- End neighborhood Single Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

<!-- Footer Top-->

    <div class="container d-lg-flex py-4">

      <div class="me-lg-auto text-center text-lg-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Virtual Tour: Historic Places & Structures</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="#">Virtoural Solutions</a>
        </div>
      </div>
      <div class="social-links text-center text-lg-right pt-3 pt-lg-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>