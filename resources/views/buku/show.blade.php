@extends('layouts.app')

@section('content')
    <section class="content">
    <div class="row">
    <div class="col-md-12">
    <div class="box box-primary">
    </div>
    <div class="box-body">
    <table class="table table-striped table-bordered">
    <div class="box-header with-border">
    </div>
    <div class="box-body">
    <table class="table table-striped table-bordered">
    <tbody><tr>
    <td>Sampul</td>
    <th>
    <img src="https://app.codekop.com/perpusv1/assets/image/barcode/BK0026.png" class="img-responsive" style="width:70px;">
    BK0026 <br>
    <a href="https://app.codekop.com/perpusv1/data/barcode/BK0026" target="_blank" class="btn btn-primary btn-sm">Cetak Barcode</a>
    </th>
    </tr>
    <tr>
    <td style="width:20%">ISBN</td>
    <td>900</td>
    </tr>
    <tr>
    <td>Sampul Buku</td>
    <td> <a href="https://app.codekop.com/perpusv1/assets/image/buku/ef3a3fc9c7411069c67efb8912f7eb10.jpg" target="_blank">
    <img src="https://app.codekop.com/perpusv1/assets/image/buku/ef3a3fc9c7411069c67efb8912f7eb10.jpg" style="width:170px;object-fit:cover;" class="img-responsive">
    </a>
    </td>
    </tr>
    <tr>
    <td>Judul Buku</td>
    <td>tes</td>
    </tr>
    <tr>
    <td>Kategori</td>
    <td>ENSIKLOPEDIA</td>
    </tr>
    <tr>
    <td>Penerbit</td>
    <td>tos</td>
    </tr>
    <tr>
    <td>Pengarang</td>
    <td>ter</td>
    </tr>
    <tr>
    <td>Tahun Terbit</td>
    <td>2023</td>
    </tr>
    <tr>
    <td>Jumlah Buku</td>
    <td>100</td>
    </tr>
    <tr>
    <td>Jumlah Pinjam</td>
    <td>
    <a data-toggle="modal" data-target="#TableAnggota" class="btn btn-primary btn-xs" style="margin-left:1pc;">
    <i class="fa fa-sign-in"></i> Detail Pinjam</a>
    </td>
    </tr>
    <tr>
    <td>Keterangan Lainnya</td>
    <td><p>oooo<br></p></td>
    </tr>
    <tr>
    <td>Rak / Lokasi</td>
    <td>Rak Buku 2</td>
    </tr>
    <tr>
    <td>Lampiran</td>
    <td> <a href="https://app.codekop.com/perpusv1/assets/image/buku/f9cd74c0addd630f4459b24e53b9aa66.pdf" class="btn btn-primary btn-md" target="_blank">
    <i class="fa fa-download"></i> Sample Buku
    </a>
    </td>
    </tr>
    <tr>
    <td>Tanggal Masuk</td>
    <td>2023-01-11 08:46:57</td>
    </tr>
    </tbody></table>
    </div>
    </div>
    </div>
    </div>
    <div class="modal fade" id="TableAnggota">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span></button>
    <h4 class="modal-title"> Anggota Yang Sedang Pinjam</h4>
    </div>
    <div id="modal_body" class="modal-body fileSelection1">
    <div class="table-responsive">
    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="example1_info">
    <thead>
    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 0px;">No</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending" style="width: 0px;">ID</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 0px;">Nama</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Jenkel: activate to sort column ascending" style="width: 0px;">Jenkel</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Telepon: activate to sort column ascending" style="width: 0px;">Telepon</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Tgl Pinjam: activate to sort column ascending" style="width: 0px;">Tgl Pinjam</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Lama Pinjam: activate to sort column ascending" style="width: 0px;">Lama Pinjam</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Jml: activate to sort column ascending" style="width: 0px;">Jml</th></tr>
    </thead>
    <tbody>
    <tr class="odd"><td valign="top" colspan="8" class="dataTables_empty">No data available in table</td></tr></tbody>
    </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button next disabled" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">Next</a></li></ul></div></div></div></div>
    </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
    </div>
    </div>
    </div>
    </div>
    </section>
    <a class="btn btn-primary" href="{{ route('daftar.index') }}"> Back</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection