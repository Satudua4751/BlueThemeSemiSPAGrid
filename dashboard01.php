<?php

include("sess_check.php");
// Initialize the session
// Tambahkan header agar halaman tidak di-cache oleh browser
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proksi
define('APP_SECURE', true);

$pagetitle = "Aplikasi Online";
$userslg = $_SESSION['ccc'];
$idadm = $_SESSION['ddd'];

$sql = "SELECT * FROM users WHERE idadm ='" . $idadm . "' LIMIT 1";
$result = mysqli_query($conn1, $sql);
$data = mysqli_fetch_array($result);
$roleadm = $data['roleadm'];
$fotoadm = $data['fotoadm'];
$nmadm = $data['nmadm'];
?>
<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $pagetitle; ?> </title>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.png" type="image/png">
  <?php include 'layout_css01.php'; ?>
</head>

<body>
  <!--start header-->
  <header class="top-header">
    <?php include 'layout_navbar.php'; ?>
  </header>
  <!--end top header-->

  <!--start sidebar-->
  <aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
      <div class="logo-icon">
        <img src="assets/images/BE-SQL-LOGO-01c.png" class="logo-img" alt="">
      </div>
      <div class="logo-name flex-grow-1">
        <h5 class="mb-0">BE-SQL</h5>
      </div>
      <div class="sidebar-close">
        <span class="material-icons-outlined">close</span>
      </div>
    </div>
    <div class="sidebar-nav">
      <!--navigation-->
      <?php
      switch ($userslg) {
        case 'admin':
          include 'layout_sidebar01.php';
          break;
        case 'akun':
          include 'layout_sidebar01.php';
          break;
        case 'operator':
          include 'layout_sidebar02.php';
          break;
      }
      ?>
      <!--end navigation-->
    </div>
  </aside>
  <!--end sidebar-->

  <!--start main wrapper-->
  <main class="main-wrapper">
    <div class="main-content">

      <!--Content -->
      <div id="halaman2"></div>
      <!--End Content-->
    </div>


  </main>
  <!--end main wrapper-->

  <!--start footer-->
  <?php include 'layout_footer.php'; ?>
  <!--end footer-->

  <!--start cart-->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart"></div>
  <!--end cart-->

  <!--start overlay-->
  <div class="overlay btn-toggle"></div>
  <!--end overlay-->

  <!--start switcher-->
  <button class="btn btn-info position-fixed bottom-0 end-0 m-3 d-flex align-items-center gap-2  waves-effect"
    type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop">
    <i class="material-icons-outlined">tune</i>
  </button>

  <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="staticBackdrop">
    <div class="offcanvas-header border-bottom h-70">
      <div class="">
        <h5 class="mb-0">Theme Customizer</h5>
        <p class="mb-0">Customize your theme</p>
      </div>
      <a href="javascript:;" class="primary-menu-close" data-bs-dismiss="offcanvas">
        <i class="material-icons-outlined">close</i>
      </a>
    </div>
    <div class="offcanvas-body">
      <div>
        <p>Theme variation</p>
        <div class="row g-3">
          <div class="col-6 col-xl-6">
            <input type="radio" class="btn-check" name="theme-options" id="BlueTheme" checked>
            <label
              class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4  waves-effect"
              for="BlueTheme">
              <span class="material-icons-outlined">contactless</span>
              <span>Blue</span>
            </label>
          </div>
          <div class="col-12 col-xl-6">
            <input type="radio" class="btn-check" name="theme-options" id="LightTheme">
            <label
              class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4  waves-effect"
              for="LightTheme">
              <span class="material-icons-outlined">light_mode</span>
              <span>Light</span>
            </label>
          </div>

        </div><!--end row-->

      </div>
    </div>
  </div>
  <!--start switcher-->

  <?php include 'layout_js01.php'; ?>

</body>

</html>