@extends('adminlte::page')

@section('title', $title)

@section('content_header')

<h1>{{ $title }}</h1>
@stop

@section('content')
<div class="containe-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Button Tambah
                    </h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('pinjam.store') }}" enctype="multipart/form-data" method="POST">
                                                @csrf
                                                <section class="content">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="box box-primary">
                                                                <div class="box-body" style="padding:5px !important;">
                                                                    <form
                                                                        action="https://app.codekop.com/perpusv1/transaksi/prosespinjam"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        <div class="row">
                                                                            <div class="col-sm-5">
                                                                                <div class="table-responsive">
                                                                                    <table class="table table-striped">
                                                                                        <tbody>
                                                                                            <tr
                                                                                                style="background:yellowgreen">
                                                                                                <td colspan="3">Data
                                                                                                    Transaksi</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>No Peminjaman</td>
                                                                                                <td>:</td>
                                                                                                <td>
                                                                                                    <input type="text"
                                                                                                        name="nopinjam"
                                                                                                        value="PJ00111"
                                                                                                        readonly=""
                                                                                                        class="form-control">
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Tgl Peminjaman</td>
                                                                                                <td>:</td>
                                                                                                <td>
                                                                                                    <input type="date"
                                                                                                        value="2023-02-05"
                                                                                                        name="tgl"
                                                                                                        class="form-control">
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>ID Anggota / NIM
                                                                                                </td>
                                                                                                <td>:</td>
                                                                                                <td>
                                                                                                    <div
                                                                                                        class="input-group">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            required=""
                                                                                                            autocomplete="off"
                                                                                                            id="search-box"
                                                                                                            placeholder="Contoh ID Anggota atau NIM"
                                                                                                            value="">
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            class="form-control"
                                                                                                            autocomplete="off"
                                                                                                            name="anggota_id"
                                                                                                            id="anggota_id">
                                                                                                        <span
                                                                                                            class="input-group-btn">
                                                                                                            <a data-toggle="modal"
                                                                                                                data-target="#TableAnggota"
                                                                                                                class="btn btn-primary"><i
                                                                                                                    class="fa fa-search"></i></a>
                                                                                                        </span>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Biodata</td>
                                                                                                <td>:</td>
                                                                                                <td>
                                                                                                    <div
                                                                                                        id="result_tunggu">
                                                                                                        <p
                                                                                                            style="color:red">
                                                                                                            * Belum Ada
                                                                                                            Hasil</p>
                                                                                                    </div>
                                                                                                    <div id="result">
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Lama Peminjaman</td>
                                                                                                <td>:</td>
                                                                                                <td>
                                                                                                    <input type="number"
                                                                                                        required=""
                                                                                                        placeholder="Lama Pinjam Contoh : 2 Hari (2)"
                                                                                                        name="lama"
                                                                                                        class="form-control">
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-7">
                                                                                <div class="table-responsive">
                                                                                    <table class="table table-striped ">
                                                                                        <tbody>
                                                                                            <tr
                                                                                                style="background:yellowgreen">
                                                                                                <td colspan="3">Pinjam
                                                                                                    Buku</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Kode Buku</td>
                                                                                                <td>:</td>
                                                                                                <td>
                                                                                                    <div
                                                                                                        class="input-group">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            autocomplete="off"
                                                                                                            name="buku_id"
                                                                                                            id="buku-search"
                                                                                                            placeholder="Contoh ID Buku : BK001 atau ISBN"
                                                                                                            value="">
                                                                                                        <span
                                                                                                            class="input-group-btn">
                                                                                                            <a data-toggle="modal"
                                                                                                                data-target="#TableBuku"
                                                                                                                class="btn btn-primary"><i
                                                                                                                    class="fa fa-search"></i>
                                                                                                                Cari
                                                                                                                Buku
                                                                                                            </a>
                                                                                                        </span>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Data Buku</td>
                                                                                                <td>:</td>
                                                                                                <td>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                    <div id="result_tunggu_buku"></div>
                                                                                    <div id="result_buku">
                                                                                        <div class="table-responsive">
                                                                                            <table
                                                                                                class="table table-bordered">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>No</th>
                                                                                                        <th>Title</th>
                                                                                                        <th>Penerbit /
                                                                                                            Tahun</th>
                                                                                                        <th>Jml</th>
                                                                                                        <th>Aksi</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                </tbody>
                                                                                            </table>
                                                                                            <div id="tampil"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="pull-right">
                                                                            <input type="hidden" name="tambah"
                                                                                value="tambah">
                                                                            <button type="submit"
                                                                                class="btn btn-primary btn-md">Submit</button>
                                                                            <a href=""
                                                                                class="btn btn-danger btn-md">Kembali</a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="TableBuku">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">Add Buku</h4>
                                                                </div>
                                                                <div id="modal_body" class="modal-body fileSelection1">
                                                                    <div class="table-responsive">
                                                                        <div id="example1_wrapper"
                                                                            class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                                            <div class="row">
                                                                                <div class="col-sm-6">
                                                                                    <div class="dataTables_length"
                                                                                        id="example1_length"><label>Show
                                                                                            <select
                                                                                                name="example1_length"
                                                                                                aria-controls="example1"
                                                                                                class="form-control input-sm">
                                                                                                <option value="5">5
                                                                                                </option>
                                                                                                <option value="10">10
                                                                                                </option>
                                                                                                <option value="50">50
                                                                                                </option>
                                                                                            </select> entries</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div id="example1_filter"
                                                                                        class="dataTables_filter">
                                                                                        <label>Search:<input
                                                                                                type="search"
                                                                                                class="form-control input-sm"
                                                                                                placeholder=""
                                                                                                aria-controls="example1"></label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <table id="example1"
                                                                                        class="table table-bordered table-striped dataTable no-footer dtr-inline"
                                                                                        style="width: 100%;" role="grid"
                                                                                        aria-describedby="example1_info">
                                                                                        <thead>
                                                                                            <tr role="row">
                                                                                                <th class="sorting_desc"
                                                                                                    rowspan="1"
                                                                                                    colspan="1"
                                                                                                    style="width: 0px;"
                                                                                                    aria-label="No">No
                                                                                                </th>
                                                                                                <th class="sorting"
                                                                                                    tabindex="0"
                                                                                                    aria-controls="example1"
                                                                                                    rowspan="1"
                                                                                                    colspan="1"
                                                                                                    style="width: 0px;"
                                                                                                    aria-label="BukuID: activate to sort column ascending">
                                                                                                    BukuID</th>
                                                                                                <th class="sorting"
                                                                                                    tabindex="0"
                                                                                                    aria-controls="example1"
                                                                                                    rowspan="1"
                                                                                                    colspan="1"
                                                                                                    style="width: 0px;"
                                                                                                    aria-label="ISBN: activate to sort column ascending">
                                                                                                    ISBN</th>
                                                                                                <th style="max-width: 100px; width: 0px;"
                                                                                                    class="sorting"
                                                                                                    tabindex="0"
                                                                                                    aria-controls="example1"
                                                                                                    rowspan="1"
                                                                                                    colspan="1"
                                                                                                    aria-label="Title: activate to sort column ascending">
                                                                                                    Title</th>
                                                                                                <th class="sorting"
                                                                                                    tabindex="0"
                                                                                                    aria-controls="example1"
                                                                                                    rowspan="1"
                                                                                                    colspan="1"
                                                                                                    style="width: 0px;"
                                                                                                    aria-label="Penerbit: activate to sort column ascending">
                                                                                                    Penerbit</th>
                                                                                                <th class="sorting"
                                                                                                    tabindex="0"
                                                                                                    aria-controls="example1"
                                                                                                    rowspan="1"
                                                                                                    colspan="1"
                                                                                                    style="width: 0px;"
                                                                                                    aria-label="Tahun: activate to sort column ascending">
                                                                                                    Tahun</th>
                                                                                                <th class="sorting"
                                                                                                    tabindex="0"
                                                                                                    aria-controls="example1"
                                                                                                    rowspan="1"
                                                                                                    colspan="1"
                                                                                                    style="width: 0px;"
                                                                                                    aria-label="Stok: activate to sort column ascending">
                                                                                                    Stok</th>
                                                                                                <th class="sorting"
                                                                                                    tabindex="0"
                                                                                                    aria-controls="example1"
                                                                                                    rowspan="1"
                                                                                                    colspan="1"
                                                                                                    style="width: 0px;"
                                                                                                    aria-label="Aksi: activate to sort column ascending">
                                                                                                    Aksi</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr role="row" class="odd">
                                                                                                <td
                                                                                                    class="sorting_1 dtr-control">
                                                                                                    1</td>
                                                                                                <td><img src="https://app.codekop.com/perpusv1/assets/image/barcode/BK0026.png"
                                                                                                        class="img-responsive">
                                                                                                    <center>
                                                                                                        <b>BK0026</b>
                                                                                                    </center>
                                                                                                </td>
                                                                                                <td>900</td>
                                                                                                <td>tes</td>
                                                                                                <td>tos</td>
                                                                                                <td>2023</td>
                                                                                                <td>99</td>
                                                                                                <td><a href="javascript:void(0)"
                                                                                                        class="btn btn-success btn-sm pilih_buku"
                                                                                                        id="Select_File2"
                                                                                                        data_id="BK0026">
                                                                                                        <i
                                                                                                            class="fa fa-check">
                                                                                                        </i>
                                                                                                    </a>
                                                                                                    <a href="https://app.codekop.com/perpusv1/data/bukudetail/26"
                                                                                                        target="_blank"
                                                                                                        title="Detail Buku"
                                                                                                        class="btn btn-primary btn-sm"><i
                                                                                                            class="fa fa-eye"></i></a>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr role="row" class="even">
                                                                                                <td
                                                                                                    class="sorting_1 dtr-control">
                                                                                                    2</td>
                                                                                                <td><img src="https://app.codekop.com/perpusv1/assets/image/barcode/BK0025.png"
                                                                                                        class="img-responsive">
                                                                                                    <center>
                                                                                                        <b>BK0025</b>
                                                                                                    </center>
                                                                                                </td>
                                                                                                <td>978-602-8519-93-9
                                                                                                </td>
                                                                                                <td> Shalat for therapy
                                                                                                </td>
                                                                                                <td> pustaka ilmu</td>
                                                                                                <td>2017</td>
                                                                                                <td>4</td>
                                                                                                <td><a href="javascript:void(0)"
                                                                                                        class="btn btn-success btn-sm pilih_buku"
                                                                                                        id="Select_File2"
                                                                                                        data_id="BK0025">
                                                                                                        <i
                                                                                                            class="fa fa-check">
                                                                                                        </i>
                                                                                                    </a>
                                                                                                    <a href="https://app.codekop.com/perpusv1/data/bukudetail/25"
                                                                                                        target="_blank"
                                                                                                        title="Detail Buku"
                                                                                                        class="btn btn-primary btn-sm"><i
                                                                                                            class="fa fa-eye"></i></a>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr role="row" class="odd">
                                                                                                <td
                                                                                                    class="sorting_1 dtr-control">
                                                                                                    3</td>
                                                                                                <td><img src="https://app.codekop.com/perpusv1/assets/image/barcode/BK0024.png"
                                                                                                        class="img-responsive">
                                                                                                    <center>
                                                                                                        <b>BK0024</b>
                                                                                                    </center>
                                                                                                </td>
                                                                                                <td>979-9226-00-7</td>
                                                                                                <td>Ensiklopedia Populer
                                                                                                    Anak </td>
                                                                                                <td>PT Ichtiar Baru Van
                                                                                                    Hoeve</td>
                                                                                                <td>1998</td>
                                                                                                <td>2</td>
                                                                                                <td><a href="javascript:void(0)"
                                                                                                        class="btn btn-success btn-sm pilih_buku"
                                                                                                        id="Select_File2"
                                                                                                        data_id="BK0024">
                                                                                                        <i
                                                                                                            class="fa fa-check">
                                                                                                        </i>
                                                                                                    </a>
                                                                                                    <a href="https://app.codekop.com/perpusv1/data/bukudetail/24"
                                                                                                        target="_blank"
                                                                                                        title="Detail Buku"
                                                                                                        class="btn btn-primary btn-sm"><i
                                                                                                            class="fa fa-eye"></i></a>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr role="row" class="even">
                                                                                                <td
                                                                                                    class="sorting_1 dtr-control">
                                                                                                    4</td>
                                                                                                <td><img src="https://app.codekop.com/perpusv1/assets/image/barcode/BK0023.png"
                                                                                                        class="img-responsive">
                                                                                                    <center>
                                                                                                        <b>BK0023</b>
                                                                                                    </center>
                                                                                                </td>
                                                                                                <td>978-602-1699-94-1
                                                                                                </td>
                                                                                                <td>RINGKASAN SOAL UN
                                                                                                    2016</td>
                                                                                                <td>CMEDIA</td>
                                                                                                <td>2015</td>
                                                                                                <td>3</td>
                                                                                                <td><a href="javascript:void(0)"
                                                                                                        class="btn btn-success btn-sm pilih_buku"
                                                                                                        id="Select_File2"
                                                                                                        data_id="BK0023">
                                                                                                        <i
                                                                                                            class="fa fa-check">
                                                                                                        </i>
                                                                                                    </a>
                                                                                                    <a href="https://app.codekop.com/perpusv1/data/bukudetail/23"
                                                                                                        target="_blank"
                                                                                                        title="Detail Buku"
                                                                                                        class="btn btn-primary btn-sm"><i
                                                                                                            class="fa fa-eye"></i></a>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr role="row" class="odd">
                                                                                                <td
                                                                                                    class="sorting_1 dtr-control">
                                                                                                    5</td>
                                                                                                <td><img src="https://app.codekop.com/perpusv1/assets/image/barcode/BK0022.png"
                                                                                                        class="img-responsive">
                                                                                                    <center>
                                                                                                        <b>BK0022</b>
                                                                                                    </center>
                                                                                                </td>
                                                                                                <td>978-602-1609-98-9
                                                                                                </td>
                                                                                                <td>BIG BOOK SBMPTN
                                                                                                    SAINTEK 2016</td>
                                                                                                <td>Cmedia </td>
                                                                                                <td>2015</td>
                                                                                                <td>4</td>
                                                                                                <td><a href="javascript:void(0)"
                                                                                                        class="btn btn-success btn-sm pilih_buku"
                                                                                                        id="Select_File2"
                                                                                                        data_id="BK0022">
                                                                                                        <i
                                                                                                            class="fa fa-check">
                                                                                                        </i>
                                                                                                    </a>
                                                                                                    <a href=""
                                                                                                        target="_blank"
                                                                                                        title="Detail Buku"
                                                                                                        class="btn btn-primary btn-sm"><i
                                                                                                            class="fa fa-eye"></i></a>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                    <div id="example1_processing"
                                                                                        class="dataTables_processing panel panel-default"
                                                                                        style="display: none;">
                                                                                        Processing...</div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-5">
                                                                                    <div class="dataTables_info"
                                                                                        id="example1_info" role="status"
                                                                                        aria-live="polite">Showing 1 to
                                                                                        5 of 10 entries</div>
                                                                                </div>
                                                                                <div class="col-sm-7">
                                                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                                                        id="example1_paginate">
                                                                                        <ul class="pagination">
                                                                                            <li class="paginate_button previous disabled"
                                                                                                id="example1_previous">
                                                                                                <a href="#"
                                                                                                    aria-controls="example1"
                                                                                                    data-dt-idx="0"
                                                                                                    tabindex="0">Previous</a>
                                                                                            </li>
                                                                                            <li
                                                                                                class="paginate_button active">
                                                                                                <a href="#"
                                                                                                    aria-controls="example1"
                                                                                                    data-dt-idx="1"
                                                                                                    tabindex="0">1</a>
                                                                                            </li>
                                                                                            <li
                                                                                                class="paginate_button ">
                                                                                                <a href="#"
                                                                                                    aria-controls="example1"
                                                                                                    data-dt-idx="2"
                                                                                                    tabindex="0">2</a>
                                                                                            </li>
                                                                                            <li class="paginate_button next"
                                                                                                id="example1_next"><a
                                                                                                    href="#"
                                                                                                    aria-controls="example1"
                                                                                                    data-dt-idx="3"
                                                                                                    tabindex="0">Next</a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-outline pull-left"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="TableAnggota">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">Add Anggota</h4>
                                                                </div>
                                                                <div id="modal_body" class="modal-body fileSelection1">
                                                                    <div class="table-responsive">
                                                                        <div id="example3_wrapper"
                                                                            class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                                            <div class="row">
                                                                                <div class="col-sm-6">
                                                                                    <div class="dataTables_length"
                                                                                        id="example3_length"><label>Show
                                                                                            <select
                                                                                                name="example3_length"
                                                                                                aria-controls="example3"
                                                                                                class="form-control input-sm">
                                                                                                <option value="5">5
                                                                                                </option>
                                                                                                <option value="10">10
                                                                                                </option>
                                                                                                <option value="50">50
                                                                                                </option>
                                                                                            </select> entries</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div id="example3_filter"
                                                                                        class="dataTables_filter">
                                                                                        <label>Search:<input
                                                                                                type="search"
                                                                                                class="form-control input-sm"
                                                                                                placeholder=""
                                                                                                aria-controls="example3"></label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <table id="example3"
                                                                                        style="width: 100%;"
                                                                                        class="table table-bordered table-striped dataTable no-footer dtr-inline"
                                                                                        role="grid"
                                                                                        aria-describedby="example3_info">
                                                                                        <thead>
                                                                                            <tr role="row">
                                                                                                <th class="sorting_desc"
                                                                                                    rowspan="1"
                                                                                                    colspan="1"
                                                                                                    style="width: 0px;"
                                                                                                    aria-label="No">No
                                                                                                </th>
                                                                                                <th class="sorting"
                                                                                                    tabindex="0"
                                                                                                    aria-controls="example3"
                                                                                                    rowspan="1"
                                                                                                    colspan="1"
                                                                                                    style="width: 0px;"
                                                                                                    aria-label="ID: activate to sort column ascending">
                                                                                                    ID</th>
                                                                                                <th class="sorting"
                                                                                                    tabindex="0"
                                                                                                    aria-controls="example3"
                                                                                                    rowspan="1"
                                                                                                    colspan="1"
                                                                                                    style="width: 0px;"
                                                                                                    aria-label="NIM: activate to sort column ascending">
                                                                                                    NIM</th>
                                                                                                <th class="sorting"
                                                                                                    tabindex="0"
                                                                                                    aria-controls="example3"
                                                                                                    rowspan="1"
                                                                                                    colspan="1"
                                                                                                    style="width: 0px;"
                                                                                                    aria-label="Nama: activate to sort column ascending">
                                                                                                    Nama</th>
                                                                                                <th class="sorting"
                                                                                                    tabindex="0"
                                                                                                    aria-controls="example3"
                                                                                                    rowspan="1"
                                                                                                    colspan="1"
                                                                                                    style="width: 0px;"
                                                                                                    aria-label="Jurusan: activate to sort column ascending">
                                                                                                    Jurusan</th>
                                                                                                <th class="sorting"
                                                                                                    tabindex="0"
                                                                                                    aria-controls="example3"
                                                                                                    rowspan="1"
                                                                                                    colspan="1"
                                                                                                    style="width: 0px;"
                                                                                                    aria-label="Telepon: activate to sort column ascending">
                                                                                                    Telepon</th>
                                                                                                <th class="sorting"
                                                                                                    tabindex="0"
                                                                                                    aria-controls="example3"
                                                                                                    rowspan="1"
                                                                                                    colspan="1"
                                                                                                    style="width: 0px;"
                                                                                                    aria-label="Level: activate to sort column ascending">
                                                                                                    Level</th>
                                                                                                <th class="sorting"
                                                                                                    tabindex="0"
                                                                                                    aria-controls="example3"
                                                                                                    rowspan="1"
                                                                                                    colspan="1"
                                                                                                    style="width: 0px;"
                                                                                                    aria-label="Aksi: activate to sort column ascending">
                                                                                                    Aksi</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr role="row" class="odd">
                                                                                                <td
                                                                                                    class="sorting_1 dtr-control">
                                                                                                    1</td>
                                                                                                <td>AG0054</td>
                                                                                                <td>ahmadmuchaimin</td>
                                                                                                <td>ahmad</td>
                                                                                                <td>SMK</td>
                                                                                                <td>08827263652</td>
                                                                                                <td>Anggota</td>
                                                                                                <td><button
                                                                                                        class="btn btn-primary pilih_anggota"
                                                                                                        id="Select_File1"
                                                                                                        data_id="AG0054">
                                                                                                        <i
                                                                                                            class="fa fa-check">
                                                                                                        </i> Pilih
                                                                                                    </button></td>
                                                                                            </tr>
                                                                                            <tr role="row" class="even">
                                                                                                <td
                                                                                                    class="sorting_1 dtr-control">
                                                                                                    2</td>
                                                                                                <td>AG0053</td>
                                                                                                <td>213123123</td>
                                                                                                <td>udin</td>
                                                                                                <td>Sistem Informasi
                                                                                                </td>
                                                                                                <td>089765738924</td>
                                                                                                <td>Anggota</td>
                                                                                                <td><button
                                                                                                        class="btn btn-primary pilih_anggota"
                                                                                                        id="Select_File1"
                                                                                                        data_id="AG0053">
                                                                                                        <i
                                                                                                            class="fa fa-check">
                                                                                                        </i> Pilih
                                                                                                    </button></td>
                                                                                            </tr>
                                                                                            <tr role="row" class="odd">
                                                                                                <td
                                                                                                    class="sorting_1 dtr-control">
                                                                                                    3</td>
                                                                                                <td>AG0052</td>
                                                                                                <td>302811</td>
                                                                                                <td>Fais</td>
                                                                                                <td>Sistem Informasi
                                                                                                </td>
                                                                                                <td>0816371733</td>
                                                                                                <td>Anggota</td>
                                                                                                <td><button
                                                                                                        class="btn btn-primary pilih_anggota"
                                                                                                        id="Select_File1"
                                                                                                        data_id="AG0052">
                                                                                                        <i
                                                                                                            class="fa fa-check">
                                                                                                        </i> Pilih
                                                                                                    </button></td>
                                                                                            </tr>
                                                                                            <tr role="row" class="even">
                                                                                                <td
                                                                                                    class="sorting_1 dtr-control">
                                                                                                    4</td>
                                                                                                <td>AG0051</td>
                                                                                                <td>2114370079</td>
                                                                                                <td>Udill </td>
                                                                                                <td>MAHASISWA</td>
                                                                                                <td>081393192708</td>
                                                                                                <td>Anggota</td>
                                                                                                <td><button
                                                                                                        class="btn btn-primary pilih_anggota"
                                                                                                        id="Select_File1"
                                                                                                        data_id="AG0051">
                                                                                                        <i
                                                                                                            class="fa fa-check">
                                                                                                        </i> Pilih
                                                                                                    </button></td>
                                                                                            </tr>
                                                                                            <tr role="row" class="odd">
                                                                                                <td
                                                                                                    class="sorting_1 dtr-control">
                                                                                                    5</td>
                                                                                                <td>AG0050</td>
                                                                                                <td>2002</td>
                                                                                                <td>EDI SUSILO</td>
                                                                                                <td>SMA</td>
                                                                                                <td>082242271787</td>
                                                                                                <td>Anggota</td>
                                                                                                <td><button
                                                                                                        class="btn btn-primary pilih_anggota"
                                                                                                        id="Select_File1"
                                                                                                        data_id="AG0050">
                                                                                                        <i
                                                                                                            class="fa fa-check">
                                                                                                        </i> Pilih
                                                                                                    </button></td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                    <div id="example3_processing"
                                                                                        class="dataTables_processing panel panel-default"
                                                                                        style="display: none;">
                                                                                        Processing...</div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-5">
                                                                                    <div class="dataTables_info"
                                                                                        id="example3_info" role="status"
                                                                                        aria-live="polite">Showing 1 to
                                                                                        5 of 47 entries</div>
                                                                                </div>
                                                                                <div class="col-sm-7">
                                                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                                                        id="example3_paginate">
                                                                                        <ul class="pagination">
                                                                                            <li class="paginate_button previous disabled"
                                                                                                id="example3_previous">
                                                                                                <a href="#"
                                                                                                    aria-controls="example3"
                                                                                                    data-dt-idx="0"
                                                                                                    tabindex="0">Previous</a>
                                                                                            </li>
                                                                                            <li
                                                                                                class="paginate_button active">
                                                                                                <a href="#"
                                                                                                    aria-controls="example3"
                                                                                                    data-dt-idx="1"
                                                                                                    tabindex="0">1</a>
                                                                                            </li>
                                                                                            <li
                                                                                                class="paginate_button ">
                                                                                                <a href="#"
                                                                                                    aria-controls="example3"
                                                                                                    data-dt-idx="2"
                                                                                                    tabindex="0">2</a>
                                                                                            </li>
                                                                                            <li
                                                                                                class="paginate_button ">
                                                                                                <a href="#"
                                                                                                    aria-controls="example3"
                                                                                                    data-dt-idx="3"
                                                                                                    tabindex="0">3</a>
                                                                                            </li>
                                                                                            <li
                                                                                                class="paginate_button ">
                                                                                                <a href="#"
                                                                                                    aria-controls="example3"
                                                                                                    data-dt-idx="4"
                                                                                                    tabindex="0">4</a>
                                                                                            </li>
                                                                                            <li
                                                                                                class="paginate_button ">
                                                                                                <a href="#"
                                                                                                    aria-controls="example3"
                                                                                                    data-dt-idx="5"
                                                                                                    tabindex="0">5</a>
                                                                                            </li>
                                                                                            <li class="paginate_button disabled"
                                                                                                id="example3_ellipsis">
                                                                                                <a href="#"
                                                                                                    aria-controls="example3"
                                                                                                    data-dt-idx="6"
                                                                                                    tabindex="0">…</a>
                                                                                            </li>
                                                                                            <li
                                                                                                class="paginate_button ">
                                                                                                <a href="#"
                                                                                                    aria-controls="example3"
                                                                                                    data-dt-idx="7"
                                                                                                    tabindex="0">10</a>
                                                                                            </li>
                                                                                            <li class="paginate_button next"
                                                                                                id="example3_next"><a
                                                                                                    href="#"
                                                                                                    aria-controls="example3"
                                                                                                    data-dt-idx="8"
                                                                                                    tabindex="0">Next</a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-outline pull-left"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-body">
                    <button type="submit" class="btn btn-info float-right">
                        Simpan</button>
                </div>
                @stop

                @section('js')
                <script>
                $('.pas-delete-metu-alert-cantik').click(function(event) {
                    var form = $(this).closest("form");
                    var name = $(this).data("name");
                    event.preventDefault();
                    Swal.fire({
                        title: "PERHATIAN",
                        text: "Setelah di hapus, anda tidak akan dapat memulihkan data ini!",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yakin!'
                    }).then((diHapus) => {
                        if (diHapus.value) {
                            form.submit();
                        }
                    });
                    return false;
                });

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                @if($message = Session::get('success'))
                Toast.fire('Sukses !!!', '{{ $message }}', 'success')
                @endif

                @if($errors->any())
                Toast.fire('Eror !!!', '{{ $errors->first() }}', 'error')
                @endif
                </script>
                @stop