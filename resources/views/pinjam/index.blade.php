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
                        Tabel Pinjam
                    </h3>

                </div>
                <div class="card-header">
                    <h5 class="card-title">
                        <a href="" class="text-right btn btn-info "> Tambah pinjam <i
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
                        <table class="table table-bordered table-hover dataTable dtr-inline" width: 50%;
                            name="table-pinjam" id="table-pinjam">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No pinjaman</th>
                                    <th>Tanggal pinjaman</th>
                                    <th>Id Anggota</th>
                                    <th>Lama pinjaman</th>
                                    <th>Id Buku</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Denda</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pinjam as $value)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $value->no_pinjaman }}</td>
                                    <td>{{ $value->tanggal_pinjaman }}</td>
                                    <td>{{ $value->id_anggota }}</td>
                                    <td>{{ $value->lama }}</td>
                                    <td>{{ $value->id_buku}}</td>
                                    <td>{{ $value->tanggal_kembali }}</td>
                                    <td>{{ $value->denda }}</td>
                                    <td>
                                        <form action="{{ route('pinjam.destroy', $value->id) }}" method="post">
                                            <a href="{{ route('pinjam.edit', $value->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-pen"></i> </a>
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