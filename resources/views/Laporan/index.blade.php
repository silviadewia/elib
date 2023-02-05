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
                        Tabel Laporan
                    </h3>
                </div>
                <br>
                <div class="box-body">
                    <div class="card-header">
                        <form method="get" action="">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>
                                                Pilih Bulan
                                            </th>
                                            <th>
                                                Pilih Tahun
                                            </th>
                                            <th>
                                                Aksi
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="bln" class="form-control" required="">
                                                    <option selected="selected" value="" disabled="">Bulan</option>
                                                    <option value="01"> Januari </option>
                                                    <option value="02"> Februari </option>
                                                    <option value="03"> Maret </option>
                                                    <option value="04"> April </option>
                                                    <option value="05"> Mei </option>
                                                    <option value="06"> Juni </option>
                                                    <option value="07"> Juli </option>
                                                    <option value="08"> Agustus </option>
                                                    <option value="09"> September </option>
                                                    <option value="10"> Oktober </option>
                                                    <option value="11"> November </option>
                                                    <option value="12"> Desember </option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="thn" class="form-control" required="">
                                                    <option selected="selected">Tahun</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="hidden" name="periode" value="ya">
                                                <button class="btn btn-primary">
                                                    <i class="fa fa-search"></i> Cari
                                                </button>
                                                <a href="" class="btn btn-success">
                                                    <i class="fa fa-refresh"></i> Refresh</a>
                                                <a href="" class="btn btn-info"><i class="fa fa-download"></i>
                                                    Excel</a>
                                                <a href="" target="_blank" class="btn btn-warning btn-md"><i
                                                        class="fa fa-print"></i> Print </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <br>
                    </form>
                    <center>
                        <h4> -
                            Data Semua Laporan
                            -
                        </h4>
                    </center>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover dataTable dtr-inline" width: 50%; name="table-pinjam"
                        id="table-pinjam">
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
                       
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop
</div>


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