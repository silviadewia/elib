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
                        Tabel Buku
                    </h3>

                </div>
                <div class="card-header">
                    <h5 class="card-title">
                        <a href="{{ route('pengguna.create') }}" class="text-right btn btn-info "> Tambah Pengguna <i
                                class="fas fa-plus"></i></a>
                    </h5>
                </div>
                <div class="card-body">
                    <!--  <a href="{{ route('daftar.create') }}" class="btn btn-info "> Tambah Buku <i
                                    class="fas fa-plus"></i></a>
                          <div class="btn-group open">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="true">Sortir Berdasarkan
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="paket">Paket</a></li>
                                    <li><a href="novel">Novel</a></li>
                                </ul>
                            </div> -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover dataTable dtr-inline" width: 100%;
                            name="table-pengguna" id="table-pengguna">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nis</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jurusan</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Telepon</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th style="width:70%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengguna as $value)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $value->nis }}</td>
                                    <td>{{ $value->nama_lengkap }}</td>
                                    <td>{{ $value->jurusan }}</td>
                                    <td>{{ $value->username }}</td>
                                    <td>{{ $value->level }}</td>
                                    <td>
                                        @if($value->jenis_kelamin == "laki-laki")
                                        <span class="badge rounded-pill bg-primary">Laki - Laki </span>
                                        @else
                                        <span class="badge rounded-pill bg-secondary">Perempuan</span>
                                        @endif
                                    </td>
                                    <td>{{ $value->telepon}}</td>
                                    <td>{{ $value->email}}</td>
                                    <td>{{ $value->alamat }}</td>
                                    <td> 
                                        <form action="{{ route('pengguna.destroy', $value->id) }}" method="post">
                                            <a href="{{ route('pengguna.edit', $value->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-pen"></i> </a>
                                            <a href="" class="btn btn-primary btn-sm">
                                                <i class="fa fa-print"></i> Cetak Kartu</a>
                                            <a href="{{ route('pengguna.show', $value->id) }}"
                                                class="btn btn-info btn-sm"><i class="fa fa-eye"></i> </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger btn-sm pas-delete-metu-alert-cantik">
                                                <i class="fas fa-trash"></i></button>
                                        </form>
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
</div>
@stop

@section('js')
<script>
$(document).ready(function() {
    $('#table-pengguna').DataTable({
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
        confirmButtonText: 'Yakin!',
        cancelButtonText: 'Tidak!'
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