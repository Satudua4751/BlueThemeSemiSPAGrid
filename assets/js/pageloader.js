$(document).ready(
  function () {
    // initial
    // handle menu
    $('#mymenu a').click(function (e) {
      e.preventDefault();
      const page = $(this).attr('href');

      //$('#halaman2').html('<p>Memuat halaman...</p>'); // Optional: loader

      $('#halaman2').load('loader.php?page=' + page, function (response, status, xhr) {
        if (status === "error") {
          Lobibox.notify('error', {
            size: 'mini',
            rounded: true,
            delay: 1000,
            sound: false,
            icon: 'bx bx-error', // gunakan icon lain jika mau
            title: 'Gagal Memuat Halaman',
            msg: `Halaman <strong>${page}.php</strong> tidak ditemukan atau gagal dimuat. (Error ${xhr.status})`
          });

          // Optional: kosongkan halaman2 agar tidak tampil pesan error HTML dari server
          $('#halaman2').html('');
        } else {
          // ✅ Jalankan modul jika ada halaman khusus
          //if (page === 'mstbarang01') {
          //  import(`./mstbarang01.js`).catch(console.error);
          //}
        }
      });
    });
  }
);

// Jquery Dependency
$("input[data-type='currency']").on({
  keyup: function () {
    formatCurrency($(this));
  },
  blur: function () {
    formatCurrency($(this), "blur");
  }
});

function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}

function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.

  // get input value
  var input_val = input.val();

  // don't validate empty input
  if (input_val === "") { return; }

  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");

  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);

    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }

    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = "$" + left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = "$" + input_val;

    // final formatting
    if (blur === "blur") {
      input_val += ".00";
    }
  }

  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}


