@extends('adminlte::page')

@section('title', $title)

@section('content_header')

<<<<<<< HEAD
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
                    <form action="{{ route('pengguna.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <section class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                        </div>
                                        <div class="box-body">
                                            <form action="{{ route('pengguna.store') }}" enctype="multipart/form-data"
                                                method="POST">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>NIS</label>
                                                            <input type="number" class="form-control" name="nis"
                                                                required="required" placeholder="NIS">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama Pengguna</label>
                                                            <input type="text" class="form-control" name="nama_lengkap"
                                                                required="required" placeholder="Nama Pengguna">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jurusan</label>
                                                            <select class="form-control" name="jurusan">
                                                                <option value="" selected="" disabled="">- pilih jurusan
                                                                    -</option>
                                                                <option value="TEKNIK DAN BISNIS SEPEDA MOTOR ">TEKNIK
                                                                    DAN BISNIS SEPEDA MOTOR
                                                                </option>
                                                                <option value="REKAYASA PERANGKAT LUNAK">REKAYASA
                                                                    PERANGKAT LUNAK</option>
                                                                <option value="OTOMATISASI DAN TATA KELOLA
                                                                    PERKANTORAN">OTOMATISASI DAN TATA KELOLA
                                                                    PERKANTORAN</option>
                                                                <option value="AKUNTANSI DAN KEUANGAN LEMBAGA">AKUNTANSI
                                                                    DAN KEUANGAN LEMBAGA
                                                                </option>
                                                                <option value="BISNIS DARING DAN PEMASARAN">BISNIS
                                                                    DARING DAN PEMASARAN</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tempat Lahir</label>
                                                            <input type="text" class="form-control" name="tempat_lahir"
                                                                required="required" placeholder="Contoh : JEPARA">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tanggal Lahir</label>
                                                            <input type="date" class="form-control" name="tanggal_lahir"
                                                                required="required" placeholder="Contoh : 2004-05-18">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Username</label>
                                                            <input type="text" class="form-control" name="username"
                                                                required="required" placeholder="Username">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input type="password" class="form-control" name="password"
                                                                required="required" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Level</label>
                                                            <select name="level" class="form-control"
                                                                required="required">
                                                                <option>Petugas</option>
                                                                <option>Anggota</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                        <label>Jenis_Kelamin</label>
                                                            <select name="jenis_kelamin" class="form-control"
                                                                required="required">
                                                                <option>Laki-Laki</option>
                                                                <option>Perempuan</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Telepon</label>
                                                            <input type="tel" class="form-control" name="telepon"
                                                                required="required" placeholder="Contoh : 089618173609">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>E-mail</label>
                                                            <input type="email" class="form-control" name="email"
                                                                required="required"
                                                                placeholder="Contoh : calmesil@gmail.com">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Pas Foto</label>
                                                            <br>
                                                            <input type="file" accept="foto/*" name="foto"
                                                                required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <textarea class="form-control" name="alamat"
                                                                required="required"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <button type="submit" class="btn btn-info float-right">
                                                        Simpan</button>
                                                </div>
                                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>
    @stop

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

    @if($errors->any())
    Toast.fire('Eror !!!', '{{ $errors->first() }}', 'error')
    @endif
    </script>
    @stop
=======
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
                        <form action="{{ route('pengguna.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="sampul">Sampul</label>
                                    <br>
                                    <input type="file" value="" id="sampul" name="sampul">
                                </div>
                                <div class="form-group">
                                    <label for="isbn">ISBN</label>
                                    <input type="number" class="form-control" value="" id="isbn" name="isbn"
                                        placeholder="Isbn" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" value="" id="judul" name="judul"
                                        placeholder="Judul" autocomplete="off">
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
                                        <input type="number" class="form-control" value="" id="tahun"
                                            name="tahun" placeholder="Tahun" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_buku">Jumlah Buku</label>
                                        <input type="number" class="form-control" value="" id="jumah_buku"
                                            name="jumlah_buku" placeholder="Jumlah buku" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="lampiran_buku">Lampiran Buku</label>
                                        <br>
                                        <input type="file" value="" id="lampiran_buku" name="lampiran_buku">
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan_lain">keterangan Lain</label>
                                        <textarea input type="textarea" class="form-control" value="" id="jumah_buku" name="keterangan_lain"
                                            placeholder="keterangan lain" autocomplete="off"></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <button type="submit" class="btn btn-info float-right">
                    Simpan</button>
            </div>
        @stop

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

                @if ($message = Session::get('success'))
                    Toast.fire('Sukses !!!', '{{ $message }}', 'success')
                @endif

                @if ($errors->any())
                    Toast.fire('Eror !!!', '{{ $errors->first() }}', 'error')
                @endif
            </script>
        @stop
>>>>>>> 9473735d7e181c4845bb8f82029f090f879fd2c2
