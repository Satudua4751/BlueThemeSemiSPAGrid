<?php
if (!defined('APP_SECURE')) {
    die('Direct access not allowed');
}
$title = "Add Item";
?>


<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Sell</div>
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
<?php echo "Before " . time(); ?>
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card shadow-white">
            <div class="card-header p-4">
                <div class="row">
                    <div class="col-2">
                        <h5>List Sell</h5>
                    </div>
                    <div class="col-2">
                        <button type="button" id="addbrg" data-id="tambah" class="btn btn-secondary waves-effect raised"><i class="fa-solid fa-plus-circle"></i> Add</button>
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                <div style="width:100%;">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="text" class="form-control border-end-0" id="txtSearch2" placeholder="Search">
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" id="filter-status1" multiple>
                                <option value="">-- Semua Status --</option>
                                <option value="ongoing">Ongoing</option>
                                <option value="finish">Finish</option>
                                <option value="cancel">Cancel</option>
                                <option value="pending">Pending</option>
                            </select>
                        </div>
                    </div>
                    </br>
                    <div id="Gridjual" class="slick-container" style="width:100%;height:520px;"></div>
                    <div id="pager"></div>
                </div>
            </div>
            <div class="card-footer text-center">
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs/Sortable.min.js"></script>

<script type="module">
    import {
        Editors,
        Formatters,
        SlickGlobalEditorLock,
        SlickRowSelectionModel,
        SlickColumnPicker,
        SlickDataView,
        SlickCustomTooltip,
        SlickGridMenu,
        SlickGridPager,
        SlickGrid,
        Utils,
    } from './assets/js/esm/index.js';

    let dataView;
    let grid;

    // Definisikan kolom grid
    let columns = [{
            id: "sel",
            name: "#",
            field: "num",
            behavior: "select",
            cssClass: "text-end",
            width: 40,
            cannotTriggerInsert: true,
            resizable: false,
            selectable: false,
            excludeFromColumnPicker: true
        },
        {
            id: "idtrx",
            name: "No Transaksi",
            field: "idtrx",
            width: 40,
            sortable: true
        },
        {
            id: "tgltrx",
            name: "Tanggal",
            field: "tgltrx",
            width: 40,
            sortable: true
        },
        {
            id: "nmkon",
            name: "Customer",
            field: "nmkon",
            sortable: true
        },
        {
            id: "platno",
            name: "Plat. No",
            field: "platno",
            width: 40,
            sortable: true
        },
        {
            id: "jenispkj",
            name: "Pekerjaan",
            field: "jenispkj",
            sortable: true
        },
        {
            id: "jualdpp",
            name: "DPP",
            field: "jualdpp",
            cssClass: "text-end",
            width: 40,
            formatter: (r, c, v) => {
                if (v == null || isNaN(v)) return 'Rp 0,00';
                return 'Rp ' + parseFloat(v).toLocaleString("id-ID", {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
            }
        },
        {
            id: "totaljual",
            name: "Total",
            field: "totaljual",
            cssClass: "text-end",
            width: 40,
            formatter: (r, c, v) => {
                if (v == null || isNaN(v)) return 'Rp 0,00';
                return 'Rp ' + parseFloat(v).toLocaleString("id-ID", {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
            }
        },
        {
            id: "sttrx",
            name: "Status",
            field: "sttrx",
            cssClass: "text-end",
            sortable: true,
            width: 30,
            formatter: (r, c, v) => {
                let badgeClass = "badge bg-secondary";
                if (v === "ongoing") badgeClass = "badge bg-warning";
                else if (v === "finish") badgeClass = "badge bg-success";
                else if (v === "cancel") badgeClass = "badge bg-dark";
                else if (v === "pending") badgeClass = "badge bg-dark";
                return `<span class="${badgeClass}">${v}</span>`;
            }
        }
    ];

    let options = {
        columnPicker: {
            columnTitle: "Columns",
            hideForceFitButton: false,
            hideSyncResizeButton: false,
            forceFitTitle: "Force fit columns",
            syncResizeTitle: "Synchronous resize",
        },
        gridMenu: {
            iconCssClass: "sgi sgi-menu sgi-17px", // you can provide iconImage OR iconCssClass
        },
        editable: false,
        enableAddRow: false,
        enableCellNavigation: true,
        asyncEditorLoading: true,
        forceFitColumns: true,
        enableHtmlRendering: true, // disabling HTML rendering means that `innerHTML` will not be used by SlickGrid (better for CSP)
        topPanelHeight: 35,
        rowHeight: 28,
        createFooterRow: true,
        showFooterRow: true,
        footerRowHeight: 30
        // Custom Tooltip options can be defined in a Column or Grid Options or a mixed of both (first options found wins)
        //customTooltip: {
        //    formatter: tooltipFormatter,
        //}
    };

    let sortcol = "title";
    let sortdir = 1;
    let searchString = "";
    let statusFilter = [];

    function myFilter(item, args) {
        const searchMatch = args.searchString === "" || item["nmkon"].toLowerCase().includes(args.searchString.toLowerCase());
        const statusMatch = args.statusFilter === "" || item["sttrx"] === args.statusFilter;
        return searchMatch && statusMatch;
    }

    function comparer(a, b) {
        let x = a[sortcol],
            y = b[sortcol];
        return (x == y ? 0 : (x > y ? 1 : -1));
    }

    function updateFooterTotals() {
        let total = 0;

        // Ambil hanya item yang lolos filter / pencarian
        for (let i = 0; i < dataView.getLength(); i++) {
            const item = dataView.getItem(i);
            let val = parseFloat(item.totaljual);
            if (!isNaN(val)) total += val;
        }

        // Update footer kolom 'totaljual'
        const footerRowNode = grid.getFooterRowColumn("totaljual");
        if (footerRowNode) {
            footerRowNode.innerHTML = `<div class="text-end font-weight-bolder">Rp ${total.toLocaleString("id-ID", {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        })}</div>`;
        }
    }


    // Ambil data dari PHP
    fetch('./api/trxjual01.php')
        .then(res => res.json())
        .then(data => {
            data.forEach((item, i) => {
                item.id = i;
                item.num = i + 1;
            }); // SlickGrid wajib punya unique `id`
            //console.log("DATA TERAMBIL:", data); // Tambahan debug
            dataView.setItems(data);
            updateFooterTotals(); // <-- Tambahkan ini di sini!
            setTimeout(() => window.dispatchEvent(new Event('resize')), 500); // Untuk paksa layout refresh
        })
        .catch(err => console.error("Gagal ambil data:", err));

    // Setup DataView dan Grid
    dataView = new SlickDataView({
        useCSPSafeFilter: true
    });

    grid = new SlickGrid("#Gridjual", dataView, columns, options, {
        enableCellNavigation: true,
        enableColumnReorder: false,
    });
    grid.setSelectionModel(new SlickRowSelectionModel());

    let pager = new SlickGridPager(dataView, grid, "#pager");
    let columnpicker = new SlickColumnPicker(columns, grid, options);
    let gridMenu = new SlickGridMenu(columns, grid, options);

    grid.onKeyDown.subscribe(function(e) {
        // select all rows on ctrl-a
        if (e.which != 65 || !e.ctrlKey) {
            return false;
        }

        let rows = [];
        for (let i = 0; i < dataView.getLength(); i++) {
            rows.push(i);
        }

        grid.setSelectedRows(rows);
        e.preventDefault();
    });

    grid.onSort.subscribe(function(e, args) {
        sortdir = args.sortAsc ? 1 : -1;
        sortcol = args.sortCol.field;

        // using native sort with comparer
        dataView.sort(comparer, args.sortAsc);
        updateFooterTotals(); // <-- Tambahkan ini di sini!
    });

    // wire up model events to drive the grid
    // !! both dataView.onRowCountChanged and dataView.onRowsChanged MUST be wired to correctly update the grid
    // see Issue#91
    dataView.onRowCountChanged.subscribe(function(e, args) {
        grid.updateRowCount();
        grid.render();
        updateFooterTotals(); // <-- Tambahkan ini di sini!
    });

    dataView.onRowsChanged.subscribe(function(e, args) {
        grid.invalidateRows(args.rows);
        grid.render();
        updateFooterTotals(); // <-- Tambahkan ini di sini!
    });

    dataView.onPagingInfoChanged.subscribe(function(e, pagingInfo) {
        grid.updatePagingStatusFromView(pagingInfo);

        // show the pagingInfo but remove the dataView from the object, just for the Cypress E2E test
        delete pagingInfo.dataView;
        //console.log('on After Paging Info Changed - New Paging:: ', pagingInfo);
    });

    dataView.onBeforePagingInfoChanged.subscribe(function(e, previousPagingInfo) {
        // show the previous pagingInfo but remove the dataView from the object, just for the Cypress E2E test
        delete previousPagingInfo.dataView;
        //console.log('on Before Paging Info Changed - Previous Paging:: ', previousPagingInfo);
    });

    $('#filter-status1').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        closeOnSelect: false,
    });


    // Handle saat select berubah
    document.querySelector("#filter-status1").addEventListener('change', (e) => {
        alert("kesini tidak ya");
        SlickGlobalEditorLock.cancelCurrentEdit();
        const selectedStatuses = $(e.target).val(); // ✅ Gunakan e.target, bukan this
        statusFilter = selectedStatuses || [];
        updateFilter();
        dataView.refresh();
        updateFooterTotals();
    });

    document.querySelectorAll("#txtSearch2").forEach(elm => elm.addEventListener('keyup', (e) => {
        SlickGlobalEditorLock.cancelCurrentEdit();
        // clear on Esc
        if (e.which == 27) e.target.value = '';
        searchString = (e.target.value || '').trim();
        updateFilter();
        dataView.refresh();
        updateFooterTotals(); // <-- Tambahkan ini di sini!
    }));

    function updateFilter() {
        dataView.setFilterArgs({
            searchString,
            statusFilter
        });
        dataView.refresh();
        updateFooterTotals(); // <-- Tambahkan ini di sini!
    }

    // initialize the model after all the events have been hooked up
    grid.resizeCanvas();
    dataView.beginUpdate();
    grid.invalidate(); // <- WAJIB
    grid.render(); // <- WAJIB
    dataView.setFilterArgs({
        searchString,
        statusFilter
    });
    dataView.setFilter(myFilter);
    dataView.endUpdate();

    dataView.syncGridSelection(grid, true);
</script>