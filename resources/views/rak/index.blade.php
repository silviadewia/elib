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
                        Table Rak
                    </h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('rak.store'); }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nomor rak</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama rak" autocomplete="off">
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
                        Table Hasil
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover dataTable dtr-inline" name="table-Rak" id="table-rak">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nomor</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rak as $value)

                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $value->nama }}</td>
                                <td>
                                    <form action="{{ route('rak.destroy', $value->id) }}" method="post">
                                        <a href="{{ route('rak.edit',$value->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a>
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
            </div>
        </div>
    </div>
</div>
@stop

@include('wa')

@section('js')
<script>
    $(document).ready(function() {
        $('#table-rak').DataTable({
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
            confirmButtonText: 'Yakin!',
            cancelButtonText: 'Tidak!'
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