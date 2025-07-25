<?php
include("sess_check.php");
if (!defined('APP_SECURE') && (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest')) {
    die('Direct access not allowed');
}
?>
<div class="row mb-3">
    <label for="kdbrg" class="col-sm-3 col-form-label">Code</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="kdbrg" name="kdbrg" placeholder="code part">
    </div>
</div>
<div class="row mb-3">
    <label for="nmbrg" class="col-sm-3 col-form-label">Item Name</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="nmbrg" name="nmbrg" placeholder="item name">
    </div>
</div>
<div class="row mb-3">
    <label for="stok" class="col-sm-3 col-form-label">Stock</label>
    <div class="col-sm-9">
        <input type="number" class="form-control text-end" id="stok" name="stok" placeholder="stock" value="0">
    </div>
</div>
<div class="row mb-3">
    <label for="satuan" class="col-sm-3 col-form-label">Unit</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="satuan" name="satuan" placeholder="PCS/UNIT etc">
    </div>
</div>
<div class="row mb-3">
    <label for="jenis" class="col-sm-3 col-form-label">Type</label>
    <div class="col-sm-9">
        <select class="form-select" id="jenis" name="jenis">
            <option selected value="barang">Spare Part</option>
            <option value="material">Material</option>
        </select>
    </div>
</div>
<div class="row mb-3">
    <label for="ukuran" class="col-sm-3 col-form-label">Size</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="ukuran" name="ukuran" placeholder="Size">
    </div>
</div>
<div class="row mb-3">
    <label for="merk" class="col-sm-3 col-form-label">Brand</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="merk" name="merk" placeholder="brand name">
    </div>
</div>
<div class="row mb-3">
    <label for="harga" class="col-sm-3 col-form-label">Price</label>
    <div class="col-sm-9">
        <input type="number" class="form-control text-end" id="hargabrg" name="hargabrg" placeholder="price" value="0">
    </div>
</div>
<div class="row mb-3">
    <label for="hargaup" class="col-sm-3 col-form-label">Up %</label>
    <div class="col-sm-9">
        <input type="number" class="form-control text-end" id="hargaup" name="hargaup" placeholder="price" value="0">
    </div>
</div>
<div class="row mb-3">
    <label for="hargaj" class="col-sm-3 col-form-label">Sell Price</label>
    <div class="col-sm-9">
        <input type="number" class="form-control text-end" id="hargaj" name="hargaj" placeholder="price" value="0">
    </div>
</div>
<div class="row mb-3">
    <label for="ketbrg" class="col-sm-3 col-form-label">Note</label>
    <div class="col-sm-9">
        <input type="textarea" class="form-control" id="ketbrg" name="ketbrg" placeholder="type here">
    </div>
</div>
<div class="row mb-3">
    <div class="input-group mb-3">
        <label class="input-group-text" for="fotobrg">Upload</label>
        <input type="file" class="form-control" id="fotobrg" name="fotobrg" accept="image/*">
    </div>
</div>