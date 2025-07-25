<?php
if (!defined('APP_SECURE')) {
    die('Direct access not allowed');
}
$btnproses = "";
$title = "Add Users";
?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Registration</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"></a></li>
                <li><i class="fa-solid fa-users"></i> Users</li>

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
                <h5 class="modal-title"><?php echo $title; ?></h5>
                <button type="button" id="addadm" data-id="tambah" class="btn btn-secondary waves-effect raised"><i class="fa-solid fa-plus-circle"></i> Add</button>
            </div>
            <div class="card-body p-4">
                <table id="dataadm" class="table table-hover" width="100%">
                    <thead class="bg-cyan-400 font-weight-bold" style="height: 40px;">
                        <tr>
                            <th width="1%">No</th>
                            <th width="10%">Name</th>
                            <th width="4%">Phone</th>
                            <th width="3%">Role</th>
                            <th width="3%">Foto</th>
                            <th width="6%">Opsi</th>
                        </tr>
                    </thead>
                    <tbody id="admbody">
                        <?php
                        include("koneksi.php");
                        $i = 1;
                        $sql = "SELECT * FROM users ORDER BY nmadm ASC";
                        $ress = mysqli_query($conn1, $sql);

                        while ($data = mysqli_fetch_array($ress)) {
                            echo '<tr>';
                            echo '<td class="text-center">' . $i . '</td>';
                            echo '<td class="text-start">' . $data['nmadm'] . '</td>';
                            echo '<td class="text-start">' . $data['telpadm'] . '</td>';
                            echo '<td class="text-start">' . $data['roleadm'] . '</td>';
                            echo '<td ><img src="foto/' . $data['fotoadm'] . '" width="25px"></td>'; ?>
                            <td>
                                <button id="editadm" data-id="<?php echo $data['idadm']; ?>" class="btn btn-primary raised"><i class="fa-solid fa-pencil"></i></button>
                                <button id="deleadm" data-id="<?php echo $data['idadm']; ?>" class="btn btn-warning raised"><i class="fa-solid fa-trash"></i></button>
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

<!-- Modal Add -->
<form class="form-horizontal" id="formmodal" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id"> <!-- untuk edit/delete -->
    <input type="hidden" name="form_mode" id="form_mode" value="add"> <!-- mode operasi -->
    <div class="modal fade" id="ScrollableModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 bg-grd-info py-2">
                    <h5 class="modal-title" id="modalTitle"><?php echo $title; ?> </h5>
                    <a href="javascript:;" class="primary-menu-close waves-effect" data-bs-dismiss="modal">
                        <i class="material-icons-outlined">close</i>
                    </a>
                </div>
                <div class="modal-body">
                    <div id="detailadd">
                        <!-- Form Add di sini -->
                    </div>
                    <div id="detailedit">
                        <!-- Form Edit di sini -->
                    </div>
                    <div id="detailhapus">
                    </div>
                </div>
                <hr class="horizontal light mt-0 mb-2">
                <div class="modal-footer border-top-0">
                    <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info waves-effect" id="btnproses"><?php echo $btnproses; ?></button>
                </div>
            </div>
        </div>
    </div>
</form>


<script type="text/javascript">
    $(document).ready(function() {
        var table = $("#dataadm").DataTable({
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

        $('#dataadm').parent().addClass("table-responsive");
    });

    // Menampilkan Add data modal
    $(document).on('click', '#addadm', function(e) {
        e.preventDefault();
        $("#ScrollableModal").modal('show');
        $.post('usersreg_add.php', {
            idadm: $(this).attr('data-id'),
            btnproses: 'Save'
        }, function(html) {
            $('#formmodal')[0].reset();
            $('#form_mode').val('add');
            $('#detailadd').show();
            $('#detailedit').hide();
            $('#detailhapus').hide();
            $('.modal-title').text('Add Users');
            $('#btnproses').text('Save');
            $('#detailadd').html(html);
        });
    });

    // Menampilkan Edit data modal
    $(document).on('click', '#editadm', function(e) {
        e.preventDefault();
        $("#ScrollableModal").modal('show');
        $.post('usersreg_edit.php', {
            idadm: $(this).attr('data-id'),
            btnproses: 'Update'
        }, function(html) {
            $('#form_mode').val('edit');
            $('#detailadd').hide();
            $('#detailedit').show();
            $('#detailhapus').hide();
            $('.modal-title').text('Edit Users');
            $('#btnproses').text('Update');
            $('#detailedit').html(html);
        });
    });

    // Menampilkan Delete data modal
    $(document).on('click', '#deleadm', function(e) {
        e.preventDefault();
        $("#ScrollableModal").modal('show');
        $.post('usersreg_del.php', {
            idadm: $(this).attr('data-id'),
            btnproses: 'Delete'
        }, function(html) {
            $('#form_mode').val('delete');
            $('#detailadd').hide();
            $('#detailedit').hide();
            $('#detailhapus').show();
            $('.modal-title').text('Delete Users');
            $('#btnproses').text('Delete');
            $('#detailhapus').html(html);
        });
    });

    // melakukan proses add edit delete
    $('#formmodal').on('submit', (function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        let mode = $('#form_mode').val(); // add, edit, delete
        let url = '';
        if (mode === 'add') url = 'usersreg_insert.php';
        else if (mode === 'edit') url = 'usersreg_update.php';
        else if (mode === 'delete') url = 'usersreg_delete.php';
        //alert(mode);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                $('#ScrollableModal').modal('hide');
                $('#addadm').focus(); // atau elemen lain di luar modal
                if (mode === 'add') {
                    Lobibox.notify('success', {
                        pauseDelayOnHover: true,
                        size: 'mini',
                        rounded: true,
                        delay: 1000,
                        sound: false,
                        position: 'top right',
                        msg: response.message || 'New Supplier Added!'
                    });
                } else if (mode === 'edit') {
                    Lobibox.notify('info', {
                        pauseDelayOnHover: true,
                        size: 'mini',
                        rounded: true,
                        delay: 1000,
                        sound: false,
                        position: 'top right',
                        msg: response.message || 'Data updated!'
                    });
                } else if (mode === 'delete') {
                    Lobibox.notify('warning', {
                        pauseDelayOnHover: true,
                        size: 'mini',
                        rounded: true,
                        delay: 1000,
                        sound: false,
                        position: 'top right',
                        msg: response.message || 'Data deleted!'
                    });
                }
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
            url: 'usersreg_load.php',
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