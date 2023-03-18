@extends('layouts.app')

@section('content')
<div class="containe-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Table Pengguna
                    </h3>
                </div>
                <div class="card-body">
                            <td>
                                <div>
                                    <label>NIS</label>
                                    <input type="number" class="form-control" value="{{ $pengguna->nis }}" name="nis"
                                        readonly>
                                </div>
                                <div>
                                    <label class="form-label">Nama Pengguna</label>
                                    <input type="text" class="form-control" value="{{ $pengguna->nama_lengkap }}"
                                        name="nama_lengkap" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jurusan</label>
                                    <input type="text" class="form-control" value="{{ $pengguna->jurusan }}"
                                        name="jurusan" readonly>
                                </div>
                                <div>
                                    <label class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" value="{{ $pengguna->tempat_lahir }}"
                                        name="tempat_lahir" readonly>
                                </div>
                                <div>
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" value="{{ $pengguna->tanggal_lahir }}"
                                        name="tanggal_lahir" readonly>
                                </div>
                                <div>
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" value="{{ $pengguna->name }}"
                                        name="name" readonly>
                                </div>
                                <div>
                                    <label class="form-label">Password</label>
                                    <input type="paswsword" class="form-control" value="{{ $pengguna->password }}"
                                        name="password" readonly>
                                </div>
                                <div>
                                    <label class="form-label">Level</label>
                                    <input type="text" class="form-control" value="{{ $pengguna->level }}" name="level"
                                        readonly>
                                </div>
                                <div>
                                    <label class="form-label">Jenis Kelamin</label>
                                    <input type="text" class="form-control" value="{{ $pengguna->jenis_kelamin }}"
                                        name="jenis_kelamin" readonly>
                                </div>
                                <div>
                                    <label class="form-label">Telepon</label>
                                    <input type="tel" class="form-control" value="{{ $pengguna->telepon }}"
                                        name="telepon" readonly>
                                </div>
                                <div>
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" value="{{ $pengguna->email }}" name="email"
                                        readonly>
                                </div>
                                <div>
                                    <label class="form-label">Pas Foto</label>
                                    <input type="img" class="form-control" value="{{ $pengguna->foto }}" name="foto"
                                        readonly>
                                </div>
                                <div>
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control" value="{{ $pengguna->alamat }}"
                                        name="alamat" readonly>
                                </div>
                        </div>
                        <div class="card-body">
                            <div class="card-footer">
                                <a href="{{ route('pengguna.index') }}" class="btn btn-info  float-right"><i
                                        class="fas fa-arrow-left"></i>
                                    Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection