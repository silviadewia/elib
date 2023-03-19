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
                        <a href="{{ route('pinjam.create') }}" class="text-right btn btn-info "> Tambah pinjam <i
                                class="fas fa-plus"></i></a>
                    </h5>
                </div>
                <br>
                <div class="box-body">
                    <div class="card-header">
                        <center>
                            <h4> -
                                Data Semua Peminjaman
                                -
                            </h4>
                        </center>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover dataTable dtr-inline" width: 50%;
                                name="table-pinjam" id="table-pinjam">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Pinjaman</th>
                                        <th>Nama Anggota</th>
                                        <th>Lama pinjaman</th>
                                        <th>Daftar Buku</th>
                                        <th>Tanggal Pinjaman</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Denda</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pinjam as $value)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>EKB-{{ $value->id }}</td>
                                        <td>{{ \App\Models\User::where('id', $value->id_anggota)->first()['name'] }}
                                        </td>
                                        <td>{{ $value->lama }}</td>
                                        <td>
                                            <ol>
                                                @php
                                                $buku = explode(',', $value->id_buku);
                                                foreach ($buku as $key => $details) {
                                                $buku = \App\Models\Buku::where('id', $details)->first();
                                                echo '<li>'.$buku->judul_buku . '</li>';
                                                }
                                                @endphp
                                            </ol>
                                        </td>
                                        <td>{{ $value->tanggal_pinjam }}</td>
                                        <td>{{ $value->tanggal_kembali }}</td>
                                        <td>
                                            @php 
                                            if (Carbon\Carbon::parse($value->tanggal_kembali)->lt(Carbon\Carbon::now())) {
                                                $denda = Carbon\Carbon::parse($value->tanggal_kembali)->diffInDays(Carbon\Carbon::now()) * 1000;
                                                echo 'Rp. '.number_format($denda, 0, ',', '.');
                                            } else {
                                                echo 'Rp. 0';
                                            }
                                            @endphp
                                        </td>
                                        <td>
                                            <form action="{{ route('pinjam.destroy', $value->id) }}" method="post">
                                                <!-- <a href="{{ route('pinjam.show', $value->id) }}"
                                                    class="btn btn-info btn-sm"><i class="fa fa-eye"></i> </a> -->
                                                    <input type="hidden" name="dikembalikan" id="dikembalikan" value={{ $value->id }} >
                                                <a id="kembalikan" class="btn btn-warning btn-sm" title="pengembalian buku">
                                                    <i class="fa fa-sign-out"></i> Kembalikan</a>
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
</div>
@stop

@include('wa')

@section('js')
<script>
$(document).ready(function() {
    $('#table-pinjam').DataTable({
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

$('#kembalikan').click(function(event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    Swal.fire({
        title: "PERHATIAN",
        text: "Apakah anda yakin ingin mengembalikan buku ini?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin!',
        cancelButtonText: 'Tidak!'
    }).then((diHapus) => {
       // ajax kembalikan
       $.ajax({
            url: "{{ route('dikembalikan') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": $('#dikembalikan').val()
            },
            success: function(response) {
                Swal.fire({
                    title: 'Sukses',
                    text: 'Buku berhasil dikembalikan',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                });
                setTimeout(function() {
                    location.reload();
                }, 1500);
            },
            error: function(response) {
                Swal.fire({
                    title: 'Gagal',
                    text: 'Buku gagal dikembalikan',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
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
@if($errors-> any())
Toast.fire('Eror !!!', '{{ $errors->first() }}', 'error')
@endif
</script>
@stop