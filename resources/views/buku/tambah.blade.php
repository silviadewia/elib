@extends('adminlte::page')

@section('title', $title)

@section('content_header')
<h1>{{$title}}</h1>
@stop

@section('content')
<div class="card card-primary">
    <nav class="navbar navbar-expand navbar-primary navbar-dark">

        <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
                <button type="button" class="btn btn-block btn-default"><i class="fa fa-plus"></i>Tambah buku</button>
            </li>
        </ul>
    </nav>
    <form>
        <div class="card-body">
            <div class="form-group">
                <label for="nama">Nama buku </label>
                <input type="text" class="form-control" id="nama" placeholder="Nama Buku">
            </div>
        </div>

        <div class="card-footer">
            <button type="reset" class="btn btn-default">Batal</button>
            <button type="submit" class="btn btn-info  float-right">Simpan</button>
        </div>
    </form>
</div>
@stop
