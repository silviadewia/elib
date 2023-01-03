@extends('adminlte::page')

@section('title', $title)

@extends('adminlte::page')

@section('title', $title)

@section('content_header')
<h1>{{$title}}</h1>
@stop

@section('content')
<div class="containe-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Buttons
                    </h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama Rak</label>
                                <input type="text" class="form-control" id="nama" placeholder="Nama Rak">
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="reset" class="btn btn-default">Batal</button>
                            <button type="submit" class="btn btn-info  float-right"><i class="fas fa-plus"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Buttons
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover dataTable dtr-inline">
                        <tr>
                            <th>#</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Buku Tamu</td>
                            <td>
                                <button class="btn btn-primary btn-sm"><i class="fas fa-pen"></i> </button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop