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
                        Tabel Buku
                    </h3>

                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover dataTable dtr-inline" name="table-buku"
                        id="table-buku">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Sampul</th>
                                <th>ISBN</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Rak</th>
                                <th>Penerbit</th>
                                <th>Pengarang</th>
                                <th>Tahun</th>
                                <th>Jumlah Buku</th>
                                <th>Lampiran Buku</th>
                                <th>keterangan Lain</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buku as $value)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>
                                    @if ($value->sampul)
                                    <img style="max-width:50px;max-height:50px" src="/sampul/{{ $value->sampul }}" />
                                    @endif
                                </td>
                                <td>{{ $value->isbn }}</td>
                                <td>{{ $value->judul_buku }}</td>
                                <td>
                                    @foreach ($kategori as $kat)
                                    @if($kat->id == $value->kategori)
                                    {{ $kat->nama }}
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($rak as $r)
                                    @if($r->id == $value->rak)
                                    {{ $r->nama }}
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($penerbit as $p)
                                    @if($p->id == $value->penerbit)
                                    {{ $p->nama }}
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($pengarang as $peng)
                                    @if($peng->id == $value->pengarang)
                                    {{ $peng->nama }}
                                    @endif
                                    @endforeach
                                </td>
                                <td>{{ $value->tahun_buku }}</td>
                                <td>{{ $value->jumlah_buku }}</td>
                                <td>
                                    @if ($value->lampiran_buku)
                                    <a href="/lampiran-buku/{{ $value->lampiran_buku }}" target="_blank"
                                        rel="noopener noreferrer">Lihat Lampiran</a>
                                    @endif
                                </td>
                                <td>{{ substr($value->keterangan_lain, 0, 50) }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" id="show" name="show"
                                        data-toggle="modal" data-target="#detailsModal"
                                        data-url="{{ route('cari-buku') }}" data-value="{{ $value->id }}">
                                        <i class="fa fa-eye"></i>
                                    </button>
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

<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">DETAILS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nama-text">Keterangan:</label>
                        <textarea class="form-control form-control-sm" id="keterangan"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    $(document).ready(function () {
        $('#table-buku').DataTable({
        });

        $('[name=show]').click(function () {
            var url = $(this).data('url');
            $.ajax({
                url: url,
                method: "post",
                data: {
                    id_buku: $(this).data('value'),
                    _token: '{{ csrf_token() }}'
                },
                dataType: "json",
                success: function (html) {
                    $('textarea#keterangan').text(html.keterangan_lain);
                    $('#showModal').modal('show');
                }
            })
        });
    });

</script>
@stop
