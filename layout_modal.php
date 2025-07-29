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


<!-- Large modal -->
<div class="modal fade" id="jurnalModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="jurnalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow-lg1">
            <div class="modal-header bg-gray-200">
                <h5 class="modal-title text-xm font-weight-bold text-info text-uppercase text text-shadow1" id="jurnalModalLabel">Detail Jurnal</h5>
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <div id="cetakjurnal"></div>
            </div>
        </div>
    </div>
</div>

<!-- Large modal -->
<div class="modal fade" id="jurnalModal1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="jurnalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow-lg1">
            <div class="modal-header bg-gray-200">
                <h5 class="modal-title text-xm font-weight-bold text-info text-uppercase text text-shadow1" id="jurnalModalLabel">Detail Jurnal</h5>
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <div id="cetakjurnal1"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-animate" data-bs-backdrop="static" data-bs-keyboard="false" id="animateModal" role="dialog" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content shadow-lg1">
			<div class="modal-header">
				<h5 class="modal-title">Modal title</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<h5>This is a modal window</h5>
				<p>You can do the following things with it:</p>
				<p><b>Read:</b> modal windows will probably tell you something important so don't
					forget to read what they say.</p>
				<p><b>Look:</b> a modal window enjoys a certain kind of attention; just look at it
					and appreciate its presence.</p>
				<p class="mb-0"><b>Close:</b> click on the button below to close the modal.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary shadow-2">Save changes</button>
			</div>
		</div>
	</div>
</div>