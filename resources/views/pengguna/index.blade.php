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
                                    <td>{{ $value->name }}</td>
                                    <td>
                                        @if($value->level == 0)
                                        <span class="badge rounded-pill bg-primary">Admin </span>
                                        @else
                                        <span class="badge rounded-pill bg-secondary">Pengguna</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($value->jenis_kelamin == "l")
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
                                                <i class="fa fa-print"></i></a>
                                            <button type="button" class="btn btn-primary btn-sm" id="show" name="show"  data-toggle="modal"
                                                data-target="#detailsModal"
                                                data-url="{{ '/pengguna/'.$value->id }}" >
                                                <i class="fa fa-eye"></i>
                                            </button>
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


<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">DETAILS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nis">NIS :</label>
                        <input  class="form-control form-control-sm" id="nis" disabled>
                    </div>
                    <div class="form-group">
                        <label for="namalengkap">Nama Lengkap:</label>
                        <input class="form-control form-control-sm" id="nama_lengkap" disabled>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan:</label>
                        <input class="form-control form-control-sm" id="jurusan" disabled>
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input class="form-control form-control-sm" id="username" disabled>
                    </div>
                    <div class="form-group">
                        <label for="level">Level:</label>
                        <input class="form-control form-control-sm" id="level" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama-text">Jenis Kelamin:</label>
                        <input class="form-control form-control-sm" id="jenis_kelamin" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama-text">Telepon:</label>
                        <input class="form-control form-control-sm" id="telepon" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama-text">Email:</label>
                        <input class="form-control form-control-sm" id="email" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama-text">Alamat:</label>
                        <input class="form-control form-control-sm" id="alamat" disabled>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

    $('[name=show]').click(function() {
        var url = $(this).data('url');
        $.ajax({
        url: url,
            method: "GET",
            dataType: "json",
            success: function(html) {
                console.log(html);
                $('#nis').val(html.nis);
                $('#nama_lengkap').val(html.nama_lengkap);
                $('#jurusan').val(html.jurusan);
                $('#username').val(html.name);
                // check level user 
                if (html.level == 0) {
                    $('#level').val("Admin");
                } else {
                    $('#level').val("Pengguna");
                }
                if (html.jenis_kelamin == 0) {
                    $('#jenis_kelamin').val("Laki-Laki");
                } else {
                    $('#jenis_kelamin').val("Perempuan");
                }
                $('#telepon').val(html.telepon);
                $('#email').val(html.email);
                $('#alamat').val(html.alamat);
                $('#showModal').modal('show');
            }
        })
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
@if($errors -> any())
Toast.fire('Eror !!!', '{{ $errors->first() }}', 'error')
@endif
</script>
@stop