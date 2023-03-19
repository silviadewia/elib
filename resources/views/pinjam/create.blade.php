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
                    <form>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr style="background:#ffe599">
                                                <td colspan="3">Data Transaksi</td>
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
                                                <td>Tanggal</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" id="tgl_peminjaman"
                                                        name="tgl_peminjaman" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Lama</td>
                                                <td>:</td>
                                                <td>
                                                  <input type="text" id="lama"
                                                        name="lama" class="form-control" readonly>
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
                                                    <th>ID</th>
                                                    <th>Title</th>
                                                    <th>Penerbit / Tahun</th>
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
                                <button id="simpan-nih" class="btn btn-info  float-right"><i class="fas fa-plus"></i>
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

@include('wa')

@section('js')
<script>
$(document).ready(function(){
    $('#anggota').select2();
    $('#tgl_peminjaman').daterangepicker({
        singleDatePicker: false,
        showDropdowns: true,
        minYear: 2023,
        minDate: moment().add(1, 'days'),
        maxDate: moment().add(7, 'days'),
        autoApply: true
    });

    // count base on range
    $('#tgl_peminjaman').on('apply.daterangepicker', function(ev, picker) {
        var start = picker.startDate;
        var end = picker.endDate;
        var days = end.diff(start, 'days');
        $('#lama').val(days);
    });

    $('#id_buku').select2({
        ajax: {
            placeholder: 'Select an item',
            url: '/api/get-buku',
            dataType: 'json',
            delay: 250,
            processResults: function(data){
                return {
                    results: data.map(function(item){
                        // return mapping data 
                        return {
                            id: item.id,
                            text: item.judul_buku+ ' - ' + item.tahun_buku,
                        }
                    })
                }
            },
            cache: true
        }
    });
    $('#id_buku').on("select2:select", function(event) {
        var value = $(event.currentTarget).find("option:selected").val();
        // check if the value exist 
        var exist = $('#daftar-pinjam').find('input[name="id_buku[]"][value="' + value + '"]').length;
        if (exist) {
            return;
        }

        // append to table
        var table = $('#daftar-pinjam');
        var no = table.find('tr').length + 1;
        var html = '<tr>';
        html += '<td>' + no + '</td>';

        // sub text - penerbit / tahun
        var subText = event.currentTarget.selectedOptions[0].text.split('-');
        html += '<td>' + subText[0] + '</td>';
        html += '<td>' + subText[1] + '</td>';
        html += '<td><button type="button" class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i></button></td>';
        html += '<input type="hidden" name="id_buku[]" value="' + value + '">';
        html += '</tr>';
        table.append(html);
    });

    $('#daftar-pinjam').on('click', '.btn-delete', function () {
        $(this).closest('tr').remove();
    });

    // do ajax submit
    $('#simpan-nih').click(function(e){
        e.preventDefault();
        var form = $(this);
        var url = '{{ route('pinjam.store') }}';
        // convert date 
        var date = $('#tgl_peminjaman').val().split(' - ');

        var pinjam = {
            _token: "{{ csrf_token() }}",
            id_anggota: $('#anggota').val(),
            tgl_peminjaman: date[0],
            tgl_pengembalian: date[1],
            lama: $('#lama').val(),
            id_buku: $('#id_buku').val(),
        };

        $.ajax({
            url: url,
            type: 'POST',
            data: pinjam,
            success: function(response){
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Data berhasil disimpan',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = '/pinjam';
                    }
                });
            },
            error: function(xhr){
                var res = xhr.responseJSON;
                if ($.isEmptyObject(res) == false) {
                    $.each(res.errors, function(key, value){
                        Swal.fire({
                            title: 'Gagal!',
                            text: value,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    });
                }
            }
        });
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