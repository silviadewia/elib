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
                        Button Tambah
                    </h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('pinjam.store') }}" enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr style="background:#ffe599">
                                                <td colspan="3">Data Transaksi</td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="date" id="tgl_peminjaman"
                                                        name="tgl_peminjaman" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nama Anggota</td>
                                                <td>:</td>
                                                <td>
                                                    <select class="form-control" id="anggota" name="anggota">
                                                        <option value="">-- Pilih Anggota --</option>
                                                        @foreach ($anggota as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Lama</td>
                                                <td>:</td>
                                                <td>
                                                   <select class="form-control" id="lama" nama="lama">
                                                         <option value="">-- Pilih Lama --</option>
                                                         <option value="1">1 Hari</option>
                                                         <option value="2">2 Hari</option>
                                                         <option value="3">3 Hari</option>
                                                         <option value="4">4 Hari</option>
                                                         <option value="5">5 Hari</option>
                                                         <option value="6">6 Hari</option>
                                                         <option value="7">7 Hari</option>
                                                   </select>
                                                </td>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </tr>
                            <div class="col-sm-7">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr style="background:#ffe599">
                                                <td colspan="3">Pinjam Buku</td>
                                            </tr>
                                            <tr>
                                                <td>Kode Buku</td>
                                                <td>:</td>
                                                <td>
                                                    <div class="input-group">
                                                        <select  class="form-control" name="id_buku" id="id_buku">
                                                            <option value="">-- Pilih Buku --</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" name="daftar-pinjam" id="daftar-pinjam">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Title</th>
                                                    <th>Penerbit / Tahun</th>
                                                    <th>Jml</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="pull-right">
                                <a href="{{ url()->previous() }}" class="btn btn-default">Batal</a>
                                <button type="submit" class="btn btn-info  float-right"><i class="fas fa-plus"></i>
                                    Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@stop

@section('js')
<script>
$(document).ready(function(){
    $('#anggota').select2();

    $('#id_buku').select2({
        ajax: {
            placeholder: 'Select an item',
            url: '/api/get-buku',
            dataType: 'json',
            delay: 250,
            processResults: function(data){
                return {
                    results: data.map(function(item){
                        return {
                            id: item.id,
                            slug: item.penerbit,
                            text: item.judul_buku,
                        }
                    })
                }
            },
            cache: true
        }
    });
    $('#id_buku').on("select2:select", function(event) {
        var value = $(event.currentTarget).find("option:selected").val();
        // append to table
        var table = $('#daftar-pinjam');
        var no = table.find('tr').length + 1;
        var html = '<tr>';
        html += '<td>' + no + '</td>';
        html += '<td>' + event.currentTarget.selectedOptions[0].text + '</td>';
        html += '<td>' + event.currentTarget.selectedOptions[0].dataset.slug + '</td>';
        html += '<td><input type="number" name="jumlah[]" class="form-control" value="1" min="1" max="10"></td>';
        html += '<td><button type="button" class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i></button></td>';
        html += '<input type="hidden" name="id_buku[]" value="' + value + '">';
        html += '</tr>';
        table.append(html);
    });

    $('#daftar-pinjam').on('click', '.btn-delete', function () {
        $(this).closest('tr').remove();
    });
})
   
$('.pas-delete-metu-alert-cantik').click(function(event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    Swal.fire({
        title:"PERHATIAN",
        text:"Setelah di hapus, anda tidak akan dapat memulihkan data ini!",
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