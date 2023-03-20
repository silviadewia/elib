@extends('adminlte::page')

@section('title', $title)

@section('content_header')

<h1>{{$title}}</h1>
@stop

@section('content')
<div class="containe-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Buttons
                    </h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('denda.update', $edit_denda->id); }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" value="{{ $edit_denda->harga }}" id="harga"
                                    name="harga" placeholder="Harga" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control select2bs4" style="width: 100%;" name="status">
                                    <optgroup label="Pilih Status">
                                        <option value="aktif" @if($edit_denda->status == 'aktif') selected @endif>Aktif
                                        </option>
                                        <option value="aktif" @if($edit_denda->status == 'tidak') selected
                                            @endif>Tidak Aktif</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="{{ url()->previous() }}" class="btn btn-default">Batal</a>
                            <button type="submit" class="btn btn-info  float-right"><i class="fas fa-plus"></i>
                                Simpan</button>
                        </div>
                </div>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Buttons
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover dataTable dtr-inline" name="table-Denda"
                        id="table-denda">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Biaya Denda</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($denda as $value)

                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $value->harga }}</td>
                                <td>
                                    @if($value->status == 'aktif')
                                    <button class="btn btn-success btn-sm">AKTIF</button>
                                    @else
                                    <button class="btn btn-danger btn-sm">NON AKTIF</button>
                                    @endif
                                </td>
                                <td>

                                    <form action="{{ route('denda.destroy', $value->id) }}" method="post">
                                        <button class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></button>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-danger btn-sm pas-delete-metu-alert-cantik"><i
                                                class="fas fa-trash"></i></button>
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
@stop
@include('wa')
@section('js')
<script>
$(document).ready(function() {
    $('#table-denda').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});

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
        confirmButtonText: 'Yakin!',
        cancelButtonText: 'Tidak!'
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