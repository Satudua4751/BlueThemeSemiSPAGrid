<?php
session_start();
$pagetitle = "Aplikasi Online - Login";
define('APP_SECURE', true);

$btnproses = "";
$title = "Add Users";

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
              <form role="form" method="POST" action="loginauth.php" class="text-start">
                <img src="assets/images/BE-SQL-LOGO-02c.png" class="mb-4 d-flex align-items-center justify-content-center " width="245" alt="">
                <p class="mb-0">Enter your credentials to login your account</p>
                <div class="form-body my-5">

                  <div class="col-12">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="User Name">
                  </div>
                  <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group" id="show_hide_password">
                      <input type="password" class="form-control border-end-0" id="password" name="password" placeholder="Enter Password">
                      <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                      <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="d-grid">
                      <button type="submit" name="login" class="btn btn-primary waves-effect"><i class="fa-solid fa-sign-in"></i> Login</button>
                    </div>
                  </div>
                </div>
                <div class="d-flex gap-3 justify-content-center mt-4">
                </div>
                <div class="text-center py-2">
                  <div class="separator section-padding">
                    <div class="line"></div>
                    <p class="mb-0 fw-bold">OR SIGN IN WITH</p>
                    <div class="line"></div>
                  </div>
                </div>
                <div class="text-center">
                  <div class="separator section-padding">
                    <div><a href="usersreg_new.php" data_id="addnew1" id="adduser1">
                        <p class="mb-0 fw-bold">Sign up here</p>
                      </a></div>
                    <div class="line">
                      <p class="mb-0 fw-bold"></p>
                    </div>
                    <div><a href="usersreg_reset.php" data_id="rstpas1" id="resetuser1">
                        <p class="mb-0 fw-bold">Forgot Password ?</p>
                      </a></div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!--end row-->
    </div>
  </div>
  <!--authentication-->

  <!-- Modal Add -->
  <form class="form-horizontal" id="formmodal" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id"> <!-- untuk edit/delete -->
    <input type="hidden" name="form_mode" id="form_mode" value="add"> <!-- mode operasi -->
    <div class="modal fade" id="ScrollableModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header border-bottom-0  bg-info py-2">
            <h5 class="modal-title" id="modalTitle"><?php echo $title; ?> </h5>
            <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal" aria-label="Close">x</button>
            </a>
          </div>
          <div class="modal-body">
            <div id="detailadd">
              <!-- Form Add di sini -->
            </div>
            <div id="detailrst">
              <!-- Form reset di sini -->
            </div>
          </div>
          <hr class="horizontal light mt-0 mb-2">
          <div class="modal-footer border-top-0">
            <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-info waves-effect" id="btnproses"><?php echo $btnproses; ?></button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <?php include("layout_alert.php"); ?>
  
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

    // Menampilkan Add data modal
    $(document).on('click', '#adduser', function(e) {
      e.preventDefault();
      $("#ScrollableModal").modal('show');
      $.post('usersreg_new.php', {
        idadm: $(this).attr('data-id'),
        btnproses: 'Save'
      }, function(html) {
        $('#formmodal')[0].reset();
        $('#form_mode').val('add');
        $('#detailadd').show();
        $('#detailrst').hide();
        $('.modal-title').text('Add Users');
        $('#btnproses').text('Save');
        $('#detailadd').html(html);
      });
    });

    // Menampilkan Edit data modal
    $(document).on('click', '#resetuser', function(e) {
      e.preventDefault();
      $("#ScrollableModal").modal('show');
      $.post('usersreg_reset.php', {
        idadm: $(this).attr('data-id'),
        btnproses: 'Reset'
      }, function(html) {
        $('#form_mode').val('reset');
        $('#detailadd').hide();
        $('#detailrst').show();
        $('.modal-title').text('Reset Users');
        $('#btnproses').text('Send');
        $('#detailrst').html(html);
      });
    });

    //melakukan proses add edit delete
    $('#formmodal').on('submit', (function(e) {
      e.preventDefault();
      let formData = new FormData(this);
      let mode = $('#form_mode').val(); // add, edit, delete
      let url = '';
      if (mode === 'add') url = 'usersreg_insert.php';
      else if (mode === 'edit') url = 'usersreg_rst1.php';

      //alert(mode);
      $.ajax({
        url: url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
          $('#ScrollableModal').modal('hide');
          $('#addadm').focus(); // atau elemen lain di luar modal
          if (mode === 'add') {
            Lobibox.notify('success', {
              pauseDelayOnHover: true,
              size: 'mini',
              rounded: true,
              delay: 1000,
              sound: false,
              position: 'top right',
              msg: response.message || 'New Users Added!'
            });
          } else if (mode === 'reset') {
            Lobibox.notify('info', {
              pauseDelayOnHover: true,
              size: 'mini',
              rounded: true,
              delay: 1000,
              sound: false,
              position: 'top right',
              msg: response.message || 'Data user reset!'
            });
          }
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