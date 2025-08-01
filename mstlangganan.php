<?php
if (!defined('APP_SECURE')) {
    die('Direct access not allowed');
}
$btnproses = "";
$title = "Add Customer";
?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Customer</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"></a></li>
                <li><i class="fa-solid fa-industry"></i> Customer</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group" role="group">
        </div>
    </div>
</div>
<!--end breadcrumb-->

<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card shadow-white">
            <div class="card-header p-4">
                <h5 class="mb-4">Data Langganan</h5>
            </div>
            <div class="card-body p-4">
                <div class="row mb-3">
                    <label for="input35" class="col-sm-3 col-form-label">Enter Your Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="input35" placeholder="Enter Your Name">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="input36" class="col-sm-3 col-form-label">Phone No</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="input36" placeholder="Phone No">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="input37" class="col-sm-3 col-form-label">Email Address</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="input37" placeholder="Email Address">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="input38" class="col-sm-3 col-form-label">Choose Password</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="input38" placeholder="Choose Password">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="input39" class="col-sm-3 col-form-label">Select Country</label>
                    <div class="col-sm-9">
                        <select class="form-select" id="input39">
                            <option selected="">Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="input40" class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="input40" rows="3" placeholder="Address"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="input41">
                            <label class="form-check-label" for="input41">Check me out</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="button" class="btnmd btnmd-success px-4"><i class="fa-solid fa-save"></i> Submit</button>
                            <button type="button" class="btnmd btnmd-info px-4"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
            </div>
        </div>
    </div>
</div>