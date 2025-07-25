<?php
if (!defined('APP_SECURE')) {
    die('Direct access not allowed');
}
$title = "Add Item";

?>

<!--
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
-->

<link href="https://cdn.datatables.net/v/bs5/dt-2.3.2/b-3.2.4/b-html5-3.2.4/cr-2.1.1/date-1.5.6/r-3.0.5/rr-1.5.0/sp-2.3.4/sl-3.0.1/sr-1.4.1/datatables.min.css" rel="stylesheet" integrity="sha384-4DWSO9AjW1QxrJuyO+Of6/hUOUppxivbkkTRhNAEsK2Fs5zLuBfAlnLixGHC7adt" crossorigin="anonymous">
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" integrity="sha384-VFQrHzqBh5qiJIU0uGU5CIW3+OWpdGGJM9LBnGbuIH2mkICcFZ7lPd/AAtI7SNf7" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js" integrity="sha384-/RlQG9uf0M2vcTw3CX7fbqgbj/h8wKxw7C3zu9/GxcBPRKOEcESxaxufwRXqzq6n" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-2.3.2/b-3.2.4/b-html5-3.2.4/cr-2.1.1/date-1.5.6/r-3.0.5/rr-1.5.0/sp-2.3.4/sl-3.0.1/sr-1.4.1/datatables.min.js" integrity="sha384-VBCFY5iuTaoOOvRnyA7CzLy/tCe0ocjSZc7pySzX2ucJfF88ZiZJphpnAMOkc1zv" crossorigin="anonymous"></script>


<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Product</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"></a></li>
                <li><i class="fa-solid fa-box"></i> Inventory</li>
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
                <div class="row">
                    <div class="col-2">
                        <h5>Product List</h5>
                    </div>
                    <div class="col-2">
                        <button type="button" id="addbrg" data-id="tambah" class="btn btn-secondary waves-effect raised"><i class="fa-solid fa-plus-circle"></i> Add</button>
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                <table id="databarang" class="table table-hover" width="100%">
                    <thead class="bg-cyan-400 font-weight-bold" style="height: 40px;">
                        <tr>
                            <th width="1%">No</th>
                            <th width="4%">Code Part</th>
                            <th width="10%">Spare Part</th>
                            <th width="4%">Date</th>
                            <th width="3%">Qty</th>
                            <th width="3%">Unit</th>
                            <th width="3%">Type</th>
                            <th width="5%">Price</th>
                            <th width="3%">Image</th>
                            <th width="6%">Option</th>
                        </tr>
                    </thead>
                    <tbody id="brgbody">
                        <?php
                        include("koneksi.php");
                        include("function/format_tanggal.php");
                        include("function/format_rupiah.php");
                        $i = 1;
                        $sql = "SELECT *,(stok+qtyin-qtyout) s2 FROM barangjasa WHERE jenis != 'jasa' AND jenis != 'steam' and kdbrg <>'00000' ORDER BY nmbrg ASC";
                        $ress = mysqli_query($conn1, $sql);

                        while ($data = mysqli_fetch_array($ress)) {
                            echo '<tr>';
                            echo '<td class="text-center">' . $i . '</td>';
                            echo '<td class="text-start">' . $data['kdbrg'] . '</td>';
                            echo '<td class="text-start">' . $data['nmbrg'] . '</td>';
                            echo '<td class="text-start">' . $data['tglbeli'] . '</td>';
                            echo '<td class="text-end">' . $data['s2'] . '</td>';
                            echo '<td class="text-start">' . $data['satuan'] . '</td>';
                            if ($data['jenis'] == 'barang') {
                                echo '<td class="text-start"> Spare Part </td>';
                            } elseif ($data['jenis'] == 'material') {
                                echo '<td class="text-start"> Material </td>';
                            } elseif ($data['jenis'] == 'umum') {
                                echo '<td class="text-start"> Umum </td>';
                            }
                            echo '<td class="text-end">' . number_format($data['harga'], 2, '.', ',') . '</td>';
                            echo '<td ><img src="foto/' . $data['fotobrg'] . '" width="25px"></td>'; ?>
                            <td>
                                <button id="editbrg" data-id="<?php echo $data['kdbrg']; ?>" class="btn btn-primary raised"><i class="fa-solid fa-pencil"></i></button>
                                <button id="delebrg" data-id="<?php echo $data['kdbrg']; ?>" class="btn btn-warning raised"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        <?php echo '</td>';
                            echo '</tr>';
                            $i++;
                        }
                        ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
            <div class="card-footer text-center">
            </div>
        </div>
    </div>
</div>

