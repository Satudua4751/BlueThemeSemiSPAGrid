<?php
if (!defined('APP_SECURE') && (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest')) {
    die('Direct access not allowed');
}
?>
<div class="row mb-3">
    <label for="nmspl" class="col-sm-3 col-form-label">Supplier Name</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="nmspl" name="nmspl" placeholder="name">
    </div>
</div>
<div class="row mb-3">
    <label for="almtspl" class="col-sm-3 col-form-label">Address</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="almtspl" name="almtspl" placeholder="Address here">
    </div>
</div>
<div class="row mb-3">
    <label for="pkp" class="col-sm-3 col-form-label">Type PKK</label>
    <div class="col-sm-9">
        <select class="form-select" id="pkp" name="pkp">
            <option value="pkp">PKP</option>
            <option selected value="nonpkp">NON-PKP</option>
        </select>
    </div>
</div>
<div class="row mb-3">
    <label for="telpspl" class="col-sm-3 col-form-label">Phone Number</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="telpspl" name="telpspl" placeholder="Phone Number here">
    </div>
</div>
<div class="row mb-3">
    <label for="npwp" class="col-sm-3 col-form-label">NPWP</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="npwp" name="npwp" placeholder="0000 0000 0000 0000">
    </div>
</div>
