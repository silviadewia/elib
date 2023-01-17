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
                                <label for="isbn">ISBN</label>
                                <input type="number" class="form-control" value="{{ $edit_daftar->isbn }}" id="isbn" name="isbn" placeholder="Isbn" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" value="{{ $edit_daftar->judul }}" id="judul" name="judul" placeholder="Judul" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <input type="text" class="form-control" value="{{ $edit_daftar->kategori }}" id="kategori" name="kategori" placeholder="Kategori" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="rak">Rak</label>
                                <input type="number" class="form-control" value="{{ $edit_daftar->rak }}" id="rak" name="rak" placeholder="Rak" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <input type="radio" class="form-control" value="{{ $edit_daftar->penerbit }}" id="penerbit" name="penerbit" placeholder="Penerbit" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="penerbit">Pengarang</label>
                                <input type="radio" class="form-control" value="{{ $edit_daftar->pengarang }}" id="pengarang" name="pengarang" placeholder="Pengarang" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <input type="number" class="form-control" value="{{ $edit_daftar->tahun }}" id="tahun" name="tahun" placeholder="Tahun" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_buku">Jumlah Buku</label>
                                <input type="number" class="form-control" value="{{ $edit_daftar->jumlah_buku }}" id="jumah_buku" name="jumlah_buku" placeholder="Jumlah_buku" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="lampiran_buku">Lampiran Buku</label>
                                <input type="text" class="form-control" value="{{ $edit_daftar->lampiran_buku }}" id="lampiran_buku" name="lampiran_buku" placeholder="Lampiran_buku" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="keterangan_lain">Keterangan Lain</label>
                                <input type="text" class="form-control" value="{{ $edit_daftar->keterangan_lain }}" id="keterangan_lain" name="keterangan_lain" placeholder="Keterangan_lain" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="dibuat_oleh">Dibuat Oleh</label>
                                <input type="text" class="form-control" value="{{ $edit_daftar->dibuat_oleh }}" id="dibuat_oleh" name="dibuat_oleh" placeholder="Dibuat_oleh" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="pinjam">Pinjam</label>
                                <input type="number" class="form-control" value="{{ $edit_daftar->pinjam }}" id="pinjam" name="pinjam" placeholder="Pinjam" autocomplete="off">
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
<div class="card-body">
                    <table class="table table-bordered table-hover dataTable dtr-inline" name="table-buku" id="table-buku">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ISBN</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Rak</th>
                                <th>Penerbit</th>
                                <th>Tahun</th>
                                <th>Jumlah Buku</th>
                                <th>Lampiran Buku</th>
                                <th>Keterangan Lain</th>
                                <th>Dibuat Oleh</th>
                                <th>Pinjam</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($buku as $value)
                            
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $value->isbn }}</td>
                                <td>{{ $value->judul }}</td>
                                <td>{{ $value->kategori }}</td>
                                <td>{{ $value->rak }}</td>
                                <td>{{ $value->penerbit }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->jumlah_buku }}</td>
                                <td>{{ $value->keterangan_lain }}</td>
                                <td>{{ $value->dibuat_oleh }}</td>
                                <td>{{ $value->pinjam }}</td>
                                <td>
                                    
                                    <form action="{{ route('daftar.destroy', $value->id) }}" method="post">
                                        <button class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></button>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm pas-delete-metu-alert-cantik"><i class="fas fa-trash"></i></button>
                                    </form>
                                
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
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