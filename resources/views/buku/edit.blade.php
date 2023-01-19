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
                        Buttons
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
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="number" class="form-control" value="{{ $edit_buku['isbn'] }}" id="isbn" name="isbn" placeholder="Isbn" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" value="{{ $edit_buku['judul'] }}" id="judul" name="judul" placeholder="Judul" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <input type="text" class="form-control" value="{{ $edit_buku['kategori'] }}" id="kategori" name="kategori" placeholder="Kategori" autocomplete="off">
                            </div>
                            <div class="form-group">
                            <label>Rak</label>
                            <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" name="rak">
                                <option>Pilih Rak</option>
                                <option value="001">001</option>
                                <option value="009">009</option>
                        </select>
                            </div>
                            <div class="form-group">
                            <label>Penerbit</label>
                            <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" name="penerbit">
                                <option>Pilih Penerbit</option>
                                <option value="ria_ricis">Ria Ricis</option>
                                <option value="boy_candra">boy Candra</option>
                        </select>
                            </div>
                            <div class="form-group">
                            <label>Pengarang</label>
                            <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" name="pengarang">
                                <option>Pilih Pengarang</option>
                                <option value="ria_ricis">Ria Ricis</option>
                                <option value="boy_candra">boy Candra</option>
                        </select>
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <input type="number" class="form-control" value="{{ $edit_buku['tahun'] }}" id="tahun" name="tahun" placeholder="Tahun" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_buku">Jumlah Buku</label>
                                <input type="number" class="form-control" value="{{ $edit_buku['jumlah_buku'] }}" id="jumah_buku" name="jumlah_buku" placeholder="Jumlah buku" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="lampiran_buku">Lampiran Buku</label>
                                <br>
                                <input type="file" value="{{ $edit_buku['lampiran_buku'] }}" id="lampiran_buku">
                            </div>
                            <div class="form-group">
                                <label for="keterangan_lain">keterangan Lain</label>
                                <textarea input type="textarea" class="form-control" value="{{ $edit_buku['keterangan_lain'] }}" id="jumah_buku" name="keterangan_lain" placeholder="keterangan lain" autocomplete="off"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="dibuat_oleh">Dibuat Oleh</label>
                                <input type="text" class="form-control" value="{{ $edit_buku['dibuat_oleh'] }}" id="dibuat_oleh" name="dibuat_oleh" placeholder="Dibuat_oleh" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="pinjam">Pinjam</label>
                                <input type="number" class="form-control" value="{{ $edit_buku['pinjam'] }}" id="pinjam" name="pinjam" placeholder="Pinjam" autocomplete="off">
                            </div>
                        </div>
            </div>  
        </div>
    </div>
</div>
<div class="card-footer">
                            <button type="reset" class="btn btn-default">Batal</button>
                            <button type="submit" class="btn btn-info  float-right"><i class="fas fa-plus"></i>
                                Simpan</button>
                        </div>
@stop

