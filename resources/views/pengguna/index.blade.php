@extends('adminlte::page')

@section('title', $title)

@section('content_header')
<h1>{{$title}}</h1>
@stop

@section('content')
<div class="containe-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Table Pinjam
                    </h3>
                </div>
                <div class="card-body">
                <div class="card-header">
                    <h5 class="card-title">
                    <a href="" class="text-right btn btn-info "> Tambah Pengguna <i
                                class="fas fa-plus"></i></a>
                    </h5>
                </div>
                <!-- <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="true">Sortir Berdasarkan ID
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="paket">Paket</a></li>
                                <li><a href="novel">Novel</a></li>
                            </ul>
                        </div>-->
                    <div class="card-body">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable dtr-inline" name="table-pengguna"
                            id="table-pengguna">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jurusan</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Level</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Telepon</th>
                                    <th>Email</th>
                                    <th>Foto</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengguna as $value)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $value->nis }}</td>
                                    <td>{{ $value->nama_lengkap }}</td>
                                    <td>{{ $value->jurusan }}</td>
                                    <td>{{ $value->tempat_lahir }}</td>
                                    <td>{{ $value->tanggal_lahir }}</td>
                                    <td>{{ $value->username }}</td>
                                    <td>{{ $value->password }}</td>
                                    <td>{{ $value->level }}</td>
                                    <td>{{ $value->telepon }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>
                                        @if ($value->foto)
                                        <img style="max-width:50px;max-height:50px"
                                            src="/foto/{{ $value->foto }}" />
                                        @endif
                                    </td>
                                    <td>{{ $value->alamat }}</td>
                                    <td>
                                        <form action="{{ route('daftar.destroy', $value->id) }}" method="post">
                                            <a href="{{ route('daftar.edit', $value->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-pen"></i> </a>
                                            <a href="{{ route('daftar.show', $value->id) }}"
                                                class="btn btn-info btn-sm"><i class="fa fa-eye"></i> </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger btn-sm pas-delete-metu-alert-cantik">
                                                <i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    $(document).ready(function () {
        $('#table-pengguna').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });

</script>
@stop
