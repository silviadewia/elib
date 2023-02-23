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
                                                <td>No</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" id="no_peminjaman" name="no_peminjaman"
                                                        class="form-control">
                                                </td>
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
                                                <td>ID Anggota</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="number" id="id_anggota" name="id_anggota"
                                                        class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Biodata</td>
                                                <td>:</td>
                                                <td>
                                                    <div id="result_tunggu">
                                                        <p style="color:red">* Belum Ada Hasil</p>
                                                    </div>
                                                    <div id="result"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Lama</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="number" id="lama" name="lama"
                                                        class="form-control">
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
                                                        <input type="text" class="form-control" autocomplete="off"
                                                            name="id_buku" id="id_buku"
                                                            placeholder="Contoh ID Buku : BK001 atau ISBN">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Data Buku</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" id="id_buku" name="id_buku"
                                                        class="form-control">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
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