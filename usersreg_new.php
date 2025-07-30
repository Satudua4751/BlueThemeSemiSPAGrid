<?php
session_start();
$pagetitle = "Aplikasi Online - Login";
define('APP_SECURE', true);

$btnproses = "";
$title = "Register Users";

if (!defined('APP_SECURE') && (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest')) {
  die('Direct access not allowed');
}
?>

<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $pagetitle; ?> </title>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.png" type="image/png">
  <?php include 'layout_csslogin01.php'; ?>
  <!-- jQuery dulu -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!--notification js -->
  <script src="assets/js/sweetalert2.all.min.js"></script>

</head>

<body>
  <!--authentication-->
  <div class="auth-basic-wrapper d-flex align-items-center justify-content-center">
    <div class="container-fluid my-5 my-lg-0">
      <div class="row">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
          <div class="card rounded-4 mb-0 shadow-white">
            <div class="card-body p-5">
              <form role="formr" id="formreg" method="POST" action="" class="text-start">
                <img src="assets/images/BE-SQL-LOGO-02c.png" class="mb-4 d-flex align-items-center justify-content-center " width="245" alt="">
                <p class="mb-0">Register your account</p>
                <div class="form-body my-5">
                  <div class="row mb-3">
                    <label for="nmadm" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="nmadm" name="nmadm" placeholder="name">
                      <input type="hidden" class="form-control" id="idkas" name="idkas" value="1" readonly>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="telpadm" class="col-sm-3 col-form-label">Phone</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="telpadm" name="telpadm" placeholder="Phone number here">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="useradm" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="useradm" name="useradm" placeholder="Username here" value="">
                    </div>
                  </div>
                  <div class="input-group mb-3" id="show_hide_password">
                    <label for="passadm" class="col-sm-3 col-form-label">Password</label>
                    <input type="password" class="form-control ms-1" id="passadm" name="passadm" placeholder="Password here" value="">
                    <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                  </div>

                  <div class="row mb-3">
                    <label for="passadm1" class="col-sm-3 col-form-label">Conform Password</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="passadm1" name="passadm1" placeholder="Password here">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="role" class="col-sm-3 col-form-label">Role</label>
                    <div class="col-sm-9">
                      <select class="form-select" id="role" name="role">
                        <option selected value="operator">Operator</option>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="input-group mb-3">
                      <label class="input-group-text" for="fotoadm">Upload</label>
                      <input type="file" class="form-control" id="fotoadm" name="fotoadm" accept="image/*">
                    </div>
                  </div>
                  <div class="col-12">
                    <a href="index.php" class="btn btn-warning"><i class="fa-solid fa-arrow-rotate-left"></i> Back</a>
                    <button type="submit" name="register" class="btn btn-primary waves-effect"><i class="fa-solid fa-sign-in"></i> Register</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap Bundle from CDN -->
  <script src="assets/js/bootstrap.bundle.js"></script>
  <script src="assets/js/waves.min.js"></script>

  <!--notification js -->
  <script src="assets/plugins/notifications/js/lobibox.min.js"></script>
  <script src="assets/plugins/notifications/js/notifications.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass("bi-eye-slash-fill");
          $('#show_hide_password i').removeClass("bi-eye-fill");
        } else if ($('#show_hide_password input').attr("type") == "password") {
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("bi-eye-slash-fill");
          $('#show_hide_password i').addClass("bi-eye-fill");
        }
      });
    });
  </script>
  <script>
    $('#formreg').on('submit', (function(e) {
      e.preventDefault();
      let formData = new FormData(this);
      $.ajax({
        url: 'usersreg_newinsert.php',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
          Lobibox.notify('success', {
            pauseDelayOnHover: true,
            size: 'mini',
            rounded: true,
            delay: 1000,
            sound: false,
            position: 'top right',
            msg: response.message || 'New Users Added!'
          });
        },
        error: function(xhr) {
          Lobibox.notify('error', {
            size: 'mini',
            rounded: true,
            delay: 1000,
            sound: false,
            icon: 'bx bx-error', // gunakan icon lain jika mau
            title: 'Error Informasion',
            msg: 'problem : ' + xhr.responseText
          });
        }
      })
    }));
    Waves.init();
  </script>
</body>

</html>