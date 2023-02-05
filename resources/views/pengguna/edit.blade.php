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
                        Button Edit
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data"
                        action="{{ route('pengguna.update', $edit_pengguna->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $edit_pengguna->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="table-responsive">
                                    <div class="form-group">
                                        <label>NIS</label>
                                        <input type="number" class="form-control" value="{{ $edit_pengguna->nis }}"
                                            id="nis" name="nis" placeholder="NIS" autocomplete="off">
                                    </div>
                                    <label>Nama Pengguna</label>
                                    <input type="text" class="form-control" value="{{ $edit_pengguna->nama_lengkap }}"
                                        id="nama_lengkap" name="nama_lengkap" placeholder="Nama Pengguna"
                                        autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <select class="form-control" name="jurusan">
                                        <optgroup label="Pilih Jurusan">
                                            <option value="TEKNIK DAN BISNIS SEPEDA MOTOR" @if ($edit_pengguna->jurusan== 'TEKNIK DAN BISNIS SEPEDA MOTOR') selected @endif> TEKNIK DAN BISNIS SEPEDA MOTOR</option>
                                            <option value="REKAYASA PERANGKAT LUNAK" @if ($edit_pengguna->jurusan == 'REKAYASA PERANGKAT LUNAK') selected @endif>REKAYASA PERANGKAT LUNAK</option>
                                            <option value="OTOMATISASI DAN TATA KELOLA PERKANTORAN" @if ($edit_pengguna->jurusan == 'OTOMATISASI DAN TATA KELOLA PERKANTORAN') selected @endif> OTOMATISASI DAN TATA KELOLA PERKANTORAN</option>
                                            <option value="AKUNTANSI DAN KEUANGAN LEMBAGA" @if ($edit_pengguna->jurusan == 'AKUNTANSI DAN KEUANGAN LEMBAGA') selected @endif>
                                                AKUNTANSI DAN KEUANGAN LEMBAGA</option>
                                            <option value="BISNIS DARING DAN PEMASARAN" @if ($edit_pengguna->jurusan == 'BISNIS DARING DAN PEMASARAN') selected @endif> BISNIS DARING DAN PEMASARAN</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" value="{{ $edit_pengguna->tempat_lahir }}"
                                        id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir"
                                        autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control"
                                        value="{{ $edit_pengguna->tanggal_lahir }}" id="tanggal_lahir"
                                        name="tanggal_lahir" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" value="{{ $edit_pengguna->username }}"
                                        id="username" name="username" placeholder="Username" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" value="{{ $edit_pengguna->password }}"
                                        id="password" name="password" placeholder="Password" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" class="form-control" required="required">
                                        <option value="PETUGAS" @if ($edit_pengguna->level == 'PETUGAS') selected @endif>PETUGAS</option>
                                        <option value="ANGGOTA" @if ($edit_pengguna->level == 'ANGGOTA') selected @endif>ANGGOTA</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" required="required">
                                        <option value="jenis_kelamin" @if ($edit_pengguna->jenis_kelamin =='LAKI-LAKI') selected @endif>LAKI-LAKI</option>
                                        <option value="jenis_kelamin" @if ($edit_pengguna->jenis_kelamin =='PEREMPUAN') selected @endif>PEREMPUAN</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input class="form-control" value="{{ $edit_pengguna->telepon }}" id="telepon"
                                        name="telepon" placeholder="Contoh : 089618173609" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" class="form-control" value="{{ $edit_pengguna->email }}"
                                        id="email" name="email" placeholder="Contoh : calmesil@gmail.com"
                                        autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Pas Foto</label>
                                    <br>
                                    <br>
                                    <img src="/foto/{{ $edit_pengguna->foto }}" alt="" width="300">
                                    <br>
                                    <br>
                                    <input type="file" value="" id="foto" name="foto">
                                    <input type="hidden" name="foto" value="{{ $edit_pengguna->foto }}">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea input type="textarea" class="form-control" value="" id="alamat"
                                        name="alamat" placeholder="Alamat"
                                        autocomplete="off">{{ $edit_pengguna->alamat }}</textarea>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card-footer">
                <button type="reset" class="btn btn-default">Batal</button>
                <button type="submit" class="btn btn-info  float-right"><i class="fas fa-plus"></i>
                    Simpan</button>
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
<script>
$(document).ready(function() {
    $('#table-buku').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
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
@if($errors -> any())
Toast.fire('Eror !!!', '{{ $errors->first() }}', 'error')
@endif
</script>
@stop