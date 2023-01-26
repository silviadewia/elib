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
                    <form method="post" action="">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="sampul">Sampul</label>
                                <br>
                                <input type="file" value="" id="sampul">
                            </div>
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="number" class="form-control" value="" id="isbn"
                                    name="isbn" placeholder="Isbn" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" value="" id="judul"
                                    name="judul" placeholder="Judul" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;"
                                    name="kategori">
                                    <optgroup label="Pilih Kategori">
                                    <option value="001">001</option>
                                    <option value="009">009</option>
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
                                    <input type="number" class="form-control" value=""
                                        id="tahun" name="tahun" placeholder="Tahun" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_buku">Jumlah Buku</label>
                                    <input type="number" class="form-control" value=""
                                        id="jumah_buku" name="jumlah_buku" placeholder="Jumlah buku" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="lampiran_buku">Lampiran Buku</label>
                                    <br>
                                    <input type="file" value="" id="lampiran_buku">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan_lain">keterangan Lain</label>
                                    <textarea input type="textarea" class="form-control"
                                        value="" id="jumah_buku"
                                        name="keterangan_lain" placeholder="keterangan lain"
                                        autocomplete="off"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="dibuat_oleh">Dibuat Oleh</label>
                                    <input type="text" class="form-control" value=""
                                        id="dibuat_oleh" name="dibuat_oleh" placeholder="Dibuat Oleh"
                                        autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="pinjam">Pinjam</label>
                                    <input type="number" class="form-control" value=""
                                        id="pinjam" name="pinjam" placeholder="Pinjam" autocomplete="off">
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="card-body">
                <button type="submit" class="btn btn-info  float-right">
                    Simpan</button>
            </div>
            @stop
        
            @section('js')
<script>

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

    @if ($message = Session::get('success'))
        Toast.fire( 'Sukses !!!', '{{ $message }}', 'success')
    @endif

    @if ($errors->any())
        Toast.fire( 'Eror !!!', '{{ $errors->first() }}', 'error')
    @endif
</script>
@stop