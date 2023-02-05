@extends('layouts.app')

@section('content')
<section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i> Detail Pinjam Buku         </h1>
        <ol class="breadcrumb">
            <li><a href="https://app.codekop.com/perpusv1/dashboard"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-edit"></i>&nbsp; Detail Pinjam Buku </li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header"></div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody><tr style="background:yellowgreen">
                                            <td colspan="3">Data Transaksi</td>
                                        </tr>
                                        <tr>
                                            <td>No Peminjaman</td>
                                            <td>:</td>
                                            <td>
                                                PJ00110                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tgl Peminjaman</td>
                                            <td>:</td>
                                            <td>
                                                2023-02-05                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tgl pengembalian</td>
                                            <td>:</td>
                                            <td>
                                                2023-02-08                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ID Anggota</td>
                                            <td>:</td>
                                            <td>
                                                AG0052                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Biodata</td>
                                            <td>:</td>
                                            <td>
                                                <table class="table table-striped">
															<tbody><tr>
																<td>Nama Anggota</td>
																<td>:</td>
																<td>Fais</td>
															</tr>
															<tr>
																<td>Telepon</td>
																<td>:</td>
																<td>0816371733</td>
															</tr>
															<tr>
																<td>E-mail</td>
																<td>:</td>
																<td>faiz12@gmail.com</td>
															</tr>
															<tr>
																<td>Alamat</td>
																<td>:</td>
																<td>-</td>
															</tr>
															<tr>
																<td>Level</td>
																<td>:</td>
																<td>Anggota</td>
															</tr>
														</tbody></table>                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Lama Peminjaman</td>
                                            <td>:</td>
                                            <td>
                                                3 Hari
                                            </td>
                                        </tr>
                                    </tbody></table>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody><tr style="background:yellowgreen">
                                            <td colspan="3">Pinjam Buku</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td>
                                                Dipinjam                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tgl Kembali</td>
                                            <td>:</td>
                                            <td>
                                                <p style="color:red;">belum dikembalikan</p>                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Denda</td>
                                            <td>:</td>
                                            <td>

                                                <p style="color:green;text-align:center;">
														Tidak Ada Denda</p>                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kode Buku</td>
                                            <td>:</td>
                                            <td>
                                                1. BK0026<br>                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Data Buku</td>
                                            <td>:</td>
                                            <td>
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Title</th>
                                                            <th>Penerbit</th>
                                                            <th>Tahun</th>
                                                            <th>Jml</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                                                                                <tr>
                                                            <td>1</td>
                                                            <td>tes</td>
                                                            <td>tos</td>
                                                            <td>2023</td>
                                                            <td>1</td>
                                                        </tr>
                                                                                                            </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody></table>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                                                        <a href="https://app.codekop.com/perpusv1/transaksi" class="btn btn-danger btn-md">Kembali</a>
                                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>