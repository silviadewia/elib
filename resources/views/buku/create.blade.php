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
                    <form action="{{ route('daftar.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="sampul">Sampul</label>
                                <br>
                                <input type="file" id="sampul" name="sampul">
                            </div>
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="number" class="form-control" value="{{ old('isbn') }}" id="isbn"
                                    name="isbn" placeholder="Isbn" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" value="{{ old('judul') }}" id="judul"
                                    name="judul" placeholder="Judul" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <x-adminlte-select2 class="form-control" style="width: 100%;" name="kategori">
                                    <optgroup label="Pilih Kategori">
                                        @foreach($kategori as $kat)
                                        <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                                        @endforeach
                                    </optgroup>
                                </x-adminlte-select2>
                                <div class="form-group">
                                    <label>Rak</label>
                                    <x-adminlte-select2 class="form-control" style="width: 100%;" name="rak">
                                        <optgroup label="Pilih Rak">
                                            @foreach($rak as $itm)
                                            <option value="{{ $itm->id }}">{{ $itm->nama }}</option>
                                            @endforeach
                                        </optgroup>
                                    </x-adminlte-select2>
                                </div>
                                <div class="form-group">
                                    <label>Penerbit</label>
                                    <x-adminlte-select2 class="form-control" style="width: 100%;" name="penerbit">
                                        <optgroup label="Pilih Penerbit">
                                            @foreach($penerbit as $itm)
                                            <option value="{{ $itm->id }}">{{ $itm->nama }}</option>
                                            @endforeach
                                        </optgroup>
                                    </x-adminlte-select2>
                                </div>
                                <div class="form-group">
                                    <label>Pengarang</label>
                                    <x-adminlte-select2 class="form-control" style="width: 100%;" name="pengarang">
                                        <optgroup label="Pilih Pengarang">
                                            @foreach($pengarang as $itm)
                                            <option value="{{ $itm->id }}">{{ $itm->nama }}</option>
                                            @endforeach
                                        </optgroup>
                                    </x-adminlte-select2>
                                </div>
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <input type="number" class="form-control" value="{{ old('tahun') }}" id="tahun"
                                        name="tahun" placeholder="Tahun" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_buku">Jumlah Buku</label>
                                    <input type="number" class="form-control" value="{{ old('jumlah_buku') }}"
                                        id="jumlah_buku" name="jumlah_buku" placeholder="Jumlah buku"
                                        autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="lampiran_buku">Lampiran Buku</label>
                                    <br>
                                    <input type="file" id="lampiran_buku" name="lampiran_buku">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan_lain">keterangan Lain</label>
                                    <textarea input type="textarea" class="form-control"
                                        value="{{ old('keterangan_lain') }}" id="keterangan_lain" name="keterangan_lain"
                                        placeholder="keterangan lain" autocomplete="off"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                        <button type="submit" class="btn btn-info float-right">
                            Simpan</button>
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

@if($errors -> any())
Toast.fire('Eror !!!', '{{ $errors->first() }}', 'error')
@endif
</script>
@stop