<?php
if (!defined('APP_SECURE') && (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest')) {
    die('Direct access not allowed');
}
?>
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
            <option value="admin">Admin</option>
            <option value="akun">Akun</option>
            <option value="operator">Operator</option>
        </select>
    </div>
</div>
<div class="row mb-3">
    <div class="input-group mb-3">
        <label class="input-group-text" for="fotoadm">Upload</label>
        <input type="file" class="form-control" id="fotoadm" name="fotoadm" accept="image/*">
    </div>
</div>
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