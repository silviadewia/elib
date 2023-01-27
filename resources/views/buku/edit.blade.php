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
                    <form method="post" action="{{ route('daftar.update', $edit_buku->id); }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="sampul">Sampul</label>
                                <br>
                                <input type="file" value="{{ $edit_buku['sampul'] }}" id="sampul">
                            </div>
                            <div class="box-body">
                                <label for="isbn">ISBN</label>
                                <input type="number" class="form-control" value="{{ $edit_buku['isbn'] }}" id="isbn"
                                    name="isbn" placeholder="Isbn" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" value="{{ $edit_buku['judul'] }}" id="judul"
                                    name="judul" placeholder="Judul" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;"
                                    name="kategori">
                                    <optgroup label="Pilih Kategori">
                                    <option value="Buku Paket">Buku Paket</option>
                                    <option value="Ensiklopedia">Ensiklopedia</option>
                                    </optgroup>
                                </select>
                                <div class="form-group">
                                    <label>Rak</label>
                                    <select class="form-control select2bs4 select2-hidden-accessible"
                                        style="width: 100%;" name="rak">
                                        <optgroup label="Pilih Rak">
                                        <option value="001">001</option>
                                        <option value="009">009</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Penerbit</label>
                                    <select class="form-control select2bs4 select2-hidden-accessible"
                                        style="width: 100%;" name="penerbit">
                                        <optgroup label="Pilih Penerbit">
                                        <option value="ria_ricis">Ria Ricis</option>
                                        <option value="boy_candra">boy Candra</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pengarang</label>
                                    <select class="form-control select2bs4 select2-hidden-accessible"
                                        style="width: 100%;" name="pengarang">
                                        <optgroup label="Pilih Pengarang">
                                        <option value="ria_ricis">Ria Ricis</option>
                                        <option value="boy_candra">boy Candra</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <input type="number" class="form-control" value="{{ $edit_buku['tahun'] }}"
                                        id="tahun" name="tahun" placeholder="Tahun" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_buku">Jumlah Buku</label>
                                    <input type="number" class="form-control" value="{{ $edit_buku['jumlah_buku'] }}"
                                        id="jumah_buku" name="jumlah_buku" placeholder="Jumlah buku" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="lampiran_buku">Lampiran Buku</label>
                                    <br>
                                    <input type="file" value="{{ $edit_buku['lampiran_buku'] }}" id="lampiran_buku">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan_lain">keterangan Lain</label>
                                    <textarea input type="textarea" class="form-control"
                                        value="{{ $edit_buku['keterangan_lain'] }}" id="jumah_buku"
                                        name="keterangan_lain" placeholder="keterangan lain"
                                        autocomplete="off"></textarea>
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

    $('.pas-delete-metu-alert-cantik').click(function(event){
        var form =  $(this).closest("form");
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
        
    @if ($message = Session::get('success'))
        Toast.fire( 'Sukses !!!', '{{ $message }}', 'success')
    @endif
    @if ($errors->any())
        Toast.fire( 'Eror !!!', '{{ $errors->first() }}', 'error')
    @endif
</script>
@stop