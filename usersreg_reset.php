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
  <label for="useradm" class="col-sm-3 col-form-label">Username</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" id="useradm" name="useradm" placeholder="Username here" value="">
  </div>
</div>
