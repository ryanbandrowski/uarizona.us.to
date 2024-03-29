<!--
* APCV 498 Senior Capstone - Spring 2023
* Virtual Tour: Historic Places & Structures
* Team: Virtoural Solutions
* Members: Ryan Bandrowski, Emerald Bismaputra, Pedro Briceno-Villegas, Carlos Gastelum
* Professor: Henry Werchan
-->
<?php

$hood = array_key_exists("hood", $_REQUEST) ? $_REQUEST["hood"] : "west-university";
$hood_dir = "hoods/" . $hood;
$hoods = array_diff(scandir("hoods/"), array('.', '..'));
$site_dir = $hood_dir . "/sites";

$fh = fopen($hood_dir . "/info.txt", "r");
if ($fh) {
  $hood_name = explode(":",trim(fgets($fh)),2)[1];
  $img1 = trim(explode(":",trim(fgets($fh)),2)[1]);
  $img2 = trim(explode(":",trim(fgets($fh)),2)[1]);
  $img3 = trim(explode(":",trim(fgets($fh)),2)[1]);
  $p1 = trim(explode(":",trim(fgets($fh)),2)[1]);
  $p2 = trim(explode(":",trim(fgets($fh)),2)[1]);
  $p3 = trim(explode(":",trim(fgets($fh)),2)[1]);
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
        <h1><a href="index.php">Virtual Tour: Historic Places & Structures</a></h1>
        <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="about.php">About</a></li>
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
            </div>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container" data-aos="fade-in">
      <h1>Welcome to Virtual Tour</h1>
      <h2><em>Places & Structures.</em></h2>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Neighborhood Section ======= -->
    <section id="featured" class="featured">
      <div class="container">

        <div class="row">
          <div class="col-xl-8 col-lg-7" data-aos="fade-up">
            <div class="content">
              <div class="row d-lg-flex py-4">
                <div class="col-xl-8 me-lg-auto text-center text-lg-start">
                  <h6 class="text-uppercase">Featured Neighborhood</h6>
                  <h3>West University</h3>
                </div>
                  <div class="col-xl-4 social-links text-center text-lg-right pt-3 pt-lg-0">
                      <!-- Twitter and linkedin are not implemented yet, removing links -->
                      <!-- I've added the option to send an email -->
                      <!--<a href="#"><i class="bx bxl-twitter"></i></a>-->
                      <a id="link_facebook" href="#"><i class="bx bxl-facebook"></i></a>
                      <a id="link_instagram" href="#"><i class="bx bxl-instagram"></i></a>
                      <a id="#" href="mailto:wunatucson@gmail.com"><i class="bx bx-envelope"></i></a>
                  </div>
              </div>
              <p>
                Located between downtown and the University of Arizona, the neighborhood is one of the last vestiges of Tucson's heritage. West University was the first Tucson suburb north of the Southwestern Pacific railroad and was settled between 1890 and 1930. As Tucson grew, the neighborhood evolved from a suburb into a historic downtown neighborhood.
              </p>
              <p>
                The neighborhood includes more than 700 buildings in a great variety of architectural styles. Most of the styles arrived with the railroad in 1880. The West University Historic District contains more early Mission Revival style residences than is generally found elsewhere in Arizona. The West University Historic District is significant to architectural development in Tucson because of its range of styles, the unique character of each structure, and the many residences and public buildings designed by Tucson's most prominent architects of the period.
              </p>
              <div class="property-img">
                <img src="assets/img/hoods/west-university/baptist-church.jpg" class="img-fluid" alt="">
              </div>
              <div class="text-center">
                <a href="neighborhoods.php" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-5 d-flex">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                  <div class="icon-box mt-4 mt-xl-0">
                    <div class="text-center">
                      <a href="neighborhoods.php" class="explore-btn">Explore all <strong>neighborhoods</strong> <i class="bi bi-geo-alt"></i></a>
                    </div>
                    <p>There are tons of ways to experience Tucson, and Tucson neighborhood's historic structures are no exception.</p>
                    <!--THREE ICONS TO EXPLORE-->
                      <div class="row contact-info mb-4">
                        <div class="col-md-4">
                          <i class="fs-4 bx bx-camera"></i>
                          <div class="text-center">Explore<br>Nearby</div>
                        </div>

                        <div class="col-md-4">
                          <i class="fs-4 bx bx-restaurant"></i>
                          <div class="text-center">Eat<br>Nearby</div>
                        </div>

                        <div class="col-md-4">
                          <i class="fs-4 bx bx-hotel"></i>
                          <div class="text-center">Stay<br>Nearby</div>
                        </div>
                      </div>
                      <!--MAP AREA-->
                      <div class="mapouter">
                        <div class="gmap_canvas">
                          <iframe width="100%" height="75%" id="gmap_canvas" src="https://maps.google.com/maps?q=west%20university%20tucson&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                          <br>
                          <style>.mapouter{position:relative;text-align:right;height:75%;width:100%;}</style>
                          <style>.gmap_canvas {overflow:hidden;background:none!important;height:75%;width:100%;}</style>
                        </div>
                      </div>
                      <!--END OF MAP AREA-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Featured Neighborhood Section -->

    <!-- ======= Near Sites Section ======= -->
    <section id="nearsites" class="nearsites section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Near Sites</h2>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col" data-aos="fade-up">
            <div class="card h-100">
              <img src="assets/img/hoods/west-university/law-offices.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Law Offices</h5>
                <p class="card-text">Built in 1905 in the architectural Mission Revival style, this pretty pink house with its wrap-around porch and handsome arched windows is one story.</p>
                <div class="read-more"><a href="sites.php?hood=west-university&site=law-offices"><i class="bi bi-arrow-right"></i> Read More</a></div>
              </div>
            </div>
          </div>
          <div class="col" data-aos="fade-up" data-aos-delay="100">
            <div class="card h-100">
              <img src="assets/img/hoods/west-university/bayless-house.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Bayless House</h5>
                <p class="card-text">In 1903 William Bayless, owner of the Carlink Ranch near Reddington, and his two sons Charles and John Stuart built this elegant residence.</p>
                <div class="read-more"><a href="sites.php?hood=west-university&site=bayless-house"><i class="bi bi-arrow-right"></i> Read More</a></div>
              </div>
            </div>
          </div>
          <div class="col" data-aos="fade-up" data-aos-delay="200">
            <div class="card h-100">
              <img src="assets/img/hoods/west-university/drachman-house.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Drachman House</h5>
                <p class="card-text">Built in1907, this American Victorian Bungalow is 1 1/2 stories, with a lava rock Tucson Mountain stone foundation, brick load-bearing walls, and beautiful gardens.</p>
                <div class="read-more"><a href="sites.php?hood=west-university&site=drachman-house"><i class="bi bi-arrow-right"></i> Read More</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Near Sites Section -->
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
          Designed by <a href="#">Vivid Solutions</a>
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