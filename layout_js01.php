<?php
if (!defined('APP_SECURE')) {
  die('Direct access not allowed');
}
?>

<script src="assets/js/pageloader.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    loadhome();

    function loadhome() {
      var action = 'getfilter';
      $.ajax({
        type: 'POST',
        url: "home01.php",
        data: {
          action: action
        },
        success: function(html) {
          $("#halaman2").html(html);
        }
      });
    }
  });
</script>

<!-- Bootstrap Bundle from CDN -->
<script src="assets/js/bootstrap.bundle.js"></script>

<!--plugins-->
<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="assets/plugins/metismenu/metisMenu.min.js"></script>
<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="assets/plugins/peity/jquery.peity.min.js"></script>

<!--notification js -->
<script src="assets/plugins/notifications/js/lobibox.min.js"></script>
<script src="assets/plugins/notifications/js/notifications.min.js"></script>
<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>

<!--select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="assets/plugins/select2/js/select2-custom.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/waves.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs/Sortable.min.js"></script>

<!-- Tambahkan di akhir <body> atau sebelum kode JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>


<script>
  $(".data-attributes span").peity("donut")
  Waves.init();
</script>