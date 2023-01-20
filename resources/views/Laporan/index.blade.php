@extends('adminlte::page')

@section('title', $title)

@section('content_header')
<h1>{{$title}}</h1>
@stop

@section('content')
<div class="col-sm-12">
    <div class="col-xs-12">
                <div class="btn-group open">
                            <button type="button" class="btn btn-success">Sortir Berdasarkan</button>
                            <button type="button" class="btn btn-success dropdown-toggle " data-toggle="dropdown"
                                aria-expanded="true">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                            <li><a href="data_pengunjung">Data Pengunjung</a></li>
                            <li><a href="data_buku">Data Buku</a></li>
                            <li><a href="data_transaksi">Data Transaksi</a></li>
                            </ul>
                        </div> 

                        <div class="btn-group open hidden-xs" style="float:right;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" class="me-5 btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <div class="btn-group">
<button type="button" class="btn btn-default">Bulan</button>
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<span class="caret"></span>
<span class="sr-only">Toggle Dropdown</span>
</button>
<ul class="dropdown-menu" role="menu">
<li><a href="#">Januari</a></li>
<li><a href="#">Februari</a></li>
<li><a href="#">Maret</a></li>
<li><a href="#">April</a></li>
<li><a href="#">Mei</a></li>
<li><a href="#">Juni</a></li>
<li><a href="#">Juli</a></li>
<li><a href="#">Agustus</a></li>
<li><a href="#">Septmber</a></li>
<li><a href="#">Oktober</a></li>
<li><a href="#">November</a></li>
<li><a href="#">Desember</a></li>
</ul>
</div>
<div class="btn-group">
<button type="button" class="btn btn-default">Tahun</button>
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<span class="caret"></span>
<span class="sr-only">Toggle Dropdown</span>
</button>
<ul class="dropdown-menu" role="menu">
<li><a href="#">2021</a></li>
<li><a href="#">2022</a></li>
<li><a href="#">2023</a></li>
</ul>
</div>
                    <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                <button type="button" class="btn btn-primary " style="margin-right: 5px;">
                    <i class="fa fa-download"></i> Generate PDF
                </button>
            </div>
    <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
        aria-describedby="example1_info">
        <thead>
            <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 10.10px;">
                    No</th>
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 297.469px;">
                    Id</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Nis: activate to sort column ascending" style="width: 361.984px;">Nis</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Nama: activate to sort column ascending" style="width: 322.266px;">Nama
                </th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Jurusan: activate to sort column ascending" style="width: 257.094px;">Jurusan</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="User: activate to sort column ascending" style="width: 188.188px;">User</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Telepon: activate to sort column ascending" style="width: 188.188px;">Telepon</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Status: activate to sort column ascending" style="width: 188.188px;">Status</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Alamat: activate to sort column ascending" style="width: 188.188px;">Alamat</th>

            </tr>
        </thead>
        <tbody>
            <tr role="row" class="odd">
                <td class="sorting_1">1</td>
                <td>a0001</td>
                <td>3126</td>
                <td>Francisko Yoga Pradana</td>
                <td>Rekayasa Perangkat Lunak</td>
                <td>Francisko445</td>
                <td>089669496979</td>
                <td>Petugas</td>
                <td>Sinanggul, RT,35, RW,07 Mlonggo-Jepara</td>

</div>
</td>
</tr>
</tbody>
<tfoot>

</tfoot>
</table>
</div>
@stop
