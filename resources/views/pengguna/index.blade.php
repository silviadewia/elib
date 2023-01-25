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
                <div class=" Left mt-3"> 
                <button type="button" class="btn btn-primary">Tambah Pengguna<i class="fas fa-plus"></i></a></button>
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="true">Sortir Berdasarkan ID
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="paket">Paket</a></li>
                                <li><a href="novel">Novel</a></li>
                            </ul>
                        </div>
                <div class="row">
                    <div class="card-body">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="table-pinjam" class="table table-bordered table-striped dataTable">
                                        <thead>
                                            <tr role="row">
                                                <th rowspan="1" colspan="1">No</th>
                                                <th rowspan="1" colspan="1">Id</th>
                                                <th rowspan="1" colspan="1">Nis</th>
                                                <th rowspan="1" colspan="1">Nama</th>
                                                <th rowspan="1" colspan="1">Jurusan</th>
                                                <th rowspan="1" colspan="1">User</th>
                                                <th rowspan="1" colspan="1">Telepon</th>
                                                <th rowspan="1" colspan="1">Status</th>
                                                <th rowspan="1" colspan="1">Alamat</th>
                                                <th rowspan="1" colspan="1">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">1</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">2</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">1</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">2</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">1</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">2</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">1</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">2</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">1</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">2</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">1</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">2</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">1</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">2</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">1</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">2</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">1</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">2</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">1</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">2</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">1</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">2</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">1</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">2</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">1</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">2</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">1</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">2</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">1</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">2</td>
                                                <td>Ardan</td>
                                                <td>123</td>
                                                <td>3111</td>
                                                <td>Ardan</td>
                                                <td>Rpl</td>
                                                <td>ardan123</td>
                                                <td>0867965432</td>
                                                <td>petugas</td>
                                                <td>bondo</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
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
    $(document).ready(function () {
        $('#table-pinjam').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });

</script>
@stop
