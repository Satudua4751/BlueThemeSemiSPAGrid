<?php
if (!defined('APP_SECURE')) {
    die('Direct access not allowed');
}
$title = "Add Item";
?>

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
                <div style="width:100%;">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="text" class="form-control border-end-0" id="txtSearch2" placeholder="Search">
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" id="filter-status1">
                                <option value="">-- All Product --</option>
                                <option value="barang">Spare Part</option>
                                <option value="material">Material</option>
                                <option value="jasa">Jasa</option>
                                <option value="umum">General</option>
                            </select>
                        </div>
                    </div>
                    </br>
                    <div id="GridBrg" class="slick-container" style="width:100%;height:520px;"></div>
                    <div id="pager"></div>
                </div>
            </div>
            <div class="card-footer text-center">
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<?php include 'layout_modal.php'; ?>

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
            id: "kdbrg",
            name: "Code",
            field: "kdbrg",
            width: 40,
            sortable: true
        },
        {
            id: "nmbrg",
            name: "Product Name",
            field: "nmbrg",
            sortable: true
        },
        {
            id: "jenis",
            name: "Type",
            field: "jenis",
            sortable: true
        },
        {
            id: "satuan",
            name: "Unit",
            field: "satuan",
            sortable: true
        },
        {
            id: "harga",
            name: "Hpp",
            field: "harga",
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
            id: "stok",
            name: "Qty",
            field: "stok",
            cssClass: "text-end",
            width: 40,
            formatter: (r, c, v) => {
                if (v == null || isNaN(v)) return '0,00';
                return parseFloat(v).toLocaleString("id-ID", {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
            }
        },
        {
            id: "fotobrg",
            name: "Image",
            field: "fotobrg",
            formatter: (r, c, v) =>
                v ?
                `<img src="foto/${v}" style="width:20px;" />` : `<span style="color:#999;">No Image</span>`

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
        rowHeight: 28
        // Custom Tooltip options can be defined in a Column or Grid Options or a mixed of both (first options found wins)
        //customTooltip: {
        //    formatter: tooltipFormatter,
        //}
    };

    let sortcol = "title";
    let sortdir = 1;
    let searchString = "";
    let statusFilter = "";

    function myFilter(item, args) {
        const searchMatch = args.searchString === "" || item["nmbrg"].toLowerCase().includes(args.searchString.toLowerCase());
        const statusMatch = args.statusFilter === "" || item["jenis"] === args.statusFilter;
        return searchMatch && statusMatch;
    }

    function comparer(a, b) {
        let x = a[sortcol],
            y = b[sortcol];
        return (x == y ? 0 : (x > y ? 1 : -1));
    }

    // Ambil data dari PHP dengan progress bar
    NProgress.start(); // Mulai progress

    fetch('./api/mstbrg01.php')
        .then(res => res.json())
        .then(data => {
            data.forEach((item, i) => {
                item.id = i;
                item.num = i + 1;
            });
            dataView.setItems(data);
            setTimeout(() => window.dispatchEvent(new Event('resize')), 500);
        })
        .catch(err => console.error("Gagal ambil data:", err))
        .finally(() => {
            NProgress.done(); // Hentikan progress setelah selesai, sukses/gagal
        });

    // Setup DataView dan Grid
    dataView = new SlickDataView({
        useCSPSafeFilter: true
    });

    grid = new SlickGrid("#GridBrg", dataView, columns, options, {
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
    });

    // wire up model events to drive the grid
    // !! both dataView.onRowCountChanged and dataView.onRowsChanged MUST be wired to correctly update the grid
    // see Issue#91
    dataView.onRowCountChanged.subscribe(function(e, args) {
        grid.updateRowCount();
        grid.render();
    });

    dataView.onRowsChanged.subscribe(function(e, args) {
        grid.invalidateRows(args.rows);
        grid.render();
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

    // Handle saat select berubah
    document.querySelector("#filter-status1").addEventListener('change', (e) => {
        SlickGlobalEditorLock.cancelCurrentEdit();
        statusFilter = e.target.value.trim();
        updateFilter();
        dataView.refresh();
    });

    document.querySelectorAll("#txtSearch2").forEach(elm => elm.addEventListener('keyup', (e) => {
        SlickGlobalEditorLock.cancelCurrentEdit();
        // clear on Esc
        if (e.which == 27) e.target.value = '';
        searchString = (e.target.value || '').trim();
        updateFilter();
        dataView.refresh();
    }));

    function updateFilter() {
        dataView.setFilterArgs({
            searchString,
            statusFilter
        });
        dataView.refresh();
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