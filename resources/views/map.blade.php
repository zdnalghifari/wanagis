@extends('layouts.app')
@section('content')
    <div id="map">
        @if (Auth::check() && Auth::user()->hasRole('admin') or Auth::check() && Auth::user()->hasRole('user'))
            <div class="btn-group dropup exportButtonDiv" title="Export Data" style="pointer-events: auto; z-index: 1000">
                <button id="exportButton" type="button" class="dropdown-toggle dropdown-toggle-split myButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="/assets/img/export.png"
                        style="width:15px;height:15px;filter:brightness(0) invert(1);vertical-align:middle">
                </button>
                <div class="dropdown-menu">
                    <a id="batasLokasiExport" class="dropdown-item" href="#">Batas Lokasi</a>
                    <a id="jenisTanahExport" class="dropdown-item" href="#">Jenis Tanah</a>
                    <a id="lerengExport" class="dropdown-item" href="#">Kelerengan</a>
                    <a id="lahanExport" class="dropdown-item" href="#">Tutupan Lahan</a>
                    <div class="dropdown-divider"></div>
                    <a id="poinKeteranganExport" class="dropdown-item" href="#">Poin Keterangan</a>
                    <a id="bangunanExport" class="dropdown-item" href="#">Bangunan</a>
                    <a id="gorongExport" class="dropdown-item" href="#">Gorong-gorong</a>
                    <a id="jalanBatuExport" class="dropdown-item" href="#">Jalan Batu</a>
                    <a id="petakUjiExport" class="dropdown-item" href="#">Petak Uji</a>
                </div>
            </div>
    </div>
    <div class="downloadButtonDiv" title="Download Map" style="pointer-events: auto; z-index: 1000">
        <button class="myButton" id="downloadButton"><img src="/assets/img/downloadmap.png"
                style="width:20px;height:20px;filter:brightness(0) invert(1);vertical-align:middle"></button>
    </div>
    <div class="taButtonDiv" title="Table Attribute" style="pointer-events: auto">
        <button class="myButton" id="taButton"><img src="/assets/img/cells.png"
                style="width:20px;height:20px;filter:brightness(0) invert(1);vertical-align:middle"></button>
    </div>
@else
    <div class="exportButtonDiv" title="Export Data" style="pointer-events: auto; z-index: 1000">
        <button disabled="true" class="myButton" id="exportButton"><img src="/assets/img/export.png"
                style="width:20px;height:20px;filter:brightness(0) invert(1);vertical-align:middle"></button>
    </div>
    <div class="downloadButtonDiv" title="Download Map" style="pointer-events: auto; z-index: 1000">
        <button disabled="true" class="myButton" id="downloadButton"><img src="/assets/img/downloadmap.png"
                style="width:20px;height:20px;filter:brightness(0) invert(1);vertical-align:middle"></button>
    </div>
    <div class="taButtonDiv" title="Table Attribute" style="pointer-events: auto">
        <button disabled="true" class="myButton" id="taButton"><img src="/assets/img/cells.png"
                style="width:20px;height:20px;filter:brightness(0) invert(1);vertical-align:middle"></button>
    </div>
    @endif
    @if (Auth::check() && Auth::user()->hasRole('admin'))
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="editSwitch">
            <label class="custom-control-label" for="editSwitch">Editing</label>
        </div>
    @else
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="editSwitch" disabled="true">
            <label class="custom-control-label" for="editSwitch">Editing</label>
        </div>
    @endif
    <a id="image-download">
    @endsection
    </div>
    <div id="popup" class="map-popup">
        <a id="popup-closer" class="map-popup-closer"></a>
        <div id="popup-content"></div>
    </div>
    <div class="attribute-table" style="z-index: 10000">
        <div class="container">
            <select class="dropdown-ta select-ta" id="ta-value">
                <option value="1" selected="selected">Batas Lokasi</option>
                <option value="2">Jenis Tanah</option>
                <option value="3">Kelerengan</option>
                <option value="4">Tutupan Lahan </option>
            </select>
            <div class="attribute-table-title text-center">Tabel Atribut</div>
            <button class="ol-close"></button>
        </div>
        <div class="table-container table-responsive">
            <table>
                <thead></thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    @push('styles')
        @vite(['node_modules/ol/ol.css', 'node_modules/ol-ext/dist/ol-ext.css', 'resources/css/style.css'])
    @endpush
    @push('scripts')
        @vite(['resources/js/main.js'])
    @endpush