<?php include 'layout_modal.php'; ?>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $("#databarang").DataTable({
            searching: true,
            bDestroy: true,
            responsive: true,
            processing: true,
            dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12't>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [{
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel"></i> ',
                    titleAttr: 'Export To Excel',
                    className: 'btn btn-success waves-effect',
                    exportOptions: {
                        modifier: {
                            page: 'current'
                        }
                    }
                },
                {
                    extend: 'pageLength',
                    text: '<i class="fa fa-book-open"></i> ',
                    className: 'btn btn-secondary waves-effect'
                }
            ],
            lengthMenu: [
                [10, 20, -1],
                [10, 20, "All"]
            ],
            pagingType: "full_numbers"
        });

        $('#databarang').parent().addClass("table-responsive");
    });

    // Menampilkan Add data modal
    $(document).on('click', '#addbrg', function(e) {
        e.preventDefault();
        $("#ScrollableModalAdd").modal('show');
        $.post('mstbarang_add.php', {
            kdbrg: $(this).attr('data-id'),
            btnproses: 'Save'
        }, function(html) {
            $('.modal-title').text('Add Item');
            $('#detailadd').html(html);
        });
    });

    // Menampilkan Edit data modal
    $(document).on('click', '#editbrg', function(e) {
        e.preventDefault();
        $("#ScrollableModalEdit").modal('show');
        $.post('mstbarang_edit.php', {
            kdbrg: $(this).attr('data-id'),
            btnproses: 'Update'
        }, function(html) {
            $('.modal-title').text('Edit Item');
            $('#detailedit').html(html);
        });
    });

    // Menampilkan Delete data modal
    $(document).on('click', '#delebrg', function(e) {
        e.preventDefault();
        $("#ScrollableModalDelete").modal('show');
        $.post('mstbarang_del.php', {
            kdbrg: $(this).attr('data-id'),
        }, function(html) {
            $('.modal-title').text('Delete Item');
            $('#detailhapus').html(html);
        });
    });

    //melakukan proses add edit delete
    $('#formmodaladd').on('submit', (function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        //alert(mode);
        $.ajax({
            url: 'mstbarang_insert.php',
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                $('#ScrollableModalAdd').modal('hide');
                Lobibox.notify('success', {
                    pauseDelayOnHover: true,
                    size: 'mini',
                    rounded: true,
                    delay: 1000,
                    sound: false,
                    position: 'top right',
                    msg: response.message || 'New Product added!'
                });
                load_data(); // refresh tabel}
            },
            error: function(xhr) {
                Lobibox.notify('error', {
                    size: 'mini',
                    rounded: true,
                    delay: 1000,
                    sound: false,
                    icon: 'bx bx-error', // gunakan icon lain jika mau
                    title: 'Error Informasion',
                    msg: 'problem : ' + xhr.responseText
                });
            }
        })
    }));

    //melakukan proses add edit delete
    $('#formmodaledit').on('submit', (function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        //alert(mode);
        $.ajax({
            url: 'mstbarang_update.php',
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                $('#ScrollableModalEdit').modal('hide');
                Lobibox.notify('info', {
                    pauseDelayOnHover: true,
                    size: 'mini',
                    rounded: true,
                    delay: 1000,
                    sound: false,
                    position: 'top right',
                    msg: response.message || 'Data updated!'
                });

                load_data(); // refresh tabel}
            },
            error: function(xhr) {
                Lobibox.notify('error', {
                    size: 'mini',
                    rounded: true,
                    delay: 1000,
                    sound: false,
                    icon: 'bx bx-error', // gunakan icon lain jika mau
                    title: 'Error Informasion',
                    msg: 'problem : ' + xhr.responseText
                });
            }
        })
    }));

    //melakukan proses add edit delete
    $('#formmodaldelete').on('submit', (function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        //alert(mode);
        $.ajax({
            url: 'mstbarang_delete.php',
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                $('#ScrollableModalDelete').modal('hide');
                Lobibox.notify('warning', {
                    pauseDelayOnHover: true,
                    size: 'mini',
                    rounded: true,
                    delay: 1000,
                    sound: false,
                    position: 'top right',
                    msg: response.message || 'Data Deleted!'
                });
                load_data(); // refresh tabel}
            },
            error: function(xhr) {
                Lobibox.notify('error', {
                    size: 'mini',
                    rounded: true,
                    delay: 1000,
                    sound: false,
                    icon: 'bx bx-error', // gunakan icon lain jika mau
                    title: 'Error Informasion',
                    msg: 'problem : ' + xhr.responseText
                });
            }
        })
    }));

    function load_data() {
        $.ajax({
            url: 'mstbarang_load.php',
            type: 'POST',
            data: {
                action: 'getfilter'
            }, // jika perlu
            success: function(response) {
                $('#halaman2').html(response);
            },
            error: function(xhr) {
                console.log('Gagal memuat data: ' + xhr.responseText);
            }
        });
    }
</script>