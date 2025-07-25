<!-- Modal Add -->
<form class="form-horizontal" id="formmodaladd" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id"> <!-- untuk edit/delete -->
    <input type="hidden" name="form_mode" id="form_mode" value="add"> <!-- mode operasi -->
    <div class="modal" id="ScrollableModalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
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
                </div>
                <hr class="horizontal light mt-0 mb-2">
                <div class="modal-footer border-top-0">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect" id="btnproses">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Edit -->
<form class="form-horizontal" id="formmodaledit" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id"> <!-- untuk edit/delete -->
    <input type="hidden" name="form_mode" id="form_mode" value="add"> <!-- mode operasi -->
    <div class="modal" id="ScrollableModalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 bg-grd-info py-2">
                    <h5 class="modal-title" id="modalTitle"><?php echo $title; ?> </h5>
                    <a href="javascript:;" class="primary-menu-close waves-effect" data-bs-dismiss="modal">
                        <i class="material-icons-outlined">close</i>
                    </a>
                </div>
                <div class="modal-body">
                    <div id="detailedit">
                        <!-- Form Edit di sini -->
                    </div>
                </div>
                <hr class="horizontal light mt-0 mb-2">
                <div class="modal-footer border-top-0">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect" id="btnproses">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Delete -->
<form class="form-horizontal" id="formmodaldelete" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id"> <!-- untuk edit/delete -->
    <input type="hidden" name="form_mode" id="form_mode" value="add"> <!-- mode operasi -->
    <div class="modal" id="ScrollableModalDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 bg-grd-info py-2">
                    <h5 class="modal-title" id="modalTitle"><?php echo $title; ?> </h5>
                    <a href="javascript:;" class="primary-menu-close waves-effect" data-bs-dismiss="modal">
                        <i class="material-icons-outlined">close</i>
                    </a>
                </div>
                <div class="modal-body">
                    <div id="detailhapus"></div>
                </div>
                <hr class="horizontal light mt-0 mb-2">
                <div class="modal-footer border-top-0">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger waves-effect" id="btnproses">Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal -->
<div class="modal" id="imageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 bg-grd-info py-2">
                <h5 class="modal-title">Preview Gambar</h5>
                <a href="javascript:;" class="primary-menu-close waves-effect" data-bs-dismiss="modal">
                    <i class="material-icons-outlined">close</i>
                </a>
            </div>
            <div class="modal-body">
                <img id="modal-image" src="" alt="Preview" style="max-width:100%; height:auto;" />
            </div>
            <hr class="horizontal light mt-0 mb-2">
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>