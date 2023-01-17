@extends('adminlte::page')

@section('title', $title)

@section('content_header')
<h1>{{$title}}</h1>
@stop

@section('content')
<div class="card-footer">
    <td>
        <button type="submit" class="btn btn-info ">Tambah Pengguna<i class="fas fa-plus"></i></button>
        <div class="btn-group open">
            <button type="button" class="btn btn-success">Sortir Berdasarkan (ID)</button>
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
            </ul>
        </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length"
                    aria-controls="example1" class="form-control input-sm">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select> entries</label>
        </div>
    </div>
    <div class="col-sm-6">
        <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search"
                    class="form-control input-sm" placeholder="" aria-controls="example1">
            </label></div>
    </div>
</div>
<div class="col-sm-12">
    <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
        aria-describedby="example1_info">
        <thead>
            <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="6" colspan="1"
                    aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 6.6px;">
                    No</th>
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="6" colspan="1"
                    aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 58.2000px;">
                    Id</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="6" colspan="1"
                    aria-label="Nis: activate to sort column ascending" style="width: 58.2000px;">Nis</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="6" colspan="1"
                    aria-label="Nama: activate to sort column ascending" style="width: 300.240px;">Nama
                </th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="6" colspan="1"
                    aria-label="Jurusan: activate to sort column ascending" style="width: 200.078px;">Jurusan</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="User: activate to sort column ascending" style="width: 188.188px;">User</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="6" colspan="1"
                    aria-label="Telepon: activate to sort column ascending" style="width: 160.170px;">Telepon</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="6" colspan="1"
                    aria-label="Status: activate to sort column ascending" style="width: 188.188px;">Status</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="6" colspan="1"
                    aria-label="Alamat: activate to sort column ascending" style="width: 188.188px;">Alamat</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="6" colspan="6"
                    aria-label="Aksi: activate to sort column ascending" style="width: 2100.2100px;">Aksi</th>
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
                <td div class="box-body">
                    <a class="btn btn-app">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <a class="btn btn-app">
                        <i class="fa fa-trash"></i> Delete
                    </a>
                    <a class="btn btn-app">
                        <i class="fa fa-print"></i> Cetak
                    </a>
</div>
</td>
</tr>
</tbody>
<tfoot>

</tfoot>
</table>
</div>
@stop
