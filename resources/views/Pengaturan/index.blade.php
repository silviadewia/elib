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
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputNamaPerpustakaan">Nama Perpustakaan</label>
                <input type="Nama Perpustakaan" class="form-control" id="exampleInputNamaPerpustakaan"
                    placeholder="Enter Nama Perpustakaan">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email">
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputTelepon">Telepon</label>
                    <input type="Telepon" class="form-control" id="exampleInputTelepon" placeholder="Telepon">
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputAlamat">Alamat</label>
                        <input type="Alamat" class="form-control" id="exampleInputAlamat" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputLogo">Logo</label>
                        <input type="Logo" class="form-control" id="exampleInputLogo" placeholder="Logo">
                        <input type="file" id="exampleInputFile">

                        
<div class="box-footer">
<button type="submit" class="btn btn-info  float-right">Submit</button>
   </div>
    </div>

  @stop
