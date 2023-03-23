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
                <div class="box-body">
                    <div class="card-header">
                        <form>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>
                                                Pilih Tanggal
                                            </th>
                                            <th>
                                                Pilih Status Buku
                                            </th>
                                            <th>
                                                Aksi
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" id="tgl_laporan" name="tgl_laporan"
                                                    class="form-control">
                                            </td>
                                            <td>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="">--Pilih Status--</option>
                                                    <option value="0">Dipinjam</option>
                                                    <option value="1">Dikembalikan</option>
                                                    <option value="2">Denda</option>
                                                </select>
                                            </td>
                                            <td>
                                                <a name="cari" id="cari" class="btn btn-primary">
                                                    <i class="fa fa-search"></i> Cari
                                                </a>
                                                <a class="btn btn-success" id="refresh" name="refresh">
                                                    <i class="fa fa-refresh"></i> Refresh</a>
                                                <a class="btn btn-info" id="excel" name="excel"><i class="fa fa-download"></i>
                                                    Excel</a>
                                                <a class="btn btn-warning btn-md" id="print" name="print" ><i
                                                        class="fa fa-print"></i> Print </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <br>
                    </form>
                    <div class="container-fluid">
                        <div class="card-header">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover dataTable dtr-inline" width: 50%;
                                    name="table-pinjam" id="table-pinjam">
                                    <thead>
                                        <tr>
                                            <th>No pinjaman</th>
                                            <th>Tanggal pinjaman</th>
                                            <th>Id Anggota</th>
                                            <th>Lama pinjaman</th>
                                            <th>Id Buku</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Denda</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
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
    $('#tgl_laporan').daterangepicker({
        singleDatePicker: false,
        showDropdowns: true,
        minYear: 2023,
        minDate: moment().add(-40, 'days'),
        maxDate: moment().add(40, 'days'),
        autoApply: true,
        alwaysShowCalendars: true,
        ranges: {
            'Hari ini': [moment(), moment()],
            'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            '7 Hari terakhir': [moment().subtract(6, 'days'), moment()],
            '30 Hari terakhir': [moment().subtract(29, 'days'), moment()],
            'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
            'Bulan lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                .endOf('month')
            ]
        },
    });
});
$('#cari').click(function() {
    var date = $('#tgl_laporan').val().split(' - ');

    var pinjam = {
        _token: "{{ csrf_token() }}",
        tgl_start: date[0],
        tgl_end: date[1],
        tipe: $('#status').val()
    };

    if (tgl_laporan != '') {
        $('#table-pinjam').DataTable({
            processing: true,
            destroy: true,
            serverSide: true,
            ajax: {
                url: "{{ route('cari-laporan') }}",
                data: pinjam,
                type: 'POST',

            },
            columns: [
                {
                    data: 'id',
                    //callback 
                    render: function(data, type, row) {
                        return 'PJM'+data;
                    },
                    name: 'no_pinjam'
                },
                {
                    data: 'tanggal_pinjam',
                    name: 'tgl_pinjam'
                },
                {
                    data: 'id_anggota',
                    // find anggota from ID 
                    name: 'id_anggota'
                },
                {
                    data: 'lama',
                    name: 'lama_pinjam'
                },
                {
                    data: 'id_buku',
                    name: 'id_buku'
                },
                {
                    data: 'tanggal_kembali',
                    name: 'tgl_kembali'
                },
                {
                    data: 'denda',
                    name: 'denda'
                }
            ]
        });
    } else {
        alert('Pilih Bulan Terlebih Dahulu');
    }
});

//refresh
$('#refresh').click(function() {
    $('#tgl_laporan').val('');
    $('#table-pinjam').DataTable().destroy();
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