<?php
if (!defined('APP_SECURE')) {
  die('Direct access not allowed');
}
?>

<!-- loader
<link rel="stylesheet" href="assets/css/pace.min.css">
<script src="assets/js/pace.min.js"></script>-->

<!--plugins-->
<link rel="stylesheet" href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
<link rel="stylesheet" type="text/css" href="assets/plugins/metismenu/metisMenu.css">
<link rel="stylesheet" type="text/css" href="assets/plugins/metismenu/mm-vertical.css">
<link rel="stylesheet" type="text/css" href="assets/plugins/simplebar/css/simplebar.css">
<link rel="stylesheet" href="assets/plugins/notifications/css/lobibox.min.css">

<!--bootstrap css-->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


<link rel="stylesheet" href="assets/dist/styles/css/slick.customtooltip.css" type="text/css" />
<link rel="stylesheet" href="assets/dist/styles/css/slick.columnpicker.css" type="text/css" />
<link rel="stylesheet" href="assets/dist/styles/css/slick.gridmenu.css" type="text/css" />
<link rel="stylesheet" href="assets/dist/styles/css/slick.pager.css" type="text/css" />
<link rel="stylesheet" href="assets/dist/styles/css/slick-icons.css" type="text/css" />

<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!--main css

-->
<link rel="stylesheet" href="assets/css/bootstrap-extended.css">
<link rel="stylesheet" href="sass/main.css?v=1.0.5">
<link rel="stylesheet" href="assets/css/waves.css">
<link rel="stylesheet" href="assets/css/stylehover.css?v=1.0.1">

<link rel="stylesheet" href="sass/blue-theme.css?v=1.0.5">
<link rel="stylesheet" href="sass/responsive.css">

<!-- Tambahkan di <head> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" type="text/css" />

<!-- jQuery dulu -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
  .cell-title {
    font-weight: 600;
  }

  .cell-effort-driven {
    justify-content: center;
  }

  .cell-selection {
    border-right-color: silver;
    border-right-style: solid;
    color: gray;
    text-align: right;
    font-size: 10px;
    padding-right: 6px;
  }

  .slick-row.selected .cell-selection {
    background-color: transparent;
    /* show default selected row background */
  }

  .slick-header-column:nth-child(1) {
    justify-content: center;
  }

  .alpine-theme .slick-column-groupable {
    height: 1em;
    width: 1em;
    mask-size: 1em;
    -webkit-mask-size: 1em;
  }

  .btn-alpine-theme {
    background-color: gray;
    color: white;
    border-width: 1px;
    border-radius: 2px;
    height: 22px;
  }

  .sgi-search:hover {
    cursor: pointer;
    color: darkcyan;
  }

  /* change to flex-end for RTL support */
  .slick-container {
    --alpine-header-justify-content: flex-start;
    --alpine-cell-justify-content: flex-start;
  }

  .tooltip-2cols-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr;
    column-gap: 5px;
    line-height: 20px;
  }
</style>