<?php
include("sess_check.php");

if (!defined('APP_SECURE') && (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest')) {
    die('Direct access not allowed');
}
$idadm = $_REQUEST['idadm'];
$sql = "SELECT * FROM users WHERE idadm ='" . $idadm . "'";
$result = mysqli_query($conn1, $sql);
$data = mysqli_fetch_array($result);
$rolesel = $data['roleadm'];

?>

<div class="row mb-3">
    <label for="nmadm" class="col-sm-3 col-form-label">Name</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="nmadm" name="nmadm" placeholder="name" value="<?php echo $data['nmadm']; ?>">
        <input type="hidden" class="form-control" id="idadm" name="idadm" value="<?php echo $data['idadm']; ?>">
        <input type="hidden" class="form-control" id="idkas" name="idkas" value="1" readonly> 
    </div>
</div>
<div class="row mb-3">
    <label for="telpadm" class="col-sm-3 col-form-label">Phone</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="telpadm" name="telpadm" placeholder="Phone number here" value="<?php echo $data['telpadm']; ?>">
    </div>
</div>
<div class="row mb-3">
    <label for="useradm" class="col-sm-3 col-form-label">Username</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="useradm" name="useradm" placeholder="Username here" value="<?php echo $data['useradm']; ?>">
    </div>
</div>
<div class="row mb-3">
    <label for="passadm" class="col-sm-3 col-form-label">Password</label>
    <div class="col-sm-9">
        <input type="password" class="form-control" id="passadm" name="passadm" placeholder="Password here">
    </div>
</div>
<div class="row mb-3">
    <label for="passadm" class="col-sm-3 col-form-label">Confirm Password</label>
    <div class="col-sm-9">
        <input type="password" class="form-control" id="passadm1" name="passadm1" placeholder="Password here">
    </div>
</div>
<div class="row mb-3">
    <label for="roleadm" class="col-sm-3 col-form-label">Role</label>
    <div class="col-sm-9">
        <select class="form-select" id="roleadm" name="roleadm">
            <option value="admin" <?php if ($rolesel === "admin") echo " selected"; ?>>Admin</option>
            <option value="akun" <?php if ($rolesel === "akun") echo " selected"; ?>>Akun</option>
            <option value="operator" <?php if ($rolesel === "operator") echo " selected"; ?>>Operator</option>
        </select>
    </div>
</div>
<div class="row mb-3">
    <label for="fotobrg1" class="col-sm-3 col-form-label">Image</label>
    <div class="col-sm-9">
        <img src="foto/<?php echo $data['fotoadm']; ?>" alt="fotoadm" class="rounded-3 mb-2" height="250" width="auto">
    </div>
</div>
<div class="row mb-3">
    <div class="input-group mb-3">
        <label class="input-group-text" for="fotoadm">Upload</label>
        <input type="file" class="form-control" id="fotoadm" name="fotoadm" accept="image/*" value="<?php echo $data['fotoadm']; ?>">
        <input type="hidden" class="form-control" id="fotoadm1" name="fotoadm1" accept="image/*" value="<?php echo $data['fotoadm']; ?>">
    </div>
</div>