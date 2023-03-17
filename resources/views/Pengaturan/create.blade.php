@extends('adminlte::page')

@section('title', $title)

@section('content_header')
<h1>{{$title}}</h1>
@stop

@section('content')
<div class="box box-primary">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <form role="form">
                <div class="card-body">
                    <form action="{{ route('pengaturan.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama_perpustakaan">Nama Perpustakaan</label>
                                <input type="text" class="form-control" id="nama_perpustakaan"
                                    placeholder="Enter Nama Perpustakaan">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Enter Email">
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="telepon">Telepon</label>
                                    <input type="number" class="form-control" id="telepon" placeholder="Telepon">
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" placeholder="Alamat">
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-info  float-right">Submit</button>
                                    </div>
                                    @stop