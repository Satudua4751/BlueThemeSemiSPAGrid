<!-- LogoutModal -->
<div class="modal fade shadow-white" id="logoutModal" data-bs-backdrop="static" data-bs-keyboard="false" data-bs-keyboard="false" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content shadow-white">
      <div class="modal-header bg-gray-200 ">
        <h5 class="modal-title text-xm font-weight-bold text-info text-uppercase text text-shadow1" id="logoutModalLabel">Log out</h5>
        <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal" aria-label="Close">x</button>
      </div>
      <div class="modal-body">
        Yakin nih exit program ?
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-warning waves-effect" data-bs-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</a>
        <a type="button" class="btn btn-danger waves-effect d-sm-inline d-none" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign Out</a>
      </div>
    </div>
  </div>
</div>
<!-- end LogoutModal -->
<!--start footer-->
<footer class="page-footer">
  <div class="container-fluid">
    <div class="row align-items-center justify-content-lg-between">
      <div class="col-lg-6 mb-lg-0 mb-4">
        <div class="copyright text-center text-sm text-muted text-lg-start">
          © <script>
            document.write(new Date().getFullYear())
          </script>
          <i class="fa fa-heart" style="color: red" ;></i> by
          <a href="#" class="font-weight-bold" target="_blank"></a> & Modification by
          <a href="#" class="font-weight-bold" target="_blank"> Be SQL</a>
          for a better web.
        </div>
      </div>
      <div class="col-lg-6">
        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
          <li class="nav-item">
            <a href="" class="nav-link text-muted" target="_blank"></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<!--end footer-->