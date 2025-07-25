<div id="module-grid-list--77" style="position: absolute; inset: 0px; overflow: hidden; outline: 0px;" data-bind="slickGrid: {
					columns: activeColumn(), 
					data: dataLoader.data(), 
					loader: dataLoader,
					onColumnsReordered: onColumnsReordered,
					onColumnsResized: onColumnsResized,
					onHeaderCellRendered: function(e, args) { checkAllMainData(args) },
					click: function(data, idx) { (data.qrcode != '' &amp;&amp; typeof data.qrcode != 'undefined') || data.checked != null ? doSelectColumn (data, idx) : doSelect (data)}  
				}" class="slickgrid_54583 ui-widget">
    <div tabindex="0" hidefocus="" style="position:fixed;width:0;height:0;top:0;left:0;outline:0;"></div>
    <div class="slick-header ui-state-default" style="overflow:hidden;position:relative;">
        <div class="slick-header-columns ui-sortable" style="left: -1000px; width: 1825px;" unselectable="on">
            <div class="ui-state-default slick-header-column slick-header-sortable ui-sortable-handle" id="slickgrid_54583name" title="" style="width: 26px;"><span class="slick-column-name">Nama Barang</span><span class="slick-sort-indicator"></span>
                <div class="slick-resizable-handle"></div>
            </div>
            <div class="ui-state-default slick-header-column slick-header-sortable ui-sortable-handle" id="slickgrid_54583no" title="" style="width: 143px;"><span class="slick-column-name">Kode Barang</span><span class="slick-sort-indicator"></span>
                <div class="slick-resizable-handle"></div>
            </div>
            <div class="ui-state-default slick-header-column ui-sortable-handle" id="slickgrid_54583itemTypeName" title="" style="width: 113px;"><span class="slick-column-name">Jenis Barang</span>
                <div class="slick-resizable-handle"></div>
            </div>
            <div class="ui-state-default slick-header-column slick-header-sortable ui-sortable-handle" id="slickgrid_54583unit1.name" title="" style="width: 63px;"><span class="slick-column-name">Satuan</span><span class="slick-sort-indicator"></span>
                <div class="slick-resizable-handle"></div>
            </div>
            <div class="ui-state-default slick-header-column ui-sortable-handle" id="slickgrid_54583quantity" title="" style="width: 113px;"><span class="slick-column-name">Kts (Gdng Pengguna)</span>
                <div class="slick-resizable-handle"></div>
            </div>
            <div class="ui-state-default slick-header-column ui-sortable-handle" id="slickgrid_54583availableToSell" title="" style="width: 123px;"><span class="slick-column-name">Stok dapat dijual</span></div>
        </div>
    </div>
    <div class="slick-headerrow ui-state-default" style="overflow: hidden; position: relative; display: none;">
        <div class="slick-headerrow-columns" style="width: 683px;"></div>
        <div style="display: block; height: 1px; position: absolute; top: 0px; left: 0px; width: 688px;"></div>
    </div>
    <div class="slick-top-panel-scroller ui-state-default" style="overflow: hidden; position: relative; display: none;">
        <div class="slick-top-panel" style="width:10000px"></div>
    </div>
    <div class="slick-viewport" style="width: 100%; overflow: auto; outline: 0px; position: relative; height: 659px;">
        <div class="grid-canvas" style="width: 683px; height: 26445px;">
            <div class="ui-widget-content slick-row even" style="top:0px">
                <div class="slick-cell l0 r0">ACCU FURUKAWA NS70 65Ah</div>
                <div class="slick-cell l1 r1">BRG-00015</div>
                <div class="slick-cell l2 r2">Persediaan</div>
                <div class="slick-cell l3 r3">UNIT</div>
                <div class="slick-cell l4 r4 text-right">0,000000</div>
                <div class="slick-cell l5 r5 text-right">0,000000</div>
            </div>
            <div class="ui-widget-content slick-row odd" style="top:41px">
                <div class="slick-cell l0 r0">AIR ACCU</div>
                <div class="slick-cell l1 r1">AIRACCU</div>
                <div class="slick-cell l2 r2">Persediaan</div>
                <div class="slick-cell l3 r3">BOTOL</div>
                <div class="slick-cell l4 r4 text-right">18,000000</div>
                <div class="slick-cell l5 r5 text-right">18,000000</div>
            </div>
            <div class="ui-widget-content slick-row even" style="top:82px">
                <div class="slick-cell l0 r0">ALARM EKARION SET</div>
                <div class="slick-cell l1 r1">BRG-00039</div>
                <div class="slick-cell l2 r2">Persediaan</div>
                <div class="slick-cell l3 r3">SET</div>
                <div class="slick-cell l4 r4 text-right">0,000000</div>
                <div class="slick-cell l5 r5 text-right">0,000000</div>
            </div>
            <div class="ui-widget-content slick-row odd" style="top:123px">
                <div class="slick-cell l0 r0">BAUT KARTER HINO</div>
                <div class="slick-cell l1 r1">BRG-00041</div>
                <div class="slick-cell l2 r2">Persediaan</div>
                <div class="slick-cell l3 r3">PCS</div>
                <div class="slick-cell l4 r4 text-right">1,000000</div>
                <div class="slick-cell l5 r5 text-right">1,000000</div>
            </div>
            <div class="ui-widget-content slick-row even" style="top:164px">
                <div class="slick-cell l0 r0">BAUT RODA F LH</div>
                <div class="slick-cell l1 r1">6-87411 883-0</div>
                <div class="slick-cell l2 r2">Persediaan</div>
                <div class="slick-cell l3 r3">PCS</div>
                <div class="slick-cell l4 r4 text-right">1,000000</div>
                <div class="slick-cell l5 r5 text-right">1,000000</div>
            </div>
            <div class="ui-widget-content slick-row odd" style="top:205px">
                <div class="slick-cell l0 r0">BAUT RODA RH NMR71</div>
                <div class="slick-cell l1 r1">I5-87411 891-1</div>
                <div class="slick-cell l2 r2">Persediaan</div>
                <div class="slick-cell l3 r3">PCS</div>
                <div class="slick-cell l4 r4 text-right">1,000000</div>
                <div class="slick-cell l5 r5 text-right">1,000000</div>
            </div>
            <div class="ui-widget-content slick-row even" style="top:246px">
                <div class="slick-cell l0 r0">BEARING BAMBU</div>
                <div class="slick-cell l1 r1">ASEO3503936</div>
                <div class="slick-cell l2 r2">Persediaan</div>
                <div class="slick-cell l3 r3">PCS</div>
                <div class="slick-cell l4 r4 text-right">0,000000</div>
                <div class="slick-cell l5 r5 text-right">0,000000</div>
            </div>
            <div class="ui-widget-content slick-row odd" style="top:287px">
                <div class="slick-cell l0 r0">BEARING RODA DALAM 30212</div>
                <div class="slick-cell l1 r1">BR30212</div>
                <div class="slick-cell l2 r2">Persediaan</div>
                <div class="slick-cell l3 r3">PCS</div>
                <div class="slick-cell l4 r4 text-right">0,000000</div>
                <div class="slick-cell l5 r5 text-right">0,000000</div>
            </div>
            <div class="ui-widget-content slick-row even" style="top:328px">
                <div class="slick-cell l0 r0">BEARING RODA LUAR 30211</div>
                <div class="slick-cell l1 r1">BR30211</div>
                <div class="slick-cell l2 r2">Persediaan</div>
                <div class="slick-cell l3 r3">PCS</div>
                <div class="slick-cell l4 r4 text-right">0,000000</div>
                <div class="slick-cell l5 r5 text-right">0,000000</div>
            </div>
            <div class="ui-widget-content slick-row odd" style="top:369px">
                <div class="slick-cell l0 r0">BERSIHKAN EXHAUST GAS RECIRCULATIION (EGR)</div>
                <div class="slick-cell l1 r1">DPE-00001</div>
                <div class="slick-cell l2 r2">Jasa</div>
                <div class="slick-cell l3 r3">UNIT</div>
                <div class="slick-cell l4 r4 text-right">0,000000</div>
                <div class="slick-cell l5 r5 text-right">0,000000</div>
            </div>
            <div class="ui-widget-content slick-row even" style="top:410px">
                <div class="slick-cell l0 r0">BLEEDING MINYAK REM</div>
                <div class="slick-cell l1 r1">DPE-00002</div>
                <div class="slick-cell l2 r2">Jasa</div>
                <div class="slick-cell l3 r3">UNIT</div>
                <div class="slick-cell l4 r4 text-right">0,000000</div>
                <div class="slick-cell l5 r5 text-right">0,000000</div>
            </div>
            <div class="ui-widget-content slick-row odd" style="top:451px">
                <div class="slick-cell l0 r0">BODY REPAIR HEAD TRACTOR</div>
                <div class="slick-cell l1 r1">DPE-00003</div>
                <div class="slick-cell l2 r2">Jasa</div>
                <div class="slick-cell l3 r3">UNIT</div>
                <div class="slick-cell l4 r4 text-right">0,000000</div>
                <div class="slick-cell l5 r5 text-right">0,000000</div>
            </div>
            <div class="ui-widget-content slick-row even" style="top:492px">
                <div class="slick-cell l0 r0">BONGKAR PASANG / STEL PINTU BOX</div>
                <div class="slick-cell l1 r1">DPE-00004</div>
                <div class="slick-cell l2 r2">Jasa</div>
                <div class="slick-cell l3 r3">UNIT</div>
                <div class="slick-cell l4 r4 text-right">0,000000</div>
                <div class="slick-cell l5 r5 text-right">0,000000</div>
            </div>
            <div class="ui-widget-content slick-row odd" style="top:533px">
                <div class="slick-cell l0 r0">BONGKAR PASANG BAN LUAR</div>
                <div class="slick-cell l1 r1">DPE-00005</div>
                <div class="slick-cell l2 r2">Jasa</div>
                <div class="slick-cell l3 r3">RODA</div>
                <div class="slick-cell l4 r4 text-right">0,000000</div>
                <div class="slick-cell l5 r5 text-right">0,000000</div>
            </div>
            <div class="ui-widget-content slick-row even" style="top:574px">
                <div class="slick-cell l0 r0">BONGKAR PASANG BORING</div>
                <div class="slick-cell l1 r1">DPE-00006</div>
                <div class="slick-cell l2 r2">Jasa</div>
                <div class="slick-cell l3 r3">PCS</div>
                <div class="slick-cell l4 r4 text-right">0,000000</div>
                <div class="slick-cell l5 r5 text-right">0,000000</div>
            </div>
            <div class="ui-widget-content slick-row odd" style="top:615px">
                <div class="slick-cell l0 r0">BONGKAR PASANG TANGKI BBM</div>
                <div class="slick-cell l1 r1">DPE-00007</div>
                <div class="slick-cell l2 r2">Jasa</div>
                <div class="slick-cell l3 r3">UNIT</div>
                <div class="slick-cell l4 r4 text-right">0,000000</div>
                <div class="slick-cell l5 r5 text-right">0,000000</div>
            </div>
            <div class="ui-widget-content slick-row even" style="top:656px">
                <div class="slick-cell l0 r0">BRACKET FILTER SOLAR</div>
                <div class="slick-cell l1 r1">ME006065</div>
                <div class="slick-cell l2 r2">Persediaan</div>
                <div class="slick-cell l3 r3">PCS</div>
                <div class="slick-cell l4 r4 text-right">0,000000</div>
                <div class="slick-cell l5 r5 text-right">0,000000</div>
            </div>
            <div class="ui-widget-content slick-row odd" style="top:697px">
                <div class="slick-cell l0 r0">BRACKET FILTER SOLAR CANTER</div>
                <div class="slick-cell l1 r1">ME056279</div>
                <div class="slick-cell l2 r2">Persediaan</div>
                <div class="slick-cell l3 r3">PCS</div>
                <div class="slick-cell l4 r4 text-right">0,000000</div>
                <div class="slick-cell l5 r5 text-right">0,000000</div>
            </div>
            <div class="ui-widget-content slick-row even" style="top:738px">
                <div class="slick-cell l0 r0">BUAT TOPI KABIN</div>
                <div class="slick-cell l1 r1">DPE-00008</div>
                <div class="slick-cell l2 r2">Jasa</div>
                <div class="slick-cell l3 r3">UNIT</div>
                <div class="slick-cell l4 r4 text-right">0,000000</div>
                <div class="slick-cell l5 r5 text-right">0,000000</div>
            </div>
            <div class="ui-widget-content slick-row odd" style="top:779px">
                <div class="slick-cell l0 r0">BUBUT CASE TRANSMISI</div>
                <div class="slick-cell l1 r1">DPE-00009</div>
                <div class="slick-cell l2 r2">Jasa</div>
                <div class="slick-cell l3 r3">UNIT</div>
                <div class="slick-cell l4 r4 text-right">0,000000</div>
                <div class="slick-cell l5 r5 text-right">0,000000</div>
            </div>
            <div class="ui-widget-content slick-row loading even new-row" style="top:820px">
                <div class="slick-cell l0 r0"></div>
                <div class="slick-cell l1 r1"></div>
                <div class="slick-cell l2 r2"></div>
                <div class="slick-cell l3 r3"></div>
                <div class="slick-cell l4 r4 text-right"></div>
                <div class="slick-cell l5 r5 text-right"></div>
            </div>
        </div>
    </div>
    <div tabindex="0" hidefocus="" style="position:fixed;width:0;height:0;top:0;left:0;outline:0;"></div>
</div>