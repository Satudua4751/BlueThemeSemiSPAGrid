<?php
include("sess_check.php");

if (!defined('APP_SECURE') && (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest')) {
    die('Direct access not allowed');
}
$kdbrg = $_REQUEST['kdbrg'];
$sql = "SELECT * FROM barangjasa WHERE kdbrg ='" . $kdbrg . "'";
$result = mysqli_query($conn1, $sql);
$data = mysqli_fetch_array($result);
$jnsselected = $data['jenis'];

?>

<div class="row mb-3">
    <label for="kdbrg" class="col-sm-3 col-form-label">Code</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="kdbrg" name="kdbrg" placeholder="code part" value="<?php echo $data['kdbrg']; ?>">
    </div>
</div>
<div class="row mb-3">
    <label for="nmbrg" class="col-sm-3 col-form-label">Item Name</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="nmbrg" name="nmbrg" placeholder="item name" value="<?php echo $data['nmbrg']; ?>">
    </div>
</div>
<div class="row mb-3">
    <label for="stok" class="col-sm-3 col-form-label">Stock</label>
    <div class="col-sm-9">
        <input type="number" class="form-control text-end" id="stok" name="stok" placeholder="stock" value="<?php echo $data['stok']; ?>">
    </div>
</div>
<div class="row mb-3">
    <label for="satuan" class="col-sm-3 col-form-label">Unit</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="satuan" name="satuan" placeholder="PCS/UNIT etc" value="<?php echo $data['satuan']; ?>">
    </div>
</div>
<div class="row mb-3">
    <label for="input39" class="col-sm-3 col-form-label">Type</label>
    <div class="col-sm-9">
        <select class="form-select" id="jenis" name="jenis">
            <option value="barang" <?php if ($jnsselected === "barang") echo " selected"; ?>>Suku Cadang</option>
            <option value="material" <?php if ($jnsselected === "material") echo " selected"; ?>>Material</option>
            <option value="umum" <?php if ($jnsselected === "umum") echo " selected"; ?>>Umum</option>
        </select>
    </div>
</div>
<div class="row mb-3">
    <label for="ukuran" class="col-sm-3 col-form-label">Size</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="ukuran" name="ukuran" placeholder="Size" value="<?php echo $data['ukuran']; ?>">
    </div>
</div>
<div class="row mb-3">
    <label for="merk" class="col-sm-3 col-form-label">Brand</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="merk" name="merk" placeholder="brand name" value="<?php echo $data['merk']; ?>">
    </div>
</div>
<div class="row mb-3">
    <label for="harga" class="col-sm-3 col-form-label">Price</label>
    <div class="col-sm-9">
        <input type="number" class="form-control text-end" id="hargabrg" name="hargabrg" placeholder="price" value="<?php echo $data['harga']; ?>">
    </div>
</div>
<div class="row mb-3">
    <label for="hargaup" class="col-sm-3 col-form-label">Up %</label>
    <div class="col-sm-9">
        <input type="number" class="form-control text-end" id="hargaup" name="hargaup" placeholder="price" value="<?php echo $data['hargaup']; ?>">
    </div>
</div>
<div class="row mb-3">
    <label for="hargaj" class="col-sm-3 col-form-label">Sell Price</label>
    <div class="col-sm-9">
        <input type="number" class="form-control text-end" id="hargaj" name="hargaj" placeholder="price" value="0" value="<?php echo $data['hargaj']; ?>">
    </div>
</div>
<div class="row mb-3">
    <label for="ketbrg" class="col-sm-3 col-form-label">Note</label>
    <div class="col-sm-9">
        <input type="textarea" class="form-control" id="ketbrg" name="ketbrg" placeholder="type here" value="<?php echo $data['ketbrg']; ?>">
    </div>
</div>
<div class="row mb-3">
    <label for="fotobrg1" class="col-sm-3 col-form-label">Image</label>
    <div class="col-sm-9">
        <img src="foto/<?php echo $data['fotobrg']; ?>" alt="fotobrg" class="rounded-3 mb-2" height="250" width="auto">
    </div>
</div>
<div class="row mb-3">
    <label for="fotobrg" class="form-label">Image/File</label>
    <div class="col">
        <input type="file" id="fotobrg" name="fotobrg" class="form-control" accept="image/*" value="<?php echo $data['fotobrg']; ?>">
        <input type="hidden" id="fotobrg1" name="fotobrg1" class="form-control" value="<?= htmlspecialchars($data['fotobrg']) ?>">
    </div>
</div>