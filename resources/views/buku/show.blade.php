@extends('layouts.app')

@section('content')
<div class="containe-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Table Buku
                    </h3>
                </div>
                <div class="card-body">
                    <td>
                        <div class="mb-3">
                            <label class="form-label">Sampul</label>
                            <input type="img" class="form-control " name="sampul" value="{{ $buku->sampul }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ISBN</label>
                            <input type="text" class="form-control " name="isbn" value="{{ $buku->isbn }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control " name="judul" value="{{ $buku->judul_buku }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <input type="text" class="form-control " name="kategori" value="{{ $buku->kategori }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Rak</label>
                            <input type="text" class="form-control" name="rak" value="{{ $buku->rak }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" value="{{ $buku->penerbit }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pengarang</label>
                            <input type="text" class="form-control" name="pengarang" value="{{ $buku->pengarang }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun</label>
                            <input type="text" class="form-control" name="tahun_buku" value="{{ $buku->tahun_buku }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah Buku</label>
                            <input type="text" class="form-control" name="jumlah_buku" value="{{ $buku->jumlah_buku }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lampiran Buku</label>
                            <input type="text" class="form-control" name="lampiran_buku"
                                value="{{ $buku->lampiran_buku }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan_lain</label>
                            <input type="text" class="form-control" name="keterangan_lain"
                                value="{{ $buku->keterangan_lain }}" readonly>
                        </div>
                        <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-outline pull-left"
                                                                        data-dismiss="modal">Close</button>
                </div>
                <div class="card-body">
                <div class="card-footer">
                <a href="{{ route('daftar.index') }}"class="btn btn-info  float-right"><i class="fas fa-arrow-left"></i>
                        Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('wa')
