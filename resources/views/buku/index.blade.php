@extends('adminlte::page')

@section('title', $title)

@section('content_header')
<h1>{{$title}}</h1>
@stop

@section('content')
<div class="containe-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Table Buku
                    </h3>
                </div>
                <div class="card-body">
                <td>
        <button type="submit" class="btn btn-info "> Tambah Buku <i class="fas fa-plus"></i></button>
        <div class="btn-group open">
            <button type="button" class="btn btn-success">Sortir Berdasarkan</button>
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="paket">Paket</a></li>
                <li><a href="novel">Novel</a></li>
            </ul>
        </div>

        <div class="btn-group open hidden-xs" style="float:right;">
<input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
<div class="input-group-btn">
<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
</div>
</div>
                    <table class="table table-bordered table-hover dataTable dtr-inline" name="table-buku" id="table-buku">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Sampul</th>
                                <th>ISBN</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Rak</th>
                                <th>Penerbit</th>
                                <th>Pengarang</th>
                                <th>Tahun</th>
                                <th>Jumlah Buku</th>
                                <th>Lampiran Buku</th>
                                <th>keterangan Lain</th>
                                <th>Dibuat Oleh</th>
                                <th>Pinjam</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($buku as $value)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $value->sampul }}</td>
                                <td>{{ $value->isbn }}</td>
                                <td>{{ $value->judul_buku }}</td>
                                <td>{{ $value->kategori }}</td>
                                <td>{{ $value->rak }}</td>
                                <td>{{ $value->penerbit }}</td>
                                <td>{{ $value->pengarang }}</td>
                                <td>{{ $value->tahun_buku }}</td>
                                <td>{{ $value->jumlah_buku }}</td>
                                <td>{{ $value->lampiran_buku }}</td>
                                <td>{{ $value->keterangan_lain }}</td>
                                <td>{{ $value->dibuat_oleh }}</td>
                                <td>1</td>

                                <td>
                                    <button class="btn btn-primary btn-sm"><i class="fas fa-pen"></i> </button>
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

